<?php
/** @var $data \Data\IndexViewData */
$formatData = $data->getFormData();
$isbn = isset($formatData['isbn']) ? $formatData['isbn'] : '';
$author = isset($formatData['author']) ? $formatData['author'] : '';
$title = isset($formatData['title']) ? $formatData['title'] : '';
$language = isset($formatData['language']) ? $formatData['language'] : '';
$releasedOn = isset($formatData['released_on']) ? $formatData['released_on'] : '';
$genreId = isset($formatData['genre_id']) ? $formatData['genre_id'] : '';
$comment = isset($formatData['comment']) ? $formatData['comment'] : '';
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
    Image:<input type="file" name="image"><br>
    <input type="submit" name="add" value="Submit book">
</form>




<?php if ($data->getError()) : ?>
    <h2><?= $data->getError() ?></h2>
<?php endif; ?>

<?php if ($data->getMessage()) : ?>
    <h2><?= $data->getMessage() ?></h2>
<?php endif; ?>

<form method="post" action="books.php">
    <input type="submit" value="View books">
</form>