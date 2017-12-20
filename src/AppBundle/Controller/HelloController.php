<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Site controller.
 *
 * @see https://symfony.com/doc/3.4/routing.html
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class HelloController
{
    /**
     * Say's hello to anyone.
     *
     * @return Response
     *
     * @Route("/hello")
     */
    public function helloAction() : Response
    {
        return new Response('Hello, World!');
    }

    /**
     * Say's hello to the concrete user.
     *
     * @param SessionInterface $session
     * @param string $username
     * @return Response
     *
     * @Route("/hello/to/{username}")
     */
    public function helloUserAction(SessionInterface $session, string $username = 'Guest') : Response
    {
        $hasName = $session->has('username');
        if (!$hasName && $username !== 'Guest') {
            $session->set('username', $username);
        } elseif ($hasName && $username === 'Guest') {
            $username = $session->get('username');
        }

        return new Response('Hello, ' . $username . '!');
    }
}
