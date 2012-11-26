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
}
?>