<?php
require_once 'app.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if (! $id) {
    header('Location: books.php');
    exit;
}

try {
    $bookService->deleteId($id);
    $session->setSession('message', 'Successfully delete book');
} catch (Exception $e) {
    $session->setSession('message', 'Book can not delete');
}

header('Location: books.php');