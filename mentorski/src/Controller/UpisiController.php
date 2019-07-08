<?php

namespace App\Controller;

use App\Entity\Upisi;
use App\Entity\User;
use App\Entity\Predmeti;
use App\Form\PredmetiType;
use App\Repository\UpisiRepository;
use App\Repository\PredmetiRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;

class UpisiController extends AbstractController
{
    /**
     * @Route("/upisi/{id}", name="upisi")
     */
    public function index(PredmetiRepository $predmetiRepository, $id):Response
    {
        if ($this->isGranted('ROLE_ADMIN'))
        {
            $doctrine = $this->getDoctrine();
            $user = $doctrine->getRepository(User::class)->findOneBy(['id'=> $id]);
        }
        else
        {
            $this->get('security.token_storage')->getToken()->getUser();
            $user = $this->getUser();
        }
        $doctrine = $this->getDoctrine();
        $UpisiRepository = $doctrine->getRepository(Upisi::class);

        $upisniList=$UpisiRepository->findBy(['student'=>$user]);
        $upisniListID=[];

        foreach ($upisniList as $item)
        {
            array_push($upisniListID, $item->getPredmet_id()->getId());
        }

        if($user->getStatus()=='redovni')
        {
            usort($upisniList, function (Upisi $a, Upisi $b)
            {
                return $a->getPredmet()->getSemRedovni() > $b->getPredmet()->getSemRedovni();
            });
        }
        elseif($user->getStatus()=='izvanredni')
        {
            usort($upisniList, function (Upisi $a, Upisi $b)
            {
                return $a->getPredmet()->getSemIzvanredni() > $b->getPredmet()->getSemIzvanredni();
            });
        }

        $qb = $predmetiRepository->createQueryBuilder('e');
        foreach ($upisniListID as $id)
        {
            $qb->andWhere('e.id != ' . $id);
            $predmeti=$qb->getQuery()->getResult();
        }
        if($upisniList==null)
        {
            $predmeti=$predmetiRepository->findAll();
        }
        return $this->render("upisi/index.html.twig", [
            'user'=>$user,'list'=>$upisniList,'predmeti'=>$predmeti]);



    }
    /**
     * @Route("/{studentId}/assign/{predmetId}", name="assign")
     */
    public function assign($studentId, $predmetId)
    {
        $doctine = $this->getDoctrine();
        $studentId = $doctine->getRepository(User::class)->find($studentId);
        $predmetId = $doctine->getRepository(Predmeti::class)->find($predmetId);

        $upis = new Upisi();

        $upis
            ->setStudent_id($studentId)
            ->setPredmet_id($predmetId)
            ->setStatus((""))
        ;
        $em = $doctine->getManager();
        $em->persist($upis);
        $em->flush();
        return $this->redirectToRoute('upisi', ['id' => $studentId->getId()]);
    }
    /**
     * @Route("/{studentId}/unassign/{predmetId}", name="unassign")
     */
    public function unassign($studentId, $predmetId)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $studentId = $em->getRepository(User::class)->find($studentId);
        $predmetId = $em->getRepository(Predmeti::class)->find($predmetId);
        $upis = $em->getRepository(Upisi::class)->findOneBy([
            'student'=>$studentId,
            'predmet'=>$predmetId,
        ]);

        $em->remove($upis);
        $em->flush();
        return $this->redirectToRoute('upisi', ['id' => $studentId->getId()]);
    }

    /**
     * @Route("/{studentId}/{status}/{predmetId}", name="change_status")
     */
    public function change_status($studentId, $predmetId, $status)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $studentId = $em->getRepository(User::class)->find($studentId);
        $predmetId = $em->getRepository(Predmeti::class)->find($predmetId);
        $upis = $em->getRepository(Upisi::class)->findOneBy([
            'student'=>$studentId,
            'predmet'=>$predmetId,
        ]);
        $upis
            ->setStudent_id($studentId)
            ->setPredmet_id($predmetId)
            ->setStatus($status)
        ;
        $em->persist($upis);
        $em->flush();
        return $this->redirectToRoute('upisi', ['id' => $studentId->getId()]);
    }
}
