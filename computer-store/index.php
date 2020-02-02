<html>
	<head>
		<title>Digi-x assessment</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/digicss.css">
	</head>
	<body>
		<div class="container">
			<script> 
				var codes = []; 
				

			</script>
			<table>
					<tr>
						<th>Name</th>
						<th>Code</th>
						<th>Price</th>
					</tr>
					<tr>
						<td>Apple TV</td>
				    	<td> atv </td>
				    	<td>$109.50</td>
				   	</tr>
				   	<tr>
						<td>Super iPad</td>
				    	<td> ipd </td>
				    	<td>$549.99</td>
				   	</tr>
				   	<tr>
						<td>VGA Adapter</td>
				    	<td> vga </td>
				    	<td>$30.00</td>
				   	</tr>
				   	<tr>
						<td>Mac Book Pro</td>
				    	<td> mbp </td>
				    	<td>$1399.99</td>
				   	</tr>
				
			</table>
			<form id="scanner" class="barcode-form" method="post" action="calculate.php" onsubmit="event.preventDefault(); submitCodes();">
				<div class="form-group">
				  <label for="barcode">Input Barcode:</label>
				  <input type="text" class="form-control" name="code" id="barcode" onkeypress="checkCode(event)">
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit"> Get Total </button>
			</form>
			<div id="total-amount">
				<?php 
					if(isset($_GET['total_amount'])){
						$tot = $_GET['total_amount'];
						echo "The amount to be paid is: ".$tot;
					}
				?>
			</div> 

		</div>
		<script>	
			function checkCode(event){
				if(event.keyCode === 13){
					event.preventDefault();
					var code = document.getElementById("barcode").value;
					codes.push(code);
					document.getElementById("barcode").value = "";
					event.stopPropagation();
				}
				
			}

			function submitCodes(event){
				document.getElementById("barcode").value = codes;
				alert("Your list is: "+document.getElementById("barcode").value);
				document.getElementById("scanner").submit();
			}


		</script>
	</body>
</html>