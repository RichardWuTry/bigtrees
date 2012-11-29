<?php
class AdminAction extends Action {
	function __construct() {
		parent::__construct();
		if (!isLogin() || !isAdmin()) {
			redirect(__APP__.'/User/login/');
		}
	}

	public function userList() {
		$User = M('User');
		if ($users = $User->select()) {
			$this->assign('users', $users);
		}		
		$this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
		$this->display();
	}
	
	public function broadcast() {
		if(isset($_GET['ids'])) {
			$ids = $_GET['ids'];
			$User = M('User');
			if ($users = $User->where("user_id in ($ids)")
							->field("username,email")
							->select()) {
				$this->assign('users', $users);
			}
			$this->assign('username', $_SESSION[APP_PREFIX.'user_name']);
			$this->display();
		}		
	}
	
	public function sendBroadcast() {
		if ($this->isPost()) {
			$receivers = $_POST['receivers'];
			$title = $_POST['title'];
			$body = $_POST['body'];
			
			require_once COMMON_PATH.'/Mail/mail.php';
			if (sendMail($receivers, $title, $body)){
				$this->success('邮件发送成功');
			} else {
				$this->error('邮件发送失败');
			}
		}
	}
	
	public function activateUser() {
		if ($this->isPost()) {
			$User = M('User');
			$data['user_id'] = $_POST['user_id'];
			$data['is_active'] = $_POST['is_active'];			
			if ($User->save($data)) {
				$this->success();
			} else {
				$this->error('激活标志未更新');
			}
		}
	}
}
?>