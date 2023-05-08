<?php

require_once '../controllers/AESController.php';

$AESController = new AESController();

if (isset($_POST['encrypt'])) {
    $AESController->encrypt();
} elseif (isset($_POST['decrypt'])) {
    $AESController->decrypt();
}
?>