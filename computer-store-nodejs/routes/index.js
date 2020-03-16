var express = require('express');
var router = express.Router();

var catalogue = { "ipd" :  
						{
						
						//	"id" : "ipd",
							"name" : "Super iPad",
							"price" : "549.99"
						},
				"mbp" : {
						
						//	"id" : "mbp",
							"name" : "Mac Book Pro",
							"price" : "1399.99"
						},
				"atv" :	{
						
						//	"id" : "atv",
							"name" : "Apple TV",
							"price" : "109.50"
						},
				"vga" :	{
						
						//	"id" : "vga",
							"name" : "VGA Adapter",
							"price" : "30.00"
						}
					
				};

router.get('/form', function(req,res){
	res.render('Index', {
		title: 'Store',
		showTitle: true,
		catalogue: { "ipd" :  
						{
						
						//	"id" : "ipd",
							"name" : "Super iPad",
							"price" : "549.99"
						},
				"mbp" : {
						
						//	"id" : "mbp",
							"name" : "Mac Book Pro",
							"price" : "1399.99"
						},
				"atv" :	{
						
						//	"id" : "atv",
							"name" : "Apple TV",
							"price" : "109.50"
						},
				"vga" :	{
						
						//	"id" : "vga",
							"name" : "VGA Adapter",
							"price" : "30.00"
						}
					
				} 		

	});
});


router.post('/form', function(req,res){
	var code = req.body.code;
	var arr = code.split(",");
	arr.forEach(element =>{
		console.log(element);	
	})
	
	var cart_tot = pricingRules(arr);
	console.log("cart total is :" + cart_tot);
	res.render('result',{cart_tot});
});

function pricingRules(arr){
	var natv = 0, nipd = 0, nmbp = 0, nvga = 0;
	var atv_tobe_costed = 0; 
	var total_atv_cost = 0, total_ipd_cost = 0, total_mbp_cost = 0, total_vga_cost = 0, cart_total = 0;
	var item;
	for(item of arr){ 
	//	console.log("item : " +item);
		if(item == "atv"){
			natv++;
		}
		if(item == "ipd")
			nipd++;
		
		if(item == "mbp")
			nmbp++;
			
		if(item === "vga")
			nvga++;
	}
	console.log("No. of Apple TVs : "+natv+"\nNo. of iPads : "+ nipd+"\nNo.of MacBookPro :"+nmbp+"\nNo. of VGA Adapter : "+ nvga);
	if(natv > 2){
		var natv_tobe_costed = natv - (natv / 3 ); // cost only for 2 atv's for every 3 atv's  
		total_atv_cost = catalogue["atv"].price * natv_tobe_costed;		
	} else { 
		total_atv_cost = catalogue["atv"].price * natv; 
	}
	if(nipd > 4){
		total_ipd_cost = nipd * 499.99;
	} else { 
		total_ipd_cost = catalogue["ipd"].price * nipd;
	}
	
	if(nmbp > 0){
		total_mbp_cost = catalogue["mbp"].price * nmbp;
	
	}
	
	if(nvga > 0){
		
		if(nvga > nmbp){
			total_vga_cost = catalogue["vga"].price * (nvga - nmbp);
		} else { 
			total_vga_cost = 0;
		}
	}
	cart_total = total_atv_cost + total_ipd_cost + total_mbp_cost + total_vga_cost;
	return cart_total;
}

module.exports = router;