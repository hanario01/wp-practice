<?php

// テーマセットアップ
function wp_practice_theme_setup() {
    // タイトルタグをテーマ側で管理
    add_theme_support( 'title-tag' );

    // アイキャッチ画像
    add_theme_support( 'post-thumbnails' );

    // メニュー
    register_nav_menus(
        array(
            'primary' => 'メインメニュー',
        )
    );
}
add_action( 'after_setup_theme', 'wp_practice_theme_setup' );

// ウィジェットエリア
function wp_practice_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'メインサイドバー',
            'id'            => 'primary-sidebar',
            'description'   => '投稿ページや固定ページのサイドバーエリアです。',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'wp_practice_widgets_init' );

