jQuery(document).ready(function($) {
							var icons = {
								header: "ts-header",
								activeHeader: "ts-active-header"
								};
								$( ".ts-acordion-615" ).accordion({
									icons: icons,
									active:0,
									collapsible: true
								});
						});
						

						jQuery(document).ready(function($) {
							var icons = {
								header: "ts-header",
								activeHeader: "ts-active-header"
								};
								$( ".ts-acordion-86" ).accordion({
									icons: icons,
									active:false,
									collapsible: true
								});
						});
						jQuery(document).ready(function($) {
							var icons = {
								header: "ts-header",
								activeHeader: "ts-active-header"
								};
								$( ".ts-acordion-876" ).accordion({
									icons: icons,
									active:false,
									collapsible: true
								});
						});

							jQuery(document).ready(function($) {
								var icons = {
									header: "fa fa-caret-right",
									activeHeader: "fa fa-caret-down"
									};
									$( ".ts-acordion-419" ).accordion({
										icons: icons,
										active:0,
										collapsible: true
									});
							});

									jQuery(function($){
										$(".description-content").readmore({
											speed: 1000,
											moreLink: '<a class="ts-showmore" href="#">SHOW MORE</a>',
											lessLink: '<a class="ts-showmore" href="#">Hide</a>',
											maxHeight:80
										});
									});