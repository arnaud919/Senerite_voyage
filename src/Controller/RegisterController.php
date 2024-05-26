<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResgisterUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends AbstractController
{
    
    #[Route('/register/index', name: 'register')]
    public function index(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $newuser = new User();
        $form = $this->createForm(ResgisterUserType::class, $newuser);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($newuser);
            $em->flush();

            $this->addFlash('success', 'Merci, votre email a bien été enregistré');
            return $this->redirectToRoute('registered');
        }

        return $this->render('register/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/register/registered', name: 'registered')]
    public function registered(){
        return $this->render('register/registered.html.twig');
    }
}