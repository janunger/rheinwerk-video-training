<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lied;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LiedController extends Controller
{
    /**
     * @Route("/lied/hinzufuegen/{cdId}", name="lied-hinzufuegen", requirements={"cdId": "[0-9]+"})
     * @Method({"POST"})
     */
    public function hinzufuegenAction(int $cdId, Request $request)
    {
        $doctrine = $this->getDoctrine();

        $cd = $doctrine->getRepository('AppBundle:Cd')->find($cdId);

        $lied = new Lied($cd);
        $lied->setTrack($request->request->get('track'));
        $lied->setTitel($request->request->get('titel'));

        $doctrine->getManager()->persist($lied);
        $doctrine->getManager()->flush();

        return $this->redirect($this->generateUrl('cd', ['cdId' => $cdId]));
    }

    /**
     * @Route("/lied/bearbeiten/{liedId}", name="lied-bearbeiten", requirements={"liedId": "[0-9]+"})
     */
    public function bearbeitenAction(int $liedId, Request $request)
    {
        $lied = $this->getDoctrine()->getRepository('AppBundle:Lied')->find($liedId);

        if ($request->getMethod() === Request::METHOD_POST) {
            if ('speichern' === $request->request->get('aktion')) {
                $lied->setTrack($request->request->get('track'));
                $lied->setTitel($request->request->get('titel'));
                $this->getDoctrine()->getManager()->flush();
            }

            return $this->redirect($this->generateUrl('cd', ['cdId' => $lied->getCd()->getId()]));
        }

        return $this->render('lied/bearbeiten.html.twig', ['lied' => $lied]);
    }

    /**
     * @Route("/lied/loeschen/{liedId}", name="lied-loeschen", requirements={"liedId": "[0-9]+"})
     */
    public function loeschenAction(int $liedId, Request $request)
    {
        $lied = $this->getDoctrine()->getRepository('AppBundle:Lied')->find($liedId);
        $cd   = $lied->getCd();

        if ($request->getMethod() === Request::METHOD_POST) {
            $this->getDoctrine()->getManager()->remove($lied);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('cd', ['cdId' => $cd->getId()]));
        }

        return $this->render('lied/loeschen.html.twig', ['lied' => $lied]);
    }
}
