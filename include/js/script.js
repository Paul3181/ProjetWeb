var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
	$scope.name = $('#query').val();
});


$(document).ready(function() {

	// collapse
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		$(this).toggleClass('active');
		
		$('#nav').toggle();
    });
	
});