<?php
// Template Name: front-page-template
?>
<?php
get_header();
?>
<div class="main-page-top">
    <div class="social-buttons">
        <a href="https://www.linkedin.com/in/remigiusz-ciszewski-137068264/" target="_blank">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="https://github.com/remciszewski" target="_blank">
            <i class="fab fa-github"></i>
        </a>
    </div>

</div>

<div class="container-main-page">
    <div class="left-colu mn-main-page">
        <h1 id="typer"></h1>
    </div>
    <div class="content-main-page">
        <h1><?php the_content(); ?></h1>
    </div>
    <?php //$fields = get_fields(); 
    ?>
    <h1><?php //$fields['tytul']; 
        ?></h1>
</div>
<hr class="hr-front-page" />
<div class="main-page-content">
    <div class="container-posts">
        <div class="container-for-container-posts">
            <?php
            $args = array(
                'post_type' => 'education',
                'post_status' => 'publish',
                'post_per_page' => -1
            );
            $query = new WP_Query($args);
            ?>
            <h1>Education</h1>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <h2>No posts</h2>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <hr class="hr-front-page-second" />
        </div>
    </div>

    <div class="container-posts-r">
        <div class="container-for-container-posts-r">
            <?php
            $args = array(
                'post_type' => 'skills',
                'post_status' => 'publish',
                'post_per_page' => -1,
                'orderby' => 'ID',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            ?>
            <h1>Skills</h1>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <h2>No posts</h2>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <hr class="hr-front-page-second" />
        </div>
    </div>

    <div class="container-posts">
        <div class="container-for-container-posts">
            <?php
            $args = array(
                'post_type' => 'certificates',
                'post_status' => 'publish',
                'post_per_page' => -1
            );
            $query = new WP_Query($args);
            ?>
            <h1>Certificates</h1>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <h2>No posts</h2>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <hr class="hr-front-page-second" />
        </div>
    </div>

    <div class="container-posts-r">
        <div class="container-for-container-posts-r">
            <?php
            $args = array(
                'post_type' => 'interests',
                'post_status' => 'publish',
                'post_per_page' => -1,
                'orderby' => 'ID',
                'order' => 'ASC'
            );
            $query = new WP_Query($args);
            ?>
            <h1>Interests</h1>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <h2>No posts</h2>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <hr class="hr-front-page-second" />
        </div>
    </div>
</div>

</div>
<div>
    <?php

    get_footer();

    ?>