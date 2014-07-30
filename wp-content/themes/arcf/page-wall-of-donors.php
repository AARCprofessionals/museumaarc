<?php get_header('donors'); ?>
	<div id="page-background"></div>
		<div class="none">
			<p><a href="#content">Skip to Content</a></p>
		</div><!--.none-->
		<div id="main"><!-- this encompasses the top of the website -->
			<!-- Header functions -->
			<!-- function to convert colours from hex into rgb -->
			<!-- Count the number of active widgets -->
    <!--[if IE 7]>
			<link rel="stylesheet" href="http://satoristudio.net/ikebana/wp-content/themes/Ikebana/ie8.css">
			<style type="text/css"> #footer-widget-area .widget-footer { width: 20%; } </style>
			<![endif]-->
			<!--[if IE 8]>
			<link rel="stylesheet" href="http://satoristudio.net/ikebana/wp-content/themes/Ikebana/ie8.css">
			<style type="text/css"> #footer-widget-area .widget-footer { width: 20%; } </style>
			<![endif]-->
			<!-- Resize image background -->
			<!-- Scroll to top button -->
			<script type='text/javascript'>
			var totop = "Scroll Back to Top";
			var scrolltotop={
				//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
				//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
				setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
				controlHTML: '<div class="scrolltop"></div>', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
				controlattrs: {offsetx:63, offsety:10}, //offset of control relative to right/ bottom of window corner
				anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

				state: {isvisible:false, shouldvisible:false},

				scrollup:function(){
					if (!this.cssfixedsupport) //if control is positioned using JavaScript
						this.$control.css({opacity:0}) //hide control immediately after clicking it
					var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
					if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
            dest=jQuery('#'+dest).offset().top
					else
						dest=0
					this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
				},

				keepfixed:function(){
					var $window=jQuery(window)
					var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
					var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
					this.$control.css({left:controlx+'px', top:controly+'px'})
				},

				togglecontrol:function(){
					var scrolltop=jQuery(window).scrollTop()
					if (!this.cssfixedsupport)
						this.keepfixed()
					this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
					if (this.state.shouldvisible && !this.state.isvisible){
						this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
						this.state.isvisible=true
					}
					else if (this.state.shouldvisible==false && this.state.isvisible){
						this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
						this.state.isvisible=false
					}
				},

				init:function(){
					jQuery(document).ready(function($){
						var mainobj=scrolltotop
						var iebrws=document.all
						mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
						mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
						mainobj.$control=$('<div id="topcontrol" style="z-index:100">'+mainobj.controlHTML+'</div>')
							.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
							.attr({title:totop})
							.click(function(){mainobj.scrollup(); return false})
							.appendTo('body')
						if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
							mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
						mainobj.togglecontrol()
						$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
							mainobj.scrollup()
							return false
						})
						$(window).bind('scroll resize', function(e){
							mainobj.togglecontrol()
						})
					})
				}
			}
			
			scrolltotop.init()
			</script>


			<!-- Icon menu -->
			<script type="text/javascript">
			var $icons = jQuery.noConflict();
			var Icons = function() {
				if ( $icons(window).width() > 1024 ) {
					$icons('.icons-item').hover(function() {
						var currid = $icons(this)[0].id;
						var curridlast = currid.substr(- 1);
						$icons('div[id$=icons-text-'+curridlast+']').fadeIn(80);
					}, function () {
						var currid = $icons(this)[0].id;
						var curridlast = currid.substr(- 1);
						$icons('div[id$=icons-text-'+curridlast+']').fadeOut(180);
					});
				} 
				if ( $icons(window).width() < 1025 ) {
					$icons('.icons-item').click(function() {
						var currentid = $icons(this)[0].id;
						var currentidlast = currentid.substr(- 1);
						$icons('div[id$=icons-text-'+currentidlast+']').fadeIn(2);
						setTimeout(function(){
			  				$icons('div[id$=icons-text-'+currentidlast+']').fadeOut("slow");
			 			}, 1500);
					});
				}
			}
			$icons(document).ready(function() {
				Icons();
			});
			$icons(document).resize(function() {
				Icons();
			});
			$icons(window).load(function() {
				var iconmenu = ( $icons('#icons-menu #icons-item-1').height() - $icons('#icons-text-1').height() ) / 2;
				$icons('.icons-text').css('margin-top',iconmenu+'px');
			});
			</script>

			
			<!-- Preload images -->
			<script type="text/javascript">
			var $pr = jQuery.noConflict();
			$pr.fn.preload = function() {
			    this.each(function(){
			        $pr('<img/>')[0].src = this;
			    });
			}
			$pr(document).ready(function() {
				$pr([
				'http://satoristudio.net/ikebana/wp-content/uploads/2013/06/menu-icon_portfolio_h.png', 'http://satoristudio.net/ikebana/wp-content/uploads/2013/06/menu-icon_services_h.png', 'http://satoristudio.net/ikebana/wp-content/uploads/2013/06/menu-icon_experiments_h.png', 'http://satoristudio.net/ikebana/wp-content/uploads/2013/06/user_24x32_h.png', 'http://satoristudio.net/ikebana/wp-content/uploads/2013/06/menu-icon_team_h.png']).preload();
			});
			</script>


			<!-- Search box -->
			<script type="text/javascript">
			var $searchbx = jQuery.noConflict();
			$searchbx(function() { 
				var searchbox = "Find..";
			    $searchbx('#s').focus(function() {
			    	$searchbx('#s').attr("value","");
				});
				$searchbx('#s').blur(function() {
					if ($searchbx('#s').attr("value")==null || $searchbx('#s').attr("value")=="") {
			        	$searchbx('#s').attr("value",searchbox);
					}
				});
			});
			</script>


			<!-- Submenu animation -->
			<script type="text/javascript">
			var $submenu = jQuery.noConflict();
			$submenu(function(){	
				$submenu('nav ul li').hover(function () {
					$submenu('> ul', this).show(10);
				}, function () {
					$submenu('ul', this).hide(10);
				});
			});
			</script>

			<!-- Project box overlays with excerpts -->
			<script type="text/javascript">
			var $over = jQuery.noConflict();
			$over(function(){	
				$over(document).on('click', '.format-image,.format-standard,.format-video,.format-link,.donor' ,
					
					function () {
						$over('.image-post-overlay', this).slideToggle(300);
					});
			
			});
			</script>

			<!-- Fade project boxes on mouse hover -->
			<script type="text/javascript">
			var $hover = jQuery.noConflict();
			$hover(function(){
				$hover(document).on('mouseover', '.format-image,.format-standard,.format-video,.format-link,.format-gallery' ,
					function () {
						$hover(this).prepend('<div class="project-hover"></div>');
					}),
				$hover(document).on('mouseout', '.format-image,.format-standard,.format-video,.format-link,.format-gallery' ,
					function () {
						$hover('.project-hover',this).remove();
					})
			});
			</script>
			
			<!-- Truncate text on portfolio and blog pages -->
			<script type="text/javascript">
			var $tru = jQuery.noConflict();
			$tru(function(){
				$tru.fn.truncate = function (options) {
					var defaults = {
						more: '...'
					};
					var options = $tru.extend(defaults, options);
					return this.each(function (num) {
						var height = parseInt($tru(this).css("height"));
						var content = $tru(this).html();
						while (this.scrollHeight > height) {
							content = content.replace(/\s+\S*$/, "");
							$tru(this).html(content + " " + options.more);
						}
					})
				}
				$tru(document).ready(function() {
					$tru(".iso-masonry .post").truncate();
				});
			});
			</script>


			<!-- Isotope Masonry Magic -->
			<script type="text/javascript">
			var $mason = jQuery.noConflict();
			$mason(document).ready(function(){
				var $container = $mason('#content');  
				$container.isotope({
			    	itemSelector: '.post',
            masonry: {
              columnWidth: 268
            }
			    }); 
				$mason('#filters a.filterablea,#filter-mobile a.filterablea,#icons-mobile a.filterablea,#icons-menu a.filterablea').click(function(){
			  		var selector = $mason(this).attr('data-filter');
			  		$container.isotope({ filter: selector });
			  		return false;
				});
				$mason('.filterablea,#logo a,.menu-filter a').click(function() {
					var $this = $mason(this);
			        if ( $this.hasClass('selected') ) {
			          return false;
			        }
			        var $optionSet = $mason('#icons-menu,#filters');
			        $optionSet.find('.selected').removeClass('selected');
			        $this.addClass('selected');
				});
			});
			$mason(window).load(function(){
				var $container = $mason('#content');
				$container.isotope('reLayout');
			});
			$mason(window).resize(function(){
				var $container = $mason('#content');
				$container.isotope('reLayout');
			});
			</script>


			<!-- Infinite scroll -->
			<script type="text/javascript">
			var $inf = jQuery.noConflict();
			$inf(function(){
				var $cont = $inf('#content');
				$cont.isotope({
					itemSelector : '.post'
			  	});
				$cont.infinitescroll(
					{
						navSelector  : '#page_nav',    // selector for the paged navigation
						nextSelector : '#page_nav a',  // selector for the NEXT link (to page 2)
						itemSelector : '.post',     // selector for all items you'll retrieve
						loading: {
							finishedMsg: '',
							msgText: '',
							img: ''
						}
					},
					function( newElements ) {
						$cont.isotope( 'insert', $mason( newElements )
						);
					}
				);
			});
			</script>


			<!-- Set correct content width -->
			<style type="text/css">@media only screen and (max-width: 8488px) and (min-width: 8220px) { #main-body, #footer { width: 8040px; } #header-box, #container-mobile-icons { width: 8032px; } } @media only screen and (max-width: 8220px) and (min-width: 7952px) { #main-body, #footer { width: 7772px; } #header-box, #container-mobile-icons { width: 7764px; } } @media only screen and (max-width: 7952px) and (min-width: 7684px) { #main-body, #footer { width: 7504px; } #header-box, #container-mobile-icons { width: 7496px; } } @media only screen and (max-width: 7684px) and (min-width: 7416px) { #main-body, #footer { width: 7236px; } #header-box, #container-mobile-icons { width: 7228px; } } @media only screen and (max-width: 7416px) and (min-width: 7148px) { #main-body, #footer { width: 6968px; } #header-box, #container-mobile-icons { width: 6960px; } } @media only screen and (max-width: 7148px) and (min-width: 6880px) { #main-body, #footer { width: 6700px; } #header-box, #container-mobile-icons { width: 6692px; } } @media only screen and (max-width: 6880px) and (min-width: 6612px) { #main-body, #footer { width: 6432px; } #header-box, #container-mobile-icons { width: 6424px; } } @media only screen and (max-width: 6612px) and (min-width: 6344px) { #main-body, #footer { width: 6164px; } #header-box, #container-mobile-icons { width: 6156px; } } @media only screen and (max-width: 6344px) and (min-width: 6076px) { #main-body, #footer { width: 5896px; } #header-box, #container-mobile-icons { width: 5888px; } } @media only screen and (max-width: 6076px) and (min-width: 5808px) { #main-body, #footer { width: 5628px; } #header-box, #container-mobile-icons { width: 5620px; } } @media only screen and (max-width: 5808px) and (min-width: 5540px) { #main-body, #footer { width: 5360px; } #header-box, #container-mobile-icons { width: 5352px; } } @media only screen and (max-width: 5540px) and (min-width: 5272px) { #main-body, #footer { width: 5092px; } #header-box, #container-mobile-icons { width: 5084px; } } @media only screen and (max-width: 5272px) and (min-width: 5004px) { #main-body, #footer { width: 4824px; } #header-box, #container-mobile-icons { width: 4816px; } } @media only screen and (max-width: 5004px) and (min-width: 4736px) { #main-body, #footer { width: 4556px; } #header-box, #container-mobile-icons { width: 4548px; } } @media only screen and (max-width: 4736px) and (min-width: 4468px) { #main-body, #footer { width: 4288px; } #header-box, #container-mobile-icons { width: 4280px; } } @media only screen and (max-width: 4468px) and (min-width: 4200px) { #main-body, #footer { width: 4020px; } #header-box, #container-mobile-icons { width: 4012px; } } @media only screen and (max-width: 4200px) and (min-width: 3932px) { #main-body, #footer { width: 3752px; } #header-box, #container-mobile-icons { width: 3744px; } } @media only screen and (max-width: 3932px) and (min-width: 3664px) { #main-body, #footer { width: 3484px; } #header-box, #container-mobile-icons { width: 3476px; } } @media only screen and (max-width: 3664px) and (min-width: 3396px) { #main-body, #footer { width: 3216px; } #header-box, #container-mobile-icons { width: 3208px; } } @media only screen and (max-width: 3396px) and (min-width: 3128px) { #main-body, #footer { width: 2948px; } #header-box, #container-mobile-icons { width: 2940px; } } @media only screen and (max-width: 3128px) and (min-width: 2860px) { #main-body, #footer { width: 2680px; } #header-box, #container-mobile-icons { width: 2672px; } } @media only screen and (max-width: 2860px) and (min-width: 2592px) { #main-body, #footer { width: 2412px; } #header-box, #container-mobile-icons { width: 2404px; } } @media only screen and (max-width: 2592px) and (min-width: 2324px) { #main-body, #footer { width: 2144px; } #header-box, #container-mobile-icons { width: 2136px; } } @media only screen and (max-width: 2324px) and (min-width: 2056px) { #main-body, #footer { width: 1876px; } #header-box, #container-mobile-icons { width: 1868px; } } @media only screen and (max-width: 2056px) and (min-width: 1788px) { #main-body, #footer { width: 1608px; } #header-box, #container-mobile-icons { width: 1600px; } } @media only screen and (max-width: 1788px) and (min-width: 1520px) { #main-body, #footer { width: 1340px; } #header-box, #container-mobile-icons { width: 1332px; } } @media only screen and (max-width: 1520px) and (min-width: 1252px) { #main-body, #footer { width: 1072px; } #header-box, #container-mobile-icons { width: 1064px; } } @media only screen and (max-width: 1252px) and (min-width: 984px) { #main-body, #footer { width: 804px; } #header-box, #container-mobile-icons { width: 796px; } } @media only screen and (max-width: 984px) and (min-width: 716px) { #main-body, #footer { width: 536px; } #header-box, #container-mobile-icons { width: 528px; } } @media only screen and (max-width: 552px) and (min-width: 284px) { #main-body, #footer { width: 268px; } #header-box, #container-mobile-icons { width: 260px; } } @media only screen and (max-width: 716px) and (min-width: 552px) { #main-body, #footer { width: 268px; } #header-box, #container-mobile-icons { width: 260px; } } @media only screen and (max-width: 716px) { #main-body, #footer, #header-box, #container-mobile-icons { width: 90% !important; } .iso-masonry .post { width: 100% !important; margin: 4px 0 !important; max-width: none !important; } #header-box #searchform { float: left !important; margin-left: 0 !important; } } </style><script type="text/javascript">
			var $lbr = jQuery.noConflict();
			function resizeLargeTiles() {
				var contwidth = $lbr('#portfolio-list').width();
				$lbr('#portfolio-list .post').each(function() {
					if ( $lbr(this).attr('data-post-size') ) {
						var postwidthnum = $lbr(this).attr('data-post-size').substr(0,1);
					}
					var postwidth = postwidthnum * 260 + ( postwidthnum - 1 ) * 8; 
					if ( postwidth > contwidth ) {
						var maxwidth = contwidth - 8;
						$lbr(this).css('max-width',maxwidth);
						var $isocontainer = $lbr('#content');
						$isocontainer.isotope('reLayout');
					} else {
						$lbr(this).css('max-width','inherit');
						var $isocontainer = $lbr('#content');
						$isocontainer.isotope('reLayout');
					}
				});
			}
			$lbr(document).ready(function() {
				resizeLargeTiles();
			});
			$lbr(window).resize(function() {
				resizeLargeTiles();
			});
			</script>


			<!-- Comment field width -->
			<script type="text/javascript">
			var $inp = jQuery.noConflict();
			var InputSize = function() {
				var contw = $inp('#content').width()-100;
				$inp('#content #respond input#author').css('width',contw);
				$inp('#content #respond input#email').css('width',contw);
				$inp('#content #respond input#url').css('width',contw);
				$inp('#content #respond textarea').css('width',contw);
			}
			$inp(document).ready(function(){
				InputSize();
			});
			$inp(window).resize(function(){
				InputSize();
			});
			</script>


			<!-- Add classes to local and external links -->
			<script type="text/javascript">
			var $lnk = jQuery.noConflict();
			var hostname = new RegExp(location.host);
			$lnk(document).ready(function(){
				$lnk('.format-link a').each(function(){
					var url = $lnk(this).attr("href");
					// Test if current host (domain) is in it
					if(hostname.test(url)){
						// If it's local...
						$lnk(this).addClass('local');
						$lnk(this).attr('target','_self');
					}
					else if(url.slice(0, 1) == "#"){
						// It's an anchor link
						$lnk(this).addClass('anchor'); 
					}
					else {
						// a link that does not contain the current host
						$lnk(this).addClass('external');
						$lnk(this).attr('target','_blank');                        
					}
				});
			});
			</script>
			
			
			<!-- Sticky posts icon -->
			<script type="text/javascript">
			var $sticky = jQuery.noConflict();
			$sticky(document).ready(function(){
				$sticky('.blog .sticky h2').prepend('<i class="icon-pushpin"></i>');
			});
			</script> 

			<!-- Custom styles -->
	

			<style type="text/css">

				#logo-wrap { left: -78px; }
				@media only screen and (max-width: 767px) { #logo-wrap { position: static !important; float: left !important; } }
				@media only screen and (min-width: 767px) { #logo-wrap { display: none; } }
		      
				#logo { background-image: url("http://satoristudio.net/ikebana/wp-content/uploads/2013/06/default-logo3.png");width: 70px; }
				.iso-masonry .image-post-overlay { display:none; }
				#main-body, #footer { max-width: 1608px !important; }
				#header-box { max-width: 1600px !important; }
				.iso-masonry .post { width: 260px; height: 260px; }
				.iso-masonry .post-size-1x1 { width: 260px; height: 260px; } .iso-masonry .post-size-1x2 { width: 260px; height: 528px; } .iso-masonry .post-size-1x3 { width: 260px; height: 796px; } .iso-masonry .post-size-1x4 { width: 260px; height: 1064px; } .iso-masonry .post-size-2x1 { width: 528px; height: 260px; } .iso-masonry .post-size-2x2 { width: 528px; height: 528px; } .iso-masonry .post-size-2x3 { width: 528px; height: 796px; } .iso-masonry .post-size-2x4 { width: 528px; height: 1064px; } .iso-masonry .post-size-3x1 { width: 796px; height: 260px; } .iso-masonry .post-size-3x2 { width: 796px; height: 528px; } .iso-masonry .post-size-3x3 { width: 796px; height: 796px; } .iso-masonry .post-size-3x4 { width: 796px; height: 1064px; } .iso-masonry .post-size-4x1 { width: 1064px; height: 260px; } .iso-masonry .post-size-4x2 { width: 1064px; height: 528px; } .iso-masonry .post-size-4x3 { width: 1064px; height: 796px; } .iso-masonry .post-size-4x4 { width: 1064px; height: 1064px; } 
				@media only screen and (max-width: 767px) {
					.iso-masonry .post-size-1x1,
					.iso-masonry .post-size-1x2,
					.iso-masonry .post-size-2x1,
					.iso-masonry .post-size-2x2,
					.iso-masonry .post-size-3x2,
					.iso-masonry .post-size-2x3,
					.iso-masonry .post-size-3x3,
					.iso-masonry .post-size-2x4,
					.iso-masonry .post-size-4x2,
					.iso-masonry .post-size-3x4,
					.iso-masonry .post-size-4x3,
					.iso-masonry .post-size-4x4 {
						height: 260px !important;	
					}
				}
				.iso-masonry #portfolio-header { width: 528px; }
				#header-box #searchform #s { width: 240px; }
				.iso-masonry .post, .iso-masonry #blog-header { margin: 4px; }
				.page-portfolio .pagerbox { margin-left: 4px; }
				#portfolio-content-block { margin: 8px 4px 4px 4px; }
					#iconmenu { margin-top: 4px;margin-left: -74px; }
					#header { margin-bottom: 4px; }
					#footer { margin-top: 4px; }
					#portfolio-content-block { background-color: #666666; }
				.icons-item { margin-bottom: 8px; }
				@media only screen and (max-width: 1030px) { #nav-wrap-right { margin-top: 4px; } }
				.project-hover {  }
				#social-top a { color: ; }
				#social-top a:hover { color: ; }
				.pagerbox a { margin-top: 4px; margin-bottom:4px; margin-right:8px; }
				#container-footer { padding: 70px 40px 40px 40px; }
				#container-footer, #copyright { margin: 0 4px; }
				.normal, body, input, blockquote, .dropdown-menu-widget .menu, .widget_categories .postform, .widget_archive select { font: 16px 'Open Sans', Arial, sans-serif; font-weight: 300 !important; }
				.serif, cite, h1, h2, h3, h4, h5, h6, .stick-title, .pagerbox a, .pagerbox, .su-heading-shell { font-family: 'Open Sans', Arial, sans-serif; font-weight: 300 !important; }
				#nav-primary ul a, #nav-secondary ul a, .mobilemenu .dropdown-menu, .mobile-icon-title-text { font-family: 'Open Sans', Arial, sans-serif; font-weight: 300 !important; }
				.scrolltop, .scrolltop:hover { background-image: url('http://satoristudio.net/ikebana/wp-content/themes/Ikebana/images/to-top-button.png'); }
				@media only screen and (min-width: 767px) {
				#footer .widget-footer { width: 20%; }
				}
				#header-above {  }
				body {
					background-attachment: scroll;
			    		background-color: #EEEEEE;
			    		background-image: url("/wp-content/themes/arcf/images/scribble_light.png");
			    		background-position: left top;
			    		background-repeat: repeat;
			    }
				#page-background { background-image: url(''); filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='',sizingMethod='scale'); -ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='',sizingMethod='scale')"; }
				#nav-primary ul li ul {  }
				.page h1 {  }
				.header-border {  }
				.container-header {  }
				#nav-primary li a, #nav-primary ul ul li a { }
				#nav-primary .current-menu-item > a {  }
				#nav-primary ul li ul {  }
				.iso-masonry .image-post-overlay {  }
				#nav-primary ul li ul li { }
				#nav-primary ul a:hover, #filters .selected {  }
				#nav-primary ul li a { font-size: px; }
				#nav-secondary ul li a { font-size: px; }
				#icons-mobile .mobile-icon-title, .menu-filter-mobile, .mobilemenu .dropdown-menu {  }
				#icons-mobile .mobile-icon-title:hover, #icons-mobile .mobile-icon-title:active, .menu-filter-mobile:hover {  }
				.normal, body, input, blockquote { font-size: px;  }
				.normal, body #content, input, blockquote { line-height: px;  }
				.iso-masonry .post { font-size: px; line-height: px; }
				.iso-masonry .post-size-large { font-size: 40px;line-height: 50px; }
				#content h1 a, #content h2 a, #content h3 a, #content h4 a, .page-content h1, .post-content h1, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, .serif, cite, h1, h2, h3, h4, h5, h6, .post-header, .page h1, #rps h4.post-title a span, .su-heading-shell { color: ; font-weight:  !important;  }
				a:link, a:visited, #shortcode-postlist .post-meta, .pagerbox a.current .pagerbox a:hover { color: ; }
				a:hover, .widget-area input#searchsubmit:hover, #portfolio-filter a:hover, #portfolio-filter li a:hover, #portfolio-filter li.active a { color: ; }
				.iso-masonry .post, .icons-item, .page-portfolio .pagerbox a, .tax-tagportfolio .pagerbox a, #icons-mobile .mobile-icons-title  { background-color: ; }
				.icons-item:hover, .icons-text { background-color: ; }
				.icons-text { color: ; }
				#content .format-link .post-link-url { color: ; }
				body, blockquote, #content .format-link .post-link h2 a, #content .format-link .post-link h2, .comment-author a { color: ; }
				.tagcloud a { background-color: ; } 
				.tagcloud a:hover { background-color: ; }
				body blockquote {  }
				#header #header-box { background-color: ; }
				.type-post, blockquote, #post-author, #comments-top, #post-author-top, #comments article, #respond, .type-post, .portfolio-item, #top-border { border-color:  !important; } 
				#respond input#submit:hover, .contact-submit input:hover, .back-button input:hover { background-color: ; }
				input:hover, textarea:hover, input:focus, textarea:focus { border-color: ; }
				.wp-caption-text, .comment-date, .widget_pippin_recent_posts ul li .time, .post-meta .meta-img { color: ; }
				.su-divider { border-top-color: ; }
				.su-tabs-style-1 .su-tabs-pane { border-color: ; }
				.su-tabs-style-1 .su-tabs-nav { background-color: ; }
				.su-tabs-style-3 { border-color: ; }
				.su-tabs-style-3 .su-tabs-nav span { background-color: ; }
				.su-tabs-style-2 .su-tabs-pane { border-color: ; }
				.su-tabs-style-2 .su-tabs-nav { background-color: ; }
				.su-tabs-style-1 .su-tabs-nav span { background-color: #333333; }
				.su-tabs-style-2 .su-tabs-nav span { background-color: ; }
				.su-tabs-style-2 .su-tabs-nav span { border-color: ; }
				.su-tabs-style-1 .su-tabs-nav span.su-tabs-current, .su-tabs-style-1 .su-tabs-pane { background-color: #444444; }
				.su-tabs-style-1 .su-tabs-nav span.su-tabs-current { border-color: #444444; }
				.su-tabs-style-2 .su-tabs-nav span.su-tabs-current, .su-tabs-style-2 .su-tabs-pane { background-color: ; }
				.su-tabs-style-2 .su-tabs-nav span.su-tabs-current { border-color: ; }
				.su-tabs-style-3 .su-tabs-nav span.su-tabs-current { background-color: #444444; }
				.su-tabs-style-3 .su-tabs-nav span.su-tabs-current { border-color: #444444; }
				.su-tabs-style-1 .su-tabs-nav span:hover { background-color: #cccccc; }
				.su-tabs-style-2 .su-tabs-nav span:hover { background-color: ; }
				.su-tabs-style-2 .su-tabs-nav span:hover { border-color: ; }
				.su-tabs-style-3 .su-tabs-nav span:hover { background: #cccccc; }
				.su-spoiler-style-2 > .su-spoiler-title, .su-spoiler-style-2.su-spoiler-open > .su-spoiler-title { background-color: #444444; }
				.su-spoiler-style-2, .su-spoiler-style-2 > .su-spoiler-title, .su-spoiler-style-2.su-spoiler-open > .su-spoiler-title {  border-color: #444444; }
				.su-table-style-1 table { border-color: ; }
				.su-table-style-2 table tbody th { background-color: ; color: ;}
				.su-table-style-2 table { border-color: ; }
				.su-table-style-1 td { background-color: ; color: ;}
				.su-table-style-1 .su-even td { background-color: ; }
				.su-table-style-2 td { background-color: ; color: ;}
				.su-table-style-2 .su-even td { background-color: ; }
				.su-table-style-1 td, .su-table-style-1 th { border-color: ; }
				.su-table-style-1 th { background: ;  color: ; }
				#respond input#submit, .contact-submit input, .back-button input, .error404 #searchsubmit, .widget-area input#searchsubmit { color: ; }
				input[type="text"], textarea, #header-box #searchform #s { background-color:  !important; }
				#post-author { display: block; }
				#respond input#submit, .contact-submit input, .back-button input { background-color: ;  }
				.post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6, .page-content h2, .page-content h3, .page-content h4, .page-content h5, .page-content h6, .portfolio-item h3 a, #comments h3, #comments h4, #post-author h3, #author h3, .error404 #content h4 { color:  !important; }
				#sidebar .widget-area .recentcomments {  }
				#sidebar .widget_categories ul li {  }
				#sidebar .widget_archive ul li {  }
				#sidebar .widget_pages ul li {  }
				#sidebar .widget_links ul li {  }
				#sidebar ul#twitter_update_list li {  }
				#container-footer {   }
				#footer .widget-footer ul li, #footer #copyright { border-color: ;  }
				#footer .tagcloud a { background-color: ;  }
				#footer #copyright { background-color: ; }
				#footer, #footer .widget-footer ul { color: ; }
				#footer .tagcloud a { color: ; }
				#footer h4 {  }
				#footer a, .orbit-slider a { color: ; }
				#footer a:hover { color: ; }
				#footer .tagcloud a:hover { background-color: ; color: !important; }
				#footer #copyright { color: ; }
				#footer #copyright a { color: ; }
			</style>
		</div><!--#main-->


		<!-- Content of the website -->

		<div id="main-body">
			<div class="container " id="main-container">
				<div class="filters">
					<form method="post" action="" />
						<div class="field">
							<label>Search by Date Range</label>
							<input type="text" class="datepicker" name="from" value="<?php if (isset($_POST["from"])) {echo $_POST["from"];} ?>" /> to <input type="text" class="datepicker" name="to" value="<?php if (isset($_POST["to"])) {echo $_POST["to"];}; ?>" />
						</div>
						<div class="field">
							<label>Show:</label>
							<select name="show">
								<option value="name"<?php if (isset($_POST["show"]) && $_POST["show"] == 'name') echo ' selected'; ?>>by the name</option>
								<option value="dedication"<?php if (isset($_POST["show"]) && $_POST["show"]=='dedication') echo ' selected'; ?>>by the dedication</option>
							</select>
						</div>
						<div class="field">
							<label>Search:</label>
							<input type="text" name="search" value="<?php if (isset($_POST["search"])) { echo $_POST["search"]; } ?>" style="width:200px;" />
						</div>
						<div class="field">
							<input name="submit-search" type="submit" value="Go" />
						</div>
						<div style="clear:both;"></div>
						 <script>
							jQuery(document).ready(function($){
								$( ".datepicker" ).datepicker();
							});
						</script>
					</form>
				</div>
				<div id="content" style="padding-bottom:40px;">
					<div id="portfolio-wrapper">
						
						<?php
						$colors = array('#00274E', '#a33038', '#6391B5');
						$separators = array();
						$sepcount = 0;
						$sepindex = 0;
            $show = isset($_POST["show"]) && $_POST["show"] == 'dedication' ? 'dedication' : 'name';
            $search = isset($_POST["search"]) && $_POST["search"] != '' ? $_POST["search"] : null;
            $from = isset($_POST["from"]) && $_POST["from"] != '' ? date("F j, Y", strtotime($_POST["from"])) : null;
            $to = isset($_POST["to"]) && $_POST["to"] != '' ? date("F j, Y", strtotime($_POST["to"] . "+1 day")) : null;

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
              'post_type' => 'arcf_donors',
              'order_by' => 'id',
              'order' => 'DESC',
              'posts_per_page' => 50,
              'is_paged' => true,
              'paged' => $paged,
              'meta_query' => array(
                array(
                  'key' => 'type',
                  'value' => 'donor',
                  'compare' => '='
                )
              )
            );
            if (isset($_POST["from"]) || isset($_POST["show"])) {
              $args['posts_per_page'] = -1;
            }
            if (isset($from)) {
              $args['date_query'] = array(
                array(
                  'after' => $from,
                  'before' => $to
                ),
                'inclusive' => true,
              );
            }
            if (isset($show) && $show == 'name') {
              $args['s'] = $search;
            }
            if (isset($show) && $show == 'dedication') {
              $args['meta_query'] = array(
                array(
                  'key' => array('brick_message', 'block_message'), // this key will change!
                  'value' => $search,
                  'compare' => 'LIKE'
                ),
                array(
                  'key' => 'type',
                  'value' => 'donor',
                  'compare' => '='
                )
              );
            }

						$subquery = new WP_Query($args);

            $separators = array(
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/987_4120232.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/564_3765091.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/829_4027101.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/988_4172711.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/987_4120232.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/127_3764954.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/440_4241356resized.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/987_4120232.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/311_2996427.jpg',
              'http://vmuseum.s3.amazonaws.com/wp-content/uploads/445_4387134.jpg'
            );

            ?>
            <?php if ( $subquery->have_posts() ):
              while ( $subquery->have_posts() ): $subquery->the_post();
                $color = $colors[mt_rand(0,2)]; $sepcount++; ?>

              <?php if ($sepcount == 5): ?>
                <?php $sepindex++; ?>
                <?php if ($sepindex > 9) $sepindex = 0;?>

                <div id="post-290" class="<?php print $sepindex; ?> post-size-1x1 project type-project pic status-publish format-link hentry post-single has_thumb about about experiments experiments portfolio portfolio services services team team post" data-post-size="1x1">
                  <div class="inner-image-placeholder" id="post-290-in" style="background-image: url('<?php echo $separators[$sepindex]; ?>');">
                    <div class="image-link-inner"></div>
                  </div>
                </div>

                <?php $sepcount = 0; ?>
              <?php endif; ?>
              <div id="post" class=" post-size-<?php the_field('brick_size'); ?> project type-project status-publish format-standard hentry has_thumb portfolio portfolio post" data-post-size="<?php the_field('brick_size'); ?>" style="background-color:<?php echo $color; ?>">
                <div class="post-wrapper inner-image-placeholder">

                  <?php
                  $plogo = get_field('partner_logo');
                  if (isset($plogo) || !empty($plogo)) {
                    $image_url = $plogo;
                  }
                  ?>
                  <!-- Begin Title Section -->
                  <div class="image-link-inner">
                    <?php
                    echo '<p class="donor">';
                    echo the_title();
                    echo '</p>';
                    // If the posts are being returned as a result of a search of dedications, show the dedications as activated.
                    if ($show == 'dedication'):
                      if (get_field('brick_message') != '' ||  get_field('block_message') != ''):
                        echo '<div class="image-post-overlay" style="display: block;"><div class="image-post-overlay-in">';

                        if (get_field('brick_message')):
                          echo '<p>'. the_field('brick_message') .'</p>';
                        else:
                          echo '<p>'. the_field('block_message') .'</p>';
                        endif;

                        echo '</div></div>';
                      else:
                        // If the brick is not displayed show a logo if there is one.
                        if (isset($image_url) && !empty($image_url)):
                          echo '<div class="image-post-overlay image-post-overlay-image" style="display: block;">';
                          echo '<div class="image-post-overlay-in" style="background-image: url(' . $image_url . '); background-repeat: no-repeat;">';
                          echo '</div></div>';
                        endif;
                      endif;
                    endif;
                    ?>
                  </div>
                  <!-- Begin Dedication Section -->
                  <?php
                  if ($show == 'name'):
                    if (get_field('brick_message') != '' ||  get_field('block_message') != ''):
                      echo '<div class="image-post-overlay"><div class="image-post-overlay-in">';

                      if (get_field('brick_message')):
                        echo '<p>'. the_field('brick_message') .'</p>';
                      else:
                        echo '<p>'. the_field('block_message') .'</p>';
                      endif;

                      echo '</div></div>';
                    else:
                      if (isset($image_url) && !empty($image_url)):
                        echo '<div class="image-post-overlay image-post-overlay-image">';
                        echo '<div class="image-post-overlay-in" style="background-image: url(' . $image_url . '); background-repeat: no-repeat;">';
                        echo '</div></div>';
                      endif;
                    endif;
                  else:
                    echo the_title();
                  endif;
                  ?>
                </div>
              </div>
            <?php endwhile; ?>
            <?php else: ?>
              <div id="post" class="post-size-1x1 project type-project status-publish format-standard hentry has_thumb portfolio portfolio post isotope-item" data-post-size="1x1" style="position: absolute; left: 0px; top: 0px; transform: translate3d(536px, 0px, 0px); background-color: rgb(163, 48, 56);">
                <div class="post-wrapper inner-image-placeholder">
                  <!-- Begin Title Section -->
                  <div class="image-link-inner">
                    <p class="donor">Sorry, no donors were found.</p>
                  </div>
                  <!-- Begin Dedication Section -->
                </div>
              </div>
            <?php endif; ?>
          </div> <!-- portfolio-wrapper -->
          <div class="clearboth">
          </div>
        </div>
      </div>
      <div class="clear">
        <?php if (!isset($_POST['from']) || !isset($_POST['show'])): ?>
          <nav id="page_nav">
            <a href="/wall-of-donors/page/2"></a>
          </nav>
        <?php endif; ?>
      </div>
    </div>
	</div> <!-- wrapper -->


	<script>
		var getElementsByClassName=function(a,b,c){if(document.getElementsByClassName){getElementsByClassName=function(a,b,c){c=c||document;var d=c.getElementsByClassName(a),e=b?new RegExp("\\b"+b+"\\b","i"):null,f=[],g;for(var h=0,i=d.length;h<i;h+=1){g=d[h];if(!e||e.test(g.nodeName)){f.push(g)}}return f}}else if(document.evaluate){getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e="",f="http://www.w3.org/1999/xhtml",g=document.documentElement.namespaceURI===f?f:null,h=[],i,j;for(var k=0,l=d.length;k<l;k+=1){e+="[contains(concat(' ', @class, ' '), ' "+d[k]+" ')]"}try{i=document.evaluate(".//"+b+e,c,g,0,null)}catch(m){i=document.evaluate(".//"+b+e,c,null,0,null)}while(j=i.iterateNext()){h.push(j)}return h}}else{getElementsByClassName=function(a,b,c){b=b||"*";c=c||document;var d=a.split(" "),e=[],f=b==="*"&&c.all?c.all:c.getElementsByTagName(b),g,h=[],i;for(var j=0,k=d.length;j<k;j+=1){e.push(new RegExp("(^|\\s)"+d[j]+"(\\s|$)"))}for(var l=0,m=f.length;l<m;l+=1){g=f[l];i=false;for(var n=0,o=e.length;n<o;n+=1){i=e[n].test(g.className);if(!i){break}}if(i){h.push(g)}}return h}}return getElementsByClassName(a,b,c)},
			dropdowns = getElementsByClassName( 'dropdown-menu' );
		for ( i=0; i<dropdowns.length; i++ )
			dropdowns[i].onchange = function(){ if ( this.value != '' ) window.location.href = this.value; }
	</script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/isotope/jquery.isotope.min.js?ver=3.8.1'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/fitvids/jquery.fitvids.js?ver=3.8.1'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/retina/retina.js?ver=3.8.1'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/infinitescroll/jquery.infinitescroll.js?ver=3.8.1'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/isotope/jquery.isotope.perfectmasonry.js?ver=3.8.1'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/includes/easy-fancybox/fancybox/jquery.easing-1.3.pack.js?ver=1.3'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/includes/easy-fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js?ver=3.0.4'></script>
  <!-- Adds Google analytics -->
  <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/ga.js'></script>
<?php get_footer('donors'); ?>