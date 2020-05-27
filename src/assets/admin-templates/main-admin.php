<?php
/**
 * @package ProjectsGenerator
 */
?>

<div class="wrap">
    <h1>Projects Generator Plugin</h1>

    <?php settings_errors(); ?>

    <form method="POST" action="options.php">    
        <?php
            settings_fields( 'projetcs_generator_plugin_main_options' );
            do_settings_sections( 'projects_generator_plugin' );
            submit_button();
        ?>
    </form>
</div>