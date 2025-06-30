<?php
require 'databaserequire.php';
require 'common.php';
require 'central_function.php';

$res = select_data('trainer', $mysql, '*', '', '');
// var_dump($res);


require 'header.php';

?>
<div class="main-wrapper ">
	<section class="page-title bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="index.html"
								class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a>
						</li>
						<li class="list-inline-item"><span class="text-white">|</span></li>
						<li class="list-inline-item"><a href="#"
								class="text-color text-uppercase text-sm letter-spacing">Team</a></li>
					</ul>
					<h1 class="text-lg text-white mt-2">Trainer</h1>
				</div>
			</div>
		</div>
	</section>

	<!-- Section Team Start -->
	<section class="section bg-gray">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="section-title">
						<div class="divider mb-3"></div>
						<h2>Our Trainer</h2>
					</div>
				</div>
			</div>

			<div class="row">

				<?php if ($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()) { ?>
						<div class="col-lg-6">
							<div class="card border-0 mb-1 bg-transparent  rounded-0 mb-4">
								<div class="row no-gutters align-items-center">
									<div class="col-md-6">
										<img src="images/team/team-<?= $row['trainer_id'] ?>.jpg" alt="" class="img-fluid w-100">
									</div>
									<div class="col-md-6">
										<div class="card-body team-wrap pl-4">
											<h3 class="card-title text-color"><?= $row['trainer_name'] ?></h3>
											<h6 class="card-subtitle pb-4 letter-spacing "><?= $row['specialty'] ?></h6>
											<p class="mb-5"><?= $row['bio'] ?></p>
											<h6 class="card-subtitle pb-4 letter-spacing "><?= $row['phone'] ?></h6>
											<h6 class="card-subtitle pb-4 ">Since : <?= $row['join_date'] ?></h6>
											<ul class="list-inline ">
												<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
				<?php }
				} ?>

			</div>
		</div>
	</section>
	<!-- Section Team End -->
	<?=
	require 'footer.php';
	?>