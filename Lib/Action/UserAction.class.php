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
			
		}
	}
}
?>