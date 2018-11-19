<span>Posted on</span>
<a href="<?php echo esc_url(get_permalink()); ?>">
    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
        <?php echo esc_html(get_the_date()); ?>
    </time>
</a>

<span>By</span>
<?php the_author_posts_link(); ?>