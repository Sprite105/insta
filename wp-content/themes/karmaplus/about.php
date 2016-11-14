<?php /* Template Name: About */ ?>
<?php 

    $root = get_template_directory_uri(); 
    $translations = pll_the_languages(array('raw'=>1));

    if( $translations['ru']['current_lang'] == true ) {
        $current_name = $translations['ru']['name'];
        $other_name = $translations['en']['name'];
        $current_slug = $translations['ru']['slug'];
        $other_slug = $translations['en']['slug'];
        $theID = 121;
    } else {
        $other_name = $translations['ru']['name'];
        $current_name = $translations['en']['name'];
        $current_slug = $translations['en']['slug'];
        $other_slug = $translations['ru']['slug'];
        $theID = 123;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(''); ?></title>
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/basic.css">
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/footer.css">
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/our-blog.css">
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/fixed-menu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
    <section class="banner">
        <header>
            <div class="container">
            <a href="#" class="logo">
                <p>instagram.follower-like.com</p>
            </a>
                <nav>
                    <?php wp_nav_menu( array( 'items_wrap' => '%3$s', 'menu' => 'top_' . $current_slug, 'walker' => new Description_Walker ) ); ?>
                </nav>
               <button class="get-started-button"><?php the_field( 'f3', $theID ); ?></button>
            </div>
        </header>
        <div class="container">
            <h1><?php the_field( 'f1', $theID ); ?></h1>
            <div class="content">
                <h3><?php pDel(get_field( 'f2', $theID )); ?></h3>
                <a href="#" class="get-started-button"><?php the_field( 'f4', $theID ); ?></a>
            </div>
        </div>
    </section>
    <section class="popular-questions anchor" id="popular-questions">
    <aside class="aside-content fixed-menu">
        <a href="#popular-questions" class="active"><span><?php the_field( 'f5', $theID ); ?></span></a>
        <a href="#about-us"><span><?php the_field( 'f7', $theID ); ?></span></a>
        <a href="#contacts"><span><?php the_field( 'f10', $theID ); ?></span></a>
    </aside>
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
    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="<?php echo $root . "/"; ?>js/desktop/setFixedPlugin.js"></script>
    <script src="<?php echo $root . "/"; ?>js/desktop/navigationRigth.js"></script>
    <script src="<?php echo $root . "/"; ?>js/desktop/smooth-scrolling.js"></script>
    
    <script src="<?php echo $root . "/"; ?>js/desktop/changeFixedHeader.js"></script>
    <?php wp_footer(); ?> 
</body>
</html>
