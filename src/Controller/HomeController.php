<?php

namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/test", name="test")
     * @param ObjectManager $om
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function test(): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = new Categorie();
        $categorie->setNom("Categorie de test");

        $em->persist($categorie);
        $em->flush();

        return $this->json(['message' => $categorie]);
    }
}
