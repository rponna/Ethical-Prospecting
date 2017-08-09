<?php
	session_start();
	
	// check if 'remember me' option was selected last time
	$log = (isset($_REQUEST['log'])) ? "?log=out" : "" ;
	if(isset($_COOKIE['remember_me']) && ($_COOKIE['remember_me'] == "on") && ($_REQUEST['log'] != "out")){
        $_SESSION['username'] = ($_COOKIE['username'] != "") ? $_COOKIE['username'] : "";
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

				<div class="container">
					<div id="bridge">
						<div id="fb-root"></div>
						<div class="container">
							<div class="navbar navbar-default" role="navigation">
							
							
<!-- Start Testimonials  -->
			<div  class="ts-home1-acordion parallax-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-6  electricForm">
						<div class="jumbotron">
									<h2>Compare</h2><br/>
									<p>Start your comparison with simple questions.</p>
									<form method="post" action="" autocomplete="off">
										<span class="labelspanClass">
										<Label class="inputLabelClass"> <i id="billid" class="fa fa-question fa-2x question" onmouseover=""></i> Do you have your bill
											handy? <span class="mandatoryclass">*</span> </Label> 
											<Label><input type="radio" id="billyes" name="bill" 
											value="yes" onClick="toggleQuestions()" hidden><i id="billyesicon" title="Yes" class="fa fa-check fa-4x iconQuestion"></i><div>
											Yes</div></Label>
											<Label><input type="radio" id="billno" name="bill" value="no" onClick="toggleQuestions()" hidden>
											<i id="billnoicon" title="No" class="fa fa-close fa-4x iconQuestion"></i><div>
											No</div></Label><br />
										</span>
										
										<span id="nmi" class="labelspanClass" hidden>
											<Label class="inputLabelClass "><i id="nmiid" class="fa fa-question fa-2x question" onmouseover=""></i> Enter your NMI?<span class="mandatoryclass">*</span> 
											</Label> <Label class="inputfieldClass"><input
												id="nmiinput" class="form-control input-lg" name="domain"
												type="text" placeholder=" eg. 60XXXXXXXXX (length:11)" maxlength="11" oninput="displayPropertyType()"/></Label> <br />
										</span>
										
										<span id="postcode" class="labelspanClass" hidden>
											<Label class="inputLabelClass"><i id="postid" class="fa fa-question fa-2x question" onmouseover=""></i> Enter your Post Code?<span class="mandatoryclass">*</span> 
											</Label> <Label class="inputfieldClass"><input
												required="required" id="postcodeValue"
												class="form-control input-lg" name="domain" type="text" maxlength="4"
												placeholder=" eg. 3XXX" oninput="suburbChoice(this.value)" /></Label>
											<br />
										</span>

										<span id="suburb" class="labelspanClass" hidden>
											<Label class="inputLabelClass "><i id="suburbid" class="fa fa-question fa-2x question" onmouseover=""></i> choose your Suburb?<span class="mandatoryclass">*</span> 
											</Label> <Label class="inputfieldClass"><select
												id="suburbList" class="form-control input-lg">
											</select></Label><br />
										</span>


										<span id="propertyType" class="labelspanClass" hidden>
											<Label class="inputLabelClass"><i id="propertyid" class="fa fa-question fa-2x question" onmouseover=""></i> Select PropertyType?<span class="mandatoryclass">*</span> 
											</Label><Label><input
												type="radio" id="businessid" name="property"
												value="Business" onClick="displayUsage()" hidden><i id="businessicon" title="Business" class="fa fa-bank (alias) fa-4x iconQuestion"></i>
												<div>Business</div>
												</Label>
												<Label>
											<input type="radio" id="residentid" name="property" 
												value="Residential" onClick="displayUsage()" hidden>
											<i id="resicon" title="Home" class="fa fa-home fa-4x iconQuestion"></i><div>Residential</div>
											</Label><br/> 
										</span>



										<span id="meterType" class="labelspanClass" hidden>
											<Label class="inputLabelClass"><i class="fa fa-question fa-2x question" onmouseover=""></i> Select Meter Type?<span class="mandatoryclass">*</span> 
											</Label> <Label class="inputfieldClass"><select 
												id="meterTypeList" class="input-lg" style="width: 100%;">
												<option value="peak" selected>Peak only</option>
												<option value="peakOff">Peak and Off Peak</option>
												<option value="peakOffShoulder">Peak, Off
													Peak & Shoulder</option>
												<option value="peakControl">Peak with
													Controlled Load</option>

											</select></Label>
										</span>
										
										<span id="usageId">
										<Label class="inputLabelClass">
										<input type="text" class="form-control input-lg " id="peakusage" placeholder="Peak usage?" 
										style="display:none;margin-bottom:5px;width: 87%;" oninput="displayDays()"/>
										<input type="text" class="form-control input-lg" data-valueref="hide peakOff peakOffShoulder" id="offpeakusage" placeholder="Off Peak usage?" 
										style="display:none;margin-bottom:5px;width: 87%;" oninput="displayDays()"/>
										<input type="text" class="form-control input-lg" data-valueref="hide peakOffShoulder" id="shoulderusage" placeholder="Shoulder usage?" 
										style="display:none;margin-bottom:5px;width: 87%;" oninput="displayDays()"/>
										<input type="text" class="form-control input-lg" data-valueref="hide peakControl" id="controlledLoadusage" placeholder="Controlled Load usage?" 
										style="display:none;margin-bottom:5px;width: 87%;" oninput="displayDays()"/>
										</Label>
										</span>
										
										<span id="usageLevel" class="labelspanClass" hidden>
											<Label class="inputLabelClass"><i class="fa fa-question fa-2x question" onmouseover=""></i> What level best
												describes your typical electricity usage?<span class="mandatoryclass">*</span> </Label>
												<Label class="inputfieldClass"><input type="radio"
												id="oneusage" name="usagelevel" value="1-2 Person"
												onClick="displayDaysonNO()">1-2 Person<br> <input type="radio"
												id="twousage" name="usagelevel" value="3-4 Person"
												onClick="displayDaysonNO()"> 3-4 Person<br> <input type="radio"
												id="threeusage" name="usagelevel" value="4-5+ Person"
												onClick="displayDaysonNO()"> 4-5+ Person<br> </Label></br>
										</span>

										<span id="usageDays" class="labelspanClass" hidden>
											<Label class="inputLabelClass"><i class="fa fa-question fa-2x question" onmouseover=""></i> Please enter No of days
												for bill?<span class="mandatoryclass">*</span> </Label><Label class="inputfieldClass">
												<input type="text" class="form-control input-lg" 
												id="daysusage" value="" oninput="displayAvgEstimation()"> </Label></br>
										</span>
										<span id="avgEstimation" class="labelspanClass" hidden>
											<Label class="inputLabelClass"><i class="fa fa-question fa-2x question" onmouseover=""></i>Please enter average bill amount<span class="mandatoryclass">*</span> </Label><Label class="inputfieldClass">
												<input type="text" class="form-control input-lg" 
												id="avgbillamount" value="" oninput="displayCompareBtn()"> </Label></br>
										</span>

										<Label id="state" hidden></Label> 
										<Label id="distributor" hidden></Label>
										<Label id="tarifftype" hidden></Label>

										
										
									</form>
									<div id="compareBtn" class="row" hidden>
											<div class="col-md-8">

												<input type="button" id="myBtn" value="Compare"
													class="btn btn-primary btn-lg" />

											</div>
										</div>
								</div>

								
								
							</div>
	<div class="col-sm-6  testimonialClass">
						<div id="summaryId" class="side-nav" hidden>
						
						<h3>Summary</h3><br/>
							<div id="billsummary"></div>
							<div id="nmisummary" hidden></div>
							<div id="postcodesummary" hidden></div>
							<div id="suburbsummary" hidden></div>
							<div id="propertysummary" hidden></div>
							<div id="metertypesummary" hidden></div>
							<div id="usagelvlsummary" hidden></div>
							<div id="dayssummary" hidden></div>
							<div id="avgbillsummary" hidden></div>
							
						</div>
							<div class="ts-section-title">
								<h3>Testimonials</h3>
							</div>
							<div class="ts-testimonial-style1 ts-list-testimonial ">
								<div class="ts-item-testimonial-1">
									<div class="client-quote">
										<i class="fa fa-quote-left"></i>
										<blockquote>
											<p>There are many variations passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected randomise words which don&#8217;t look even believable.</p>
										</blockquote>
									</div>
									<div class="info-testimonial">
										
										<div class="client-info">
											<span class="client-name">Lucia Penelope</span>
											<span class="client-position">CEO & Founder Geckoos</span>
											<span class="client-website"><a href="http://www.geekoos.com">www.geekoos.com</a></span>
										</div>
									</div>
								</div>
								<div class="ts-item-testimonial-1">
									<div class="client-quote">
										<i class="fa fa-quote-left"></i>
										<blockquote>
											<p>Efficiently enhance dynamic e-tailers via economically sound users. Completely empower backend results through tactical web. Appropriately reintermediate exceptional e-tailers vis-a-vis exceptional vortals. Continually implement.</p>
										</blockquote>
									</div>
									<div class="info-testimonial">
									
										<div class="client-info">
											<span class="client-name">Mark Adraison</span>
											<span class="client-position">CEO & Founder Geckoos</span>
											<span class="client-website"><a href="http://www.geekoos.com">www.geekoos.com</a></span>
										</div>
									</div>
								</div>
								<div class="ts-item-testimonial-1">
								
									<div class="client-quote">
										<i class="fa fa-quote-left"></i>
										<blockquote>
											<p>There are many variations passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected randomise words which don&#8217;t look even believable.</p>
										</blockquote>
									</div>
									<div class="info-testimonial">
									
										<div class="client-info">
											<span class="client-name">Robert Smith</span>
											<span class="client-position">CEO of Geckoos.com</span>
											<span class="client-website"><a href="http://www.geekoos.com">www.geekoos.com</a></span>
										</div>
									</div>
								</div>
								
									<div class="ts-item-testimonial-1">
								
									<div class="client-quote">
										<i class="fa fa-quote-left"></i>
										<blockquote>
											<p>There are many variations passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected randomise words which don&#8217;t look even believable.</p>
										</blockquote>
									</div>
									<div class="info-testimonial">
									
										<div class="client-info">
											<span class="client-name">Robert Smith</span>
											<span class="client-position">CEO of Geckoos.com</span>
											<span class="client-website"><a href="http://www.geekoos.com">www.geekoos.com</a></span>
										</div>
									</div>
								</div>
								
							</div>
						</div> 
					
						</div> 
						
						
						
					</div>
				</div>
			</div>
			<!-- End Testimonials  -->

							<!-- The Modal -->
							<div id="myModal" class="modal">

								<!-- Modal content -->
								<div class="modal-content">
									<span class="modal-close">&times;</span>
									<p style="margin-top:30px;">
									<div class="ts-contact-form parallax-section">
										<div class="container">
											<div class="row">
												<div class="col-sm-9">
													<div class="ts-wrapper"  style="margin-left: 125px;">
														<div class="ts-section-title  text-left">
															<h3>Get in touch with us!</h3>
														</div>
														<div class="ts-wrapper">
															<p>Appropriately grow multifunctional infomediaries
																vis-a-vis highly efficient leadership. Professionally
																supply user-centric imperatives for parallel
																web-readiness. Competently orchestrate excellent markets
																through professional experiences.</p>
														</div>
														<div class="screen-reader-response"></div>
														<form class="wpcf7-form" method="post"
															action="javascript:compare(this);"
															onsubmit="">
															<div class="row">
																<div class="col-sm-6 col-xs-12">
																	<span class="name"><input type="text"
																		name="name" required="true" value="" size="40"
																		placeholder="Name*" /></span><br /> <span class=" subject"><input
																		type="text" name="subject" value="" size="40"
																		placeholder="Subject" /></span>
																</div>
																<div class="col-sm-6 col-xs-12">
																	<span class=" email"><input type="email"
																		name="email" value="" size="40" required="true"
																		placeholder="Email*" /></span><br /> <span
																		class=" telephone"><input type="text"
																		name="telephone" value="" size="40"
																		placeholder="Telephone" /></span>
																</div>
															</div>
															<p>
																<span class=" comment"><textarea name="comment"
																		cols="40" rows="4" required="true"
																		placeholder="Comment"></textarea></span><br />
																		
																		<input type="button" class="btn btn-primary btn-lg" value="View Results" onClick="location.href=compare(this);"/>
																	
															</p>
															<div id="ts-message"></div>
														</form>
													</div>
												</div>

											</div>
										</div>
									</div>
									</p>

								</div>

							<script>
								// Get the modal
								var modal = document.getElementById('myModal');

								// Get the button that opens the modal
								var btn = document.getElementById("myBtn");

								// Get the <span> element that closes the modal
								var span = document
										.getElementsByClassName("modal-close")[0];

								// When the user clicks the button, open the modal 
								btn.onclick = function() {
									modal.style.display = "block";
								}

								// When the user clicks on <span> (x), close the modal
								span.onclick = function() {
									modal.style.display = "none";
								}

								// When the user clicks anywhere outside of the modal, close it
								window.onclick = function(event) {
									if (event.target == modal) {
										modal.style.display = "none";
									}
								}
							</script>
							<div id="footer">
								<div class="container">
									<hr />
									<div class="pull-left text-muted">Copyright &copy; 2017
										Bizcompare. All Rights Reserved.</div>
								</div>
							</div>
							</div>

						</div>
						<!--end bridge-->
					</div>
				</div>

<?php include 'includes/footer.php'; ?>				