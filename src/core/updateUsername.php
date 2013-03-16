<?php
	require_once 'config.php';
	$post = $_POST;
	var_dump($post);
	$username = $post['username'];
	$user_id = $post['user_id']
	$hasil = queryn('UPDATE user SET username = :username WHERE user_id = :user_id',array(
		'task_id' => $task_id
		));
?>

<!-- Ini bener gak? cara manggilnya gimana? -->