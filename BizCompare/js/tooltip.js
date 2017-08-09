jQuery(document).ready(function($) {						
									$(".show-full-icon").hide();
									$(".show-block").click(function(){
										$(".show-full-icon").toggle();
									  });
									$('a[href^="#"]').on('click',function (e) {
										e.preventDefault();

										var target = this.hash;
										var $target = $(target);

										$('html, body').stop().animate({
											'scrollTop': $target.offset().top
										}, 900, 'swing', function () {
											window.location.hash = target;
										});
									});
								});
								
jQuery(document).ready(function($){
											$('[data-toggle="tooltip"]').tooltip()
										});								