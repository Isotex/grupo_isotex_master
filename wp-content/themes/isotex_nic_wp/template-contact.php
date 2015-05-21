<?php 
/* Template Name: Contact */ 
get_header();
wp_enqueue_script( 'gmap3' );
wp_enqueue_script( 'googleapis' );
$emailTo = $subjectcontact = $body = $headers = $contactEmail = $senderName = $senderEmail = $subject = $message = $coba = $errorText = $nameborderError = $emailborderError = $subjectborderError = $messageborderError = $nameborderTrue = $emailborderTrue = $subjectborderTrue = $messageborderTrue = $emailSent = $hide = $page_sidebar = $sidebar = $contact_style = $latitude = $longitude = $zoom = $mapHeight = '' ;

if(get_field( 'page_sidebar')){$page_sidebar = get_field( 'page_sidebar'); }
if(get_field( 'contact_latitude')){$latitude = get_field( 'contact_latitude'); }
if(get_field( 'contact_longitude')){$longitude = get_field( 'contact_longitude'); }
if(get_field( 'contact_zoom')){$zoom = get_field( 'contact_zoom'); }
if(get_field( 'contact_height')){$mapHeight = get_field( 'contact_height'); }

$mapHeight = str_replace(array( 'px', ' ' ), array( '', '' ), $mapHeight);

if($page_sidebar == 'default' || empty($page_sidebar)){$page_sidebar = rd_options('reedwan_page_sidebar'); }
if($page_sidebar == 'sidebar_none'){$sidebar='grid_12';$contact_style=' one';}
else{$sidebar='grid_9'; $contact_style=' second';}

if( get_field('contact_email') ): $contactEmail = get_field('contact_email');
else: $contactEmail = get_option('admin_email'); endif;

if(isset($_POST['submitted'])):
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	if(!preg_match($regex, trim($_POST['senderEmail']))){
		$errorText = __('Is incorrect your email address', 'corporative');
	}
	if(trim($_POST['senderName']) == '' || trim($_POST['senderEmail']) == '' || trim($_POST['subject']) == '' || trim($_POST['message']) == ''){
		$errorText = __('Please fill out all fields.', 'corporative');
	}
	// NAME
	if(trim($_POST['senderName']) == '') {$hasError = true; $nameborderError = ' fielderror';} 
	else {$senderName = trim($_POST['senderName']); $nameborderTrue = ' fieldtrue';}
	
	// EMAIL
	if(trim($_POST['senderEmail']) == '')  {$hasError = true; $emailborderError = ' fielderror';} 
	else if (!preg_match($regex, trim($_POST['senderEmail']))) { $hasError = true; $emailborderError = ' fielderror'; } 
	else { $senderEmail = trim($_POST['senderEmail']); $emailborderTrue = ' fieldtrue';}
	
	// SUBJECT
	if(trim($_POST['subject']) == '') { $hasError = true; $subjectborderError = ' fielderror'; } 
	else { $subject = trim($_POST['subject']); $subjectborderTrue = ' fieldtrue';}
	
	// MESSAGE
	if(trim($_POST['message']) === '') { $hasError = true; $messageborderError = ' fielderror'; } 
	else { 
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
		$messageborderTrue = ' fieldtrue';
	}

	// IF EVERYTHING IS OK
	if(!isset($hasError)):
		$emailTo = $contactEmail;
		$subjectcontact = '['.$subject.'] from '.$senderName;
		$body = "Name: $senderName \n\nEmail: $senderEmail \n\nMessage: $message";
		$headers = 'From: '.$senderName.' <'.$senderEmail.'>' . "\r\n" . 'Reply-To: ' . $senderEmail;
		mail($emailTo, $subjectcontact, $body, $headers);
		$emailSent = true;
	endif;
endif;
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contact_page<?php echo $contact_style; ?><?php if($page_sidebar == 'sidebar_left'){echo ' left-sidebar';}?>">
	<div id="map" data-latitude="<?php echo $latitude; ?>" data-longitude="<?php echo $longitude; ?>" data-zoom="<?php echo $zoom; ?>" data-height="<?php echo $mapHeight; ?>"></div><!-- map -->
	<div class="row clearfix">
		<div class="row_inner">
			<div id="post-<?php the_ID(); ?>" <?php post_class('pages pages_cont '.$sidebar); ?>>
				<div class="contact_section<?php echo $contact_style; ?>">
					<h3 class="element-title "> <?php the_title(); ?> </h3>
					<?php the_content(); ?>
					<?php if($emailSent == true):?>
							<div class="notification-box notification-box-success"><p><i class="fa-check"></i><?php _e('Thanks! Your email was successfully sent. We check Our email all the time.','corporative') ?></p></div>
							<?php $hide = ' hide'; ?>
					<?php endif; ?>
					<form method="post" class="contactForm<?php echo $hide; ?>" id="contactForm" action="<?php the_permalink(); ?>">
						<div class="clearfix">
							<div class="text-name">
								<input type="text" name="senderName" id="senderName" placeholder="<?php _e('Name', 'corporative') ?> *" class="requiredField<?php echo $nameborderError; ?><?php echo $nameborderTrue; ?>" value="<?php if(isset($_POST['senderName'])) echo $_POST['senderName'];?>"/>
							</div>
							<div class="text-email">
								<input type="text" name="senderEmail" id="senderEmail" placeholder="<?php _e('Email Address', 'corporative') ?> *" class="requiredField email<?php echo $emailborderError; ?><?php echo $emailborderTrue; ?>" value="<?php if(isset($_POST['senderEmail'])) echo $_POST['senderEmail'];?>"/>
							</div>
						</div>
						<div class="text-subject clearfix">
							<input type="text" name="subject" id="subject" placeholder="<?php _e('Subject', 'corporative') ?> *" class="requiredField<?php echo $subjectborderError; ?><?php echo $subjectborderTrue; ?>" value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>" />
						</div>
						<div class="text-message clearfix">
							<textarea name="message" id="message" placeholder="<?php _e('Message', 'corporative') ?> *" class="requiredField<?php echo $messageborderError; ?><?php echo $messageborderTrue; ?>" rows="6"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
						</div>
						
						<input type="hidden" name="submitted" id="submitted" value="true" />
						<button type="submit" id="sendMessage" name="sendMessage"><?php _e('Send Message', 'corporative') ?></button>
						<?php if(isset($errorText) && $errorText != ''): ?>
							<span class="error-info"> <?php echo $errorText; ?></span>
						<?php endif; ?>
					</form><!-- end form -->
				</div>
			</div>
			<?php if($page_sidebar != 'sidebar_none'): ?>
			<div class="sidebar grid_3">
				<?php get_sidebar();?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div><!-- end contact -->
<?php endwhile; wp_reset_postdata(); endif; ?>
<?php get_footer(); ?>
