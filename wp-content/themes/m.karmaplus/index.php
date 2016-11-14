<?php /* Template Name: Home */ ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php wp_title(''); ?></title>
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/mobile-general.css">
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/main.css">
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
	<header>
		<div class="container">
			<a href="#" class="logo">
				<p>instagram.follower-like.com</p>
			</a>
			<input type="checkbox" id="mobile-menu">
			<div class="menu">
				<div class="menu-line"></div>
				<label for="mobile-menu"></label>
			</div>
			<div class="menu-wrapper">
                <nav>
                <a href="#" class="button-orange get-started-button"><?php the_field( 'f1', $theID ); ?></a>
                    <div class="wrapper-link">
                        <?php wp_nav_menu( 
                            array( 
                                'items_wrap' => '%3$s', 
                                'menu' => 'top_' . $current_slug, 
                                'walker' => new Description_Walker ) 
                            ); 
                        ?>
                    </div>
                </nav>         
            </div>
		</div>
	</header>
	<section class="top-panel">
		<h1 class="blog-title"><?php the_field( 'f2', $theID ); ?></h1>
		<div class="content">
            <h3><?php the_field( 'f3', $theID ); ?></h3>
            <?php $f4 = get_field( 'f4', $theID ); ?>
            <ol>
                <li>
	                <h2><?php echo $f4[2]['f4_2']; ?></h2>
					<h3><?php echo $f4[2]['f4_3']; ?></h3>
                </li>
            </ol>
            <a href="#" class="button-orange get-started-button"><?php the_field( 'f5', $theID ); ?></a>
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
        <div class="container">
            <h1><?php the_field( 'f8', $theID ); ?></h1>
            <a href='#' class="get-started-button"><?php the_field( 'f9', $theID ); ?></a>
        </div>
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
	<?php wp_footer(); ?>
</body>
</html>