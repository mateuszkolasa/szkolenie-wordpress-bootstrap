<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <ul class="nav nav-pills nav-stacked left-menu hidden-xs">
            <?php
            //echo '<pre>'; print_r(get_categories()); echo '</pre>';
            foreach(get_categories() as $cat) {
                if($cat->cat_ID > 1) echo '<li class="dropdown'.($wp_query->query_vars['cat'] == $cat->cat_ID?' active':null).'"><a href="/category/'.$cat->slug.'">'. $cat->name .'</a></li>';
            }
            ?>
        </ul>
    </div>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 content">
            <h1 class="xs-menu-show">
                <span class="glyphicon glyphicon-menu-down visible-xs-inline"></span>
                Aktualności
                <span class="glyphicon glyphicon-menu-down visible-xs-inline"></span>
            </h1>
            <?php while ( have_posts() ) : the_post(); ?>
				<?php /*sowa_post_nav();*/ ?>
				<h2><?php the_title(); ?></h2>
				<?php comments_template(); ?>
            
            	<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sowa' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				<?php /*comments_template();*/ ?>
            <?php endwhile; ?>
        </div>
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>