<?php
	$title = 'Dashboard';
	$login_permission = 1;
	include 'inc/header.php';
?>
		<script>
			window.onload=function(){_user_id = <?php echo getUserID(); ?>; refreshTask(_user_id,0); refreshCategory(_user_id);};
			function refreshTaskRoutine() {
			  refreshTask(_user_id,_category_id); refreshCategory(_user_id);
			}
			var interval = setInterval(refreshTaskRoutine, 10000);
		</script>
		<div class="content">
			<div class="dashboard">	
				<header>
					<h1>Dashboard</h1>
					<ul>
						<li class="add-task-link"><a href="new_tugas.php">New Task</a></li>
					</ul>
				</header>
				<div class="primary">
					<section class="tasks current" id="activeTask">
					
					</section>

					<section class="tasks completed" id="doneTask">

					</section>
				</div>
			
				<div class="secondary">
					<section class="categories">
						<header>
							<h3>Categories</h3>
						</header>
						<ul id="categoryList">

						</ul>
					</section>
				</div>

			</div>

		</div>
<?php
	include 'inc/footer.php';
?>
