<?php
	require_once 'core/config.php';
	if (getUserID() !== $login_permission) {
		if ($login_permission)
			header('Location: index.php');
		else
			header('Location: dashboard.php');
	}
?>
<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="site-container">
			<header class="site-header">
				<h1><a href="dashboard.php">Do</a></h1>
				<p>A to-do list for getting things done.</p>

				<nav>
					<ul class="main-links">
						<li class="dashboard-link"><a href="dashboard.php">Dashboard</a></li>
						<li class="profile-link" id="profileLink"><a href="profile.php" id="userFullName">John Doe</a></li>
						<li class="profile-link"><a href="logout.php">Logout</a></li>
					</ul>
					<div class="search-box">
						<select name="mode" id="searchMode">
							<option value="0">All</option>
							<option value="1">User</option>
							<option value="2">Kategori</option>
							<option value="3">Task</option>
							<option value="4">Komentar</option>
						</select>
						<form action="search.php" method="get" id="searchForm">
							<input type="search" id="searchBar" name="q" placeholder="Search" list="suggestion">
							<datalist id="suggestion">
							</datalist>
							<button type="submit">Search</button>
						</form>
					</div>
				</nav>
			</header>
