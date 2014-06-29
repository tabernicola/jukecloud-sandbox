<?php

namespace Tabernicola\JukeCloudBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Tabernicola\JukeCloudBundle\Entity\Artist;
use Tabernicola\JukeCloudBundle\Entity\Disk;
use Tabernicola\JukeCloudBundle\Entity\Song;

class LoadArtistData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $root = $this->container->getParameter('tabernicola_juke_cloud.datadir');
        if (file_exists($root) && is_dir($root)){
            $dh = opendir( $root );
            if( false === $dh ) {
                return false;
            }
            while( $file = readdir( $dh )) {
                if( "." == $file || ".." == $file ){
                    continue;
                }
                if (is_dir($root.$file)){
                    $artist=new Artist();
                    $artist->setName($file);
                    $manager->persist($artist);
                    $manager->flush();
                    $this->loadArtistDisks($manager,$artist,$root.$file.'/');
                }
            }
            closedir( $dh );
            return true;
        }
    }
    
    private function loadArtistDisks(ObjectManager $manager,Artist $artist,$root){

        if (file_exists($root) && is_dir($root)){
            $dh = opendir( $root );
            if( false === $dh ) {
                return false;
            }
            while( $file = readdir( $dh )) {
                if( "." == $file || ".." == $file ){
                    continue;
                }
                if (is_dir($root.$file)){
                    $elem=new Disk();
                    $elem->setTitle($file);
                    $elem->setArtist($artist);
                    $manager->persist($elem);
                    $manager->flush();
                    $this->loadDiskSongs($manager,$artist, $elem,$root.$file.'/');
                }
            }
            closedir( $dh );
            return true;
        }
    }
    
    private function loadDiskSongs(ObjectManager $manager,Artist $artist,Disk $disk,$root){
        if (file_exists($root) && is_dir($root)){
            $dh = opendir( $root );
            if( false === $dh ) {
                return false;
            }
            while( $file = readdir( $dh )) {
                if( "." == $file || ".." == $file ){
                    continue;
                }
                if (is_dir($root.$file)){
                    $this->loadDiskSongs($manager,$artist,$disk,$root.$file.'/');
                }
                else{
                    $elem=new Song();
                    $elem->setTitle($file);
                    $elem->setArtist($artist);
                    $elem->setDisk($disk);
                    $elem->setPath($root.$file);
                    $disk->addSong($elem);
                    $manager->persist($elem);
                    echo  "\n".$root.$file;
                }
            }
            closedir( $dh );
            $manager->flush();
            return true;
        }
    }
}
