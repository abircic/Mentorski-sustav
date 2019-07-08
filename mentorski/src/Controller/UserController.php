<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(UserRepository $userRepository)
    {
        $redovni="redovni";
        $izvanredni="izvanredni";
        $q = $userRepository->createQueryBuilder('t')
            ->select('t.id','t.email','t.status')
            ->where('t.status=:redovni' )
            ->orWhere('t.status=:izvanredni')
            ->setParameter('redovni',$redovni)
            ->setParameter('izvanredni',$izvanredni)
        ;

        $q = $q->getQuery();
        $result = $q->getResult();


        return $this->render('user/index.html.twig', [
            'users' => $result,
        ]);
    }
}
