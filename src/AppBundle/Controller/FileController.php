<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * File controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class FileController extends Controller
{
    /**
     * Download file action.
     *
     * @return BinaryFileResponse
     *
     * @Route("/file/download")
     */
    public function downloadAction() : BinaryFileResponse
    {
        $root = $this->get('kernel')->getImagesDir();
        return $this->file($root . '/minimalism.jpg');
    }

    /**
     * Show file action.
     *
     * @return BinaryFileResponse
     *
     * @Route("/file/show")
     */
    public function showAction() : BinaryFileResponse
    {
        $root = $this->get('kernel')->getImagesDir();
        return $this->file($root . '/minimalism.jpg', 'minimalism', ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
