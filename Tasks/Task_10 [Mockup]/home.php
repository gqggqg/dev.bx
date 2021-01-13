<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Home Page</title>
</head>

<body>

<div class="page">
	<?php include 'menu.php' ?>
	<?php include 'header.php'?>

	<div class="content">
		<div class="content__posts">
			<div class="content__posts__title">
				<h3>Your Best Value Proposition</h3>
			</div>
			<div class="content__posts__subtitle">
				<h4>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore<br>
					et dolore magna aliqua. Ut enim ad minim veniam,
				</h4>
			</div>
			<div class="content__posts__cards">
				<div class="content__posts__cards__moto moto-1">
					<div class="content__posts__cards__moto__image">
						<img src="images/moto_1.svg" alt="moto image 1">
					</div>
					<div class="content__posts__cards__moto__description">
						<h5>
							Lorem ipsum dolor sit amet,<br>
							consectetur adipiscing elit
						</h5>
						<a href="">
							Learn More
						</a>
					</div>
				</div>

				<div class="content__posts__cards__moto moto-2">
					<div class="content__posts__cards__moto__image">
						<img src="images/moto_2.svg" alt="moto image 2">
					</div>
					<div class="content__posts__cards__moto__description">
						<h5>
							Lorem ipsum dolor sit amet,<br>
							consectetur adipiscing elit
						</h5>
						<a href="">
							Learn More
						</a>
					</div>
				</div>

				<div class="content__posts__cards__moto moto-3">
					<div class="content__posts__cards__moto__image">
						<img src="images/moto_3.svg" alt="moto image 3">
					</div>
					<div class="content__posts__cards__moto__description">
						<h5>
							Lorem ipsum dolor sit amet,<br>
							consectetur adipiscing elit
						</h5>
						<a href="" class="moto-3-desc_spoiler">
							Learn More
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="content__feature">
			<div class="content__feature__description">
				<div class="content__feature__description__title">
					<h4>
						Feature List Left
					</h4>
				</div>
				<div class="content__feature__description__text">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing<br>
						elit, sed do eiusmod tempor incididunt ut labore et<br>
						dolore magna aliqua. Lorem ipsum dolor sit amet,<br>
						consectetur adipiscing elit, sed do eiusmod tempor<br>
						incididunt ut labore et dolore magna aliqua. Lorem<br>
						ipsum dolor sit amet, consectetur adipiscing elit,<br>
						sed do eiusmod tempor incididunt ut labore et<br>
						dolore magna aliqua.
					</p>
				</div>
			</div>

			<div class="content__feature__media">
				<img src="images/moto_feature.svg" alt="feature moto image">
			</div>
		</div>
	</div>

	<?php include 'social.php' ?>
	<?php include 'footer.php' ?>

</div>

</body>

</html>
