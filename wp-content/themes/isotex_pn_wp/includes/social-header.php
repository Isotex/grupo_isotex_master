<?php
$toltip = $email = '';
/*if(rd_options('reedwan_header_style')=='header1'){$toltip = 'toptip';}
else {}*/
$toltip = 'bottomtip';

?>
<?php if(rd_options('reedwan_top_social')==1):?>
<div class="social social-head">
	<?php if(rd_options('reedwan_twitter')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_twitter'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Twitter"><i class="icons-social-twitter"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_facebook')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_facebook'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Facebook"><i class="icons-social-facebook"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_dribbble')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_dribbble'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Dribbble"><i class="icons-social-dribbble"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_rss')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_rss'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="rss feed"><i class="icons-rss"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_github')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_github'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Github"><i class="icons-social-github"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_linkedin')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_linkedin'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Linkedin"><i class="icons-social-linkedin"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_pinterest')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_pinterest'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Pinterest"><i class="icons-social-pinterest"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_google')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_google'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Google plus"><i class="icons-social-google-plus"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_skype')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_skype'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Skype"><i class="icons-social-skype"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_soundcloud')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_soundcloud'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="soundcloud"><i class="icons-social-soundcloud"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_youtube')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_youtube'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Youtube"><i class="icons-social-youtube"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_tumblr')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_tumblr'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Tumblr"><i class="icons-social-tumblr"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_flickr')!=''):?>
		<a target="_blank" href="<?php echo rd_options('reedwan_flickr'); ?>" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Flickr"><i class="icons-social-flickr"></i></a>
	<?php endif; ?>
	
	<?php if(rd_options('reedwan_email')!=''):?>
		<a href="mailto:<?php echo rd_options('reedwan_email'); ?>" target="_top" class="<?php echo $toltip; ?> animated" data-gen="expandOpen" title="Email"><i class="icons-mail"></i></a>
	<?php endif; ?>
	
</div><!-- end social -->
<?php endif; ?>