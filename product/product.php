<!DOCTYPE html>
<html lang="en">

<head>
	<title>JavaJam Coffee House</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="product.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<script src="product.js"></script>
</head>

<body>
	<div id="wrapper">
		<header>
			JavaJam Coffee House
		</header>
		<nav id="leftcolumn">
			<a href="../index.html">Home</a><br>
			<a href="../menu/menu.php">Menu</a><br>
			<a href="../music.html">Music</a><br>
			<a href="../jobs.html">Jobs</a><br>
			<br>
			<a href="product.php">Update</a><br>
            <a href="../sales/sales.html">Sales</a><br>
		</nav>
		<div class="content">
			<h2>Coffee at JavaJam</h2>
			<?php include 'product_update.php'; ?>
			<?php include 'product_table.php'; ?>
			<br />
		</div>
		<footer>
			<small>
				<i>Copyright &copy; 2014 JavaJam Coffee House
				</i>
			</small>
			<br>
			<a href="mailto:varick@lim.com">
				varick@lim.com
			</a>
		</footer>
	</div>
</body>
</html>