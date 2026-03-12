<?php get_header(); ?>

<main class="site-main">
    <div class="content-area">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                        <?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
                    </time>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <nav class="post-navigation">
                        <div class="nav-previous">
                            <?php previous_post_link( '%link', '＜ 前の記事' ); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link( '%link', '次の記事 ＞' ); ?>
                        </div>
                    </nav>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
