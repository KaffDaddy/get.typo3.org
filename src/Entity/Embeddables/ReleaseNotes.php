<?php
declare(strict_types=1);

namespace App\Entity\Embeddables;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class ReleaseNotes
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $newsLink;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $news;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $upgradingInstructions;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $changes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $legacyContent;

    /**
     * @return mixed
     */
    public function getNewsLink()
    {
        return $this->newsLink;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @return mixed
     */
    public function getUpgradingInstructions()
    {
        return $this->upgradingInstructions;
    }

    /**
     * @return mixed
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * @return mixed
     */
    public function getLegacyContent()
    {
        return $this->legacyContent;
    }

}