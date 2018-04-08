

/*
function clicMarker(){
	alert("a");
}*/


$(document).ready(function() {
	
	// collapse
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		$(this).toggleClass('active');
    });
	
	// switch entre la carte et la liste des master
	$('#btn1').on('click', function() {
		$("div.desc").hide();
		$("#right1").show();
	});
	$('#btn2').on('click', function() {
		$("div.desc").hide();
		$("#right2").show();
	});
	
	if ($('#right2').height()>=638){
		$('.right').css('height', '100%');
	}
	
});