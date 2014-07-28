<?php

namespace Tabernicola\JukeCloudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tabernicola\JukeCloudBundle\Entity\Artist,
    Tabernicola\JukeCloudBundle\Entity\Disk,
    Tabernicola\JukeCloudBundle\Entity\Song;
class PlaylistController extends Controller
{
    public function artistAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $songs = $em->getRepository('TabernicolaJukeCloudBundle:Song')
            ->findBy(array("artist"=>$id), array('disk' => 'DESC','id'=>'DESC'));
        return $this->songsToResponse($songs);
    }
    
    public function diskAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $songs = $em->getRepository('TabernicolaJukeCloudBundle:Song')
            ->findBy(array('disk'=>$id), array('id' => 'DESC'));
        return $this->songsToResponse($songs);
    }
    
    public function songAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $songs = $em->getRepository('TabernicolaJukeCloudBundle:Song')
            ->findById($id);
        return $this->songsToResponse($songs);
    }
    
    private function songsToResponse($songs){
        $data=array();
        foreach ($songs as $song) {
            $node=new \stdClass();
            $node->id= 'song-'.$song->getId();
            $node->songTitle= $song->getTitle();
            $node->diskTitle= $song->getDisk()->getTitle();
            $node->artistName= $song->getArtist()->getName();
            $data[]=$node;
        }
        $response = new JsonResponse();
        return $response->setData($data);
    }
}
