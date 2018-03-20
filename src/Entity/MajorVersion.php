<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MajorVersionRepository")
 */
class MajorVersion implements \JsonSerializable
{

    /**
     * For example 7 or 8 or 4.3
     * @ORM\Id()
     * @ORM\Column(type="float")
     *
     * @var float
     */
    private $version;

    /**
     * TYPO3 7 LTS
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * @var \DateTimeImmutable
     */
    private $maintainedUntil;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @var \DateTimeImmutable
     */
    private $releaseDate;

    /**
     * @ORM\OneToMany(targetEntity="Requirement", mappedBy="version", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $requirements;

    /**
     * @ORM\OneToMany(targetEntity="Release", mappedBy="majorVersion", cascade={"persist", "remove"}, orphanRemoval=true)
     * @var Collection
     */
    private $releases;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $lts;

    public function __construct(
        int $version,
        string $title,
        string $subtitle,
        string $description,
        \DateTimeImmutable $releaseDate,
        \DateTimeImmutable $maintainedUntil,
        Collection $requirements,
        Collection $releases,
        float $lts
    ) {
        $this->version = $version;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->releaseDate = $releaseDate;
        $this->maintainedUntil = $maintainedUntil;
        $this->requirements = $requirements;
        $this->releases = $releases;
        $this->lts = $lts;
    }

    public function getVersion(): float
    {
        return $this->version;
    }

    public function getReleases(): Collection
    {
        return $this->releases;
    }

    public function getLatestRelease()
    {
        return $this->releases->last();
    }

    public function toArray(): array
    {
        return [
            'version' => $this->version,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'releaseDate' => $this->releaseDate,
            'maintainedUntil' => $this->maintainedUntil,
            'requirements' => $this->requirements,
            'releases' => $this->releases,
            'lts' => $this->lts,
            'latestRelease' => $this->getLatestRelease()
        ];
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $releaseData = [];
        foreach ($this->releases as $release) {
            $releaseData[$release->getVersion()] = $release;
        }
        uksort($releaseData, 'version_compare');
        $desc = array_reverse($releaseData);
        $latest = $this->getLatestReleaseVersion($releaseData);
        $active = (new \DateTimeImmutable() <= $this->maintainedUntil);
        return [
            'releases' => $desc,
            'latest' => $latest,
            'stable' => $latest,
            'active' => $active,
        ];
    }

    /**
     * @param $releaseData
     * @return string
     */
    private function getLatestReleaseVersion(array $releaseData): string
    {
        end($releaseData);
        $latest = key($releaseData);
        reset($releaseData);
        return $latest;
    }
}
