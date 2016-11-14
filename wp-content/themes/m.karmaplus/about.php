<?php /* Template Name: About */ ?>
<?php 

    $root = get_template_directory_uri(); 
    $translations = pll_the_languages(array('raw'=>1));

    if( $translations['ru']['current_lang'] == true ) {
        $current_name = $translations['ru']['name'];
        $other_name = $translations['en']['name'];
        $current_slug = $translations['ru']['slug'];
        $other_slug = $translations['en']['slug'];
        $theID = 146;
    } else {
        $other_name = $translations['ru']['name'];
        $current_name = $translations['en']['name'];
        $current_slug = $translations['en']['slug'];
        $other_slug = $translations['ru']['slug'];
        $theID = 148;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/mobile-general.css">
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/mobile/our-blog.css">
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
                    <a href="#" class="button-orange get-started-button"><?php the_field( 'f3', $theID ); ?></a>
                    <div class="wrapper-link">
                        <?php wp_nav_menu( array( 'items_wrap' => '%3$s', 'menu' => 'top_' . $current_slug, 'walker' => new Description_Walker ) ); ?>
                    </div>
                </nav>         
            </div>
        </div>
    </header>
    <section class="top-panel">
        <h1 class="blog-title"><?php the_field( 'f1', $theID ); ?></h1>
        <div class="content">
            <h3><?php pDel(get_field( 'f2', $theID )); ?></h3>
        </div>
    </section>
    <section class="popular-questions anchor" id="popular-questions">
        <div class="container">
            <h1><?php the_field( 'f5', $theID ); ?></h1>
            <div class="content">
            <?php $f_6 = get_field( 'f6', $theID ); foreach ($f_6 as $f6) { ?>
                <p class="title-quotes"><?php echo $f6['f6_title']; ?></p>
                <q><?php echo pDel( $f6['f6_text'] ); ?></q>
            <?php } ?>
            </div>
        </div>
    </section>
    <section class="about-us anchor" id="about-us">
        <h1><?php the_field( 'f8', $theID ); ?></h1>
        <div class="container">
            <div class="content">
                <p><?php pDel(get_field( 'f9', $theID )); ?></p>
            </div>
        </div>
    </section>
    <style>
        .contacts .container br {
            display: none;
        }
    </style>
    <section class="contacts anchor" >
        <div class="container" id="contacts">
           <?php pDel( brDel( get_field( 'f11', $theID ) ) ); ?>
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