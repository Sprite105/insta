<?php 

	$root = get_template_directory_uri(); 
	$translations = pll_the_languages(array('raw'=>1));

	if( $translations['ru']['current_lang'] == true ) {
		$current_name = $translations['ru']['name'];
		$other_name = $translations['en']['name'];
		$current_slug = $translations['ru']['slug'];
		$other_slug = $translations['en']['slug'];
		$theID = 113;
	} else {
		$other_name = $translations['ru']['name'];
		$current_name = $translations['en']['name'];
		$current_slug = $translations['en']['slug'];
		$other_slug = $translations['ru']['slug'];
		$theID = 110;
	}

?>
<?php if( get_field( 'if_footer', $theID ) == "on" ) { ?>
	<footer>
        <div class="container">
                <div class="social">
					<h1>Social</h1>
					<?php $socials = get_field( 'social', $theID ); ?>
					<?php $class = array(
						'1' => 'vkontakte',
						'2' => 'facebook',
						'3' => 'twitter'
					); ?>
					<?php foreach ($socials as $social) { $i++;
						echo "<a class='{$class[$i]}' href='{$social[link]}'>{$social[name]}</a>";
					} ?>
				</div>
	        <p class="logo"><?php pDel( get_field( 'f_text', $theID ) ); ?></p>
	        <p class="copyright"><?php the_field( 'copyright', $theID ); ?></p>
        </div>
    </footer>
<?php } ?>
	<script src="<?php echo $root . "/"; ?>js/mobile/changeFixedHeader.js"></script>
</body>
</html>