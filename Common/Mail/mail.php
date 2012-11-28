<?php
	function sendMail($addressArray, $subject, $body)
	{
		require_once 'class.phpmailer.php';
		
		$mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->Host = C('MAIL_HOST');
		$mail->Port = C('MAIL_PORT');
		$mail->SMTPAuth = true;
		$mail->Username = C('MAIL_LOGINNAME');
		$mail->Password = C('MAIL_PASSWORD');
		$mail->CharSet='UTF-8';
		$mail->SetFrom(C('MAIL_FROM_ADDRESS'), C('MAIL_FROM_NAME'));
		
		$replayArray = C('MAIL_REPLAY_ADDRESS');
		foreach($replayArray as $replay) {
			$mail->AddReplyTo($replay);
		}		
		
		foreach($addressArray as $address){
			$mail->AddAddress($address);
		}
		$mail->Subject = $subject;
		$mail->MsgHTML($body);

		if(!$mail->Send())
		{		   
		   return false;
		}
		return true;
	}
?>