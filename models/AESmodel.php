<?php
class AESModel {
    public function encryptText($plaintext, $key, $cipherMode)
    {
        $ivLength = 16; // Longitud del vector de inicializacion de 16 bits

        // Generar un vector de inicialización (IV) aleatorio de longitud variable
        $iv = openssl_random_pseudo_bytes($ivLength);
    
        // Encriptar el texto utilizando AES y el modo de cifrado seleccionado
        $ciphertext = openssl_encrypt($plaintext, "AES-256-$cipherMode", $key, OPENSSL_RAW_DATA, $iv);
    
        // Codificar el texto cifrado en base64 para su visualización y almacenamiento seguro
        $encodedCiphertext = base64_encode($ciphertext);
    
        // Crear un array con el texto cifrado y el IV para devolverlos juntos
        $encryptedData = array(
            'ciphertext' => $encodedCiphertext,
            'iv' => base64_encode($iv)
        );
    
        return $encryptedData;
    }
    public function decryptAES($data, $key, $iv, $cipherMode) {
        $decrypted = openssl_decrypt($data, 'AES-256-' . $cipherMode, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }
}
?>