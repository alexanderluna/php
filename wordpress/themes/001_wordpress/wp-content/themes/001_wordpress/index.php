<?php get_header(); ?>

<?php if(have_posts()) { ?>
    <?php include('posts/posts.php'); ?>
<?php } else { ?>
    <p>You have not published any posts yet.</p>
<?php }?>

<?php get_footer(); ?>