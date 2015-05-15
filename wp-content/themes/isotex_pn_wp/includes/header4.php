<header id="header" class="header1 header4">

	<div class="head">

		<div class="row clearfix">

			<div class="row_inner">

				<div class="grid_12">

					<div class="logo">

						<?php if(rd_options_array('reedwan_logo','url')) {$logo = rd_options_array('reedwan_logo','url');}else{$logo = get_template_directory_uri() . '/images/logo.png';}?>

						<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo?>" alt="<?php bloginfo('name'); ?>"></a>

						<?php if(get_bloginfo( 'description' )!=''):?>

						<h2 class="site_description"><?php echo  get_bloginfo( 'description' ); ?></h2><!-- end description -->

						<?php endif; ?>

					</div><!-- end logo -->

					

					<?php if(rd_options('reedwan_search_header')==1):?>

					<div class="search">

						<?php get_search_form(); ?>
						<div id="traslate">&nbsp;
							<?php //echo do_shortcode('[tp widget="subswidget"]');?>
							
					</div><!-- end search -->
					<div id="flag">
								<img title="Venezuela" alt="Venezuela" src="http://www.grupoisotex.aompresentaciones.com.ve/wp-content/uploads/2014/12/venezuela-bandera-80x40.jpg">
								<img title="Panamá" alt="Panama" src="http://www.grupoisotex.aompresentaciones.com.ve/wp-content/uploads/2014/12/Bandera_de_Panama-80x40.png">
								<img title="Curacao" alt="curacao" src="http://www.grupoisotex.aompresentaciones.com.ve/wp-content/uploads/2014/12/curacao_bandera-80x40.png">
								<img title="Rep. Dominicana" alt="Rep. Dominicana" src="http://www.grupoisotex.aompresentaciones.com.ve/wp-content/uploads/2014/12/500px-Bandera_de_Republica_Dominicana-80x40.png">
								<img title="Nicaragua" alt="nicaragua" src="http://www.grupoisotex.aompresentaciones.com.ve/wp-content/uploads/2015/03/Bandera_de_nicaragua_80x40-80x40.png">
							</div>

					<?php endif; ?>

				</div>

			</div><!-- row inner -->

		</div><!-- row -->

	</div><!-- head -->

	

	<?php

		$sticky='';

		if(rd_options('reedwan_sticky_header')==1){

			$sticky=' my_sticky';

		}

		else{$sticky='';}

	?>

	<div class="headdown<?php echo $sticky; ?>">

		<div class="row clearfix">

			<div class="row_inner">

				<div class="grid_12">

					<?php if(rd_options('reedwan_show_top_header')==1 ):?>

						<?php get_template_part('includes/social-header');?>

					<?php endif; ?>

					<?php get_template_part('includes/menu-header');?>

				</div>

			</div><!-- row inner -->

		</div><!-- row -->

	</div><!-- headdown -->

</header><!-- end header -->

	

