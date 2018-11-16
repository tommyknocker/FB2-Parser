<?php

namespace Tommyknocker\FB2\Model;
/**
 * Class BookInfo
 * @package FB2\Model
 */
class BookInfo implements IModel
{
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $annotation = '';
    /**
     * @var array
     */
    private $genres = [];
    /**
     * @var string
     */
    private $keywords = '';
    /**
     * @var array
     */
    private $lang = [
        'lang' => null,
        'src' => null
    ];

    /**
     * @var string
     */
    private $publisher = '';

    /**
     * @var string
     */
    private $year = '';


    /**
     * Get book language
     * @return array
     */
    public function getLang(): array
    {
        return $this->lang;
    }

    /**
     * Set book language
     * @param array $values
     */
    public function setLang(array $values): void
    {
        $this->lang = $values;
    }


    /**
     * Get book keywords
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }

    /**
     * Set book keywords
     * @param $values
     */
    public function setKeywords(string $values): void
    {
        $this->keywords = $values;
    }


    /**
     * Get book genres
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * Set book genres
     * @param array $values
     */
    public function setGenres(array $values): void
    {
        $this->genres = $values;
    }

    /**
     * Get book annotation
     * @return string
     */
    public function getAnnotation(): string
    {
        return $this->annotation;
    }

    /**
     * Set book annotation
     * @param string $value
     */
    public function setAnnotation(string $value): void
    {
        $this->annotation = $value;
    }


    /**
     * Get book title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set book title
     * @param string $value
     */
    public function setTitle(string $value): void
    {
        $this->title = $value;
    }

    /**
     * Get book publisher
     * @return string
     */
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    /**
     * Set book publisher
     * @param string $value
     */
    public function setPublisher(string $value): void
    {
        $this->publisher = $value;
    }

    /**
     * Set book published year
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * Get book published year
     * @param string $value
     */
    public function setYear(string $value): void
    {
        $this->year = $value;
    }

}