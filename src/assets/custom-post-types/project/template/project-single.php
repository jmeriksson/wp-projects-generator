<?php
/**
 * @package ProjectsGenerator
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- NOTE: This wrapper is added as protection so custom styling does not effect other content. -->
    <div class="projects-generator-plugin-wrapper">

        <header class="project-header">
            <div class="project-header__logo">
                <a href="<?php echo get_site_url(); ?>">
                    <img src="<?php echo PROJECTS_GENERATOR_PLUGIN_URL . 'src/assets/custom-post-types/project/images/logo.png' ?>" alt="Logotyp">
                </a>
            </div>
            <span class="project-header__spacer"></span>
            <div class="project-header__nav">
                <nav>
                    <?php echo wp_nav_menu(); ?>
                </nav>
            </div>
        </header>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="project-top-bar">
                <ul class="project-top-bar__breadcrumbs">
                    <li>
                        <a href="<?php echo get_site_url(); ?>">Start</a>
                    </li>
                    <li>
                        <a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>"><?php the_archive_title(); ?></a>
                    </li>
                    <li>
                        <a href="<?php the_permalink(); ?>" class="breadcrumb-link-active"><?php the_title(); ?></a>
                    </li>
                </ul>

                <span class="project-top-bar__spacer"></span>

                <?php if ( get_next_post() || get_previous_post() ) : ?>
                    <ul class="project-top-bar__navigation">
                        <?php if ( get_previous_post() ) : ?>
                            <li>
                                <?php echo get_previous_post_link( '%link', 'Föregående projekt' ); ?>
                            </li>
                        <?php endif; ?>
                        <?php if ( get_next_post() ) : ?>
                            <li>
                                <?php echo get_next_post_link( '%link', 'Nästa projekt' ); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="project-hero">
                <div class="project-hero__image" style="background-image: url(<?php the_post_thumbnail_url(); ?>); "></div>
                <div class="project-hero__overlay"></div>
                <div class="project-hero__content">
                    <div class="project-container">
                        <h2><?php the_title(); ?></h2>
                        <div class="project-post-meta">
                            <p><?php the_date('Y-m-d'); ?> | <?php echo (get_the_category()) ? get_the_category() : 'Ingen kategori'; ?></p>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="project-container">
                <div class="project-main">
                    <div class="project-main__content">
                        <?php the_content(); ?>
                    </div>
                    <div class="project-main__sidebar">
                        <?php echo get_option( 'facebook_url' ) ?>
                    </div>
                </div>
            </div>

        <?php endwhile; endif; ?>

        <footer class="project-footer">
            <small>&copy; Business all rights reserved</small>
        </footer>

    </div>

    <?php wp_footer(); ?>

</body>
</html>