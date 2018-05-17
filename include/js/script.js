var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
	$scope.name = $('#query').val();
});


$(document).ready(function() {
	
	// collapse
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		if($('#sidebar').hasClass('active')){
			$('#nav').show();
			$('#sidebarCollapse .glyphicon').removeClass('glyphicon-remove');
			$('#sidebarCollapse .glyphicon').addClass('glyphicon-menu-hamburger');
		}else{
			$('#nav').hide();
			$('#sidebarCollapse .glyphicon').removeClass('glyphicon-menu-hamburger');
			$('#sidebarCollapse .glyphicon').addClass('glyphicon-remove');
		}
	});
	
	
	
});