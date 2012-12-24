<?php
class UserModel extends Model {
	protected $_validate = array(
		array('username', 'require', '姓名不能为空', 1),
		array('email', 'email', '请输入有效的Email', 1),
		array('email', '', '该邮箱已被注册', 1, 'unique'),
		array('password', 'require', '密码不能为空', 1),
		array('mobile', 'require', '手机号不能为空', 1),
		array('profession', 'require', '职业不能为空', 1),
	);
	
	protected $_auto = array(
		array('create_at', 'date("Y-m-d H:i:s")', 1, 'function'),
	);
}
?>