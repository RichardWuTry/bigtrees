<?php
if (!defined('THINK_PATH')) exit();
define('APP_PREFIX', 'btr_');
define('SESSION_COOKIE_PATH', '/btr/');
return array(
	/* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
	'DB_HOST'               => 'localhost', // 服务器地址
	'DB_NAME'               => 'single30_btr_db',          // 数据库名
	'DB_USER'               => 'single30_btrapp',      // 用户名
	'DB_PWD'                => 'BaoChangJi',          // 密码
	'DB_PORT'               => '3306',        // 端口
	'DB_PREFIX'             => '',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        => false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         => 1, // 读写分离后 主服务器数量
    'DB_SQL_BUILD_CACHE'    => false, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE'    => 'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH'   => 20, // SQL缓存的队列长度
	
	'TMPL_EXCEPTION_FILE' 	=> APP_PATH.'/Tpl/Public/exception.php',
	'TMPL_ACTION_ERROR'		=> APP_PATH.'/Tpl/Public/exception.php',
	
	/* 邮件服务器设置 */
	'MAIL_HOST'				=> 'mail.1singlestep.com',
	'MAIL_PORT'				=> 2626,
	'MAIL_LOGINNAME'		=> 'btr@1singlestep.com',
	'MAIL_PASSWORD'			=> 'BaoChangJi1',
	'MAIL_FROM_NAME'		=> '大树学习社区',
	'MAIL_FROM_ADDRESS'		=> 'btr@1singlestep.com',	
	'MAIL_REPLAY_ADDRESS'	=> array('shadow_wu82@163.com', 'shadow_wu8211@hotmail.com'),
);
?>