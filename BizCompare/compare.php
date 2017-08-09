<?php
	session_start();
	
	// check if 'remember me' option was selected last time
	$log = (isset($_REQUEST['log'])) ? "?log=out" : "" ;
	if(isset($_COOKIE['remember_me']) && ($_COOKIE['remember_me'] == "on") && ($_REQUEST['log'] != "out")){
        $_SESSION['username'] = ($_COOKIE['username'] != "") ? $_COOKIE['username'] : "";
        $_SESSION['logged']   = ($_COOKIE['logged'] != "") ? true : false;
        $_SESSION['user_id']  = ($_COOKIE['user_id'] != "") ? $_COOKIE['user_id'] : 0;
		
        exit;                            
	}

	include_once("include/db.inc.php");
     
	$dbObj=new DB();
	$conn = $dbObj->open();
	
	$stmtpostcodes = $conn->query('SELECT * FROM postcodes');
	$resultspostcodes = $stmtpostcodes->fetchAll(PDO::FETCH_ASSOC);
	
    $stmtnmis = $conn->query('SELECT * FROM nmis');
	$resultsnmis = $stmtnmis->fetchAll(PDO::FETCH_ASSOC);
	
	$stmttariffdata = $conn->query('SELECT * FROM tariff_data');
	$resultstariffdata = $stmttariffdata->fetchAll(PDO::FETCH_ASSOC);
	
	$stmtelectricityrates  = $conn->query('SELECT * FROM electricity_rates');
	$resultselectricityrates = $stmtelectricityrates->fetchAll(PDO::FETCH_ASSOC);
		
?>

<?php include 'includes/pageheader.php'; ?>
<?php include 'includes/header.php'; ?>
<script>
var js_data1='<?php echo json_encode($resultspostcodes);?>';
postcodesGlobal = JSON.parse(js_data1 );
var js_data2='<?php echo json_encode($resultsnmis);?>';
nmisGlobal = JSON.parse(js_data2 );
var js_data3='<?php echo json_encode($resultstariffdata);?>';
dataGlobal = JSON.parse(js_data3 );
var js_data4='<?php echo json_encode($resultselectricityrates);?>';
ratesGlobal = JSON.parse(js_data4 );

</script>
	<!-- content -->
		<div id="container_full">
			<div class="ts-pricing-table-new parallax-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 ">
							<div class="ts-wrapper" ng-app="myApp">
								<div class="ts-section-title text-center" ng-controller="myCtrl">
									<h3 id="plansid">{{plans}} Available Plans</h3>
									
								</div>
								<div class="row">
									<div class="col-sm-12  ">
										<div class="ts-wrapper">
											<div class="ts-pricingtable-5" ng-app="myApp"
												ng-controller="myCtrl">

												<table>
													<tr class="section-info ">
														<td class="">
															<!-- <figure>
																<img alt="" src="">
															</figure> -->
															<div>
																<h3>Filters</h3>
															</div> <br />
															<div>
																<p>
																	<Label class=" ">by Company Name</Label>
																</p>
																<p>
																	<select class=" input-lg" ng-model="f.Company">
																		<option value>All</option>
																		<option ng-repeat="key in jsonbody.Rates ">{{key.company}}</option>
																	</select>
																</p>
															</div>
															<div>
																<p>
																	<Label class=" ">by Exit Fee</Label>
																</p>
																<p>
																	<select class=" input-lg" ng-model="f.Exitfee">
																		<option value>All</option>
																		<option
																			ng-repeat="key in jsonbody.Rates | unique : 'Exitfee' "
																			value="{{key.Exitfee}}">{{key.exit_fee}}</option>
																	</select>
																</p>

																<p>
																	<Label class=" ">Spend Range</Label>
																</p>
																<p>
																	<!-- <select class=" input-lg" ng-model="f.spend">
																		<option value>All</option>
																		<option ng-repeat="key in jsonbody.Rates | unique : 'spend' "
																			value="{{key.spend}}">{{key.spend}}</option>
																					</select> -->
																	<!-- <div range-slider min="0" max="100"
																			model-min="20" model-max="80"
																			></div> -->				</p>

																<button id="clear-filter" ng-click="clearFilter()"
																	type="button">Clear Filter</button>

															</div>
														</td>

														<td ng-repeat="key in jsonbody.Rates | filter : f">
														
															<div class="ts-pricing-item  sticky topicon">
																<!-- ng-class='{reccomended:$first}'> -->
																<div ng-class='{rec:$first}' class="rectest "></div>
															<div><span class="price-icon "><img src="images/bluenrg.png"
																	class="fa fa-navicon"></img></span></div>
																	<div><a href="#" class="ts-bt-pricing"
																	>Know More</a></div>														
																
															</div>
															<div class="ts-pricing-item alltable">
																<!-- ng-class='{reccomended:$first}'> -->
																<h3 class="price-title ">{{key.company}}</h3>
																<div class="price-unit-vat">
																	<div class="price-unit">
																		<span class="price">${{key.spend| number : 2 }}</span>
																		<span class="unit">99 / <span class="per-month">9</span>
																		</span>
																	</div>
																	<p>
																	<h4>Estimated Spend</h4>
																	(ex GST)
																	</p>
																</div>
																<div class="desc">{{key.description}}</div>
																
															</div>
															
															<div
																class="alltable ratesection" id="showrates">
																<h4 class="ts-pricingtable labeltag">{{rate}}</h4>
																<span class="inner-td " id="peak1">Peak
																	:{{key.peak1}}</span> <span class="inner-td "
																	ng-attr-id="{{'peakbal'+($index+1)}}">Peak
																	Balance :{{key.peak2}}</span> <span class="inner-td "
																	ng-attr-id="{{'offpeak'+($index+1)}}">Off Peak
																	:{{key.offpeak}}</span> <span class="inner-td "
																	ng-attr-id="{{'shoulder'+($index+1)}}">Shoulder
																	:{{key.shoulder}}</span> <span class="inner-td "
																	ng-attr-id="{{'cl'+($index+1)}}">Controlled load
																	:{{key.cl}}</span> <span class="inner-td "
																	ng-attr-id="{{'supply'+($index+1)}}">Supply
																	Charge :{{key.supply}}</span>

															</div>
															
															<div
																class="alltable" >
																<h4 class="ts-pricingtable labeltag">{{exitfee}}</h4>
																<span class="inner-td ts-icon-close"><i
																	class="fa fa-close"></i></span>
															</div>
															
															<div
																class="alltable" >
																<h4 class="ts-pricingtable labeltag">{{discount}}</h4>
																<span class="inner-td ts-icon-check"><i
																	class="fa fa-check"></i></span>
															</div>
															
														</td>
													</tr>

												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php include 'includes/footer.php'; ?>		