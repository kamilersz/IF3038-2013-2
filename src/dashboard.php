<?php
	$title = 'Dashboard';
	$login_permission = 1;
	include 'inc/header.php';
?>
		<div class="content">
			<div class="dashboard">	
				<header>
					<h1>Dashboard</h1>
					<ul>
						<li class="add-task-link"><a href="new_tugas.php">New Task</a></li>
					</ul>
				</header>
				<div class="primary">
					<section class="tasks current">
						<header>
							<h3>Current Tasks</h3>
						</header>

						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_5.php">Tugas 5</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>


						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_6.php">Tugas 6</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>

						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_7.php">Tugas 7</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>
					</section>

					<section class="tasks completed">

						<header>
							<h3>Completed Tasks</h3>
						</header>
						
						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_1.php">Tugas 1</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>
						
						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_2.php">Tugas 2</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>


						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_3.php">Tugas 3</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>

						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_4.php">Tugas 4</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>
						
						<article class="task" data-task-id="1" data-category="a">
							<header>
								<h1>
									<label>
										<span class="task-checkbox"><input type="checkbox" class="task-checkbox"></span>
										<a href="view_tugas_8.php">Tugas 8</a>
									</label>
								</h1>
							</header>
							<div class="details">
								<!-- <p class="category">
									<span class="detail-label">Kategori:</span>
									<span class="detail-content">Makan</span>
								</p> -->
								<p class="deadline">
									<span class="detail-label">Deadline:</span>
									<span class="detail-content">
										19 Februari 2013
									</span>
								</p>
								<p class="tags">
									<span class="detail-label">Tag:</span>
									<span class="tag">satu</span>
									<span class="tag">dua</span>
									<span class="tag">tiga</span>
									<span class="tag">empat</span>
								</p>
							</div>
						</article>
					</section>
				</div>
			
				<div class="secondary">
					<section class="categories">
						<header>
							<h3>Categories</h3>
						</header>
						<ul>
							<li><a href="#">Kategori A</a></li>
							<li><a href="#">Kategori B</a></li>
							<li><a href="#">Kategori C</a></li>
							<li><a href="#">Kategori D</a></li>
							<li><a href="#">Kategori E</a></li>
						</ul>
					</section>
				</div>

			</div>

		</div>
<?php
	include 'inc/footer.php';
?>
