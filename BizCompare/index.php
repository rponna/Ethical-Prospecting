<?php
	session_start();
	
	// check if 'remember me' option was selected last time
	$log = (isset($_REQUEST['log'])) ? "?log=out" : "" ;
	if(isset($_COOKIE['remember_me']) && ($_COOKIE['remember_me'] == "on") && ($_REQUEST['log'] != "out")){
        $_SESSION['admin'] = ($_COOKIE['admin'] != "") ? $_COOKIE['admin'] : "";
        $_SESSION['logged']   = ($_COOKIE['logged'] != "") ? true : false;
        $_SESSION['user_id']  = ($_COOKIE['user_id'] != "") ? $_COOKIE['user_id'] : 0;
		
        exit;                            
	}

	include_once("include/db.inc.php");
    
	$dbObj=new DB();
	$conn = $dbObj->open();

?>

<?php include 'includes/pageheader.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="ts-slideshow  parallax-section">
				<div class="row">
					<div class="col-sm-12  ">
						<!-- START REVOLUTION SLIDER 4.6.5 fullwidth mode -->
						<div id="rev_slider_9_1" class="rev_slider fullwidthabanner">
							<ul>
								<!-- SLIDE  -->
								<li data-transition="fade" data-slotamount="9"
									data-masterspeed="1800" data-thumb=""
									data-saveperformance="off" data-title="Slide">
									<!-- MAIN IMAGE --> <img src="images/third.jpg" alt="slide11"
									data-bgposition="center top" data-bgfit="cover"
									data-bgrepeat="no-repeat"> <!-- LAYERS --> 
									<!-- LAYER NR. 1 -->
									<div class="tp-caption ts-big-caption tp-fade tp-resizeme"
										data-x="0" data-y="128" data-speed="900" data-start="800"
										data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="1700"
										style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
										With Us, You Get <span> </span>
									</div> <!-- LAYER NR. 2 -->
									
									<div class="tp-caption ts-caption-small tp-fade tp-resizeme"
										data-x="0" data-y="248" data-speed="900" data-start="1400"
										data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2100"
										style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
										<i class="fa fa-star"></i> Dedicated Account Managers
									</div> <!-- LAYER NR. 4 -->
									<div class="tp-caption ts-caption-small tp-fade tp-resizeme"
										data-x="0" data-y="290" data-speed="900" data-start="1700"
										data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2200"
										style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
										<i class="fa fa-star"></i> Unbiased Information With Proven Benefits
									</div> <!-- LAYER NR. 5 -->
									<div class="tp-caption ts-caption-small tp-fade tp-resizeme"
										data-x="0" data-y="330" data-speed="900" data-start="2000"
										data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2300"
										style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
										<i class="fa fa-star"></i> Experienced Solutions Specialists
									</div> <!-- LAYER NR. 6 -->
									<div class="tp-caption ts-caption-small tp-fade tp-resizeme"
										data-x="0" data-y="370" data-speed="900" data-start="2400"
										data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2800"
										style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">
										<i class="fa fa-star"></i> 100% Aussie Service
									</div> 
									<div class="tp-caption ts-button-slide tp-fade tp-resizeme"
										data-x="0" data-y="430" data-speed="300" data-start="2800"
										data-easing="Power3.easeInOut" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="3400"
										style="z-index: 11; max-width: auto; max-height: auto; white-space: nowrap;">
										<a href="electricity.php">Compare Now</a>
									</div> <!-- LAYER NR. 7 -->
								
								</li>
								<!-- SLIDE  -->
								<li data-transition="fade" data-slotamount="9"
									data-masterspeed="1800" data-thumb=""
									data-saveperformance="off" data-title="Slide">
									<!-- MAIN IMAGE --> <img src="images/first.jpg" alt="slide21"
									data-bgposition="center top" data-bgfit="cover"
									data-bgrepeat="no-repeat"> <!-- LAYERS --> <!-- LAYER NR. 1 -->
									<div class="tp-caption tp-fade" data-x="0" data-y="70"
										data-speed="900" data-start="500" data-easing="easeOutExpo"
										data-speed="900" data-start="500" data-easing="easeOutExpo"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="900" style="z-index: 5;">
										<img src="images/slideshow/person-02.png" alt="">
									</div> <!-- LAYER NR. 2 -->
									<div class="tp-caption ts-big-caption tp-fade tp-resizeme"
										data-x="right" data-hoffset="6" data-y="159" data-speed="900"
										data-start="800" data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="1000"
										style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
										<span> Our Services</span>
									</div> <!-- LAYER NR. 3 -->
									<div class="tp-caption ts-caption-medium tp-fade tp-resizeme"
										data-x="right" data-hoffset="-3" data-y="224" data-speed="900"
										data-start="1100" data-easing="easeOutExpo"
										data-splitin="none" data-splitout="none"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="1700"
										style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
										<span>We are a one stop shop for all your Utilities</span> </div> <!-- LAYER NR. 4 -->
									<div
										class="tp-caption ts-caption-small-right tp-fade tp-resizeme"
										data-x="right" data-hoffset="0" data-y="290" data-speed="900"
										data-start="1400" data-easing="easeOutExpo"
										data-splitin="none" data-splitout="none"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="2100"
										style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
										<span>Energy</span><i class="fa fa-star"></i>
									</div> <!-- LAYER NR. 5 -->
									<div
										class="tp-caption ts-caption-small-right tp-fade tp-resizeme"
										data-x="right" data-hoffset="0" data-y="330" data-speed="900"
										data-start="1700" data-easing="easeOutExpo"
										data-splitin="none" data-splitout="none"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="2200"
										style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
										<span>Telco</span><i class="fa fa-star"></i>
									</div> <!-- LAYER NR. 6 -->
									<div
										class="tp-caption ts-caption-small-right tp-fade tp-resizeme"
										data-x="right" data-hoffset="0" data-y="370" data-speed="900"
										data-start="2000" data-easing="easeOutExpo"
										data-splitin="none" data-splitout="none"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="2300"
										style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">
										<span>Insurance</span><i class="fa fa-star"></i>
									</div> <!-- LAYER NR. 7 -->
									<div
										class="tp-caption ts-caption-small-right tp-fade tp-resizeme"
										data-x="right" data-hoffset="0" data-y="410" data-speed="900"
										data-start="2300" data-easing="easeOutExpo"
										data-splitin="none" data-splitout="none"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="400"
										style="z-index: 11; max-width: auto; max-height: auto; white-space: nowrap;">
										<span>Finance</span><i class="fa fa-star"></i>
									</div> <!-- LAYER NR. 7 -->
									
								</li>
								<!-- SLIDE  -->
								<li data-transition="fade" data-slotamount="9"
									data-masterspeed="1800" data-thumb=""
									data-saveperformance="off" data-title="Slide">
									<!-- MAIN IMAGE --> <img src="images/second.jpg" alt="f9c22c58"
									data-bgposition="center center" data-bgfit="cover"
									data-bgrepeat="no-repeat"> <!-- LAYERS --> <!-- LAYER NR. 1 -->
									<div
										class="tp-caption ts-big-caption-center tp-fade tp-resizeme"
										data-x="center" data-hoffset="1" data-y="152" data-speed="900"
										data-start="500" data-easing="easeOutExpo" data-splitin="none"
										data-splitout="none" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="1000"
										style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
										Some of Our Partners<span> </span>
									</div> <!-- LAYER NR. 2 -->
									 <!-- LAYER NR. 6 -->
									<div class="tp-caption sfb" data-x="center" data-hoffset="-239"
										data-y="329" data-speed="300" data-start="2000"
										data-easing="Power3.easeInOut" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2300"
										style="z-index: 10;">
										<img src="images/bluenrg.png" alt="">
									</div> <!-- LAYER NR. 7 -->
									<div class="tp-caption sfb" data-x="center" data-hoffset="-117"
										data-y="329" data-speed="300" data-start="2300"
										data-easing="Power3.easeInOut" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2600"
										style="z-index: 11;">
										<img src="images/alinta.png" alt="">
									</div> <!-- LAYER NR. 8 -->
									<div class="tp-caption sfb" data-x="center" data-hoffset="0"
										data-y="329" data-speed="300" data-start="2600"
										data-easing="Power3.easeInOut" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="2900"
										style="z-index: 12;">
										<img src="images/sumo.png" alt="">
									</div> <!-- LAYER NR. 9 -->
									<div class="tp-caption sfb" data-x="center" data-hoffset="119"
										data-y="329" data-speed="300" data-start="2900"
										data-easing="Power3.easeInOut" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="4200"
										style="z-index: 13;">
										<img src="" alt="">
									</div> <!-- LAYER NR. 10 -->
									<div class="tp-caption sfb" data-x="center" data-hoffset="239"
										data-y="329" data-speed="300" data-start="3100"
										data-easing="Power3.easeInOut" data-elementdelay="0.1"
										data-endelementdelay="0.1" data-endspeed="4400"
										style="z-index: 14;">
										<img src="" alt="">
									</div> <!-- LAYER NR. 11 -->
									<div class="tp-caption ts-button-slide sfb tp-resizeme"
										data-x="center" data-hoffset="0" data-y="468" data-speed="300"
										data-start="3400" data-easing="Power3.easeInOut"
										data-splitin="none" data-splitout="none"
										data-elementdelay="0.1" data-endelementdelay="0.1"
										data-endspeed="4700"
										style="z-index: 15; max-width: auto; max-height: auto; white-space: nowrap;">
										<a href="#">Learn more</a>
									</div>
								</li>
							</ul>
						</div>
						<!-- END REVOLUTION SLIDER -->
					</div>
				</div>
			</div>
			<!-- End slideshow -->  
		<div class="ts-home1-function">
				<div class="container">
					<div class="row">
					<div><br/><select id="menuList" class="form-control input-lg productClass">
								<option value="select" id="productSelect" selected>What can we help you with today?</option>
												<option value="Electricity">Electricity</option>
												<option value="Gas">Gas</option>
												<option value="Insurance">Insurance</option>
														</select></div>
						<div class="col-sm-4">
							<div class="ts-service-style-1">
								<div class="service-title">
									<span class="service-icon"><i class="fa fa-magic"></i></span>
									<h3>100% Aussie Service</h3>
								</div>
								<div class="service-content">
									<p>We Know that you would like to talk to someone who understand your needs.
									Talk to one of our expereinced Solutions Specialists based in Melbourne.
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div>
								<div class="ts-service-style-1">
									<div class="service-title">
										<span class="service-icon"><i class="fa fa-cubes"></i></span>
										<h3>Honest & Reliable</h3>
									</div>
									<div class="service-content">
										<p>We work as an extension of your business. Our service is personalised 
										and convenient.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="ts-service-style-1">
								<div class="service-title">
									<span class="service-icon"><i class="fa fa-leaf"></i></span>
									<h3>Knowlegeable</h3>
								</div>
								<div class="service-content">
									<p>All our specialists are well trained. We Know what we are talking about 
									and if we dont, we wont make things up. We will find the right answer for you.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="ts-home3-simple-cloud-hosting parallax-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 ">
							<div class="ts-section-title  text-center">
								<h3>Why Choose Us?</h3>
								<p>Monotonectally reinvent economically sound e-markets
									whereas distributed collaboration</p>
							</div>
							<div class="ts-horizontalTab ts-tab ">
								<ul class="resp-tabs-list">
									<li>Features</li>
									<li>Tech Specs</li>
									<li>Server Management</li>
									<li>Guarantee</li>
								</ul>
								<div class="resp-tabs-container">
									<div class="row">
										<div class="inner-row clearfix">
											<div class="col-sm-6">
												<div class="ts-feature-item-2">
													<span class="feature-icon"> <i class="fa fa-music"></i>
													</span>
													<h3>
														<a href="">System Admin</a>
													</h3>
													<div class="feature-description">
														<p>Compellingly transform plug-and-play expertise
															whereas efficient platforms. Authoritatively communicate</p>
													</div>
												</div>
												<div class="ts-feature-item-2">
													<span class="feature-icon"> <i class="fa fa-user"></i>
													</span>
													<h3>
														<a href="">Guarantee</a>
													</h3>
													<div class="feature-description">
														<p>Compellingly transform plug-and-play expertise
															whereas efficient platforms. Authoritatively communicate</p>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="ts-feature-item-2">
													<span class="feature-icon"> <i class="fa fa-tint"></i>
													</span>
													<h3>
														<a href="">Tech Specs</a>
													</h3>
													<div class="feature-description">
														<p>Compellingly transform plug-and-play expertise
															whereas efficient platforms. Authoritatively communicate</p>
													</div>
												</div>
												<div class="ts-feature-item-2">
													<span class="feature-icon"> <i class="fa fa-lock"></i>
													</span>
													<h3>
														<a href="">Server Management</a>
													</h3>
													<div class="feature-description">
														<p>Compellingly transform plug-and-play expertise
															whereas efficient platforms. Authoritatively communicate</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="inner-row clearfix">
											<div class="col-sm-6">
												<p>Globally conceptualize plug-and-play architectures
													with user friendly results. Progressively engage an
													expanded array of platforms after equity invested
													resources. Assertively enable cross-unit niche markets
													without cutting-edge platforms. Professionally scale cross
													functional users after viral materials. Quickly grow just
													in time expertise vis-a-vis worldwide internal or
													&#8220;organic&#8221; sources.</p>
												<p>Continually leverage other&#8217;s exceptional total
													linkage without client-based innovation. Energistically
													iterate effective innovation rather than equity invested
													collaboration and idea-sharing. Enthusiastically create
													tactical initiatives via synergistic information.</p>
											</div>
											<div class="col-sm-6">
												<div class="ts_single_image  center">
													<img class="ts_single_image-img "
														src="images/homepage//Server-982x10242-300x320.png"
														width="300" height="320" alt="Server-982x10242"
														title="Server-982x10242" />
												</div>
											</div>
										</div>
									</div>

									<div class="video_widget ">
										<div class="ts_wrapper">
											<h2 class="wpb_heading wpb_video_heading"></h2>
											<div class="wpb_video_wrapper">
												<iframe width="560" height="315" src="https://www.youtube.com/embed/rmI_9Hty-Lw" frameborder="0" allowfullscreen></iframe>
											</div>
										</div>
									</div>
									<div class="bg_parallax">
										<div class="row">
											<div class="inner-row clearfix">
												<div class="col-sm-6">
													<p>Lorem Ipsum is simply dummy text of the printing and
														typesetting industry. Lorem Ipsum has been the
														industry&#8217;s standard dummy text ever since the 1500s,
														when an unknown printer took a galley of type and
														scrambled it to make a type specimen book. It has survived
														not only five centuries, but also the leap into electronic
														typesetting, remaining essentially unchanged. It was
														popularised in the 1960s with the release of Letraset
														sheets containing Lorem Ipsum passages, and more recently
														with desktop publishing software like Aldus PageMaker
														including versions of Lorem Ipsum. Lorem Ipsum is simply
														dummy text of the printing and typesetting industry. Lorem
														Ipsum has been the industry&#8217;s standard dummy text
														ever since the 1500s</p>
												</div>
												<div class="col-sm-6">
													<div class="skillbarstyle1">
														<div class="skillbar clearfix " data-percent="80%">
															<div class="skillbar-title">
																<span>Wordpress</span>
															</div>
															<div class="skill-bar-bg">
																<div class="skillbar-bar">
																	<div class="skill-bar-percent">80%</div>
																</div>
															</div>
														</div>
														<div class="skillbar clearfix " data-percent="90%">
															<div class="skillbar-title">
																<span>Wordpress</span>
															</div>
															<div class="skill-bar-bg">
																<div class="skillbar-bar">
																	<div class="skill-bar-percent">90%</div>
																</div>
															</div>
														</div>
														<div class="skillbar clearfix " data-percent="70%">
															<div class="skillbar-title">
																<span>Wordpress</span>
															</div>
															<div class="skill-bar-bg">
																<div class="skillbar-bar">
																	<div class="skill-bar-percent">70%</div>
																</div>
															</div>
														</div>
														<div class="skillbar clearfix " data-percent="50%">
															<div class="skillbar-title">
																<span>Wordpress</span>
															</div>
															<div class="skill-bar-bg">
																<div class="skillbar-bar">
																	<div class="skill-bar-percent">50%</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="ts-home10-people-say parallax-section">
				<div class="ts-overlay" style="background: rgba(0, 0, 0, 0.5)"></div>
				<div class="container">
					<div class="row">
						<div
							class="col-sm-12 col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10  ">
							<div class="ts-wrapper">
								<div class="ts-section-title   text-center">
									<h3>What people say</h3>
								</div>
								<div class="ts-testimonial-style2 ts-list-testimonial light">
									<div class="ts-item-testimonial text-center">
										<div class="icon-quote-left"></div>
										<div class="client-quote">
											<p>There are many variations passages of Lorem Ipsum
												available, but the majority have suffered alteration in some
												form, by injected randomise words which don&#8217;t look
												even believable.</p>
										</div>
										<div class="icon-quote-right"></div>
										<div class="info-testimonial">
											<div class="client-info">
												<span class="client-name">Lucia Penelope</span> <span
													class="client-position">CEO & Founder Geckoos</span> <span
													class="client-website"><a
													href="http://www.geekoos.com">www.geekoos.com</a></span>
											</div>
										</div>
									</div>
									<div class="ts-item-testimonial text-center">
										<div class="icon-quote-left"></div>
										<div class="client-quote">
											<p>Efficiently enhance dynamic e-tailers via economically
												sound users. Completely empower backend results through
												tactical web. Appropriately reintermediate exceptional
												e-tailers vis-a-vis exceptional vortals. Continually
												implement.</p>
										</div>
										<div class="icon-quote-right"></div>
										<div class="info-testimonial">
											<div class="client-info">
												<span class="client-name">Mark Adraison</span> <span
													class="client-position">CEO & Founder Geckoos</span> <span
													class="client-website"><a
													href="http://www.geekoos.com">www.geekoos.com</a></span>
											</div>
										</div>
									</div>
									<div class="ts-item-testimonial text-center">
										<div class="icon-quote-left"></div>
										<div class="client-quote">
											<p>There are many variations passages of Lorem Ipsum
												available, but the majority have suffered alteration in some
												form, by injected randomise words which don&#8217;t look
												even believable.</p>
										</div>
										<div class="icon-quote-right"></div>
										<div class="info-testimonial">
										<div class="client-info">
												<span class="client-name">Robert Smith</span> <span
													class="client-position">CEO of Geckoos.com</span> <span
													class="client-website"><a
													href="http://www.geekoos.com">www.geekoos.com</a></span>
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