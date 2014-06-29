<?php

namespace Tabernicola\JukeCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 */
class Artist
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $disks;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $songs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->songs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add disks
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Disk $disks
     * @return Artist
     */
    public function addDisk(\Tabernicola\JukeCloudBundle\Entity\Disk $disks)
    {
        $this->disks[] = $disks;

        return $this;
    }

    /**
     * Remove disks
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Disk $disks
     */
    public function removeDisk(\Tabernicola\JukeCloudBundle\Entity\Disk $disks)
    {
        $this->disks->removeElement($disks);
    }

    /**
     * Get disks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDisks()
    {
        return $this->disks;
    }

    /**
     * Add songs
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Song $songs
     * @return Artist
     */
    public function addSong(\Tabernicola\JukeCloudBundle\Entity\Song $songs)
    {
        $this->songs[] = $songs;

        return $this;
    }

    /**
     * Remove songs
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Song $songs
     */
    public function removeSong(\Tabernicola\JukeCloudBundle\Entity\Song $songs)
    {
        $this->songs->removeElement($songs);
    }

    /**
     * Get songs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSongs()
    {
        return $this->songs;
    }
}
