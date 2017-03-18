<?php
require_once 'app.php';

$data = $bookService->getIndexViewData();
if ($session->isSetSession('from')) {
    $data->setFormData($session->getSession('from'));
    $session->unsetSession('from');
}

if ($session->isSetSession('message')) {
    $data->setMessage($session->getSession('message'));
    $session->unsetSession('message');
}

if (isset($_POST['add'])) {
    $imageUrl = null;

    if ($_FILES['image']['error'] == 0) {
        $uploadService = new \Services\Upload\UploadService();
        $imageUrl = $uploadService->upload(
            $_FILES['image'],
            'images'
        );
    }

    try {
        $bookService->addBook(
            $_POST['isbn'],
            $_POST['author'],
            $_POST['title'],
            $_POST['genre_id'],
            $_POST['language'],
            $_POST['released_on'],
            $_POST['comment'],
            $imageUrl
        );

        $session->setSession('message', 'Successfully create book');
    } catch (Exception $e) {
        $data->setError($e->getMessage());
    }
    $session->setSession('from', $_POST);
    header("Location: index.php");
}

$app->loadTemplate('index_frontend', $data);
