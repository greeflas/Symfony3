<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Secret controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SecretController extends Controller
{
    /**
     * Set secret message to the session.
     *
     * @param string $secret
     * @return RedirectResponse
     *
     * @Route("/secret/set/{secret}")
     */
    public function setAction(string $secret) : RedirectResponse
    {
        $this->addFlash('secret', $secret);
        return $this->redirectToRoute('secret_show');
    }

    /**
     * Show secret message.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/secret/show", name="secret_show")
     */
    public function showAction()
    {
        return $this->render('secret/show.php.twig');
    }
}
