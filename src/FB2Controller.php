<?php

namespace Tommyknocker\FB2;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Tommyknocker\FB2\Helpers\FileHandler;
use Tommyknocker\FB2\Model\Book;

/**
 * Class FB2Controller
 * @package FB2
 */
class FB2Controller extends FB2AttributesManager
{

    protected $xml;

    /**
     * @var Book
     */
    protected $book;

    /**
     * FB2Controller constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->xml = FileHandler::FB2FileCleaner($file);
    }

    /**
     *  start parse book
     */
    public function startParse(): void
    {
        $FB2Parser = new FB2Parser($this->xml);
        $FB2Parser->loadAttributes($this->getAttributes());
        $FB2Parser->startParse();
        $this->book = $FB2Parser->getBook();
    }

    public function getBook()
    {
        return $this->book;
    }

    public function getAuthors()
    {
        return $this->book->getAuthors();
    }

    public function getTranslators()
    {
        return $this->book->getTranslators();
    }

    /**
     * @param array $attributes
     */
    public function withImages(array $attributes): void
    {
        $this->insertAttributes(true, 'isImages');
        foreach ($attributes as $key => $attribute) {
            if ($key === 'directory') {
                $this->insertAttributes($attribute, 'imagesDirectory');
            }
            if ($key === 'imagesWebPath') {
                $this->insertAttributes((string)$attribute, 'imagesWebPath');
            }
        }
        $fileSystem = new Filesystem();
        try {
            $fileSystem->mkdir($this->getAttributes()['imagesDirectory']);
        } catch (IOExceptionInterface $exception) {
            echo 'An error occurred while creating your directory at' . $exception->getPath();
        }
    }

    public function withNotes(): void
    {
        $this->insertAttributes(true, 'isNotes');
    }
}