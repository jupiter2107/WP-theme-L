<?php
/*
 * functions.php
 * WP Theme "L"
 */

// User Custom Functions.
// ** You can change this part. **

// 固定ページでの自動生成タグの無効化

add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
    global $post;
    $remove_filter = false;

    $arr_types = array('page'); //自動整形を無効にする投稿タイプを記述
    $post_type = get_post_type( $post->ID );
    if (in_array($post_type, $arr_types)) $remove_filter = true;

    if ( $remove_filter ) {
    	remove_filter('the_content', 'wptexturize');
    	remove_filter('the_excerpt', 'wptexturize');
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
    }

    return $content;
}

// Theme Functions.
// ** Do not change above here. **

// Activate user custom menus

add_theme_support( 'menus' );

register_nav_menus( array(
    'primary-left'     => __( 'Primary Menu Left', 'L' ),
    'primary-right'    => __( 'Primary Menu Right', 'L' ),
    'sidebar'          => __( 'Sidebar Menu', 'L' ),
) );

// Register Custom Navigation Walker

require_once('wp_bootstrap_navwalker.php');

// Activete thumbnails

add_theme_support( 'post-thumbnails' );

// Deacticate width, height option in <img>

function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

// Activate Bootstrap Tags in <img>

function my_image_class_filter( $classes ) {
	return $classes . ' img-rounded img-responsive';
}

add_filter( 'get_image_tag_class', 'my_image_class_filter' );

// Activate RSS2 Feed Link

add_theme_support( 'automatic-feed-links' );

// Activate Breadcrumb

function the_breadcrumb($divOption = array("id" => "breadcrumb", "class" => "clearfix")) {
  global $post;
  $str ='';
  if(!is_home()&&!is_admin()){ /* !is_admin は管理ページ以外という条件分岐 */
    $tagAttribute = '';
    foreach($divOption as $attrName => $attrValue){
      $tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
    }
    $str.= '<div'. $tagAttribute .'>';
    $str.= '<ol class="breadcrumb">';
    $str.= '<li><a href="'. home_url() .'/">HOME</a></li>';
  if(is_category()) {	//カテゴリーのアーカイブページ
    $cat = get_queried_object();
    if($cat -> parent != 0){
      $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
      foreach($ancestors as $ancestor){
        $str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
      }
    }
    $str.='<li>'. $cat -> name . '</li>';
  } elseif(is_single()){	//ブログの個別記事ページ
    $categories = get_the_category($post->ID);
    $cat = $categories[0];
    if($cat -> parent != 0){
      $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
      foreach($ancestors as $ancestor){
        $str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
      }
    }
    $str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
    $str.= '<li>'. $post -> post_title .'</li>';
  } elseif(is_page()){	//固定ページ
    if($post -> post_parent != 0 ){
      $ancestors = array_reverse(get_post_ancestors( $post->ID ));
      foreach($ancestors as $ancestor){
        $str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
      }
    }
    $str.= '<li>'. $post -> post_title .'</li>';
  } elseif(is_date()){	//日付ベースのアーカイブページ
    if(get_query_var('day') != 0){	//年別アーカイブ
      $str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
      $str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
      $str.='<li>'. get_query_var('day'). '日</li>';
    } elseif(get_query_var('monthnum') != 0){	//月別アーカイブ
      $str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
      $str.='<li>'. get_query_var('monthnum'). '月</li>';
    } else {	//年別アーカイブ
      $str.='<li>'. get_query_var('year') .'年</li>';
    }
  } elseif(is_search()) {	//検索結果表示ページ
    $str.='<li>「'. get_search_query() .'」で検索した結果</li>';
  } elseif(is_author()){	//投稿者のアーカイブページ
    $str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
  } elseif(is_tag()){	//タグのアーカイブページ
    $str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
  } elseif(is_attachment()){	//添付ファイルページ
    $str.= '<li>'. $post -> post_title .'</li>';
  } elseif(is_404()){	//404 Not Found ページ
    $str.='<li>404 Not found</li>';
  } else{	//その他
    $str.='<li>'. wp_title('', true) .'</li>';
  }
  $str.='</ol>';
  $str.='</div>';
  }
  echo $str;
}

// 投稿内オリジナルCSSの有効化

add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');

function custom_css_hooks() {
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}

function custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}

function save_custom_css($post_id) {
	if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_css = $_POST['custom_css'];
	update_post_meta($post_id, '_custom_css', $custom_css);
}

function insert_custom_css() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}

// 投稿内オリジナルJavaScriptの有効化

add_action('admin_menu', 'custom_js_hooks');
add_action('save_post', 'save_custom_js');
add_action('wp_footer','insert_custom_js');

function custom_js_hooks() {
	add_meta_box('custom_js', 'Custom JS', 'custom_js_input', 'post', 'normal', 'high');
	add_meta_box('custom_js', 'Custom JS', 'custom_js_input', 'page', 'normal', 'high');
}

function custom_js_input() {
	global $post;
	echo '<input type="hidden" name="custom_js_noncename" id="custom_js_noncename" value="'.wp_create_nonce('custom-js').'" />';
	echo '<textarea name="custom_js" id="custom_js" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_js',true).'</textarea>';
}

function save_custom_js($post_id) {
	if (!wp_verify_nonce($_POST['custom_js_noncename'], 'custom-js')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_js = $_POST['custom_js'];
	update_post_meta($post_id, '_custom_js', $custom_js);
}

function insert_custom_js() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<script type="text/javascript">'.get_post_meta(get_the_ID(), '_custom_js', true).'</script>';
		endwhile; endif;
		rewind_posts();
	}
}

// ナビゲーションで文字数を制限する

function WS_previous_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
WS_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, true, $maxlen);
}
function WS_next_post_link($maxlen = -1, $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
WS_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, false);
}

function WS_adjacent_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '', $previous = true) {

if ( $previous && is_attachment() )
$post = & get_post($GLOBALS['post']->post_parent);
else
$post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

if ( !$post )
return;

$tCnt = mb_strlen( $post->post_title, get_bloginfo('charset') );
if(($maxlen > 0)&&($tCnt > $maxlen)) {
$title = mb_substr( $post->post_title, 0, $maxlen, get_bloginfo('charset') ) . '…';
} else {
$title = $post->post_title;
}

if ( empty($post->post_title) )
$title = $previous ? __('Previous Post') : __('Next Post');

$title = apply_filters('the_title', $title, $post->ID);
$date = mysql2date(get_option('date_format'), $post->post_date);
$rel = $previous ? 'prev' : 'next';

$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'">';
$link = str_replace('%title', $title, $link);
$link = str_replace('%date', $date, $link);
$link = $string . $link . '</a>';

$format = str_replace('%link', $link, $format);
echo $format;
}

// ウィジェット - オリジナルカレンダー

function get_my_calendar($initial = true, $echo = true) {
	global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

	$key = md5( $m . $monthnum . $year );
	if ( $cache = wp_cache_get( 'get_my_calendar', 'calendar' ) ) {
		if ( is_array($cache) && isset( $cache[ $key ] ) ) {
			if ( $echo ) {
				/** This filter is documented in wp-includes/general-template.php */
				echo apply_filters( 'get_my_calendar', $cache[$key] );
				return;
			} else {
				/** This filter is documented in wp-includes/general-template.php */
				return apply_filters( 'get_my_calendar', $cache[$key] );
			}
		}
	}

	if ( !is_array($cache) )
		$cache = array();

	// Quick check. If we have no posts at all, abort!
	if ( !$posts ) {
		$gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' LIMIT 1");
		if ( !$gotsome ) {
			$cache[ $key ] = '';
			wp_cache_set( 'get_my_calendar', $cache, 'calendar' );
			return;
		}
	}

	if ( isset($_GET['w']) )
		$w = ''.intval($_GET['w']);

	// week_begins = 0 stands for Sunday
	$week_begins = intval(get_option('start_of_week'));

	// Let's figure out when we are
	if ( !empty($monthnum) && !empty($year) ) {
		$thismonth = ''.zeroise(intval($monthnum), 2);
		$thisyear = ''.intval($year);
	} elseif ( !empty($w) ) {
		// We need to get the month from MySQL
		$thisyear = ''.intval(substr($m, 0, 4));
		$d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
		$thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('{$thisyear}0101', INTERVAL $d DAY) ), '%m')");
	} elseif ( !empty($m) ) {
		$thisyear = ''.intval(substr($m, 0, 4));
		if ( strlen($m) < 6 )
				$thismonth = '01';
		else
				$thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
	} else {
		$thisyear = gmdate('Y', current_time('timestamp'));
		$thismonth = gmdate('m', current_time('timestamp'));
	}

	$unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);
	$last_day = date('t', $unixmonth);

	// Get the next and previous month and year with at least one post
	$previous = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
		FROM $wpdb->posts
		WHERE post_date < '$thisyear-$thismonth-01'
		AND post_type = 'post' AND post_status = 'publish'
			ORDER BY post_date DESC
			LIMIT 1");
	$next = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
		FROM $wpdb->posts
		WHERE post_date > '$thisyear-$thismonth-{$last_day} 23:59:59'
		AND post_type = 'post' AND post_status = 'publish'
			ORDER BY post_date ASC
			LIMIT 1");

	/* translators: Calendar caption: 1: month name, 2: 4-digit year */
	$calendar_caption = _x('%1$s %2$s', 'calendar caption');
	$calendar_output = '
	<h5 class="text-center">' . sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) . '</h5>
	<table id="wp-calendar" class="table">
	<tr>';

	$myweek = array();

	for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
		$myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
	}

	foreach ( $myweek as $wd ) {
		$day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
		$wd = esc_attr($wd);
		$calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
	}

	$calendar_output .= '
	</tr>

	<tfoot>
	<tr>';

	if ( $previous ) {
		$calendar_output .= "\n\t\t".'<td colspan="3" id="prev"><a href="' . get_month_link($previous->year, $previous->month) . '" class="btn btn-default btn-block" role="button">&laquo; ' . $wp_locale->get_month_abbrev($wp_locale->get_month($previous->month)) . '</a></td>';
	} else {
		$calendar_output .= "\n\t\t".'<td colspan="3" id="prev" class="pad">&nbsp;</td>';
	}

	$calendar_output .= "\n\t\t".'<td class="pad">&nbsp;</td>';

	if ( $next ) {
		$calendar_output .= "\n\t\t".'<td colspan="3" id="next"><a href="' . get_month_link($next->year, $next->month) . '" class="btn btn-default btn-block" role="button">' . $wp_locale->get_month_abbrev($wp_locale->get_month($next->month)) . ' &raquo;</a></td>';
	} else {
		$calendar_output .= "\n\t\t".'<td colspan="3" id="next" class="pad">&nbsp;</td>';
	}

	$calendar_output .= '
	</tr>
	</tfoot>

	<tbody>
	<tr>';

	// Get days with posts
	$dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
		FROM $wpdb->posts WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00'
		AND post_type = 'post' AND post_status = 'publish'
		AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59'", ARRAY_N);
	if ( $dayswithposts ) {
		foreach ( (array) $dayswithposts as $daywith ) {
			$daywithpost[] = $daywith[0];
		}
	} else {
		$daywithpost = array();
	}

	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
		$ak_title_separator = "\n";
	else
		$ak_title_separator = ', ';

	$ak_titles_for_day = array();
	$ak_post_titles = $wpdb->get_results("SELECT ID, post_title, DAYOFMONTH(post_date) as dom "
		."FROM $wpdb->posts "
		."WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00' "
		."AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59' "
		."AND post_type = 'post' AND post_status = 'publish'"
	);
	if ( $ak_post_titles ) {
		foreach ( (array) $ak_post_titles as $ak_post_title ) {

				/** This filter is documented in wp-includes/post-template.php */
				$post_title = esc_attr( apply_filters( 'the_title', $ak_post_title->post_title, $ak_post_title->ID ) );

				if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
					$ak_titles_for_day['day_'.$ak_post_title->dom] = '';
				if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
					$ak_titles_for_day["$ak_post_title->dom"] = $post_title;
				else
					$ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
		}
	}

	// See how much we should pad in the beginning
	$pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
	if ( 0 != $pad )
		$calendar_output .= "\n\t\t".'<td colspan="'. esc_attr($pad) .'" class="pad">&nbsp;</td>';

	$daysinmonth = intval(date('t', $unixmonth));
	for ( $day = 1; $day <= $daysinmonth; ++$day ) {
		if ( isset($newrow) && $newrow )
			$calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
		$newrow = false;

		if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
			$calendar_output .= '<td id="today">';
		else
			$calendar_output .= '<td>';

		if ( in_array($day, $daywithpost) ) // any posts today?
				$calendar_output .= '<a href="' . get_day_link( $thisyear, $thismonth, $day ) . '" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
		else
			$calendar_output .= $day;
		$calendar_output .= '</td>';

		if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
			$newrow = true;
	}

	$pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
	if ( $pad != 0 && $pad != 7 )
		$calendar_output .= "\n\t\t".'<td class="pad" colspan="'. esc_attr($pad) .'">&nbsp;</td>';

	$calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table>";

	$cache[ $key ] = $calendar_output;
	wp_cache_set( 'get_my_calendar', $cache, 'calendar' );

	if ( $echo ) {
		/**
		 * Filter the HTML calendar output.
		 *
		 * @since 3.0.0
		 *
		 * @param string $calendar_output HTML output of the calendar.
		 */
		echo apply_filters( 'get_my_calendar', $calendar_output );
	} else {
		/** This filter is documented in wp-includes/general-template.php */
		return apply_filters( 'get_my_calendar', $calendar_output );
	}

}

?>
