<?php

require_once '../models/AESModel.php';

class AESController
{
    private $AESModel;

    public function __construct()
    {
        $this->AESModel = new AESModel();
    }


    /**
     * Encripta el mensaje tomando los datos del formulario
     */
    public function encrypt()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once "../models/AESmodel.php";

            $plaintext = $_POST["plaintext"];
            $key = $_POST["key"];
            $cipherMode = $_POST["cipherMode"];

            // Validar los datos de entrada (opcional)

            // Encriptar el texto utilizando AES
            $encryptedData = $this->AESModel->encryptText($plaintext, $key, $cipherMode);

            // Renderizar la vista con los resultados
            require_once "../views/encryptResult.php";
        }

    }

    /**
     * Desencripta la informacion tomando los valores dados en el formulario
     */
    public function decrypt()
    {
        // Verificar si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $ciphertext = base64_decode($_POST['ciphertext']);
            $key = $_POST['key'];
            $iv = base64_decode($_POST['iv']);
            $cipherMode = $_POST['cipherMode'];

            // Desencriptar el texto cifrado utilizando el modelo
            $decryptedText =$this->AESModel->decryptAES($ciphertext, $key, $iv, $cipherMode);
        }

        // Cargar la vista
        require '../views/decryptResult.php';
    }
}
?>