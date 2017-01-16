<?php
require_once "PHPMailerAutoload.php";

require_once "conn.php";
ini_set('session.use_cookies', '0'); 

/*Agora iremos pegar o ID do usuario, que vai ser passado via metodo GET que vai estar no link que vai ser enviado para o cliente */
$id = $_GET['id'];

$confirmar = 'UPDATE cliente SET confirmed="yes" WHERE id="%s" ;';
$query_confirmar = sprintf($confirmar, $id);

$query = mysql_query($query_confirmar);


if($query){
	header('Location: confirmado.php');
}