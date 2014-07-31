<footer>
	<div class="container-full">
		<div class="section row nomargin">
			<div class="col three tablet-full mobile-full">
				<!-- Logo -->
				<img src="<?php bloginfo('template_url'); ?>/images/logo.png" />
				<!-- End Logo -->
			</div>

			<!-- Ghost Column -->
			<div class="col three tablet-full mobile-full"></div>
			<!-- End Ghost Column -->

			<div class="col six tablet-full mobile-full">
				<nav role="navigation" class="menu">
            			<ul>
            				<li><a href="" class="scroll">Home</a></li>
            				<li><a href="gallery/oxygen/" class="scroll">Virtual Museum</a></li>
            				<li><a href="" class="scroll">Wall of Donors</a></li>
            				<li><a href="contact/" class="scroll">Contact</a></li>
           			</ul>
				</nav>
			</div>
		</div>
	</div>
</footer>

<!-- GA Code -->

<script src="<?php bloginfo('template_url'); ?>/js/jquery.iosslider.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.inview.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<!-- Adds Google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53365601-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>

</body>
</html>