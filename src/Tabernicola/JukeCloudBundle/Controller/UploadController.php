<?php

namespace Tabernicola\JukeCloudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Tabernicola\JukeCloudBundle\Entity\Artist,
    Tabernicola\JukeCloudBundle\Entity\Disk,
    Tabernicola\JukeCloudBundle\Entity\Song;
use Tabernicola\JukeCloudBundle\Form\SongType;

class UploadController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $song=new Song();
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(new SongType, $song, array('em'=>$em))->add('submit','submit');
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($song);
                $em->flush();
                /*{"files":[{"url":"http://jquery-file-upload.appspot.com/blank.gif",
                 *          "thumbnailUrl":"http://lh3.ggpht.com/C0FQdCPedquAF1S2o_hCf9WlMxEeTMs80",
                 *          "name":"blank.gif",
                 *          "type":"image/gif",
                 *          "size":43,
                 *          "deleteUrl":"http://jquery-file-upload.appspot.com/AMIBXU/blank.gif?delete=true",
                 *          "deleteType":"DELETE"}]}*/
            }
            else{
                /*{"files":[{"url":"http://jquery-file-upload.appspot.com/2B1_-zT--rAihVs/renta.jpg",
                 *          "name":"renta.jpg",
                 *          "type":"image/jpeg",
                 * "size":657156,
                 * "error":"API error 1 (images: UNSPECIFIED_ERROR)",
                 * "deleteUrl":"http://jquery-file-upload.appspot.com/AMIfv956I/renta.jpg?delete=true",
                 * "deleteType":"DELETE"}]}*/
                $errors = $form->get('title')->getErrors(); // return array of errors
                foreach ($errors as $error){
                    echo "\n<br>".$error->getMessage();
                }
                $errors = $form->get('disk')->getErrors(); // return array of errors
                foreach ($errors as $error){
                    echo "\n<br>".$error->getMessage();
                }
                $errors = $form->get('artist')->getErrors(); // return array of errors
                foreach ($errors as $error){
                    echo "\n<br>".$error->getMessage();
                }
                $errors = $form->getErrors(); // return array of errors
                foreach ($errors as $error){
                    echo "\n<br>".$error->getMessage();
                }
                
            }
        }
        return new Response();
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
    
    

}
