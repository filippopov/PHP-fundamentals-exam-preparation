<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 16.3.2017 г.
 * Time: 23:27
 */

namespace Services\Books;


use Data\BookEditViewData;
use Data\BookViewData;
use Data\Genre;
use Data\IndexViewData;

interface BookServiceInterface
{
    public function addBook($isbn, $author, $titles, $genreId, $language, $releasedOn, $comment = null, $imageUrl = null);

    /** @return IndexViewData */
    public function getIndexViewData();

    /**
     * @return BookEditViewData
     */
    public function getEditBookViewData($id);

    public function editBook($id, $isbn, $author, $titles, $genreId, $language, $releasedOn, $comment = null, $imageUrl = null);

    public function deleteId($id);

    /**
     * @return BookViewData[]|\Generator
     * */
    public function findAll();
}