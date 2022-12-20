<?php
    require_once 'autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    if (isset($_POST['submit'])) {
        $author = htmlspecialchars($_POST['author']);
        $enterText = htmlspecialchars($_POST['enter-text']);
        $enterMail = htmlspecialchars($_POST['enter-email']);
        if (!empty($author) && !empty($enterText) && !empty($enterMail)) {
            $newInputText = new TelegraphText();
            (new FileStorage)->create($newInputText);
        }
    }

    $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.yandex.ru';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'selochkov@yandex.ru';
    $mail->Password   = 'fsFS1221!';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('selochkov@yandex.ru', 'Sender');
    $mail->addAddress($enterMail, 'Recipient');
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Это копия вашего отправленного сообщения';
    $mail->Body    = 'Это копия вашего письма:<p>$enterText</p>';
    $mail->AltBody = 'На это сообщение не нужно отвечать';

    if($mail->send()) {
        echo "<div style='width: 200px; height: 200px; background: green;'><b>Ваше сообщение отправлено!</b></div>";
    };

} catch (Exception $e) {
    echo "Ошибка отправки письма. Mailer Error: {$mail->ErrorInfo}";
}
?>
    <html>
    <head>
    <title>Form input text</title>
    </head>
    <body>
    <form method="post" action="input_text.php">
        <label for="author">Автор: </label>
        <input type="text" name="author">

        <label for="enter-text">Текст: </label>
        <input type="textarea" name="enter-text" value="Введите текст">

        <label for="enter-email">Email: </label>
        <input type="email" name="enter-email">

        <button type="submit" value="Отправить"></button>

    </form>
    </body>
    </html>