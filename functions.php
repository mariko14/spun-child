<?php
add_theme_support( 'title-tag' );

function my_document_title( $title ) {
    // トップページの条件分岐
    if ( is_front_page() && is_home() ) {
        $title = get_bloginfo( 'name', 'display' );

    // 個別記事や固定ページの条件分岐
    } elseif ( is_singular() ) {
        $title = single_post_title( '', false );
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'my_document_title' );
/*	headerから不要なものを削除
/*---------------------------------------------------------*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );

if ( ! function_exists( 'spun_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 */
function spun_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav screen-reader-text">' . _x( '&#8592; 前', 'Previous post link', 'spun' ) . '</span>' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '<span class="meta-nav screen-reader-text">' . _x( ' 次 &#8594;', 'Next post link', 'spun' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav screen-reader-text">&#8592; 前</span>', 'spun' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav screen-reader-text"> 次 &#8594;</span>', 'spun' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // spun_content_nav


/**
 * jQueryをフッターに動かす
 */
add_action( 'init', function() {
  // 管理画面ではjQueryを削除できない。
  if ( is_admin() ) {
    return;
  }
  // 現在のバージョンとURIを保存。
  // CDNを使いたい方は$jquery_srcのURIを変更してもよい。
  global $wp_scripts;
  $jquery = $wp_scripts->registered['jquery-core'];
  $jquery_ver = $jquery->ver;
  $jquery_src = $jquery->src;
  // いったん削除
  wp_deregister_script( 'jquery' );
  wp_deregister_script( 'jquery-core' );
  // 登録しなおし
  wp_register_script( 'jquery', false, ['jquery-core'], $jquery_ver, true );
  wp_register_script( 'jquery-core', $jquery_src, [], $jquery_ver, true );
} );





?>