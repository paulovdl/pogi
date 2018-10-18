/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

$(document).ready(function(){
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == "") {
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idSize:idSize},
			success:function(resp){
				//alert(resp);
				$("#getPrice").html("₱ "+ resp);
				document.getElementById('productPrice').value = resp;
			},error:function(){
				alert('Error');
			}
		});
	});	

	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == "") {
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-code',
			data:{idSize:idSize},
			success:function(resp){
				//alert(resp);
				$("#getCode").html("Product Code: "+ resp);
				document.getElementById('productCode').value = resp;
			},error:function(){
				alert('Error');
			}
		});
	});	

	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == "") {
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-stock',
			data:{idSize:idSize},
			success:function(resp){
				//alert(resp);
				$("#getStock").html("<b>Availability: </b>" + resp);
				if(resp == "Out of Stock") {
					$('#cartButton').hide();
				} else {
					$('#cartButton').show();
				}
			},error:function(){
				alert('Error');
			}
		});
	});	

	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == "") {
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-size',
			data:{idSize:idSize},
			success:function(resp){
				//alert(resp);
				document.getElementById('productSize').value = resp;
			},error:function(){
				alert('Error');
			}
		});
	});	
});


$(document).ready(function(){
	//Replace Main Image wit hAlternate Image
	$(".changeImage").click(function(){
		var image = $(this).attr('src');
		$(".mainImage").attr("src",image);
	});
});

$().ready(function(){
	//validates register form on keyup and submit
	$("#registerForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			password:{
				required:true,
				minlength:6,
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			}
		},
		messages:{
			name: {
				required: "Please enter you name",
				minlength: "Name must be atleast 2 characters long"
			}, 
			password: {
				required: "Please enter password",
				minlength: "Password must be atleast 6 characters long"
			},
			email : {
				required: "Please enter email",
				minlength: "Please enter valid email",
				remote: "Email already exists"
			}
		}
	})
});

