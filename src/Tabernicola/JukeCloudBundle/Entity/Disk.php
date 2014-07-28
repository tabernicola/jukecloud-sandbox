<?php

namespace Tabernicola\JukeCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disk
 */
class Disk
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $songs;

    /**
     * @var \Tabernicola\JukeCloudBundle\Entity\Artist
     */
    private $artist;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->songs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Disk
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set title
     *
     * @param string $title
     * @return Disk
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add songs
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Song $songs
     * @return Disk
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

    /**
     * Set artist
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Artist $artist
     * @return Disk
     */
    public function setArtist(\Tabernicola\JukeCloudBundle\Entity\Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \Tabernicola\JukeCloudBundle\Entity\Artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }
    
    public function toObject(){
        $node=new \stdClass();
        $node->id= 'disk-'.$this->getId();
        $node->text= $this->getTitle();
        $node->type='disk';
        $node->children = array();
        return $node;
    }
}
