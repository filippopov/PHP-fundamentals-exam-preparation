<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 16.3.2017 г.
 * Time: 23:27
 */

namespace Services\Books;


use Data\Genre;

interface BookServiceInterface
{
    public function addBook($isbn, $author, $titles, $genreId, $language, $releasedOn, $comment, $imageUrl);

    /** @return Genre[]| \Generator */
    public function getAllGenres();

    public function editBook($id, $author, $titles, $genreId, $language, $comment = null, $imageUrl = null);

    public function deleteId($id);
}