<?php while (have_posts()) { ?>
    <?php the_post(); ?>
    <?php include('_title.php'); ?>

    <div>
        <?php the_excerpt(); ?>
    </div>

    <div>
        <?php include('_posted_on.php'); ?>
    </div>

    <?php include('_read_more.php'); ?>
<?php } ?>
<?php the_posts_pagination(); ?>