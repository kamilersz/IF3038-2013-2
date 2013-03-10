<?php
	$title = 'Profile';
	$login_permission = 1;
	include 'inc/header.php';
?>
		<div class="content">
			<div class="profile">
				<header>
					<h1>John Doe</h1>
					<ul>
						<li class="edit-profile-link"><a href="#editProfile" id="editProfileButton">Edit Profile</a></li>
					</ul>
				</header>
				<!--<div class="current-profile">-->
				<section class="profile-details">
					<figure class="profile-image">
						<img src="assets/photo.jpg" alt="Profile Photo">
					</figure>
					<p class="description">
						<span class="detail-label">About Me:</span>
						<span class="detail-value">Lorem Ipsum Dolor Sit Amet</span>
					</p>
					<p class="username">
						<span class="detail-label">Username:</span>
						<span class="detail-value">hawawawa</span>
					</p>

					<p class="date-of-birth">
						<span class="detail-label">Date of Birth:</span>
						<span class="detail-value">8 Desember 1992</span>
					</p>
				</section>

				<section class="tasks current">
					<header>
						<h3>Current Tasks</h3>
					</header>

					<article class="task" data-task-id="5" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_5.php">Tugas 5</a>
								</label>
							</h1>
						</header>
						<div class="details">
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

					<article class="task" data-task-id="6" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_6.php">Tugas 6</a>
								</label>
							</h1>
						</header>
						<div class="details">
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


					<article class="task" data-task-id="7" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_7.php">Tugas 7</a>
								</label>
							</h1>
						</header>
						<div class="details">
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
									<a href="view_tugas_1.php">Tugas 1</a>
								</label>
							</h1>
						</header>
						<div class="details">
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

					<article class="task" data-task-id="2" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_2.php">Tugas 2</a>
								</label>
							</h1>
						</header>
						<div class="details">
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

					<article class="task" data-task-id="3" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_3.php">Tugas 3</a>
								</label>
							</h1>
						</header>
						<div class="details">
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

					<article class="task" data-task-id="4" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_4.php">Tugas 4</a>
								</label>
							</h1>
						</header>
						<div class="details">
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

					<article class="task" data-task-id="8" data-category="a">
						<header>
							<h1>
								<label>
									<a href="view_tugas_8.php">Tugas 8</a>
								</label>
							</h1>
						</header>
						<div class="details">
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
				<!--</div>-->
				<!--<div class="edit_profile">
					<form id="new_profile" action="#editProfile" method="post">
						<div class="field">
							<label>Username</label>
							<input name="nama" id="nama" type="text">
						</div>
						<div class="field">
								<label>New Avatar</label>
								<input name="avatar" id="avatar" type="file" accept="image/jpg">
						</div>
						<div class="field">
								<label>Tanggal Lahir Baru</label>
								<input name="tanggal_lahir" id="tanggal_lahir" type="date">
							</div>
						<div class="field">
								<label>New Password</label>
								<input size="30" maxlength="50" name="password" id="password" type="password">
							</div>
							<div class="field">
								<label>Confirm New Password</label>
								<input size="30" maxlength="50" name="password_k" id="password_k" type="password">
							</div>
						<div class="buttons">
							<button type="submit">Save</button>
						</div>
					</form>
				</div>-->
			</div>
		</div>
<?php
	include 'inc/footer.php';
?>
