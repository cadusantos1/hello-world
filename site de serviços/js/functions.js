window.onload = function(){

	var map;


	function initialize(){
		var mapProp = {
			/*center: new google.maps.LatLng(-23.793443,-45.995823),*/
			center: new google.maps.LatLng(-22.9085235,-47.0490559),
			scrollWhell:false,
			zoom:15,
			mapTypeId: 'roadmap'
		}

		map = new google.maps.Map(document.getElementById("mapa"),mapProp);
	}

	function addMarker(lat,long,icon,content,click){
		var LatLng = {'lat':lat,'long':long};

		var marker = new google.maps.Marker({
			position:LatLng,
			map:map,
			icon:icon
		});

		var infoWindow = new google.maps.infoWindow({
			content:content,
			maxWidth:200,
			pixelOffset: new google.maps.Size(0,20)
		});

		if(click==true){
		google.maps.event.addListener(marker,'click',function(){
			infoWindow.open(map,marker);
			});	
		}else{
			infoWindow.open(map,marker);
	}

}

	initialize();

	var conteudo = '<p style="color:black;font-size:13px;padding:10px 0;border-bottom:1px solid black">Meu Endereço</p>';
	addMarker(-22.908523,-47.049055,'',conteudo,true);

	setTimeout(function(){
		map.panTo({'lat':-23.793443,'lng':-45.995823});
	},1500);

}