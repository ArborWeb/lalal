<?php

$encoded_file=$_POST['file'];
$decoded_file=base64_decode($encoded_file);
/*Now you can copy the uploaded file to your server.*/
$message = "Sucesso ao criar imagem";
$success = file_put_contents($_POST['name'],$decoded_file);
chmod($_POST['name'], 0664);
if ($success === FALSE)
{
    $exists  = is_file($temp_name);
    if ($exists === FALSE) {
        $message = 'Arquivo não pode ser criado.';
    } else {
         $message = 'O arquivo foi criada mas contém erro.';
    }
}
echo $message;



?>