				jQuery(document).ready(function($) {
					var icons = {
						header: "fa fa-caret-right",
						activeHeader: "fa fa-caret-down"
						};
						$( ".ts-acordion-302" ).accordion({
							icons: icons,
							active:false,
							collapsible: true
						});
				});