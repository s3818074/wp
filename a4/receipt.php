<!DOCTYPE html>
<html lang="en">
<?php
include("tools.php");
if (empty($_SESSION["data"])) {
	header("Location: index.php");
} else {
	$filename = "bookings.csv";
	$fp = fopen($filename, "w");
	flock($fp, LOCK_EX);
	// put data here
	flock($fp, LOCK_UN);
	fclose($fp);
}
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<title>Invoice</title>
	<link href="css/receipt.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid A4">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header text-center">
					<h1>
						INVOICE
					</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<dl>
					<dt>
						To
					</dt>
					<dd>
						<?php echo $_SESSION["data"]["cust"]["name"] ?>
					</dd>
					<dd>
						<?php echo $_SESSION["data"]["cust"]["email"] ?>
					</dd>
					<dd>
						<?php echo $_SESSION["data"]["cust"]["mobile"] ?>
					</dd>
					<dd>
						<?php echo $_SESSION["data"]["cust"]["card"] ?>
					</dd>
				</dl>
			</div>

			<div class="col-md-4">
				<dl>
					<dt>
						From
					</dt>
					<dd>
						Cinemax
					</dd>
					<dd>
						cinemax@cinemax.com
					</dd>
					<dd>
						00 123 456 789
					</dd>
				</dl>

			</div>
			<div class="col-md-4">
				<dl>
					<dt>
						Invoice date
					</dt>
					<dd>
						<?php echo getCurrentDate() ?>
					</dd>
					<dt>
						Due date
					</dt>
					<dd>
						<?php echo getFutureDate(28) ?>
					</dd>
				</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<dl>
							<dt>Movie title:</dt>
							<dd><?php echo $movieInfo[$_SESSION["data"]["movie"]["id"]]["title"] ?></dd>
							<dl>
					</div>
					<div class="col-md-4">
						<dl>
							<dt>Day:</dt>
							<dd><?php echo $_SESSION["data"]["movie"]["day"] ?></dd>
						</dl>

					</div>
					<div class="col-md-4">
						<dl>
							<dt>Hour:</dt>
							<dd><?php echo $codeToTime[$_SESSION["data"]["movie"]["hour"]] ?></dd>
						</dl>
					</div>
				</div>
				</dl>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>
								Seats
							</th>
							<th>
								Unit Price
							</th>
							<th>
								Quantity
							</th>
							<th>
								Total
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$number = 0;
						$total = 0;
						foreach ($_SESSION['data']['seats'] as $seat => $quantity) {
							if (empty($quantity)) continue;
							$fullOrDiscount = ($_SESSION["data"]["movie"]["day"] === "MON"
								|| $_SESSION["data"]["movie"]["day"] === "WED"
								|| (in_array($_SESSION["data"]["movie"]["day"], ["MON", "TUE", "WED", "THU", "FRI"])
									&& $_SESSION["data"]["movie"]["hour"] === "T12")) ? 1 : 0;
							$number += 1;
							$total += $priceList[$seat][$fullOrDiscount] * $quantity;
							echo "<tr>";
							echo "<td>" . $number . "</td>";
							echo "<td>" . $seatName[$seat] . "</td>";
							echo "<td>$" . number_format((float) $priceList[$seat][$fullOrDiscount], 2, '.', '')  . "</td>";
							echo "<td>" . $quantity . "</td>";
							echo "<td>$" . number_format((float) ($priceList[$seat][$fullOrDiscount] * $quantity), 2, '.', '') . "</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
			</div>
			<div class="col-md-6">
				<table class="table">
					<tbody>
						<tr>
							<td>
								<b>Total: </b>
							</td>
							<td>
								<?php echo "$" . number_format((float) $total, 2, '.', '') ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>GST included in total: </b>
							</td>
							<td>
								<?php echo "$" . number_format((float) ($total / 11), 2, '.', '') ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Balance due: </b>
							</td>
							<td>
								<?php echo "$" . number_format((float) $total, 2, '.', '') ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
	foreach ($_SESSION['data']['seats'] as $seat => $quantity) {
		if (empty($quantity)) continue;
		for ($i = 1; $i < $quantity + 1; $i++) {
			echo "	<div class='ticket'>
			<div id='brand'>
				<h3>CINEMAX</h3>
			</div>
			<div class='row'>
				<div class='col-md-6'>
					<dt>
						MOVIE
					</dt>
					<dd>" . $movieInfo[$_SESSION["data"]["movie"]["id"]]["title"] . "
						
					</dd>
				</div>
				<div class='col-md-6'>
					<dt>
						SEAT TYPE
					</dt>
					<dd>
						" . $seatName[$seat] . "
					</dd>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-6'>
					<dt>
						DAY
					</dt>
					<dd>
						" . $_SESSION["data"]["movie"]["day"] . "
					</dd>
				</div>
				<div class='col-md-6'>
					<dt>
						HOUR
					</dt>
					<dd>
						" . $codeToTime[$_SESSION["data"]["movie"]["hour"]] . "
					</dd>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
					<dt>
						HALL
					</dt>
					<dd>" . $movieInfo[$_SESSION["data"]["movie"]["id"]]["hall"] . "
					</dd>
				</div>
				<div class='col-md-4'>
					<dt>
						ROW
					</dt>
					<dd>" . $seatRows[$seat] . "
					</dd>
				</div>
				<div class='col-md-4'>
					<dt>
						NUMBER
					</dt>
					<dd>" . $i . "
					</dd>
				</div>
				</div>
		</div>";
		}
	}
	?>
</body>

</html>