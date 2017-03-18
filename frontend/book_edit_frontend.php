<?php
/** @var $data \Data\BookEditViewData */

/** @var \Data\BookViewData $formatData */
$formatData = $data->getFormData();
$isbn = $formatData->getIsbn();
$author = $formatData->getAuthor();
$title = $formatData->getTitle();
$language = $formatData->getLanguage();
$releasedOn = $formatData->getReleasedOn();
$releasedOn = explode(' ', $releasedOn);
$releasedOn = isset($releasedOn[0]) ? $releasedOn[0] : '';
$genreId = $formatData->getGenre();
$comment = $formatData->getComment();
$image = $formatData->getImageUrl();
?>

<form method="post" enctype="multipart/form-data">
    Book ID*: <input type="text" name="isbn" value="<?=$isbn?>"><br>
    Author*: <input type="text" name="author" value="<?=$author?>"><br>
    Title*: <input type="text" name="title" value="<?=$title?>"><br>
    Language*: <input type="text" name="language" value="<?=$language?>"><br>
    Years of release*: <input type="date" name="released_on" value="<?=$releasedOn?>"><br>
    Genre*:
    <select name="genre_id">
        <?php foreach ($data->getGenres() as $genre) : ?>
            <?php $selected = $genre->getId() == $genreId ? 'selected' : ''?>
            <option value="<?=$genre->getId()?>" <?=$selected?>><?=$genre->getName()?></option>
        <?php endforeach; ?>
    </select><br>
    Comment:
    <textarea name="comment"><?=$comment?></textarea><br>
    Old Image:
    <img src="<?=$image?>" width="30px" height="30px"><br>
    Image:<input type="file" name="image"><br>
    <input type="submit" name="edit" value="Submit book">
</form>




<?php if ($data->getError()) : ?>
    <h2><?= $data->getError() ?></h2>
<?php endif; ?>

<?php if ($data->getMessage()) : ?>
    <h2><?= $data->getMessage() ?></h2>
<?php endif; ?>

<a href="books.php">All books</a>