<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <h1><?php bloginfo('name'); ?></h1>
        <nav>
            <ul>
                <li><a onclick="navigate('home')" id="nav-home" class="active">トップ</a></li>
                <li><a onclick="navigate('shops')" id="nav-shops">店舗一覧</a></li>
                <li><a onclick="navigate('menu')" id="nav-menu">メニュー</a></li>
                <li><a onclick="navigate('news')" id="nav-news">ニュース</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home" class="page active">
            <h2>いらっしゃいませ</h2>
            <p>こだわりの旬の食材を使った和食をご提供しております。ご家族やご友人との特別な時間をお過ごしください。</p>
            <div style="background-color: #eee; height: 200px; display: flex; align-items: center; justify-content: center; color: #888; margin-top: 20px;">
                [ ここにイメージ画像が入ります ]
            </div>
        </section>

        <section id="shops" class="page">
            <h2>店舗一覧</h2>
            <p>各店舗をクリックすると詳細をご覧いただけます。</p>
            <div class="card-container">
                <?php
                require_once get_template_directory() . '/DB/data-shop.php';
                foreach ($shops as $shopId => $shop) :
                ?>
                    <div class="card" onclick="showShopDetail('<?php echo esc_js($shopId); ?>')">
                        <h3><?php echo esc_html($shop['name']); ?></h3>
                        <p><?php echo esc_html($shop['address']); ?></p>
                        <span style="color: #e74c3c; font-size: 0.9em;">詳細を見る ＞</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="shop-detail" class="page">
            <h2>店舗詳細</h2>
            <button onclick="navigate('shops')" style="margin-bottom: 20px; padding: 5px 10px;">＜ 店舗一覧に戻る</button>
            <div id="detail-content"></div>
        </section>

        <section id="menu" class="page">
            <h2>お品書き</h2>
            <div class="card-container">
                <?php
                $menu_page = get_page_by_path('menu');
                $menu_items = (class_exists('SCF') && $menu_page) ? SCF::get('menu_list', $menu_page->ID) : [];

                if (!empty($menu_items)) :
                    foreach ($menu_items as $item) :
                        $name   = $item['menu_name'];
                        $desc   = $item['menu_desc'];
                        $price  = $item['menu_price'];
                        $img_id = $item['menu_image'];
                        $img_src = wp_get_attachment_image_src($img_id, 'medium');
                ?>
                        <div class="card">
                            <?php if ($img_src) : ?>
                                <div class="card-image">
                                    <img src="<?php echo esc_url($img_src[0]); ?>" alt="<?php echo esc_attr($name); ?>" style="width:100%; height:auto;">
                                </div>
                            <?php endif; ?>

                            <?php if ($name) : ?>
                                <div class="card-content">
                                    <h3><?php echo esc_html($name); ?></h3>
                                    <p class="price" style="color: #e74c3c; font-weight: bold; font-size: 1.1em;">
                                        ¥<?php echo esc_html($price); ?>
                                    </p>
                                    <p class="description" style="font-size: 0.9em; color: #666; margin-top: 10px;">
                                        <?php echo nl2br(esc_html($desc)); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                <?php
                    endforeach;
                else :
                    echo '<p>現在、メニューを準備中です。</p>';
                endif;
                ?>
            </div>
        </section>

        <section id="news" class="page">
            <h2>お知らせ</h2>
            <ul class="news-list">
                <?php
                $news_query = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 10,
                    'post_status'    => 'publish',
                ]);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                    <li>
                        <span class="news-date"><?php echo get_the_date('Y.m.d'); ?></span>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<li>現在、お知らせはありません。</li>';
                endif;
                ?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </footer>

    <script>
        // 店舗データをPHPから受け取る
        const shopData = <?php
            require_once get_template_directory() . '/DB/data-shop.php';
            echo json_encode($shops, JSON_UNESCAPED_UNICODE);
        ?>;
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/JS/script.js"></script>
    <?php wp_footer(); ?>
</body>
</html>