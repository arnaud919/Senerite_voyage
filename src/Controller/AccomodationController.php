<?php

namespace App\Controller;

use App\Entity\Accomodation;
use App\Repository\PhotoAccomodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccomodationController extends AbstractController
{
    #[Route('/accomodation', name: 'app_accomodation')]
    public function index(): Response
    {
        return $this->render('accomodation/index.html.twig');
    }

    #[Route('/accomodation/{id}', name: 'app_accomodation_item')]
    public function item(Accomodation $accomodation, PhotoAccomodationRepository $photoaccomodationrepository): Response
    {
        $photoaccomodations = $photoaccomodationrepository->findOnePhotoByAField($accomodation->getId());

        return $this->render('accomodation/index.html.twig', [
            'accomodation' => $accomodation,
            'photoaccomodations' => $photoaccomodations
        ]);
    }
}
