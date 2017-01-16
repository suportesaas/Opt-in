<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>
<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/navbar.php";
require_once "conn.php"; // Aqui nos conectamos ao Banco de dados
$name = htmlspecialchars($_POST['name']); //  agora recebemos a informação postada pelo usuario, usamos htmlspecialchars para evitar sql injection
$email = htmlspecialchars($_POST['email']); // agora recebemos a informação postada pelo usuario, usamos htmlspecialchars para evitar sql injection
$gravar = "INSERT INTO cliente(email, nome, confirmed) VALUES ('%s', '%s', 'not');"; // Criados uma string com as informações da query
$query = mysql_query(sprintf($gravar, $email, $name)); // Agora formatamos a query com o sprintf que retorna a query formatada que é "rodada" pelo mysql_query
$ler_id = mysql_query("SELECT id FROM cliente WHERE email='$email';");
$linha = mysql_fetch_assoc($ler_id);
$id = $linha['id']; 
$link_confirmacao = "http://seudominio.com.br/newsletter/confirmar.php?id=$id";
$usuario_smtp = 'suportesaas';
$senha_smtp = 'Locaweb1020';
$remetente = 'smtplw@saaslw.tecnologia.ws';
$servidor_smtp= 'smtplw.com.br';
if($query){
	require 'PHPMailerAutoload.php';         // https://github.com/PHPMailer/PHPMailer
	$mail = new PHPMailer;
	$mail->setLanguage('br');                             // Habilita as saídas de erro em Português
	$mail->CharSet='UTF-8';                               // Habilita o envio do email como 'UTF-8'
	//$mail->SMTPDebug = 3;                               // Habilita a saída do tipo "verbose"
	$mail->isSMTP();                                      // Configura o disparo como SMTP
	$mail->Host = $servidor_smtp;                        // Especifica o enderço do servidor SMTP da Locaweb
	$mail->SMTPAuth = true;                               // Habilita a autenticação SMTP
	$mail->Username = $usuario_smtp;                        // Usuário do SMTP
	$mail->Password = $senha_smtp;                          // Senha do SMTP
	$mail->SMTPSecure = 'ssl';                            // Habilita criptografia TLS | 'ssl' também é possível
	$mail->Port = 465;                                    // Porta TCP para a conexão
	$mail->From = $remetente;                          // Endereço previamente verificado no painel do SMTP
	$mail->FromName = 'Nome do remetente';                     // Nome no remetente
	$mail->addAddress($email, $nome);
	$mail->addReplyTo($remetente, 'Informação');
	$mail->isHTML(true);                                  // Configura o formato do email como HTML
	$mail->Subject = 'Assunto da mensagem ex: Confirmação de cadastro';
	$mail->Body    = 'Corpo da mensagem, é importante que seja fornecido o link de confirmação ex: Olá'. $nome . ' Para confirmar o cadastro em nossa newsletter Clique no link a seguir <br/>' . $link_confirmacao;
	$mail->AltBody = 'Esse é o corpo da mensagem em formato "plain text" para clientes de email não-HTML';
	if(!$mail->send()) {
	    echo 'A mensagem não pode ser enviada';
	    echo 'Mensagem de erro: ' . $mail->ErrorInfo;
	} else {
	    echo 'Aqui você pode colocar uma mensagem de sucesso, ex: E-mail cadastrado com sucesso, agora acesse o seu email e confirme clicando no link enviador por gentileza';
	}
	
}else{
	echo 'Esta linha só é executada caso dê algum erro, caso isso aconteça peça pro usuario inserir o e-mail novamente';
	}
	
}
?>
</html>