<?php

namespace App\Entity;

use App\Entity\Embeddables\Package;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Release implements \JsonSerializable
{
    private $baseUrl = 'https://get.typo3.org/';

    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @var string
     */
    private $version;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $type;

    /**
     * @ORM\Embedded(class = "App\Entity\Embeddables\Package")
     * @var Package
     */
    private $tarPackage;

    /**
     * @ORM\Embedded(class = "App\Entity\Embeddables\Package")
     * @var Package
     */
    private $zipPackage;

    /**
     * @ORM\ManyToOne(targetEntity="MajorVersion", inversedBy="releases")
     * @ORM\JoinColumn(name="major_version", referencedColumnName="version")
     * @var string|\App\Entity\MajorVersion
     */
    private $majorVersion;

    /**
     * @ORM\Embedded(class = "App\Entity\Embeddables\ReleaseNotes")
     * @var Package
     */
    private $releaseNotes;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    public function getReleaseNotes()
    {
        return $this->releaseNotes;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getMajorVersion(): MajorVersion
    {
        return $this->majorVersion;
    }

    public function getTarPackage(): Package
    {
        return $this->tarPackage;
    }

    public function getZipPackage(): Package
    {
        return $this->zipPackage;
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
        return [
            'version' => $this->version,
            'date' => $this->date->format('Y-m-d H:i:s T'),
            'type' => $this->type,
            'checksums' => [
                'tar' => $this->tarPackage,
                'zip' => $this->zipPackage,
            ],
            'url' => [
                'zip' => $this->baseUrl . $this->version . '/zip',
                'tar' => $this->baseUrl . $this->version,
            ],
        ];
    }
}
