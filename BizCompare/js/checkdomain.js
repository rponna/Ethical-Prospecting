function iCheckDomain() {
                    jQuery("#log_res").addClass("ajax-loading");
                    jQuery.ajax({
                        type : "post",
                        data : jQuery("#whois").serialize(),
                        url : "http://alaska.themestudio.net/wp-content/plugins/themestudio-shortcodes-v1.0/inc/whois.php",
                        success : function (resp){
                            jQuery("#log_res").removeClass("ajax-loading");
                            jQuery("#log_res").html(resp);
                        }
                    }).fail(function(err) {
                        jQuery("#log_res").removeClass("ajax-loading");
                    });
                }