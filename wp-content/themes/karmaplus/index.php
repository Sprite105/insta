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
				<?php $f4 = get_field( 'f4', $theID ); ?>
				<h3><?php the_field( 'f3', $theID ); ?></h3>
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
			<h1>Только у нас</h1>
			<ol>
				<li>
					<h2>Автоматизация</h2>
					<h3>Установить приложение и нажать кнопку - это всё, что Вам нужно.</h3>
				</li>
				<li>
					<h2>Живой трафик</h2>
					<h3>Каждый день наше сообщество становится всё больше и больше!</h3>
				</li>
				<li>
					<h2>Free-to-use</h2>
					<h3>Заказывай столько подписчиков, сколько Вы сможете себе позволить</h3>
				</li>
			</ol>
		</div>
	</section>
	<section class="insta-boots">
		<div class="container">
			<div class="content">
				<h1>InstaBoots</h1>
				<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur velit aperiam officiis saepe inventore molestiae dolor reprehenderit minus libero iure tempore eius itaque ut, minima nihil alias assumenda cum, error.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eligendi totam tempore soluta quia, unde similique quibusdam animi quis odio, dolor tenetur quisquam dicta expedita, pariatur itaque nisi modi voluptas.</h3>
				<a href="#" class="get-started-button apple-icon">Скачать для iOS</a>
				<a href="#" class="get-started-button android-icon">Скачать для Anroid</a>
			</div>
		</div>
	</section>
	<section class="statistic">
		<div class="container">
			<h1>Цифры дня нашего сервиса</h1>
			<ol>
				<li>
					<span class="number">64,201</span>
					<p>Лайков сделано</p>
				</li>
				<li>
					<span class="number">21,031</span>
					<p>Обменов подписками</p>
				</li>
				<li>
					<span class="number">35,129</span>
					<p>Новых пользователей</p>
				</li>
			</ol>
		</div>
		<a href="#" class="get-started-button">
			Начать пользоваться
		</a>
	</section>
	<section class="seotext">
		<h1>Начните свой путь к популярности!</h1>
		<h2>Вы хотите стать популярным свой аккаунт в инстаграм? Вам нужны новые подписчики и лайки на Ваших фото? Тогда Вы нашли то, что искали!</h2>
		<div class="container">
			<div class="row">
				<p class="description"><span >King of Likes - уникальная бесплатная автоматическая накрутка для инстаграм. Каждый день Вы будете видеть новых и новых подписчиков и лайки под Вашими записями. Всё, что Вам нужно для работы с нашим сервисом - это скачать приложение и нажать кнопку "СТАРТ", Остальное мы сделаем за Вас!
				</span></p>
				<img src="<?php echo $root . "/"; ?>image/capturePhone.jpg" alt="capturePhone">
			</div>
			<div class="row">
				<img src="<?php echo $root . "/"; ?>image/phoneInJeans.jpg" alt="phoneInJeans">
				<p class="description"><span>Качай наше приложение, авторизируйся через Instagram, приводи друзей, собирай бонусыи выполняй ежедневное задание, заказывай подписчиков и наслаждайся! Всё остальное мы сделаем за Вас</span>
				</p>
			</div>
			<div class="row">
				<p class="description"><span>Добро пожаловать на официальную страницу King of Likes - накрутка лайков в инстаграме, накрутка подписчиков в инстаграме.</span>
				</p>
				<img src="<?php echo $root . "/"; ?>image/welcome.jpg" alt="welcome">
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="wrapper-row">
				<div class="keywords-container">
					<h3>Keywords</h3>
					<p class="keywords">Накрутка лайков в инстаграм</p>
					<p class="keywords">Накрутка лайков в инстаграме</p>
					<p class="keywords">Накрутка лайков в инстаграм бесплатно</p>
					<p class="keywords">Накрутка подписчиков в инстаграме</p>
					<p class="keywords">Накрутка подписчиков в инстаграм</p>
					<p class="keywords">Продвижение в инстаграм</p>
					<p class="keywords">Обмен лайками</p>
					<p class="keywords">Бесплатные лайки</p>
					<p class="keywords">Накрутка подписчиков бесплатно</p>
				</div>
				<div class="links">
					<h3>Links</h3>
					<a href="#">Главная</a>
					<a href="#">Про нас</a>
					<a href="#">Блог</a>
					<a href="#">Бизнес</a>
				</div>
				<div class="social">
					<h3>Social</h3>
					<a href="#" class="vkontakte">vk.com/ourApp&Site</a>
					<a href="#" class="facebook">facebook.com/ourApp&Site</a>
					<a href="#" class="twitter">twitter.com/ourApp&Site</a>
				</div>
			</div>
			<div class="wrapper-row">
				<div class="container-language-rights">
					<p class="logo">© 2016 All right reserved</p>
					<div class="container-language-item">
					<!-- В зависимости от страницы добавлять клас active -->
						<a href="/<?php echo $current_slug; ?>" class="hidden <?php echo $current_slug == "en"? "english": "russian"; ?>-icon language-link"><?php echo $current_name; ?></a>
						<a href="/<?php echo $other_slug; ?>" class="active <?php echo $current_slug != "en"? "english": "russian"; ?>-icon language-link"><?php echo $other_name; ?></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/popup.js"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/appearance-button-go-top.js"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/smooth-scrolling.js"></script>
	<script src="<?php echo $root . "/"; ?>js/desktop/changeFixedHeader.js"></script>
	<?php wp_footer(); ?> 
</body>
</html>
