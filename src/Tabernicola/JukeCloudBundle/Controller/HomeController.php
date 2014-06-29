<?php

namespace Tabernicola\JukeCloudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tabernicola\JukeCloudBundle\Entity\Artist,
    Tabernicola\JukeCloudBundle\Entity\Disk,
    Tabernicola\JukeCloudBundle\Entity\Song;
class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('TabernicolaJukeCloudBundle::index.html.twig',array());
    }
    
    public function typesAction()
    {
        $node=new \stdClass();
        $node->id= 'artists';
        $node->text= 'All the music';
        $node->type='root';
        $node->children = true;
        $response = new JsonResponse();
        return $response->setData(array($node));

    }
    
    public function artistsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $artists = $em->getRepository('TabernicolaJukeCloudBundle:Artist')
                        ->findBy(array(), array('name' => 'ASC'));
        foreach ($artists as $artist) {
            $node=new \stdClass();
            $node->id= 'artist-'.$artist->getId();
            $node->text= $artist->getName();
            $node->type='artist';
            $node->children = true;

            $data[]=$node;
        }
        $response = new JsonResponse();
        return $response->setData($data);
    }
    
    public function artistDisksAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $artist = $em->getRepository('TabernicolaJukeCloudBundle:Artist')->findOneById($id);
        $disks = $em->getRepository('TabernicolaJukeCloudBundle:Disk')
                        ->findBy(array('artist'=>$artist), array('title' => 'ASC'));
        foreach ($disks as $disk) {
            $node=new \stdClass();
            $node->id= 'disk-'.$disk->getId();
            $node->text= $disk->getTitle();
            $node->type='disk';
            $node->children = true;

            $data[]=$node;
        }
        $response = new JsonResponse();
        return $response->setData($data);
    }
    
    public function diskSongsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $disk = $em->getRepository('TabernicolaJukeCloudBundle:Disk')->findOneById($id);
        $songs = $em->getRepository('TabernicolaJukeCloudBundle:Song')
                        ->findBy(array('disk'=>$disk), array('title' => 'ASC'));
        foreach ($songs as $song) {
            $node=new \stdClass();
            $node->id= 'song-'.$song->getId();
            $node->text= $song->getTitle();
            $node->type='song';
            $node->children = false;

            $data[]=$node;
        }
        $response = new JsonResponse();
        return $response->setData($data);
    }
}
