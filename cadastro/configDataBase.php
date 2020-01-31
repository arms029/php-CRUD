<?php

require 'src/consoleFunctions.php';

$mysql = new mysqli('localhost','root','', 'cadastro_cliente');
$mysql -> set_charset('utf8');

if ($mysql == TRUE){
    printConsole("Banco de Dados conectado");
}
else{
    printConsole("Erro na conexão");
}

?>
