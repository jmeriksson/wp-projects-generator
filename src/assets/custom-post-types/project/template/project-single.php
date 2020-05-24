<?php
/**
 * @package ProjectsGenerator
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="project-top-bar">
        <ul class="project-breadcrumbs">
            <li>
                <a href="<?php echo get_site_url(); ?>">Home</a>
            </li>
            <li>
                <a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>"><?php the_archive_title(); ?></a>
            </li>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        </ul>

        <span class="spacer"></span>

        <?php if ( get_next_post() || get_previous_post() ) : ?>
            <ul class="project-navigation">
                <?php if ( get_previous_post() ) : ?>
                    <li>
                        <?php echo get_previous_post_link( '%link' ); ?>
                    </li>
                <?php endif; ?>
                <?php if ( get_next_post() ) : ?>
                    <li>
                        <?php echo get_next_post_link( '%link' ); ?>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>

    <h2><?php the_title(); ?></h2>

    <div><?php the_content(); ?></div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>