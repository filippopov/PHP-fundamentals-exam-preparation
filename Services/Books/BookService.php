<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 16.3.2017 г.
 * Time: 23:33
 */

namespace Services\Books;


use Adapter\DatabaseInterface;
use Data\Genre;

class BookService implements BookServiceInterface
{
    /** @var  DatabaseInterface */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function addBook($isbn, $author, $titles, $genreId, $language, $releasedOn, $comment, $imageUrl)
    {
        foreach (func_get_args() as $argName => $value) {
            if (empty($value)) {
                throw new \Exception($argName . 'cannot be empty');
            }
        }

        new \DateTime($releasedOn);

        if (!$this->genreExists($genreId)) {
            throw new \Exception("Genre does not exist");
        }

        $query = "
            INSERT INTO books
            SET 
              ISBN = ?,
              title = ?,
              genre_id = ?,
              author = ?,
              released_on = ?,
              comment = ?,
              language = ?,
              image_url = ?,
              comment = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $isbn, $titles, $genreId, $author, $releasedOn, $language, $imageUrl, $comment
        ]);
    }

    /** @return Genre[]| \Generator */
    public function getAllGenres()
    {
        // TODO: Implement getAllGenres() method.
    }

    public function editBook($id, $author, $titles, $genreId, $language, $comment = null, $imageUrl = null)
    {
        // TODO: Implement editBook() method.
    }

    public function deleteId($id)
    {
        // TODO: Implement deleteId() method.
    }

    /**
     * @param $id
     */
    private function genreExists($id) {
        $query =
            "
            SELECT 
                id 
            FRPM 
                genres 
            WHERE 
                id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        $row = $stmt->fetchRow();

        return !!$row;
    }
}