<?php
require_once 'app.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (! $id) {
    header('Location: books.php');
    exit;
}

$data = $bookService->getEditBookViewData($id);

if ($session->isSetSession('message')) {
    $data->setMessage($session->getSession('message'));
    $session->unsetSession('message');
}

if (isset($_POST['edit'])) {
    $imageUrl = null;

    if ($_FILES['image']['error'] == 0) {
        $uploadService = new \Services\Upload\UploadService();
        $imageUrl = $uploadService->upload(
            $_FILES['image'],
            'images'
        );
    }

    try {
        $bookService->editBook(
            $id,
            $_POST['isbn'],
            $_POST['author'],
            $_POST['title'],
            $_POST['genre_id'],
            $_POST['language'],
            $_POST['released_on'],
            $_POST['comment'],
            $imageUrl
        );

        $_SESSION['message'] = 'Successfully edit book';
    } catch (Exception $e) {
        $data->setError($e->getMessage());
    }
    header("Location: editBook.php?id=$id");
}


$app->loadTemplate('book_edit_frontend', $data);
