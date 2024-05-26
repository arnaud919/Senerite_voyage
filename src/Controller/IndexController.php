<?php

namespace App\Controller;

use App\Repository\AccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(AccomodationRepository $accomodationrepository): Response
    {
        $accomodations = $accomodationrepository->findSomeAccomodations();

        return $this->render('index/index.html.twig', [
            'accomodations' => $accomodations,
        ]);
    }
}