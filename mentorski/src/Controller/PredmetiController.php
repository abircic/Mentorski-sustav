<?php

namespace App\Controller;

use App\Entity\Predmeti;
use App\Form\PredmetiType;
use App\Repository\PredmetiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/predmeti")
 */
class PredmetiController extends AbstractController
{
    /**
     * @Route("/", name="predmeti.index")
     */
    public function index()
    {
        $this->get('security.token_storage')->getToken()->getUser();
        $user = $this->getUser();
        $predmeti = $this
            ->getDoctrine()
            ->getRepository(Predmeti::class)
            ->findAll()
        ;

        return $this->render('predmeti/index.html.twig', [
            'predmeti' => $predmeti, 'user'=>$user,
        ]);
    }
    /**
     * @Route("/create", name="predmeti.create", methods={"GET","POST"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function create(Request $request): Response
    {
        $predmeti = new Predmeti();
        $form = $this->createForm(PredmetiType::class, $predmeti);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($predmeti);
            $entityManager->flush();

            return $this->redirectToRoute('predmeti.index');
        }

        return $this->render('predmeti/create.html.twig', [
            'predmeti' => $predmeti,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/edit", name="predmeti.edit", methods={"GET","POST"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function edit(Request $request, Predmeti $predmeti): Response
    {

        $form = $this->createForm(PredmetiType::class, $predmeti);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('predmeti.index');
        }

        return $this->render('predmeti/edit.html.twig', [
            'predmeti' => $predmeti,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/details", name="predmeti.details", methods={"GET","POST"})
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function details($id)
    {
        $predmeti = $this
            ->getDoctrine()
            ->getRepository(Predmeti::class)
            ->findOneBy(['id'=>$id])
        ;
        return $this->render('predmeti/details.html.twig', [
            'predmet' => $predmeti
        ]);
    }
    /**
     * @Route("/{predmetId}/delete/", name="predmeti.delete")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function delete($predmetId): Response
    {
        $em = $this->getDoctrine()->getEntityManager();
        $predmetId = $em->getRepository(Predmeti::class)->findoneby(['id'=>$predmetId]);

        $em->remove($predmetId);
        $em->flush();
        return $this->redirectToRoute('predmeti.index');
    }
}
