<?php
/*** 注册菜单 ***/
register_nav_menu( 'primary', '主导航' );

/*** 特色图像 ***/
add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'change_img_size' );
function change_img_size() {
  update_option( 'thumbnail_size_w', 400 );
  update_option( 'thumbnail_size_h', 300 );
  update_option( 'thumbnail_crop', 1 );

  update_option( 'large_size_w', 1200 );
  update_option( 'large_size_h', 350 );
  update_option( 'large_crop', 1 );
  
  update_option( 'medium_size_w', 780 );
  update_option( 'medium_size_h', 300 );//520
  update_option( 'medium_crop', 1 );

  add_image_size( 'small', 380, 240, 1 );

  add_image_size( 'md-square', 270, 270, 1 );
  add_image_size( 'sm-square', 80, 80, 1 );
}

/*** 修改默认jquery版本 ***/
function add_scripts() { 
  wp_deregister_script( 'jquery' ); 
  wp_register_script( 'jquery', 'http://libs.baidu.com/jquery/1.11.1/jquery.min.js'); //9
  wp_enqueue_script( 'jquery' ); 
}

add_action('wp_enqueue_scripts', 'add_scripts');

/*** Bootstrap Breadcrumb ***/
if (!function_exists("breadcrumb")):
  function breadcrumb() {

    $delimiter = ' <i class="fa fa-angle-double-right"></i> ';
    $name = '<li><a href="/">首页</a></li>'; //text for the 'Home' link
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';

    echo '<div class="breadcrumb"><div class="container"><h1 class="page-title">';

    wp_title('');

    echo '</h1><ul>';
 
    global $post;
    $home = get_bloginfo('url');
    echo '' . $name . ' ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '';
      single_cat_title();
      echo '' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo '' . get_the_time('F') . ' ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '' . get_the_title($page->ID) . '';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . '&#39;' . get_search_query() . '&#39;的搜索结果：' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . '打有';
      single_tag_title();
      echo '标签的文章' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . '由' . $userdata->display_name .'撰写的文章'. $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . '404错误' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '(';
      echo '第'.get_query_var('paged').'页';
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ul></div></div>';
 
  }
endif;

/*** 相关文章 ***/
if (!function_exists("related_posts")):
  function related_posts(){
    wp_reset_query();
    global $post;
    $cat = wp_get_post_categories($post->ID);
    if ($cat) {
      $args = array(
        'category__in' => array($cat[0]),
        'post__not_in' => array($post->ID),
        'showposts' => 4
        );
      query_posts($args);

      echo "<div class='related-list'>";
      while (have_posts()) {
        the_post();
        /* related-thumb */
        echo "<div class='aside-item'><div class='related-thumb'><a href='";
          the_permalink();
        echo "' rel='bookmark' title='";
          the_title_attribute();
        echo "'>";
          the_post_thumbnail('sm-square', array( 'class' => 'related-img' ));
        echo "</a></div>";
        /* related-title */
        echo "<div class='related-info'><a href='";
          the_permalink();
        echo "' rel='bookmark' title='";
          the_title_attribute();
        echo "'><h3 class='related-title'>";
          the_title();
        echo "</h3></a>";
        /* related-excerpt */
        echo "<div class='related-excerpt'>";
          the_excerpt();
        echo "</div></div></div>";
      }
      echo "</div>";
      wp_reset_query();
    }
  }
endif;

/*** 推荐文章 ***/
if (!function_exists("suggest_posts")):
  function suggest_posts(){
    wp_reset_query();
    global $post;
    $cat = wp_get_post_categories($post->ID);
    if ($cat) {
      $args = array(
        'category__in' => array($cat[0]),
        'post__not_in' => array($post->ID),
        'showposts' => 4
        );
      query_posts($args);

      echo "<div class='suggest-list'>";
      while (have_posts()) {
        the_post();
        /* suggest-title */
        echo "<div class='aside-item'><a href='";
          the_permalink();
        echo "' rel='bookmark' title='";
          the_title_attribute();
        echo "'><h3 class='suggest-title'>";
          the_title();
        echo "</h3></a>";
        /* suggest-thumb */
        echo "<a href='";
          the_permalink();
        echo "' rel='bookmark' title='";
          the_title_attribute();
        echo "'>";
          the_post_thumbnail('small', array( 'class' => 'suggest-img' ));
        echo "</a></div>";
      }
      echo "</div>";
      wp_reset_query();
    }
  }
endif;

/*** Widgets ***/
if(!function_exists('widgets_init')):

  function widgets_init() {
    register_sidebar( array(
      'name'          => __( '页脚左' ),
      'id'            => 'footer-left',
      'description'   => __( '页面页脚位置左边的小工具' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
      'name'          => __( '页脚中' ),
      'id'            => 'footer-center',
      'description'   => __( '页面页脚位置中间的小工具' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
      'name'          => __( '页脚右' ),
      'id'            => 'footer-right',
      'description'   => __( '页面页脚位置右边的小工具' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
  }
  
  add_action( 'widgets_init', 'widgets_init' );
endif;