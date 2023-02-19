<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMaler.php';

$mail=new PHPMailer(true);

$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);
//от кого
$mail->setFrom('info@fls.guru', 'Фрилансер по жизни');
//кому отправить
$mail->addAddress('code@fls.guru');
$mail->Subject = 'Тема письма';

$body = '<h1>Это супер письмо!</h1>';

if(trim(!empty($_POST['name']))){
    $body.= '<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['surname']))){
    $body.= '<p><strong>Фамилия:</strong> '.$_POST['surname'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.= '<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}


//отправляем
if(!$mail->send()){
    $message = 'Ошибка';
} else {
    $message = 'Ваша заявка успешно отправлена и находится в обработке. Ожидайте email с подтверждением бронирования.';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>