<?php /* Template Name: Business */ ?>
<?php 

    $root = get_template_directory_uri(); 
    $translations = pll_the_languages(array('raw'=>1));

    if( $translations['ru']['current_lang'] == true ) {
        $current_name = $translations['ru']['name'];
        $other_name = $translations['en']['name'];
        $current_slug = $translations['ru']['slug'];
        $other_slug = $translations['en']['slug'];
        $theID = 153;
    } else {
        $other_name = $translations['ru']['name'];
        $current_name = $translations['en']['name'];
        $current_slug = $translations['en']['slug'];
        $other_slug = $translations['ru']['slug'];
        $theID = 166;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php wp_title(''); ?></title>
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/mobile-general.css">
	<link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/business.css">
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
            <h3><?php pDel( get_field( 'f3', $theID ) ); ?></h3>
            <a href="#" class="button-orange get-started-button"><?php the_field( 'f4', $theID ); ?></a>
        </div>
	</section>
	<section class="advantages">
        <div class="container">
            <?php $f_6 = get_field( 'f6', $theID ); $i=0; foreach ($f_6 as $f6) { $i++; ?>
                <div class="content">
                    <img src="<?php echo $f6['image']; ?>" alt="screen-phone-<?=$i;?>">
                    <div class="discription">
                        <h1><?php echo $f6['title']; ?></h1>
                        <p><?php pDel( $f6['text'] ); ?></p>
                    </div>
                </div>
            <?php } ?>
            <a href="#" class="button-orange get-started-button"><?php the_field( 'f4', $theID ); ?></a>
        </div>
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


