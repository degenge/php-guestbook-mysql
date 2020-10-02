<?php

declare(strict_types=1);

$ID = $nameFirst = $nameLast = $title = $message = "";

$nameFirstError = $nameLastError = $titleError = $messageError = "";

$errorPrefix       = '<p class="text-red-500 text-xs italic" >';
$errorSuffix       = '</p >';
$errorRequiredText = 'Please fill out this field.';
$isFormValid       = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['update'])) {
        $test = Guestbook::getPost($_POST['update']);

        $ID        = $test[0]['ID'];
        $nameFirst = $test[0]['name_first'];
        $nameLast  = $test[0]['name_last'];
        $title     = $test[0]['title'];
        $message   = $test[0]['message'];
    } elseif (isset($_POST['delete'])) {
        $test = Guestbook::deletePost($_POST['delete']);

    } else {

        if (!empty($_POST['name-first'])) {
            $nameFirst = sanitizeData($_POST['name-first']);
        } else {
            $isFormValid    = false;
            $nameFirstError = $errorPrefix . $errorRequiredText . $errorSuffix;
        }

        if (!empty($_POST['name-last'])) {
            $nameLast = sanitizeData($_POST['name-last']);
        } else {
            $isFormValid   = false;
            $nameLastError = $errorPrefix . $errorRequiredText . $errorSuffix;
        }

        if (!empty($_POST['title'])) {
            $title = sanitizeData($_POST['title']);
        } else {
            $isFormValid = false;
            $titleError  = $errorPrefix . $errorRequiredText . $errorSuffix;
        }

        if (!empty($_POST['message'])) {
            $message = sanitizeData($_POST['message']);
        } else {
            $isFormValid  = false;
            $messageError = $errorPrefix . $errorRequiredText . $errorSuffix;
        }

        if ($isFormValid) {
            $id        = $_POST['ID'] ?? '';
            $guestbook = new Guestbook($nameFirst, $nameLast, $title, $message, $id);
            $guestbook->savePost();

            // RESET FORM FIELDS
            $nameFirst = $nameLast = $title = $message = "";
        }
    }

}

function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
