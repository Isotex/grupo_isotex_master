			<?php 
				$showFooterNavigation = rd_options('reedwan_show_footer_nav');
				$credits = rd_options('reedwan_credits_footer');
				$widgetFooter = rd_options('reedwan_footer_widget');
				$footerVersion = rd_options('reedwan_footer_version');
			?>
			<footer id="footer" class="dark">
					<?php if($widgetFooter=='footer-1'):?>
						<?php get_template_part( 'includes/footer-1' ); ?>
					<?php elseif($widgetFooter=='footer-2'):?>
						<?php get_template_part( 'includes/footer-2' ); ?>
					<?php elseif($widgetFooter=='footer-3'):?>
						<?php get_template_part( 'includes/footer-3' ); ?>
					<?php else:?>
						<?php get_template_part( 'includes/footer-4' ); ?>
					<?php endif;?>
				<?php if($credits || $showFooterNavigation==1):?>
				<div class="footer-last">
					<div class="row clearfix">
						<?php if($credits):?>
							<span class="copyright"><?php echo stripslashes($credits); ?></span>
						<?php endif;?>
						<div id="toTop" class="toptip" title="<?php _e('Back to Top','corporative'); ?>"><i class="fa-angle-up"></i></div><!-- Back to top -->

						<div class="foot-menu">
							<?php if($showFooterNavigation==1):?>
								<?php 
								if ( has_nav_menu( 'footer_menu' ) ) :
									wp_nav_menu( array( 'container' =>false, 'depth' => 1,'theme_location' => 'footer_menu', 'menu_id' => 'bottomNav' ) ); 
								else:
									echo '<span>' . __( 'Define your site bottom menu', 'corporative' ) . '</span>';
								endif;
								?>
							<?php endif; ?>
						</div><!-- end foot menu -->
					</div><!-- end row -->
				</div><!-- end last footer -->
				<?php endif;?>
			</footer><!-- end footer -->

		</div><!-- end layout -->
	</div><!-- end frame -->
	<?php wp_footer(); ?>
</body>
</html>