<?php 

	$root = get_template_directory_uri(); 
	$translations = pll_the_languages(array('raw'=>1));

	if( $translations['ru']['current_lang'] == true ) {
		$current_name = $translations['ru']['name'];
		$other_name = $translations['en']['name'];
		$current_slug = $translations['ru']['slug'];
		$other_slug = $translations['en']['slug'];
		$theID = 18;
	} else {
		$other_name = $translations['ru']['name'];
		$current_name = $translations['en']['name'];
		$current_slug = $translations['en']['slug'];
		$other_slug = $translations['ru']['slug'];
		$theID = 20;
	}

?>
<?php if( get_field( 'if_footer', $theID ) == "on" ) { ?>
	<footer>
		<div class="container">
			<div class="wrapper-row">
				<div class="keywords-container">
					<h3>Keywords</h3>
					<?php $keywords = get_field( 'keywords', $theID ); ?>
					<?php foreach ($keywords as $key) {
						echo "<p class='keywords'>{$key[key]}</p>";
					} ?>
				</div>
				<div class="links">
					<h3>Links</h3>
					<?php $links = get_field( 'links', $theID ); ?>
					<?php foreach ($links as $link) {
						echo "<a href='{$link[link]}'>{$link[name]}</a>";
					} ?>
				</div>
				<div class="social">
					<h3>Social</h3>
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
			</div>
			<div class="wrapper-row">
				<div class="container-language-rights">
					<p class="logo"><?php the_field( 'copyright', $theID ); ?></p>
					<div class="container-language-item">
					<!-- В зависимости от страницы добавлять клас active -->
						<a href="/<?php echo $current_slug; ?>" class="hidden <?php echo $current_slug == "en"? "english": "russian"; ?>-icon language-link"><?php echo $current_name; ?></a>
						<a href="/<?php echo $other_slug; ?>" class="active <?php echo $current_slug != "en"? "english": "russian"; ?>-icon language-link"><?php echo $other_name; ?></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php } ?>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/popup.js"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/appearance-button-go-top.js"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/smooth-scrolling.js"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/changeFixedHeader.js"></script>
	<?php wp_footer(); ?> 
</body>
</html>
