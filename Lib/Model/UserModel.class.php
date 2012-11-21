<?php
class UserModel extends Model {
	protected $_validate = array(
		array('username', 'require', 'Username cannot be empty', 1),
		array('email', 'email', 'Email is not valid', 2),
	);
	
	protected $_auto = array(
		array('create_at', 'date("Y-m-d H:i:s")', 1, 'function'),
	);
}
?>