<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 18.3.2017 г.
 * Time: 13:13
 */

namespace Data;


class IndexViewData
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
     * @return null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        return $this->formData;
    }

    /**
     * @param callable $genres
     */
    public function setGenres(callable $genres) {
        $this->genres = $genres();
    }

    /**
     * @param null $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @param array $formData
     */
    public function setFormData(array $formData)
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