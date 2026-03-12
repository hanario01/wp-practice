<aside class="site-sidebar">
    <?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'primary-sidebar' ); ?>
    <?php else : ?>
        <section class="widget">
            <h2 class="widget-title">サイドバー</h2>
            <p>「外観 → ウィジェット」からウィジェットを追加してください。</p>
        </section>
    <?php endif; ?>
</aside>
