# PHPSmtp
Basic PHP Smtp Authentication Send Mail

En basit haliyle, SSL/TLS yordamıyla SMTP mail gönderimi

Usage // Kullanımı

$smtp = new smtp();
$smtp->host = 'localhost';
$smtp->type = 'ssl';
$smtp->port = 465;
$smtp->user = 'info@domain.name';
$smtp->pass = 'password';
$smtp->send('to@other.mail', 'Message Subject', 'Message Content');
