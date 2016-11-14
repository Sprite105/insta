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
<html>

<head>
    <meta charset="UTF-8">
    <title><?php wp_title(''); ?></title>
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/basic.css">
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/business.css">
    <link rel="stylesheet" href="<?php echo $root . "/"; ?>css/desktop/footer.css">
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
            <nav>
                <?php wp_nav_menu( 
                    array( 
                        'items_wrap' => '%3$s', 
                        'menu' => 'top_' . $current_slug, 
                        'walker' => new Description_Walker ) 
                    ); 
                ?>
            </nav>
            <button class="get-started-button"><?php the_field( 'f1', $theID ); ?></button>
        </div>
    </header>
    <section class="banner">
        <div class="container">
            <h1><?php the_field( 'f2', $theID ); ?></h1>
            <div class="content">
                <h3><?php pDel( get_field( 'f3', $theID ) ); ?></h3>
                <a href="#" class="get-started-button"><?php the_field( 'f4', $theID ); ?></a>
            </div>
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
    <script src="<?php echo $root . "/"; ?>js/desktop/changeFixedHeader.js"></script>
    <?php wp_footer(); ?>
</body>

</html>
