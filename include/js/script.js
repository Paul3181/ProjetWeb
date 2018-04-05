var tabCoord=[[46.079722, 6.401389],[45,6],[47.466702,0.7],[43.787222,-1.403056],[46.53972,2.43028]]
var map = L.map('map');
var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var osmAttrib='Map data © OpenStreetMap contributors';
var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
map.setView([47.0, 3.0], 6);
map.addLayer(osm);

// marker
for (i=0;i<tabCoord.length;i++){
    var marker = L.marker(tabCoord[i]);
    //marker.on('click',clicMarker);
	marker.bindPopup('<b>Hello world!</b><br><a href="#">Accéder au master</a>').openPopup();
    marker.addTo(map);
}

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