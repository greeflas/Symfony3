<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
     * Example of 404 error page.
     *
     * @return void
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @Route("/error")
     */
    public function errorAction() : void
    {
        throw $this->createNotFoundException('Example of 404 exception');
    }

    /**
     * Redirect to external resource.
     *
     * @return RedirectResponse
     *
     * @Route("/official-repo")
     */
    public function officialRepoAction() : RedirectResponse
    {
        return $this->redirect('https://github.com/greeflas/Symfony3');
    }

    /**
     * Example of 302 redirect.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/some-page-old")
     */
    public function somePageOldAction() : RedirectResponse
    {
       return $this->redirectToRoute('some_page', [], 301);
    }

    /**
     * Routing example.
     * @see \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     *
     * @return Response
     *
     * @Route("/some-page", name="some_page")
     */
    public function somePageAction() : Response
    {
        $homePageUrl = $this->generateUrl('home_page');
        return $this->render('default/some-page.php.twig', compact('homePageUrl'));
    }

    /**
     * Index action.
     *
     * @param string $username
     * @return Response
     *
     * @Route("/{username}", name="home_page")
     */
    public function indexAction(string $username = '') : Response
    {
        return $this->render('default/index.php.twig', compact('username'));
    }
}
