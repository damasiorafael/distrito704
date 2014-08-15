<div class="clear"></div>
<div class="f-padder"></div>

	 
	 
	  
	 <?php
	$disable_fet = get_option(SHORT_NAME . 'disable_foti');
	if (! $disable_fet) {
?>  
	<div class="container_12">
	<div id="footer">
<?php 	
if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar("Footer-Widgets") ) : ?>

<div class="footer-kuch">

<div class="woodo">
Now add some widgets!
</div></div>





<?php endif; ?>             	
							
</div></div><?php
	}
?> <div class="container_12">
<div class="ffooterf">
<div class="ffooterfbb"></div>
                  <div class="footer-text-container"><div class="footer-text"><?php $ftrcrt= get_option(SHORT_NAME . 'ftrcrt'); echo $ftrcrt; ?></div></div>
				  
				  
				  
<?php

//                                               IMPORTANT NOTICE

// The links in the footer must remain intact. Those links are my own websites, they are not third party sites
// You can buy the link free version of this theme by cotacting me
// Keeping WebHostingYes.com and MoonThemes.com links at the bottom of the Theme is compulsory in order to use this Premium Wordpress Theme for Free: 
// By violating linking rules you fully be aware of committing Copyright violation, and are in breach of contract. 
// and unquestionably legal action will be taken against. We have tracking system, so we can catch who removes our links 

?>
<?php /*                                         DO NOT REMOVE MY LINKS                                         DO NOT REMOVE MY LINKS                                  */ ?>                                   		  
<div class="footer-rigths">Designed by: <a href="http://www.webhostingyes.com">Web Hosting Yes</a> and <a href="http://www.moonthemes.com">Premium Wordpress Themes</a></div>
				
				
				 </div></div></div> <!-- end: footer -->
               
 </div><!-- end: main -->

</div><!-- end: container_12 -->

<?php wp_footer(); ?>


<script type="text/javascript">Cufon.now();</script>
</body>
</html>