# PHPSmtp
Basic PHP Smtp Authentication Send Mail

En basit haliyle, SSL/TLS yordamıyla SMTP mail gönderimi

Usage // Kullanımı

$smtp = new smtp();<br>
$smtp->host = 'localhost';<br>
$smtp->type = 'ssl';<br>
$smtp->port = 465;<br>
$smtp->user = 'info@domain.name';<br>
$smtp->pass = 'password';<br>
$smtp->send('to@other.mail', 'Message Subject', 'Message Content');<br>
