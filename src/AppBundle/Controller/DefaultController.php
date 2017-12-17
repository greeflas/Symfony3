<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default application controller.
 *
 * @see https://symfony.com/doc/3.4/controller.html
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * Index action.
     *
     * @param string $username
     * @return Response
     *
     * @Route("/{username}")
     */
    public function indexAction(string $username = '') : Response
    {
        return $this->render('default/index.php.twig', compact('username'));
    }
}
