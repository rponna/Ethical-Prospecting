var app = angular.module('myApp', []);

var url_safe_distributor;
var url_safe_tarifftype;
var url_safe_usage;
// var ratelist;

//var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;


jQuery(window).scroll(function(){
	if(window.innerWidth >= 600){
	  var sticky = jQuery('.sticky'),
	      scroll = jQuery(window).scrollTop();

	  if (scroll >= 100){ sticky.addClass('fixed');
		// var elem = document.getElementByClassName('chart');
	  //  elem.style.width = 70 + "%";
	  }
	  else sticky.removeClass('fixed');}
	if(document.getElementById("plansid")!=null)
	var plans = document.getElementById("plansid").innerHTML.split(' ')[0];

	});
window.onload = function() {

};



app.filter('unique', function() {
	// we will return a function which will take in a collection
	// and a keyname
	return function(collection, keyname) {
		// we define our output and keys array;
		var output = [], keys = [];

		// we utilize angular's foreach function
		// this takes in our original collection and an iterator function
		angular.forEach(collection, function(item) {
			// we check to see whether our object exists
			var key = item[keyname];
			// if it's not already part of our keys array
			if (keys.indexOf(key) === -1) {
				// add it to our keys array
				keys.push(key);
				// push this item to our final output array
				output.push(item);
			}
		});
		// return our array which should be devoid of
		// any duplicates
		return output;
	};
});

app.controller(
				'myCtrl',
				function($scope) {
					var companyList = document.getElementById("companyList");
					ratelist = ratesGlobal;
					if (decodeURIComponent(window.location.search.substring(1))
							.split("&").length > 1) {
						url_safe_distributor = decodeURIComponent(
								window.location.search.substring(1)).split("&")[0]
								.split("=")[1];
						url_safe_tarifftype = decodeURIComponent(
								window.location.search.substring(1)).split("&")[1]
								.split("=")[1];
						url_safe_usage = decodeURIComponent(
								window.location.search.substring(1)).split("&")[2]
								.split("=")[1];
						url_safe_days = decodeURIComponent(
								window.location.search.substring(1)).split("&")[3]
								.split("=")[1];
					}
					var plans = 0;
					var spend = 0;
					var res = jQuery
							.grep(
									ratelist,
									function(v) {
										if (v.distributor == url_safe_distributor
												&& v.tarifftype == url_safe_tarifftype) {
											plans++;
											spend = ((v.peak1 * url_safe_usage) + (v.supply * url_safe_days));
											v.spend = parseFloat(spend);
											return v;
										}
									});
					res.sort(function(a, b) {
						return a.spend - b.spend;
					});
					res["Rates"] = res;
					$scope.jsonbody = res;
					$scope.plans = plans;
					if (plans > 0) {
						$scope.rate = "Rates";
						$scope.exitfee = "Exit Fee";
						$scope.discount = "Discount";

					}

					$scope.clearFilter = function() {

						$scope.f = {};
					};
				
			
				});
