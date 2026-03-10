<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>和食レストラン ◯◯</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>

    <header>
        <h1>和食レストラン ◯◯</h1>
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
                <div class="card" onclick="showShopDetail('tokyo')">
                    <h3>東京本店</h3>
                    <p>東京都新宿区...</p>
                    <span style="color: #e74c3c; font-size: 0.9em;">詳細を見る ＞</span>
                </div>
                <div class="card" onclick="showShopDetail('osaka')">
                    <h3>大阪店</h3>
                    <p>大阪府北区...</p>
                    <span style="color: #e74c3c; font-size: 0.9em;">詳細を見る ＞</span>
                </div>
            </div>
        </section>

        <section id="shop-detail" class="page">
            <h2>店舗詳細</h2>
            <button onclick="navigate('shops')" style="margin-bottom: 20px; padding: 5px 10px;">＜ 店舗一覧に戻る</button>
            
            <div id="detail-content">
                </div>
        </section>

        <section id="menu" class="page">
            <h2>お品書き</h2>
            <div class="card-container">
                
                <?php
                /*
                    // 1. 親となる繰り返しフィールド（menu_list）を取得
                    $menu_items = SCF::get('menu_list');

                    // 2. データがある場合のみループ開始 ($を忘れずに)
                    if(!empty($menu_items)) :
                        foreach($menu_items as $item) :
                            // 各項目のデータを取り出す
                            $name   = $item['menu_list'];    // 商品名
                            $desc   = $item['menu_desc'];    // 料理の説明
                            $price  = $item['menu_price'];   // 価格
                            $img_id = $item['menu_image'];   // 料理の写真ID

                            // 画像IDからURLを取得
                            $img_src = wp_get_attachment_image_src($img_id, 'medium');
                
                ?>

                            <div class="card">
                                <?php if($img_src): ?>
                                    <div class="card-image">
                                        <img src="<?php echo $img_src[0]; ?>" alt="<?php echo esc_attr($name); ?>" style="width:100%; height:auto;">
                                    </div>
                                <?php endif; ?>

                                <?php if($name): ?>
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
                        endforeach; // foreachの終了
                    else:
                        echo '<p>現在、メニューを準備中です。</p>';
                    endif; // ifの終了
                */
                ?>
                */
                
            </div>  
        </section>

        <section id="news" class="page">
            <h2>お知らせ</h2>
            <ul class="news-list">
                <li>
                    <span class="news-date">2026.03.10</span>
                    春の新メニュー「桜鯛の御膳」がスタートしました。
                </li>
                <li>
                    <span class="news-date">2026.02.15</span>
                    大阪店リニューアルオープンのご案内。
                </li>
                <li>
                    <span class="news-date">2026.01.01</span>
                    新年のご挨拶と営業時間のお知らせ。
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 和食レストラン ◯◯. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>