<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     * @Security("is_granted('ROLE_ADMIN')")
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
