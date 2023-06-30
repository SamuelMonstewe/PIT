<?php
function GerarChave(){
    
    $email = $_POST['email'];
    $chave = password_hash($email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
    return $chave;
}