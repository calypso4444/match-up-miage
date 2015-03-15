$(document).ready(function(){

	$(".photoSalle").click(function(){
		 var popupBox = $(this).attr('href');
		 $(popupBox).fadeIn(400);
		 
		 var popMargeTop = ($(popupBox).height() +24) /2;
		 var popMargeLeft = ($(popupBox).width() + 24)/2;
	});
	
	
});