<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 16.3.2017 г.
 * Time: 23:33
 */

namespace Services\Books;


use Adapter\DatabaseInterface;
use Data\BookEditViewData;
use Data\BookViewData;
use Data\Genre;
use Data\IndexViewData;

class BookService implements BookServiceInterface
{
    /** @var  DatabaseInterface */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function addBook($isbn, $author, $titles, $genreId, $language, $releasedOn, $comment = null, $imageUrl = null)
    {
        foreach (func_get_args() as $argName => $value) {
            if (empty($value) && $argName < 6) {
                throw new \Exception('Cannot be empty');
            }
        }

        if (!$this->genreExists($genreId)) {
            throw new \Exception("Genre does not exist");
        }

        $query = "
            INSERT INTO books (
                ISBN,
                title,
                genre_id,
                author,
                released_on,
                language,
                image_url,
                comment
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $isbn, $titles, $genreId, $author, $releasedOn, $language, $imageUrl, $comment
        ]);
    }

    public function editBook($id, $isbn, $author, $titles, $genreId, $language, $releasedOn, $comment = null, $imageUrl = null)
    {
        foreach (func_get_args() as $argName => $value) {
            if (empty($value) && $argName < 7) {
                throw new \Exception('Cannot be empty');
            }
        }

        if (!$this->genreExists($genreId)) {
            throw new \Exception("Genre does not exist");
        }

        $query = "
            UPDATE 
                books
            SET
                ISBN = ?,
                title = ?,
                genre_id = ?,
                author = ?,
                released_on = ?,
                language = ?,
                image_url = ?,
                comment = ?
            WHERE 
                id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$isbn, $titles, $genreId, $author, $releasedOn, $language, $imageUrl, $comment, $id]);
    }

    /**
     * @return IndexViewData
     */
    public function getIndexViewData()
    {
        $query = "SELECT id, name FROM genres";
        $stmt = $this->db->prepare($query);
        $stmt->execute([]);

        $viewData = new IndexViewData();

        $viewData->setGenres(
            function () use ($stmt) {
                while ($genre = $stmt->fetchObject(Genre::class)) {
                    yield $genre;
                }
            }
        );

        return $viewData;
    }

    /**
     * @return BookEditViewData
     */
    public function getEditBookViewData($id)
    {
        $query = "SELECT id, name FROM genres";
        $stmt = $this->db->prepare($query);
        $stmt->execute([]);

        $viewData = new BookEditViewData();

        $viewData->setGenres(
            function () use ($stmt) {
                while ($genre = $stmt->fetchObject(Genre::class)) {
                    yield $genre;
                }
            }
        );

        $query = "SELECT 
                      id, 
                      ISBN AS isbn, 
                      title, 
                      genre_id AS genre, 
                      author, 
                      released_on AS releasedOn, 
                      comment, 
                      language, 
                      image_url AS imageUrl 
                  FROM 
                      books
                  WHERE 
                      id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $book = $stmt->fetchObject(BookViewData::class);

        $viewData->setFormData($book);

        return $viewData;
    }

    public function deleteId($id)
    {
        $dateTimeNow = new \DateTime('now');
        $dateTimeNow = $dateTimeNow->format('Y-m-d H:i:s');

        $query = "
             UPDATE 
                books
            SET
                delete_on = ?
            WHERE 
                id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$dateTimeNow, $id]);
    }

    /**
     * @param $id
     */
    private function genreExists($id) {
        $query =
            "
            SELECT 
                id 
            FROM 
                genres 
            WHERE 
                id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        $row = $stmt->fetchRow();

        return !!$row;
    }

    /**
     * @return BookViewData[]|\Generator
     * */
    public function findAll()
    {
        $query = "
            SELECT 
                b.id,
                b.ISBN AS isbn,
                b.title,
                g.name AS genre,
                b.author,
                YEAR(b.released_on) AS releasedOn,
                b.comment,
                b.language,
                b.image_url AS imageUrl
            FROM
                books AS b 
            INNER JOIN 
                genres AS g ON (b.genre_id = g.id)
            WHERE 
                b.delete_on IS NULL 
            ORDER BY 
                b.released_on DESC  
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([]);

        while ($book = $stmt->fetchObject(BookViewData::class)) {
            yield $book;
        }
    }
}