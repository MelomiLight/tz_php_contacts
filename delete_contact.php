<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $contacts = json_decode(file_get_contents('contacts.json'), true);
    if (isset($contacts[$index])) {
        array_splice($contacts, $index, 1);
        file_put_contents('contacts.json', json_encode($contacts));
    }
    header("Location: index.php"); // Redirect back to the main page after deleting
    exit;
}
