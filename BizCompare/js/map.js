 function initialize() {
										var styles = [
										  {
											stylers: [
											  { hue: "#fd4326" }
											]
										  },{
											featureType: "road",
											elementType: "geometry",
											stylers: [
											  { lightness: 100 },
											  { visibility: "simplified" }
											]
										  },{
											featureType: "road",
											elementType: "labels",
											stylers: [
											  { visibility: "off" }
											]
										  }
										];


										 var styledMap = new google.maps.StyledMapType(styles,
										{name: "Styled Map"});

										var mapCanvas = document.getElementById("map-canvas");
										var mapOptions = {
											center: new google.maps.LatLng(21.582668, 105.807298),
											zoom: 15,
											mapTypeControlOptions: {
											  mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
											},
											panControl: false,
											zoomControl: true,							    
											scrollwheel: false,
											navigationControl: false,
											mapTypeControl: true,
											scaleControl: false,
											// draggable: false,

										  }
										var map = new google.maps.Map(mapCanvas, mapOptions);
										map.mapTypes.set("map_style", styledMap);
										map.setMapTypeId("map_style");


											var locations = [
												['Themestudio', 'Ngõ 176 Z115, Tân Thịnh, tp. Thái Nguyên, Thái Nguyên, Việt Nam', '+84 (0) 1753 456789', 'themestudio@gmail.com', 'themestudio.net',21.582668, 105.807298]
														];
														var i;
														var description;
														var telephone;
														var email;
														var web;
														var marker;
														var link;
														for (i = 0; i < locations.length; i++) {
															if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
															if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
															if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
															if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
															marker = new google.maps.Marker({

																position: new google.maps.LatLng(locations[i][5], locations[i][6]),
																map: map,
																title: locations[i][0],
																desc: description,
																tel: telephone,
																email: email,
																web: web
															});
															bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web);
														}


											function bindInfoWindow(marker, map, title, desc, telephone, email, web) {
												if (web.substring(0, 7) != "http://") {
												link = "http://" + web;
												} else {
												link = web;
												}
												// iw.open(map,marker);
												  google.maps.event.addListener(marker, "click", function() {
														 var html= "<div style='color:#000;background-color:#fff;padding:5px;width:200px;'><h4>"+title+"</h4><p>"+desc+"</p><i class='fa fa-phone'></i> "+telephone+"<br/><i class='fa fa-envelope'></i><a href='mailto:"+email+"' >  "+email+"</a><br/><i class='fa fa-globe'></i><a target='_blank' href='"+link+"'' >  "+web+"</a></div>";
														 var iw = new google.maps.InfoWindow({content:html});
														iw.open(map,marker);
												  });
											}
										}
										google.maps.event.addDomListener(window, "load", initialize);
