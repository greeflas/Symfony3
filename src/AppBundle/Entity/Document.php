<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is document model.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class Document
{
    /**
     * @var string
     *
     * @Assert\NotBlank(message="Please, upload PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $fileName;

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }
}
