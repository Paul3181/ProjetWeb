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
		}else{
			$('#nav').hide();
		}
	});
	
	
	
});