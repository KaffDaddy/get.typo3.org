<?php

namespace App\Entity\Embeddables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Package implements \JsonSerializable
{
    /** @ORM\Column(type="string", nullable=true) */
    private $md5sum;

    /** @ORM\Column(type="string", nullable=true) */
    private $sha1sum;

    /** @ORM\Column(type="string", nullable=true) */
    private $sha256sum;


    /**
     * @return mixed
     */
    public function getSha1sum(): ?string
    {
        return $this->sha1sum;
    }

    /**
     * @return mixed
     */
    public function getSha256sum(): ?string
    {
        return $this->sha256sum;
    }

    public function __construct(?string $md5sum, ?string $sha1sum, ?string $sha256sum)
    {
        $this->md5sum = $md5sum;
        $this->sha1sum = $sha1sum;
        $this->sha256sum = $sha256sum;
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
        $data = [];
        if (null !== $this->sha1sum) {
            $data['sha1'] = $this->sha1sum;
        }
        if (null !== $this->md5sum) {
            $data['md5'] = $this->md5sum;
        }
        if (null !== $this->sha256sum) {
            $data['sha256'] = $this->sha256sum;
        }
        return $data;
    }
}
