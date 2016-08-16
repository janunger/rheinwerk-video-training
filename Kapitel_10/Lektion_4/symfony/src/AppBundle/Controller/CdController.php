<?php

namespace AppBundle\Controller;

use AppBundle\Form\LiedType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CdController extends Controller
{
    /**
     * @Route("/cd/{cdId}", name="cd", requirements={"cdId": "[0-9]+"})
     */
    public function indexAction(int $cdId)
    {
        // Noch zu tun: Fehlerbehandlung, wenn es keine CD mit der angegebenen ID gibt
        $cd = $this->get('doctrine')->getRepository('AppBundle:Cd')->find($cdId);

        return $this->render('cd/index.html.twig', [
            'cd' => $cd
        ]);
    }
}
