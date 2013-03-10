<?php
	require_once 'config.php';
	$get = $_GET;
	$q = $get['q'];
	$mode = $get['mode'];
	switch ($mode) {
		case 0:
			$querystring = 'select name q from task WHERE name like :q union select name q from tag where name like :q union select name q from category WHERE name like :q union select username q from user WHERE username like :q union select email q from user where email like :q union select name q from user where name like :q union select birthdate q from user where birthdate like :q';
			break;
		case 1:
			$querystring = 'select username q from user WHERE username like :q union select email q from user where email like :q union select name q from user where name like :q union select birthdate q from user where birthdate like :q';
			break;
		case 2:
			$querystring = 'select name q from category WHERE name like :q';
			break;
		case 3:
			$querystring = 'select name q from task WHERE name like :q union select name q from tag where name like :q';
			break;
		case 4:
			$querystring = 'select content q from comment WHERE content like :q';
			break;
	}
	$hasil = queryAll($querystring.' limit 3',array('q' => $q."%"));
	echo json_encode($hasil);
?>