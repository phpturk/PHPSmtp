<?php
####################################
## BASIC SMTP Class
## Authour : Kerim YILMAZ
## URI : kerimyilmaz.com.tr
####################################

class smtp
{
	public $host;
	public $type = 'tls';
	public $port;
	public $user;
	public $pass;
	
	function send($to, $subject, $message)
	{		
		$this->to = $to;
		$this->subject = base64_encode($subject);
		$this->message = base64_encode($message);
		$this->template = "Subject: =?UTF-8?B?".$this->subject."?=\r\n"
		."To: <".$this->to.">\r\n"
		."From: ".$this->user."\r\n"
		."MIME-Version: 1.0\r\n"
		."Content-Type: text/html; charset=utf-8\r\n"
		."Content-Transfer-Encoding: base64\r\n\r\n"
		."".$this->message."\r\n.";
		if($this->send_to())
		{
			return true;
		}
		return false;
	}

	function send_to()
	{
		if($this->type == "ssl")
		{
			$this->host = 'ssl://'.$this->host.'';
		}else
		{
			$this->host = 'tls://'.$this->host.'';
		}
		if ($h = fsockopen($this->host, $this->port))
		{
			$data = array(
				0,
				"EHLO $host",
				'AUTH LOGIN',
				base64_encode($this->user),
				base64_encode($this->pass),
				"MAIL FROM: <".$this->user.">",
				"RCPT TO: <".$this->to.">",
				'DATA',
				$this->template
			);
			foreach($data as $c)
			{
				$c && fwrite($h, "$c\r\n");
				while(substr(fgets($h, 256), 3, 1) != ' '){}
			}
			fwrite($h, "QUIT\r\n");
			return fclose($h);
		}
	}
}
