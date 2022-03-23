<?php

$data = array_map('trim', $_POST);
$data = array_map('htmlentities', $data);

if (empty($data["firstname"])) {
    header("Location: error.php");
} else {
    header("Location: success.php");
}
