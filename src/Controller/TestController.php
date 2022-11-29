<?php

namespace App\Controller;

// to get the info from the database
use App\Entity\Traveler;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// package to work with queries
use Doctrine\Persistence\ManagerRegistry;

class TestController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $travelers=$doctrine->getRepository(Traveler::class)->findAll();
        return $this->render('test/index.html.twig', [
            "travelers"=> $travelers
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('components/about.html.twig');
    }

    #[Route('/news', name: 'news')]
    public function news(ManagerRegistry $doctrine): Response
    {
        return $this->render('components/news.html.twig');
       
    }


    // // to get the info from the table from database
    // #[Route('/travelers', name: 'travelers')]
    // // $doctrine is the name I give
    // public function showTravelers(ManagerRegistry $doctrine): Response
    // {
    //     $travelers=$doctrine->getRepository(Traveler::class)->findAll();
    //     // to debug the code
    //     // dd($travelers);
        
    //     return $this->render('components/travelers.html.twig', [
    //        "travelers" => $travelers
    //     ]);
    // }




}
