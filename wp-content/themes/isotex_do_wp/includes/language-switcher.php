<?php if( rd_options('reedwan_language_switcher')==1 AND function_exists('icl_get_languages'))
{
	$languages = icl_get_languages('skip_missing=0');
	if(1 < count($languages)){
?>
	<div class="top-lang layout_dropdown show_onclick has_title">
		<div class="top-lang-h">
			<div class="top-lang-list">
				<?php foreach ($languages as $language) {
					if ($language['active'])
					{
						$current_language = $language;
						continue;
					}
				?>
				<a class="top-lang-item lang_<?php echo $language['language_code'] ?>" href="<?php echo $language['url'] ?>">
					<span class="top-lang-item-icon"></span>
					<span class="top-lang-item-title"><?php echo ($language['native_name']) ?></span>
				</a>
				<?php } ?>
			</div>
			<div class="top-lang-current">
			<span class="top-lang-item">
				<span class="top-lang-item-icon"></span>
				<span class="top-lang-item-title"><?php echo ($current_language['native_name']) ?></span>
			</span>
			</div>
		</div>
	</div>
<?php 
	}
}