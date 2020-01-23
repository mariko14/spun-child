<?php
/*
Template:spun
Theme Name:spun-child
Theme URI:
Description:spunの子テーマです
Author:mariko
Version:1.0
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="かわいいハリネズミの写真を毎日撮りためてます。我が子たちとハリネズミとの日常のフォトブログです。">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> <?php if ( !is_home() && !is_front_page() ) : ?>id="<?php echo attribute_escape( $post->post_name ); ?>-page"<?php endif ?> >

<header id="masthead" class="site-header">
	<div id="header-inner">
		<h2 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" width="587" height="72" alt="ちょもフォト島" class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-back.png" width="587" height="143" alt="ちょもフォト島" class="logo-back">
			<?php if ( is_home() && ! is_paged() ) : ?>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/bow.png" width="63" height="88" alt="" class="bounce-in-top movie-img movie-img-bow">
			<?php endif; ?>
		</a>
			<?php if ( is_home() && ! is_paged() ) : ?>
				<?php else : ?>
			<?php endif; ?>
		</h2>
		<p class="site-description site-description-header">我が家のハリネズミ兄弟『ゆき』と『まる』の日常。<br>ワンコさんも一緒。</p>
		<a href="/contact/" class="header-tag"><span>お問合せ</span></a>
		</div>
</header><!-- #masthead .site-header -->

<?php if ( is_home() && ! is_paged() ) : ?>
	<div id="top-movie">
		<div class="movie-area">
			<div id="movie-file">
				<video src="<?php bloginfo('stylesheet_directory'); ?>/movie/yukimaru_no2.mp4" width="700" height="392" autoplay loop poster="<?php bloginfo('stylesheet_directory'); ?>/images/main-image.jpg" onclick="this.play();">

					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/main-image.jpg" width="700" height="392" alt="" class="movie-photo">
				</video>
				
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/movie-line.png" width="704" height="398" alt="" class="movie-line"> 
			
			</div>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/maru.png" width="115" height="57" alt="" class="bounce-in-top movie-img movie-img-l" >
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/yuki.png" width="112" height="68" alt="" class="bounce-in-top movie-img movie-img-r">
		</div>
	</div>
	<h2 class="site-description">我が家のハリネズミ兄弟<br class="none600">『ゆき』と『まる』の日常。<br>ワンコさんも一緒。</h2>
	<p class="web-font home-welcome"><a href="https://chomo-photoisland.com/hedgehog/20161127/" class="link"><span>『新しい家族がきました！(2016/11/27)』</span></a>から２匹の記事になります。</p>
<?php endif; ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<div id="main" class="site-main">