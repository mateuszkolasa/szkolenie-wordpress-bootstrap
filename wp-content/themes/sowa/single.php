<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php 
$custom = get_post_custom();

if($custom['menu'][0] == 'off') {
?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
            <h1 class="xs-menu-show">
                <span class="glyphicon glyphicon-menu-down visible-xs-inline"></span>
                <?php the_title(); ?>
                <span class="glyphicon glyphicon-menu-down visible-xs-inline"></span>
            </h1>
            	<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sowa' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				<?php /*comments_template();*/ ?>
        </div>
    </div>
<?php
} else { 
?>
     <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <ul class="nav nav-pills nav-stacked left-menu hidden-xs">
                <!-- <li class="dropdown-header">Wina na kieliszki</li>
                <li class="dropdown active"><a href="/">Szampan oraz wina musujące</a></li>
                <li class="dropdown"><a href="/">White dry wines</a></li>
                <li class="dropdown"><a href="/">Rose dry wines</a></li>
                <li class="dropdown"><a href="/">Red dry wines</a></li>
                <li class="dropdown"><a href="/">Wina pół wytrawne, pół słodkie i słodkie</a></li>-->
                <?php
                $page = get_queried_object();
                if($page->post_parent == null) {
                    echo '<li class="dropdown active"><a href="'.$page->post_name.'">'.$page->post_title.'</a></li>'; 
                    foreach(get_pages(array('child_of' => get_the_ID())) as $page) {;
                        echo '<li class="dropdown"><a href="'.$page->post_name.'">'.$page->post_title.'</a></li>';
                    }
                } else {
                    $parent = get_children(array('post_parent' => $page->post_parent));
                    
                    //echo '<pre>' . print_r($parent, 1) . '</pre>';
                    
                    //echo '<li class="dropdown"><a href="'.$parent->post_name.'">'.$parent->post_title.'</a></li>';
                    foreach($parent as $p) {
                        echo '<li class="dropdown'.($p->ID == get_the_ID()?' active':null).'"><a href="'.$p->post_name.'">'.$p->post_title.'</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
        
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 content">
            <h1 class="xs-menu-show">
                <span class="glyphicon glyphicon-menu-down visible-xs-inline"></span>
                <?php the_title(); ?>
                <span class="glyphicon glyphicon-menu-down visible-xs-inline"></span>
            </h1>
            	<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sowa' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				<?php /*comments_template();*/ ?>
        </div>
    </div>
<?php
}
?>
<?php endwhile; ?>
<?php /*get_sidebar();*/ ?>
<?php get_footer(); ?>