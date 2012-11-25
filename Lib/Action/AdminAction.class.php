<?php
class AdminAction extends Action {
	function __construct() {
		parent::__construct();
		if (!isLogin() || !isAdmin()) {
			redirect(__APP__.'/User/login/');
		}
	}

	public function userList() {
		$this->display();
	}
}
?>