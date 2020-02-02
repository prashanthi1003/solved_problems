<?php

$code = $_POST['code'];
$cart = explode(",", $code);
//var_dump($cart);
function pricingRules($cart){
	$catalogue = '{ "ipd" :  
						{
						
							"name" : "Super iPad",
							"price" : "549.99"
						},
				"mbp" : {
						
						
							"name" : "Mac Book Pro",
							"price" : "1399.99"
						},
				"atv" :	{
						
						
							"name" : "Apple TV",
							"price" : "109.50"
						},
				"vga" :	{
						
						
							"name" : "VGA Adapter",
							"price" : "30.00"
						}
					
				}';

	$decoded_arr = json_decode($catalogue, true);
	//$cart1 = ["atv","atv","atv","vga"];
	//$cart2 = [ "atv", "ipd","ipd", "atv","ipd","ipd", "ipd"];
	//$cart3 = ["mbp", "vga", "ipd"];
	$natv = $nipd = $nmbp = $nvga = 0;
	$atv_tobe_costed = 0; 
	$total_atv_cost = $total_ipd_cost = $total_mbp_cost = $total_vga_cost = $cart_total = 0;

	foreach($cart as $item){	 
		if($item == "atv"){
			$natv++;
		}
		if($item == "ipd")
			$nipd++;
		
		if($item == "mbp")
			$nmbp++;
			
		if($item === "vga")
			$nvga++;
	}
	
	if($natv > 2){
		$natv_tobe_costed = $natv - ($natv / 3 ); // cost only for 2 atv's for every 3 atv's  
		$total_atv_cost = $decoded_arr['atv']['price'] * $natv_tobe_costed;		
	} else { 
		$total_atv_cost = $decoded_arr['atv']['price'] * $natv; 
	}
	
	if($nipd > 4){
		$total_ipd_cost = $nipd * 499.99;
	} else { 
		$total_ipd_cost = $decoded_arr['ipd']['price'] * $nipd;
	}
	
	if($nmbp > 0){
		$total_mbp_cost = $decoded_arr['mbp']['price'] * $nmbp;
	
	}
	
	if($nvga > 0){
		
		if($nvga > $nmbp){
			$total_vga_cost = $decoded_arr['vga']['price']  * ($nvga - $nmbp);
		} else { 
			$total_vga_cost = 0;
		}
	}
	
	$cart_total = $total_atv_cost + $total_ipd_cost + $total_mbp_cost + $total_vga_cost;
	//echo( "Cart total cost is : " . $cart_total); 
	//document.getElementById("total").innerHTML= cart_total;
	header("location:index.php?total_amount=".$cart_total);
}
pricingRules($cart);


?>