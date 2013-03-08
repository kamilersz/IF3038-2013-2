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
						<form action="search.php" method="get" id="searchForm">
							<input type="search" name="q" placeholder="Search">
							<button type="submit">Search</button>
						</form>
					</div>
				</nav>
			</header>
