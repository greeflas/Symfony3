<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Document;
use AppBundle\Form\DocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * Upload document action.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/file/upload-document")D
     */
    public function uploadDocumentAction(Request $request)
    {
        $doc = new Document();
        $form  = $this->createForm(DocumentType::class, $doc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $doc->getFileName();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->get('kernel')->getUploadsDir(), $fileName);

            $doc->setFileName($fileName);

            return $this->redirectToRoute('view_document', [
                'fileName' => $fileName,
            ]);
        }

        return $this->render('file/upload-document.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * View document by file name.
     *
     * @param string $fileName
     * @return BinaryFileResponse
     *
     * @Route("/file/view-document/{fileName}", name="view_document")
     */
    public function viewDocumentAction($fileName)
    {
        $file = $this->get('kernel')->getUploadsDir() . '/' . $fileName;
        if (!file_exists($file)) {
            throw $this->createNotFoundException();
        }

        return $this->file($file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
