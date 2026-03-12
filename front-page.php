<?php get_header(); ?>

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
                    // 1. 親となる繰り返しフィールド（menu_list）を取得
                    $menu_items = SCF::get('menu_list');

                    // 2. データがある場合のみループ開始
                    if ( ! empty( $menu_items ) ) :
                        foreach ( $menu_items as $item ) :
                            // 各項目のデータを取り出す
                            $name   = $item['menu_list'];   // 商品名
                            $desc   = $item['menu_desc'];   // 料理の説明
                            $price  = $item['menu_price'];  // 価格
                            $img_id = $item['menu_image'];  // 料理の写真ID

                            // 画像IDからURLを取得
                            $img_src = wp_get_attachment_image_src( $img_id, 'medium' );
                ?>

                            <div class="card">
                                <?php if ( $img_src ) : ?>
                                    <div class="card-image">
                                        <img src="<?php echo esc_url( $img_src[0] ); ?>" alt="<?php echo esc_attr( $name ); ?>" style="width:100%; height:auto;">
                                    </div>
                                <?php endif; ?>

                                <?php if ( $name ) : ?>
                                    <div class="card-content">
                                        <h3><?php echo esc_html( $name ); ?></h3>
                                        <p class="price" style="color: #e74c3c; font-weight: bold; font-size: 1.1em;">
                                            ¥<?php echo esc_html( $price ); ?>
                                        </p>
                                        <p class="description" style="font-size: 0.9em; color: #666; margin-top: 10px;">
                                            <?php echo nl2br( esc_html( $desc ) ); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>

                <?php 
                        endforeach; // foreachの終了
                    else :
                        echo '<p>現在、メニューを準備中です。</p>';
                    endif; // ifの終了
                ?>

            </div>  
        </section>

        <section id="news" class="page">
            <h2>お知らせ</h2>
            <ul class="news-list">
                <?php
                // 投稿タイプ「post」を最新5件まで取得して表示
                $news_query = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 5,
                ) );

                if ( $news_query->have_posts() ) :
                    while ( $news_query->have_posts() ) :
                        $news_query->the_post();
                ?>
                        <li>
                            <span class="news-date"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                        <li>現在、お知らせはありません。</li>
                <?php endif; ?>
            </ul>
        </section>
    </main>

<?php get_footer(); ?>
