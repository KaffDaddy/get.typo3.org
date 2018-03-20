<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Requirement implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $uuid;

    /**
     * @ORM\ManyToOne(targetEntity="MajorVersion", inversedBy="requirements")
     * @ORM\JoinColumn(name="version", referencedColumnName="version")
     * @var string
     */
    private $version;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $min;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @var float
     */
    private $max;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getMin(): ?float
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax(): ?float
    {
        return $this->max;
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
        return [];
    }
}
