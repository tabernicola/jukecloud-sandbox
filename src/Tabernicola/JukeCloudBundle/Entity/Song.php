<?php

namespace Tabernicola\JukeCloudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Song
 */
class Song
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
     * @var \Tabernicola\JukeCloudBundle\Entity\Disk
     */
    private $disk;

    /**
     * @var \Tabernicola\JukeCloudBundle\Entity\Artist
     */
    private $artist;

    /**
     * @var file
     */
    private $files;
    
    /**
     * Set id
     *
     * @param integer $id
     * @return Song
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
     * @return Song
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
     * Set disk
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Disk $disk
     * @return Song
     */
    public function setDisk(\Tabernicola\JukeCloudBundle\Entity\Disk $disk = null)
    {
        $this->disk = $disk;

        return $this;
    }

    /**
     * Get disk
     *
     * @return \Tabernicola\JukeCloudBundle\Entity\Disk 
     */
    public function getDisk()
    {
        return $this->disk;
    }

    /**
     * Set artist
     *
     * @param \Tabernicola\JukeCloudBundle\Entity\Artist $artist
     * @return Song
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
    /**
     * @var string
     */
    private $path;


    /**
     * Set path
     *
     * @param string $path
     * @return Song
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
    
    public function toObject(){
        $node=new \stdClass();
        $node->id= 'song-'.$this->getId();
        $node->text= $this->getTitle();
        $node->type='song';
        $node->children = false;
        return $node;
    }
    /**
     * @var integer
     */
    private $number;


    /**
     * Set number
     *
     * @param integer $number
     * @return Song
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * Sets files.
     *
     * @param UploadedFile $files
     */
    public function setFiles($files = null)
    {
        $this->files = $files;
    }

    /**
     * Get files.
     *
     * @return UploadedFile
     */
    public function getFiles()
    {
        return $this->files;
    }
    
}
