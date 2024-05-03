<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contacts = json_decode(file_get_contents('contacts.json'), true);
    $newContact = [
        'name' => $_POST['name'],
        'phone' => $_POST['phone']
    ];
    $contacts[] = $newContact;
    file_put_contents('contacts.json', json_encode($contacts));
    header("Location: index.php"); // Redirect back to the main page after adding
    exit;
}
