<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 18.3.2017 г.
 * Time: 16:53
 */

namespace Data;


class BookEditViewData
{
    /** @var  \Generator | Genre[] */
    private $genres;

    private $error = null;

    private $formData = [];

    private $message = null;

    /**
     * @return Genre[]|\Generator
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param Genre[]|\Generator $genres
     */
    public function setGenres(callable $genres)
    {
        $this->genres = $genres();
    }

    /**
     * @return null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param null $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        return $this->formData;
    }

    /**
     * @param BookViewData
     */
    public function setFormData(BookViewData $formData)
    {
        $this->formData = $formData;
    }

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param null $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}