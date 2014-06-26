jQuery(document).ready(function(){
	
	////////////////
	//TIMELINE VARS
	////////////////
	var bodyEl = jQuery('body'),
		loadingContainer = jQuery('#loadingContainer'),
		mainWrapper = jQuery('#wrapper'),
		wrapper = jQuery("#timelineWrapper"),
		timeline = jQuery("#timeline"),
		//REFERENCE
		reference = jQuery("#reference"),
		referenceWrapper = jQuery('#referenceWrapper'),
		//MARKER
		marker = jQuery("#marker"),
		markerInfo = jQuery("#markerInfo"),
		markerWidth = marker.outerWidth(),
		markerHalfWidth = markerWidth/2,
		//MISC
		hoverInfo = jQuery('#hoverInfo'),
		progress = jQuery("#progress"),
		eventA = jQuery('.event > a'),
		//iPad,iPhone,iPod
		deviceAgent = navigator.userAgent.toLowerCase(),
		iPadiPhone = deviceAgent.match(/(iphone|ipod|ipad)/),
		//INFO
		widgetsWrapper = jQuery('#widgetsWrapper'),
		widgets = jQuery('#widgets'),
		widget = jQuery('.widget'),
		//SCROLLING CONTENT
		mainContent = jQuery('#mainWrapper'),
		//ATTACHMENT GALLERY
		gallery = jQuery('ul.attachmentGallery'),
		gallerySlides = jQuery('ul.attachmentGallery li'),
		firstGallerySlide = jQuery('ul.attachmentGallery li:first-child'),
		//CHROME
		chromeBrowser = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase());

	//////////////////		
	//SHOW OVERFLOW TEXT
	//////////////////		
	var restEffect = '';
	jQuery('.eventDetails h2').stop(true,true).hover(function(){
		var showThis = jQuery(this),
			thisScrollWidth = showThis[0].scrollWidth,
			parentWidth = showThis.parent().width();
		
		if(thisScrollWidth > parentWidth) {		
			function overflowScroll(){
				showThis.stop(true,true).css({textIndent:"0"});
				var spaceNeeded = (thisScrollWidth - parentWidth + 40),
					scrollSpeed = (spaceNeeded * 25);
				showThis.stop(true,true).delay(1000).animate({textIndent:"-"+spaceNeeded+"px"},scrollSpeed,function(){
					restEffect = setTimeout(overflowScroll, 1500);
				});
			}
			overflowScroll();
		}
	},function(){
		jQuery(this).stop(true,true).css({textIndent:"0"});
		clearTimeout(restEffect);
	});
		
	////////////////
	//TOUCH GESTURES
	////////////////	
	wrapper.touchwipe({
   		 wipeLeft: function() {jQuery("#rightSmall").click();},
   		 wipeRight: function() {jQuery('#leftSmall').click();},
   		 min_move_x: 20,
   		 min_move_y: 20,
   		 preventDefaultEvents: false
	});
		
	////////////////
	//MENU STUFF
	////////////////
	jQuery("#selectMenu").change(function() {
  		window.location = jQuery(this).find("option:selected").val();
	});
	jQuery("#dropmenu ul").parent().children("a").append("<span>&nbsp;&nbsp;+</span>");
	
	////////////////
	//ATTACHMENT GALLERY STUFF
	////////////////
	if(gallerySlides.length > 1){
		gallerySlides.css({cursor:"pointer"}).live('click',function(){
			var active = jQuery(this);
			//IF THERE'S A NEXT SLIDE
			if(active.next('li').length > 0){
				active.removeClass('activeSlide').hide().next('li').addClass('activeSlide').stop(true,true).fadeIn(150);
			//IF ON LAST SLIDE
			} else {
				active.removeClass('activeSlide').hide();
				firstGallerySlide.addClass('activeSlide').stop(true,true).fadeIn(150);
			}
			
			//GALLERY NAV STUFF -- i.e. little numbers
			var activeIndex = jQuery('.activeSlide').index();
			jQuery('.activeNav').removeClass('activeNav');
			jQuery('#galleryNav a').eq(activeIndex).addClass('activeNav');
			
			//SLIDE UP
			mainContent.stop(true,true).animate({scrollTop:0}, 200);
			return false;
		});
		
		//GALLERY NAV STUFF -- i.e. little numbers
		gallery.append("<div id='galleryNav'></div>");
		gallerySlides.each(function(){
			var i = jQuery(this).index() + 1;
			//ADD NUMBERS
			jQuery('#galleryNav').append("<a href='#'>"+i+"</a>");
		});
		//ADD ACTIVE CLASS TO FIRST NUMBER
		jQuery('#galleryNav a:first-child').addClass('activeNav');
	}
	
	////////////////
	//GALLERY NAV CLICK -- i.e. little numbers
	////////////////
	jQuery('#galleryNav a').live('click',function(){
		var slide = jQuery(this),
			slideIndex = slide.index();
		
		jQuery('.activeNav').removeClass('activeNav');	
		slide.addClass('activeNav');
		gallerySlides.removeClass('activeSlide').hide().eq(slideIndex).addClass('activeSlide').fadeIn(150);
		
		//SLIDE UP
		mainContent.stop(true,true).animate({scrollTop:0}, 200);
		return false;
	})
	
	////////////////
	//LOADING ANIMATION
	////////////////
	if(!chromeBrowser){
		loadingContainer.activity({segments: 12, width:5.5, space: 6, length: 13, color: '#aaa'});
	}
	
	////////////////
	//MASONRY FUNCTION
	////////////////
	function theMasonry(){
		widgets.masonry({
	   		itemSelector : '.widget',
    		columnWidth : 260,
    		gutterWidth: 40,
    		isAnimated: true
  		});
	}
	
	function mainMasonry(){
		jQuery('.listing').masonry({
	   		itemSelector : '.post',
    		//columnWidth : 600,
    		gutterWidth: 15,
    		isAnimated: true
  		});
	}
			
	////////////////	
	//MORE BTN OPEN
	////////////////
	jQuery('.openMe').live('click',function(){
		jQuery(this).toggleClass('openMe closeMe');
		widgetsWrapper.stop(true,true).animate({bottom:"0%"},1000);
		mainWrapper.stop(true,true).animate({top:"100%"},1000);
		theMasonry();
	});
	
	////////////////
	//MORE BTN CLOSE
	////////////////
	jQuery('.closeMe').live('click',function(){			
		jQuery(this).toggleClass('openMe closeMe');
		widgetsWrapper.stop(true,true).animate({bottom:"100%"},1000);
		mainWrapper.stop(true,true).animate({top:"0%"},1000);
	});
	
	////////////////
	//CURRENT DIVIDER FUNCTION
	////////////////
	function currentDivider(){
		var referenceDivider = jQuery('.referenceDivider'),
			markerLefPos = marker.position().left,
			timelineWidth = timeline.outerWidth(),
			referenceWidth = reference.outerWidth(),
			extraSpace = (120 / timelineWidth) * referenceWidth;
			
		referenceDivider.each(function(){
		 	if(jQuery(this).position().left <= markerLefPos + extraSpace){
		 		jQuery(this).addClass('past');
		 	}else{
		 		jQuery(this).removeClass('past');
		 	}
		 });
		 
		 if(markerLefPos == 0){
		 	var currentDivider = referenceDivider.first().html();
		 	currentDivider = currentDivider.replace("<br>", " ");
		 	markerInfo.html(currentDivider);
		 } else {
		 	var currentDivider = jQuery('.past').last().html();
		 	currentDivider = currentDivider.replace("<br>", " ");
		 	markerInfo.html(currentDivider);
		 }
	}
			
	////////////////		
	//PRETTYPHOTO
	////////////////
	jQuery("body.single .entry a[href$='jpg'],body.single .entry a[href$='png'],body.single .entry a[href$='gif'],body.page .entry a[href$='jpg'],body.page .entry a[href$='png'],body.page .entry a[href$='gif']").attr({rel: "prettyPhoto[gallery]"});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		overlay_gallery: false,
		social_tools: '',
		deeplinking: false,
		default_width: 500,
		horizontal_padding: 0,
		opacity:".5",
		keyboard_shortcuts: false,
		show_title: false,
    markup: '<div class="pp_pic_holder"> \
            <div class="ppt">&nbsp;</div> \
              <div class="pp_top"> \
                <div class="pp_left"></div> \
                <div class="pp_middle"></div> \
                <div class="pp_right"></div> \
              </div> \
              <div class="pp_content_container"> \
                <div class="pp_left"> \
                  <div class="pp_right"> \
                    <div class="pp_content"> \
                      <div class="pp_loaderIcon"></div> \
                      <div class="pp_fade"> \
                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                        <div class="pp_hoverContainer"></div> \
                        <div id="pp_full_res"></div> \
                        <div class="pp_details"> \
                          <div class="pp_nav"> \
                          <a href="#" class="pp_arrow_previous">Previous</a> \
                          <p class="currentTextHolder">0/0</p> \
                          <a href="#" class="pp_arrow_next">Next</a> \
                        </div> \
                        <p class="pp_description"></p> \
                        <div class="pp_social">{pp_social}</div> \
                        <a class="pp_close" href="#">Close</a> \
                      </div> \
                    </div> \
                  </div> \
                </div> \
              </div> \
            </div> \
            <div class="pp_bottom"> \
            <div class="pp_left"></div> \
            <div class="pp_middle"></div> \
            <div class="pp_right"></div> \
          </div> \
        </div> \
      <div class="pp_overlay"></div>'
	});
	
	////////////////
	//TITLE CLICK
	////////////////
  jQuery('.eventDetails h2.has-image').toggle(function(){
    jQuery(this).parent().stop(true,true).animate({top:"0"},300);
    jQuery(this).removeClass('closed');
    jQuery(this).addClass('open');
  },function(){
    jQuery(this).parent().stop(true,true).animate({top:"350px"},300);
    jQuery(this).removeClass('open');
    jQuery(this).addClass('closed');
  });

	////////////////
	//LEFT CLICK FUNCTION
	////////////////
	function leftClick(){
	var animateSpeed = 1000,
		timelineWidth = timeline.outerWidth(),
		referenceWidth = reference.outerWidth(),
		wrapperWidth = wrapper.outerWidth(),
		dragLeft = marker.position().left - ((((wrapperWidth / timelineWidth) * referenceWidth)/2)/1.25),
		percentLeft = dragLeft / referenceWidth, 	
		timeLeft = percentLeft * timelineWidth,
		leftPos = timelineWidth - 300,
		markerOffset = referenceWidth - markerWidth; //KEEPS MARKER FROM EXTENDING ITS WIDTH OUT RIGHT SIDE
			
		if(dragLeft <= 0){var dragLeft = 0, timeLeft = 0}
		if(marker.position().left == 0){var dragLeft = markerOffset, timeLeft = leftPos, animateSpeed = animateSpeed * 3.5}
					
		timeline.stop().animate({left:"-"+timeLeft+"px"},animateSpeed);
		marker.stop().animate({left:dragLeft+"px"},animateSpeed);
		progress.stop().animate({width:dragLeft+"px"},animateSpeed,function(){
			currentDivider();
		});
		
		//BACKGROUND STUFF
		var backDrag = timeLeft * .25;
		bodyEl.stop().animate({backgroundPosition:'-'+backDrag+'px 0px'},animateSpeed);
	}
	
	////////////////
	//LEFT CLICK
	////////////////
	jQuery("#left,#leftSmall").click(function(){ leftClick(); });
	
	////////////////
	//RIGHT CLICK FUNCTION
	////////////////
	function rightClick(){
		var animateSpeed = 1000,
			timelineWidth = timeline.outerWidth(),
			leftPos = timelineWidth - 300,
			timelineWidth = timeline.outerWidth(),
			wrapperWidth = wrapper.outerWidth(),
			referenceWidth = reference.outerWidth(),
			dragLeft = marker.position().left + ((((wrapperWidth / timelineWidth) * referenceWidth)/2)/1.25),
			percentLeft = dragLeft / referenceWidth, 	
			timeLeft = percentLeft * timelineWidth,
			markerOffset = referenceWidth - markerWidth; //KEEPS MARKER FROM EXTENDING ITS WIDTH OUT RIGHT SIDE
			
		if(dragLeft >= markerOffset){var dragLeft = markerOffset, timeLeft = leftPos}
		if(marker.position().left == markerOffset){var dragLeft = 0, timeLeft = 0, animateSpeed = animateSpeed * 3.5}
					
		timeline.stop().animate({left:"-"+timeLeft+"px"},animateSpeed);
		marker.stop().animate({left:dragLeft+"px"},animateSpeed);
		progress.stop().animate({width:dragLeft+"px"},animateSpeed,function(){
			currentDivider();
		});
		
		//BACKGROUND STUFF
		var backDrag = timeLeft * .25;
		bodyEl.stop().animate({backgroundPosition:'-'+backDrag+'px 0px'},animateSpeed);
	}

	////////////////
	//RIGHT CLICK
	////////////////
	jQuery("#right,#rightSmall").click(function(){ rightClick(); });

	////////////////
	//KEYS PRESS
	////////////////
	jQuery(document).keydown(function(e){
		//LEFT KEY
		if (e.keyCode == 37) {leftClick();}
		//RIGHT KEY
		if (e.keyCode == 39) {rightClick();}
	});
	
	////////////////
	//MARKER DRAGGING STUFF
	////////////////
	marker.draggable({ 
		axis: "x",
		containment: "parent",
		drag: function() { 
			var dragLeft = jQuery(this).position().left,
				referenceWidth = reference.outerWidth(),
				percentLeft = dragLeft / referenceWidth, 	
				timelineWidth = timeline.outerWidth(),
				timeLeft = percentLeft * timelineWidth,
				backDrag = timeLeft * .25;
				
			 timeline.css({left:"-"+timeLeft+"px"});
			 progress.css({width:dragLeft+"px"});
			
			//RUN FUNC
			currentDivider();
			
			//HIDE HOVER INFO
			hoverInfo.css({visibility:"hidden"});
			
			//BACKGROUND POSITION
			bodyEl.css({backgroundPosition:'-'+backDrag+'px 0px'});
		},
		//RUN THE DRAG STUFF AGAIN JUST IN CASE...
		stop: function(){	
		
			//SHOW HOVER INFO		
			hoverInfo.css({visibility:"visible"});
			
			var dragLeft = jQuery(this).position().left,
				referenceWidth = reference.outerWidth(),
				percentLeft = dragLeft / referenceWidth, 	
				timelineWidth = timeline.outerWidth(),
				timeLeft = percentLeft * timelineWidth,
				backDrag = timeLeft * .25;
				
			 timeline.css({left:"-"+timeLeft+"px"});
			 progress.css({width:dragLeft+"px"});
			
			//RUN FUNC
			currentDivider();
			
			//BACKGROUND POSITION
			bodyEl.css({backgroundPosition:'-'+backDrag+'px 0px'});
		}
	}).hover(function(){
		hoverInfo.css({visibility:"hidden"});
	},function(){
		hoverInfo.css({visibility:"visible"});
	});
	
	////////////////
	//REFERENCE CLICK
	////////////////
	jQuery('.referenceDivider').live("click",function(){
		var leftRef = jQuery(this).position().left,
			referenceWidth = reference.outerWidth(),
			leftPercent = leftRef / referenceWidth,
			timelineWidth = timeline.outerWidth(),
			timeLeft = (leftPercent * timelineWidth) - 120,
			markerOffset = leftRef - markerHalfWidth;
					
		if(timeLeft < 0){ var timeLeft = 0, markerOffset = 0}
			
		timeline.stop().animate({left:"-"+timeLeft+"px"},600);
		marker.stop().animate({left:markerOffset+"px"},600);
		progress.stop().animate({width:markerOffset+"px"},600,function(){
			currentDivider();
		});
		
		//BACKGROUND STUFF
		var backDrag = timeLeft * .25;
		bodyEl.stop().animate({backgroundPosition:'-'+backDrag+'px 0px'},600);
	});
	
	////////////////
	//TIMELINE CLICK
	////////////////
	reference.live('click',function(e) {
        var posX = jQuery(this).offset().left,
        	leftTimeRef = (e.pageX - posX),
        	referenceWidth = reference.outerWidth(),
        	leftTimePercent = leftTimeRef / referenceWidth,
			timelineWidth = timeline.outerWidth(),
			timeTimeLeft = (leftTimePercent * timelineWidth) - 120,
			markerTimeOffset = leftTimeRef - markerHalfWidth;
		
		if(leftTimeRef < markerWidth){var timeTimeLeft = 0, markerTimeOffset = 0}	
		if(timeTimeLeft < 0){ var timeTimeLeft = 0, markerTimeOffset = 0}
			
		timeline.stop().animate({left:"-"+timeTimeLeft+"px"},600);
		marker.stop().animate({left:markerTimeOffset+"px"},600);
		progress.stop().animate({width:markerTimeOffset+"px"},600,function(){
			currentDivider();
		});	
		
		//BACKGROUND STUFF
		var backDrag = timeTimeLeft * .25;
		bodyEl.stop().animate({backgroundPosition:'-'+backDrag+'px 0px'},600);	
   	});
   	
   	////////////////
   	//TIMELINE HOVER
   	////////////////
   	reference.hover(function(){
   		hoverInfo.css({opacity:"1"});
   	},function(){
   		hoverInfo.css({opacity:"0"});
   	});
   	
	reference.live("mousemove",function(e) {
        var posX = jQuery(this).offset().left,
        	leftTimeRef = (e.pageX - posX),
        	referenceDivider = jQuery('.referenceDivider'),
        	firstRefDiv = referenceDivider.first().offset().left;
        			
		referenceDivider.each(function(){
		 	if(jQuery(this).position().left <= leftTimeRef){
		 		jQuery(this).addClass('hoverPast');
		 	}else{
		 		jQuery(this).removeClass('hoverPast');
		 	}
		 });
		 
		 var currentDivider = jQuery('.hoverPast').last().text();
		 
		 if(currentDivider == ""){var currentDivider = "START"}
		 
		 hoverInfo.css({left:leftTimeRef+"px"}).text(currentDivider);			
   	});
   	
   	
   	jQuery("#navigation a").live('click',function(event){
   		event.preventDefault();
	    var href = this.href;

   		loadingContainer.fadeIn(150,function(){
   			window.location = href;
   		});
   	});
   	
   	////////////////
   	//CRUMBS FUNCTION
   	////////////////
	function showCrumbs(){
		jQuery("#crumbs span").delay(500).each(function() {
			var delayAmount = jQuery(this).index() * 150;
    		jQuery(this).delay(delayAmount).animate({top:"0px"},500);
		});
	}
	
	
	mainContent.scroll(function(){
		var scrollPosition = jQuery(this).scrollTop() * .25;
		//BACKGROUND STUFF
		bodyEl.stop().css({backgroundPosition:'0px -'+scrollPosition+'px'});
	});   	
	
	////////////////
	//WHEN PAGE FINISHED LOADING
	////////////////
	jQuery(window).load(function(){
	
		//SHOW CRUMBS
		showCrumbs();
		
		//SHOW FIRST GALLERY SLIDE
		firstGallerySlide.delay(500).slideDown(1500,function(){
			jQuery('#galleryNav').slideDown(800);
		});
		
		jQuery("#controls").stop(true,true).fadeIn(600);
		
		//TOP AREA SPACING STUFF
		var headerHeight = jQuery("#header").height();
				
		jQuery('#mainWrapper').css({top:headerHeight+"px"});
		
		//SET WIDGETS POSITION	
		widgetsWrapper.css({top:headerHeight+"px"});
	
		//LOADING CONTAINER
		loadingContainer.fadeOut(600,function(){
			
			//divider DUPLICATE
			if(jQuery('.divider').length != 0){
			jQuery('.divider').each(function(){
				var leftDist = jQuery(this).position().left,
					timeWidth = timeline.width(),
					leftPercent = (leftDist / timeWidth)*100;
		
				jQuery(this).clone().toggleClass('divider referenceDivider').appendTo(referenceWrapper).css({left:leftPercent+"%"}).stop(true,true).fadeIn(600);
				
				//MAKE SIDEBAR CONTROLS ACTIVE
				jQuery('.sidebar').show();
			
				currentDivider();
			});
			}else{
				markerInfo.add(hoverInfo).remove();
				
				//MAKE SIDEBAR CONTROLS ACTIVE
				jQuery('.sidebar').show();
			}			
		});
		
		//RUN MASONRY
		mainMasonry();
		
	});
	
	////////////////
	//WINDOW RESIZE ACTION
	////////////////
	jQuery(window).resize(function(){
		jQuery('.referenceDivider').first().click();
	});
	
});