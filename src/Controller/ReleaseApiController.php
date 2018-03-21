<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Embeddables\ReleaseNotes;
use App\Entity\MajorVersion;
use App\Entity\Release;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/v1/api/release", defaults={"_format"="json"})
 */
class ReleaseApiController extends Controller
{

    /**
     * @var \JMS\Serializer\Serializer
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Get information about TYPO3 releases
     * @Route("/", methods={"GET"})
     * @Route("/{version}", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description="Returns TYPO3 Release(s)",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *           @Model(type=\App\Entity\Release::class, groups={"data"})
     *         )
     *     )
     * )
     * @SWG\Response(
     *     response=400,
     *     description="Request malformed."
     * )
     * @SWG\Response(
     *     response=404,
     *     description="Version not found."
     * )
     * @SWG\Tag(name="release")
     *
     * @param null|string $version Specific TYPO3 Version to fetch
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getRelease(?string $version): JsonResponse
    {
        $releaseRepo = $this->getDoctrine()->getRepository(Release::class);
        if ($version) {
            $this->checkVersionFormat($version);
            $releases = $this->getVersion($version);
        } else {
            $releases = $releaseRepo->findAll();
        }
        $json = $this->serializer->serialize(
            $releases,
            'json',
            SerializationContext::create()->setGroups(['data'])
        );
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * Add new TYPO3 release
     * @Route("/release", methods={"POST"})
     * @SWG\Response(
     *     response=201,
     *     description="Created."
     * )
     * @SWG\Response(
     *     response=400,
     *     description="Request malformed."
     * )
     * @SWG\Response(
     *     response=409,
     *     description="Conflict. Version already exists."
     * )
     * @SWG\Tag(name="release")
     * @SWG\Parameter(
     *     name="release",
     *     in="body",
     *     required=true,
     *     @Model(type=\App\Entity\Release::class, groups={"data"})
     * )
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Validator\Validator\ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addRelease(Request $request, ValidatorInterface $validator): JsonResponse
    {
        $content = $request->getContent();
        if (!empty($content)) {
            $release = $this->serializer->deserialize($content, Release::class, 'json');
            $version = $release->getVersion();
            $this->checkVersionFormat($version);
            $this->checkVersionConflict($version);
            $majorVersion = $this->getMajorVersionByReleaseVersion($version);
            $release->setMajorVersion($majorVersion);
            $this->validateObject($validator, $release);
            $em = $this->getDoctrine()->getManager();
            $em->persist($release);
            $em->flush();
            return new JsonResponse(null, Response::HTTP_CREATED);
        }
        throw new BadRequestHttpException('Missing or invalid request body.');
    }

    /**
     * Add TYPO3 Release Notes for Version
     * @Route("/{version}/release-notes", methods={"PATCH"})
     * @SWG\Response(
     *     response=200,
     *     description="Returns updated entity.",
     *     @Model(type=\App\Entity\Release::class, groups={"content"})
     * )
     * @SWG\Response(
     *     response=400,
     *     description="Request malformed."
     * )
     * @SWG\Response(
     *     response=404,
     *     description="Version not found."
     * )
     * @SWG\Tag(name="release")
     * @SWG\Tag(name="content")
     * @SWG\Parameter(
     *     name="release-notes",
     *     in="body",
     *     required=true,
     *     @Model(type=\App\Entity\Embeddables\ReleaseNotes::class, groups={"putcontent"})
     * )
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addReleaseNotesForVersion(string $version, Request $request, ValidatorInterface $validator): JsonResponse
    {
        $this->checkVersionFormat($version);
        $content = $request->getContent();
        if (null !== $content) {
            $releaseNotes = $this->serializer->deserialize($content, ReleaseNotes::class, 'json');
            $this->validateObject($validator, $releaseNotes);
            $releaseRepo = $this->getDoctrine()->getRepository(Release::class);
            $release = $releaseRepo->findOneBy(['version' => $version]);
            if (null === $release) {
                throw new NotFoundHttpException('Release ' . $version . ' not found.');
            }
            $release->setReleaseNotes($releaseNotes);
            $em = $this->getDoctrine()->getManager();
            $em->persist($release);
            $em->flush();
            $json = $this->serializer->serialize(
                $release,
                'json',
                SerializationContext::create()->setGroups(['content'])
            );
            return new JsonResponse($json, Response::HTTP_OK, [], true);
        }
        throw new BadRequestHttpException('Missing or malformed body.');
    }

    /**
     * Get TYPO3 Release Content
     * @Route("/{version}/content", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description="Returns TYPO3 Release content",
     *     @Model(type=\App\Entity\Release::class, groups={"content"})
     * )
     * @SWG\Response(
     *     response=400,
     *     description="Request malformed."
     * )
     * @SWG\Response(
     *     response=404,
     *     description="Version not found"
     * )
     * @SWG\Tag(name="release")
     * @SWG\Tag(name="content")
     *
     * @param string $version
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getContentForVersion(string $version): JsonResponse
    {
        $this->checkVersionFormat($version);
        $entity = $this->getVersion($version);
        $json = $this->serializer->serialize(
            $entity,
            'json',
            SerializationContext::create()->setGroups(['content'])
        );
        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }

    /**
     * @param string $version
     */
    private function checkVersionConflict(string $version): void
    {
        $releaseRepo = $this->getDoctrine()->getRepository(Release::class);
        if ($releaseRepo->findOneBy(['version' => $version])) {
            throw new ConflictHttpException('Version already exists');
        }
    }

    /**
     * @param null|string $version
     */
    private function checkVersionFormat(?string $version): void
    {
        if (!$this->isValidSemverVersion($version)) {
            throw new BadRequestHttpException('version malformed.');
        }
    }

    private function getMajorVersionByReleaseVersion(string $version): ?MajorVersion
    {
        $majorVersion = substr($version, 0, strpos($version, '.'));
        $mventity = $this->getDoctrine()->getManager()->getRepository(MajorVersion::class)->findOneBy(['version' => $majorVersion]);
        if (null === $mventity) {
            throw new BadRequestHttpException('Major version data for version ' . $majorVersion . ' does not exist.');
        }
        return $mventity;
    }

    /**
     * @param string $version
     * @return Release
     */
    private function getVersion(string $version): Release
    {
        $releaseRepo = $this->getDoctrine()->getRepository(Release::class);
        $releases = $releaseRepo->findOneBy(['version' => $version]);
        if (!$releases) {
            throw new NotFoundHttpException();
        }
        return $releases;
    }

    private function isValidSemverVersion(string $version): bool
    {
        $success = preg_match(
            "/^(\d+\.\d+\.\d+)(?:-([0-9A-Za-z-]+(?:\.[0-9A-Za-z-]+)*))?(?:\+([0-9A-Za-z-]+(?:\.[0-9A-Za-z-]+)*))?$/",
            $version,
            $matches
        );
        return ((int)$success === 1);
    }

    /**
     * @param \Symfony\Component\Validator\Validator\ValidatorInterface $validator
     * @param $object
     */
    private function validateObject(ValidatorInterface $validator, $object): void
    {
        $errors = $validator->validate($object);

        if (\count($errors) > 0) {
            $errorsString = (string)$errors;
            throw new BadRequestHttpException($errorsString);
        }
    }
}