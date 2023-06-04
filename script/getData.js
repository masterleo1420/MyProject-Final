$(document).ready(function(){  	
	$("#customer").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'cid='+ id;    
		$.ajax({
			url: 'getEmployee.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(custData) {
			   if(custData) {
					$("#errorMassage").addClass('hidden').text("");
					$("#recordListing").removeClass('hidden');							
					$("#cid").text(custData.cid);
					$("#cust_name").text(custData.cust_name);
					$("#cust_address").text(custData.cust_address);				
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("No record found!");
				}   	
			} 
		});
 	}) 
});
