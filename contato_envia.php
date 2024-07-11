<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$varname	=$_POST["name"];
$varemail	=$_POST["email"];
$varsubject	=$_POST["subject"];
$varmessage	=$_POST["message"];
/* $varfone	=$_POST["telefone"]; */
$varzoiao	=$_POST["zoiao"];

if ($varzoiao != "") {
    # code...
    echo '<img src="https://www.bloominprojetos.com.br/roberto/you_shall_not_pass.jpg" style=" display:block; margin:0 auto; " alt="you shall not pass!!!" title="you shall not pass!!!">';
    die();
}




if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
}

if (!$captcha_data) {
    echo "Por favor, confirme o captcha.";
    exit;
}

$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LegAlEbAAAAAPz9G3vEkOhsuaocnmdp3VHw3wNF&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

if ($resposta.success) {



    require("inc/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    $mailer->SMTPDebug = 1;
    $mail->Host = "mail.bloomin.com.br"; // Endereço do servidor SMTP    
    $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
    $mail->Username = 'mail@bloomin.com.br'; // Usuário do servidor SMTP
    $mail->Port ="587";
    $mail->Password = 'bloomin2022'; // Senha do servidor SMTP
    $mail->From = 'mail@bloomin.com.br'; // Seu e-mail
    $mail->FromName = $varname; // Nome do solicitante
    $mail->AddReplyTo($varemail); // Responde para o e-mail do solicitante

    
    //$mail->AddAddress("suporte@bloomin.com.br");
    $mail->AddAddress("contato@tflx.com.br");
    

    //$mail->AddCC('teste@bloomin.com.br'); // Copia
    $mail->AddBCC('formularios@bloomin.com.br', 'TFLX'); // Cópia Oculta


    //Anexo

    //$path1 = $_FILES['arquivo1']['tmp_name']; 
    //
    //if(!empty($_FILES['arquivo1']['name']))
    //{
    //    $mail->AddAttachment($path1, $_FILES['arquivo1']['name']);
    //}

    // Define os dados técnicos da Mensagem
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
    $mail->Subject  = '=?UTF-8?B?'.base64_encode("Contato - TFLX").'?=';
    $mail->Body = "<strong>Nome: </strong>".$varname;
    /*$mail->Body .= "<br><strong>Telefone: </strong>".$varfone;*/
    $mail->Body .= "<br><strong>Assunto: </strong>".$varsubject;
    $mail->Body .= "<br><strong>E-mail: </strong>".$varemail;
    $mail->Body .= "<br><strong>Mensagem: </strong>".$varmessage;


    $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n";
    //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
    // Envia o e-mail
    $enviado = $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
    // Exibe uma mensagem de resultados

    if ($enviado) {
        echo("<script>alert('Mensagem Enviada!');</script>");
        echo("<script>window.location = 'obrigado'</script>");
    } else {
        echo "Não foi possível enviar o e-mail.<br /><br />";

        echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;

 
   }

}

?>
