<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\Predmeti;
use App\Entity\User;
use App\Repository\PredmetiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default.index")
     */
    public function index()
    {
        $this->get('security.token_storage')->getToken()->getUser();
        $user = $this->getUser();
        return $this->render('default/index.html.twig', [
             'user'=>$user
        ]);


    }
}