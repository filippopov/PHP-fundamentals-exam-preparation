<?php
/** @var $data \Data\BookViewData[] */
?>

<table border="1">
    <thead>
    <tr>
        <th>
            Book Id
        </th>
        <th>
            Book Title
        </th>
        <th>
            Author
        </th>
        <th>
            Book Language
        </th>
        <th>
            Genre
        </th>
        <th>
            Year Of Release
        </th>
        <th>
            Comment
        </th>
        <th>
            Image
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $book) : ?>
            <tr>
                <td>
                    <?=htmlspecialchars($book->getIsbn())?>
                </td>
                <td>
                    <?=htmlspecialchars($book->getTitle())?>
                </td>
                <td>
                    <?=htmlspecialchars($book->getAuthor())?>
                </td>
                <td>
                    <?=htmlspecialchars($book->getLanguage())?>
                </td>
                <td>
                    <?=htmlspecialchars($book->getGenre())?>
                </td>
                <td>
                    <?=htmlspecialchars($book->getReleasedOn())?>
                </td>
                <td>
                    <?=htmlspecialchars($book->getComment())?>
                </td>
                <td>
                    <img src="<?=htmlspecialchars($book->getImageUrl())?>" width="30px" height="30px">
                </td>
                <td>
                    <a href="editBook.php?id=<?=$book->getId()?>">Edit</a>
                </td>
                <td>
                    <a href="deleteBook.php?id=<?=$book->getId()?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php if (isset($_SESSION['message'])) : ?>
    <h2><?= $_SESSION['message'] ?></h2>
    <?php unset($_SESSION['message']) ?>
<?php endif; ?>

<a href="index.php">Create book</a>
