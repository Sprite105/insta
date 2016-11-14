<?php /* Template Name: Home */ ?>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?></title>
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/basic.css">
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/main-2.css">
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/footer.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<a href="#top" class="button-go-up"></a>
	<div class="popup" style="display: none;">
		<div class="content">
			<div class="tariff">
				<div class="title">
					<h1>Standart</h1>
					<h3>For ordinary users</h3>
				</div>
				<ul>
					<li>Text sample</li>
					<li>Text sample</li>
					<li>Text sample</li>
				</ul>
				<p class="discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta ipsam suscipit quas id eius maiores corporis commodi dignissimos </p>
				<a href="#" class="button">Button</a>
			</div>
			<div class="tariff">
				<div class="title">
					<h1>EXTENDET</h1>
					<h3>For business</h3>
				</div>
				<ul>
					<li>Text sample</li>
					<li>Text sample</li>
					<li>Text sample</li>
				</ul>
				<p class="discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta ipsam suscipit quas id eius maiores corporis commodi dignissimos </p>
				<a href="#" class="button">Button</a>
			</div>
			<div class="tariff">
				<div class="title">
					<h1>PREMIUM</h1>
					<h3>Donate</h3>
				</div>
				<ul>
					<li>Text sample</li>
					<li>Text sample</li>
					<li>Text sample</li>
				</ul>
				<p class="discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta ipsam suscipit quas id eius maiores corporis commodi dignissimos </p>
				<a href="#" class="button">Button</a>
			</div>
		</div>
	</div>
	<header>
		<div class="container">
			<a href="#" class="logo">
                <p>instagram.follower-like.com</p>
            </a>
			<nav>
			<?php wp_nav_menu( array( 'items_wrap' => '%3$s', 'menu' => 'top_' . $current_slug, 'walker' => new Description_Walker ) ); ?>
			</nav>
			<button class="get-started-button"><?php the_field( 'f1', $theID ); ?></button>
		</div>
	</header>
	<section class="banner" id="top">
		<div class="container">
		<h1><?php the_field( 'f2', $theID ); ?></h1>
			<div class="content">
				<h3><?php the_field( 'f3', $theID ); ?></h3>
				<?php $f4 = get_field( 'f4', $theID ); ?>
				<ol>
					<li>
						<h2><?php echo $f4[0]['f4_2']; ?></h2>
						<h3><?php echo $f4[0]['f4_3']; ?></h3>
					</li>
					<li>
						<h2><?php echo $f4[1]['f4_2']; ?></h2>
						<h3><?php echo $f4[1]['f4_3']; ?></h3>
					</li>
					<li>
						<h2><?php echo $f4[2]['f4_2']; ?></h2>
						<h3><?php echo $f4[2]['f4_3']; ?></h3>
					</li>
				</ol>
			<a href="#" class="get-started-button"><?php the_field( 'f5', $theID ); ?></a>
			</div>
		</div>
	</section>
	<section class="our-advantages">
		<div class="container">
			<h1><?php the_field( 'f6', $theID ); ?></h1>
			<?php $f7 = get_field( 'f7', $theID ); ?>
			<ol>
				<li>
					<h2><?php echo $f7[0]['f7_1']; ?></h2>
					<h3><?php echo $f7[0]['f7_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f7[1]['f7_1']; ?></h2>
					<h3><?php echo $f7[1]['f7_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f7[2]['f7_1']; ?></h2>
					<h3><?php echo $f7[2]['f7_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f7[3]['f7_1']; ?></h2>
					<h3><?php echo $f7[3]['f7_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f7[4]['f7_1']; ?></h2>
					<h3><?php echo $f7[4]['f7_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f7[5]['f7_1']; ?></h2>
					<h3><?php echo $f7[5]['f7_2']; ?></h3>
				</li>
			</ol>
		</div>
	</section>
	<section class="answerToUser">
		<h1><?php the_field( 'f8', $theID ); ?></h1>
		<a href='#' class="get-started-button"><?php the_field( 'f9', $theID ); ?></a>
	</section>
	<section class="only-here">
		<div class="container">
			<h1><?php the_field( 'f10', $theID ); ?></h1>
			<?php $f11 = get_field( 'f11', $theID ); ?>
			<ol>
				<li>
					<h2><?php echo $f11[0]['f11_1']; ?></h2>
					<h3><?php echo $f11[0]['f11_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f11[1]['f11_1']; ?></h2>
					<h3><?php echo $f11[1]['f11_2']; ?></h3>
				</li>
				<li>
					<h2><?php echo $f11[2]['f11_1']; ?></h2>
					<h3><?php echo $f11[2]['f11_2']; ?></h3>
				</li>
			</ol>
		</div>
	</section>
	<section class="insta-boots">
		<div class="container">
			<div class="content">
				<h1><?php the_field( 'f12', $theID ); ?></h1>
				<h3><?php the_field( 'f13', $theID ); ?></h3>
				<?php $f14 = get_field( 'f14', $theID ); ?>
				<a href="<?php echo $f14[0]['f14_2']; ?>" class="get-started-button apple-icon"><?php echo $f14[0]['f14_1']; ?></a>
				<a href="<?php echo $f14[1]['f14_2']; ?>" class="get-started-button android-icon"><?php echo $f14[1]['f14_1']; ?></a>
			</div>
		</div>
	</section>
	<section class="statistic">
		<div class="container">
			<h1><?php the_field( 'f15', $theID ); ?></h1>
			<?php $f16 = get_field( 'f16', $theID ); ?>
			<ol>
				<li>
					<span class="number"><?php echo $f16[0]['f16_1']; ?></span>
					<p><?php echo $f16[0]['f16_2']; ?></p>
				</li>
				<li>
					<span class="number"><?php echo $f16[1]['f16_1']; ?></span>
					<p><?php echo $f16[1]['f16_2']; ?></p>
				</li>
				<li>
					<span class="number"><?php echo $f16[2]['f16_1']; ?></span>
					<p><?php echo $f16[2]['f16_2']; ?></p>
				</li>
			</ol>
		</div>
		<a href="#" class="get-started-button">
			<?php the_field( 'f17', $theID ); ?>
		</a>
	</section>
	<section class="seotext">
		<?php the_field( 'f18', $theID ); ?>
		<?php $f19 = get_field( 'f19', $theID ); ?>
		<div class="container">
			<div class="row">
				<p class="description"><span><?php echo pDel( $f19[0]['f19_1'] ); ?></span></p>
				<img src="<?php echo $f19[0]['f19_2']; ?>" alt="capturePhone">
			</div>
			<div class="row">
				<img src="<?php echo $f19[1]['f19_2']; ?>" alt="phoneInJeans">
				<p class="description"><span><?php echo pDel( $f19[1]['f19_1'] ); ?></span>
				</p>
			</div>
			<div class="row">
				<p class="description"><span><?php echo pDel( $f19[2]['f19_1'] ); ?></span>
				</p>
				<img src="<?php echo $f19[2]['f19_2']; ?>" alt="welcome">
			</div>
		</div>
	</section>
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
