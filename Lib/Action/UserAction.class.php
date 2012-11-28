<?php
class UserAction extends Action {
	public function logout() {
		clearSessionCookie();
		redirect(__APP__.'/Index/index/');
	}
	
	public function register() {
		$this->display();
	}
	
	public function addUser() {
		if ($this->isPost()) {
			$username = $_POST['username'];
			$User = D('User');
			if ($User->create()){
				if(!preg_match('/^.{6,12}$/', $User->password)){
					$this->error('密码有效长度为6~12位');
				}				
				$User->password = sha1($User->password);
				if($user_id = $User->add()) {
					if ($admins = $User->where("is_active = 1 and is_admin = 1")
									->field("email")
									->select()){
						$admins = array_map('implode', $admins);
						$subject = $username.'申请参加大树活动';
						$body = $username.'申请参加大树活动，请尽快审核。';
						require_once COMMON_PATH.'/Mail/mail.php';
						sendMail($admins, $subject, $body);
					}
					$this->success('您的申请已提交');
				} else {
					$this->error('申请提交失败');
				}					
			} else {
				$this->error($User->getError());
			}
		}
	}
	
	public function login() {
		$this->display();
	}
	
	public function loginUser() {
		if ($this->isPost()) {
			$email = $_POST['email'];
			$password = sha1($_POST['password']);
			
			$User = M('User');
			if ($currUser = $User->where("email = '$email' and password = '$password' and is_active = 1")
								->field("user_id, username, is_admin")
								->find()) {
				$is_admin = $currUser['is_admin'];
				setSessionCookie($currUser['user_id'], $currUser['username'], $is_admin, 1);
				$this->success($is_admin);	
			} else {
				$this->error('Email或密码有误');
			}
		}
	}
}
?>