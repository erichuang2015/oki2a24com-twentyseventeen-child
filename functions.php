<?php
/**
 * JavaScript や CSS を読み込みます。
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

/**
 * more タグで URL 末端に付く #more-xxxx を削除します。
 */
function remove_more_link_scroll( $link ) {
        $link = preg_replace( '|#more-[0-9]+|', '', $link );
        return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

/**
 * メニューに検索フォームを追加します。
 */
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' ){
        return $items . '<li>' . get_search_form(false) . '</li>';
    }
}
add_filter( 'wp_nav_menu_items', 'add_search_box_to_menu', 10, 2);
