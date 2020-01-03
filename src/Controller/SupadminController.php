<?php

namespace App\Controller;
use App\Repository\SupadminRepository;
use App\Entity\Supadmin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use  ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class SupadminController extends AbstractController
{
    /**
     *  
     * @Route("/api", name="api",methods={"GET"})
     */
    public function index(SupadminRepository  $supadmin,SerializerInterface $serializer)
    {
        $supadmin ->findall();
        $data = $serializer->serialize($supadmin, 'json');
        return new Response($data, 200,[
            'Content-Type' => 'application/json'
        ]);
        
    }
}
