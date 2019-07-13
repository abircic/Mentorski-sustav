<?php

namespace App\Controller;

use App\Entity\Upisi;
use App\Repository\UpisiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        $counter=0;
        $studenti=$this->getDoctrine()->getRepository(Upisi::class)
            ->findBy(['status'=>'passed']);

        foreach ($studenti as $item)
        {
            if($item->getPredmet_id()->getBodovi()==7)
            {
                $counter++;
            }

        }
        return $this->render('test/index.html.twig', [
            'studenti' => $studenti, 'broj' => $counter,
        ]);
    }
}
