<footer class="content-info" role="contentinfo">
    <div class="col-lg-12">
    	<div class="row uw">
	    	<div class="col-xs-12 col-sm-6 col-md-6 ">
	    		<a href="http://www.wisc.edu"><img src="/assets/img/uw-madison_2x.png" alt="University of Wisconsin-Madison" class="img-responsive" border="0" style="border: 0px solid ##b41f24"></a>
	    	</div>
		  </div>
		<div class="row copyright">
          <?php
            if (has_nav_menu('footer_navigation')): 
              wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'footer-nav'));
            endif;
          ?>
      		<p>&copy; <?php echo date('Y'); ?> Board of Regents of the <a href="http://www.wisconsin.edu">University of Wisconsin System</a></p>
        </div>
      </div>
</footer>

<?php wp_footer(); ?>