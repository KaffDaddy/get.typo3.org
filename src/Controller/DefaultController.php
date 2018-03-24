<?php
declare(strict_types=1);

namespace App\Controller;

/*
 * This file is part of the TYPO3 project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use App\Entity\MajorVersion;
use App\Entity\Release;
use App\Service\LegacyDataService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Simple\FilesystemCache;
use Symfony\Component\HttpFoundation\Response;

/**
 * Regular content and download pages
 */
class DefaultController extends Controller
{

    protected $releaseNotesDir = __DIR__ . '/../../Data/ReleaseNotes/';
    protected $releasesJsonFile = __DIR__ . '/../../Data/releases.json';
    /**
     * @var \App\Service\LegacyDataService
     */
    private $legacyDataService;

    public function __construct(LegacyDataService $legacyDataService)
    {
        $this->legacyDataService = $legacyDataService;
    }

    public function show()
    {
        $releaseNotes = new \App\Service\ReleaseNotes();
        $result = $releaseNotes->getAllReleaseNoteNames();
        return $this->render('default/show.html.twig', ['result' => $result]);
    }

    /**
     * Outputs the JSON file
     * /json
     * Legacy end point
     *
     * @return Response
     */
    public function releaseJson(): Response
    {
        $maxAgeForReleases = filemtime($this->releasesJsonFile) + 3600 - time();
        $content = $this->legacyDataService->getReleaseJson();
        $headers = [
            'Content-type' => 'application/json',
            'Access-Control-Allow-Origin' => '*',
            'Cache-control' => 'max-age=' . $maxAgeForReleases,
        ];
        return new Response($content, 200, $headers);
    }


    /**
     * Display release notes for a version
     *
     * @param string $version
     * @return Response
     */
    public function releaseNotes(string $version = ''): Response
    {
        $cache = new FilesystemCache();
        $version = str_replace('TYPO3_CMS_', '', $version);
        if ($cache->has('releaseNotes.' . $version)) {
            $html = $cache->get('releaseNotes.' . $version);
        } else {
            /** @var \App\Repository\MajorVersionRepository $mVersionRepo */
            $mVersionRepo = $this->getDoctrine()->getRepository(MajorVersion::class);
            $majors = $mVersionRepo->findAllGroupedByMajor();

            $releaseRepository = $this->getDoctrine()->getRepository(Release::class);
            $release = $releaseRepository->findOneBy(['version' => $version]);
            $html = $this->render('default/release-notes.html.twig', ['result' => $majors, 'current' => $release]);
            $cache->set('releaseNotes.' . $version, $html);
        }
        return $html;
    }

    /**
     * @param string $requestedVersion
     * @param string $requestedFormat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function download($requestedVersion = 'stable', $requestedFormat = 'tar.gz')
    {
        $maxAgeForReleases = filemtime($this->releasesJsonFile) + 3600 - time();
        if ($requestedVersion === 'current') {
            $requestedVersion = 'stable';
        }

        // Get information about version to download
        $redirectData = $this->getSourceForgeRedirect($requestedVersion, $requestedFormat, $this->releasesJsonFile);
        if (empty($redirectData)) {
            $redirectData = $this->getFedextRedirect($requestedVersion, $requestedFormat, $this->releasesJsonFile);
        }

        if (empty($redirectData)) {
            $this->createNotFoundException();
        }
        header('Cache-control: max-age=' . $maxAgeForReleases);
        return $this->redirect($redirectData['url']);
    }

    public function showVersion(int $version)
    {
        $templateName = 'default/download.html.twig';
        /** @var \App\Repository\MajorVersionRepository $repository */
        $repository = $this->getDoctrine()->getRepository(MajorVersion::class);
        $data = $repository->findOneBy(['version' => $version]);
        if ($data instanceof MajorVersion) {
            $data = $data->toArray();
        }
        return $this->render($templateName, $data);
    }

    /**
     * @param string $versionName
     * @param string $format
     * @param string $releasesFile
     * @return array
     */
    private function getSourceForgeRedirect($versionName, $format, $releasesFile)
    {
        $packageFiles = [
            // slug (url part) => filename (without Extensions, url-encoded)
            'typo3_src' => 'typo3_src',
            'typo3_src_dummy' => 'typo3_src%2Bdummy',
            'dummy' => 'dummy',
            'introduction' => 'introductionpackage',
            'government' => 'governmentpackage',
            'blank' => 'blankpackage',
        ];

        $result = [];
        $releases = json_decode(file_get_contents($releasesFile));
        // defaults
        $package = 'typo3_src';

        /*
         * $versionName could be something like:
         * stable
         * dev
         * 4.5
         * 6.0.0
         * typo3_src-4.5
         * typo3_src-dev
         * dummy-4.5
         * dummy-6.0.0
         */
        // Detecting Package files, possible with version number
        foreach ($packageFiles as $slug => $filename) {

            // a Package Name without version number
            if ($versionName === $slug) { // simple
                $package = $filename;
                $versionName = 'stable';
                break;
            }
            // a Package Name with version number
            if (substr($versionName, 0, strlen($slug) + 1) === $slug . '-') {
                $package = $filename;
                $versionName = substr($versionName, strlen($slug) + 1);
                break;
            }
        }

        // named version detection
        if ($versionName === 'stable') {
            $versionName = $releases->latest_stable;
        } elseif ($versionName === 'dev') {
            die('"dev" version cannot be used anymore. Please stick to "stable"');
        }
        $versionParts = explode('.', $versionName);

        $isValidVersion = !empty($versionParts)
                          && ((int)$versionParts[0] >= 7 || count($versionParts) > 1);

        // Make sure we can retrieve a product release
        if ($isValidVersion && in_array($format, ['tar.gz', 'zip'])) {
            $branchName = (int)$versionParts[0] >= 7 ? $versionParts[0] : $versionParts[0] . '.' . $versionParts[1];
            if (!isset($releases->$branchName)) {
                return null;
            }
            $branch = $releases->$branchName;

            // $versionParts[2] can be the number '0' as a valid content. e.g. 6.0.0.
            if (isset($versionParts[2]) === false) {
                $versionName = $branch->latest;
            }

            $version = $branch->releases->$versionName->version;

            if ($version !== null) {
                // TYPO3 6.2 does not have some packages anymore
                $legacyPackages = ['introductionpackage', 'governmentpackage', 'blankpackage', 'dummy'];
                if (version_compare($version, '6.2.0', '>=') && in_array($package, $legacyPackages)) {
                    $flippedPackageFiles = array_flip($packageFiles);
                    $fallbackPackage = $flippedPackageFiles[$package] . '-6.1.7';
                    return $this->getSourceForgeRedirect($fallbackPackage, $format, $releasesFile);
                }
                $result = [
                    'url' => 'https://typo3.azureedge.net/typo3/' .
                             $version .
                             '/' .
                             $package .
                             '-' .
                             $version .
                             '.' .
                             $format,
                    'version' => $version,
                    'format' => $format,
                ];
            }
        }
        return $result;
    }

    /**
     * @param string $versionName
     * @param string $format
     * @param string $releasesFile
     * @return array
     */
    private function getFedextRedirect($versionName, $format, $releasesFile)
    {
        $result = [];
        if ($versionName === 'bootstrap') {
            $releases = json_decode(file_get_contents($releasesFile));
            $result['url'] = sprintf('http://cdn.fedext.net/%spackage.%s', $versionName, $format);
            $result['format'] = $format;
            $result['version'] = $releases->latest_stable;
        }
        return $result;
    }
}
