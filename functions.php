<?php
/**
 * pgb-child functions and definitions
 */
add_action('wp_enqueue_scripts', 'pgb_child_enqueue_styles');

function pgb_child_enqueue_styles() {
    wp_enqueue_style('pgb', get_template_directory_uri() . '/style.css');
}

function new_excerpt_more($more) {
    global $post;
    return '';
}

add_filter('excerpt_more', 'new_excerpt_more');



/* Recent posts with excerpt Widget */

class RecentPostsExcerpt_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'rpexp_widget', // Base ID
                __('Posts With Excerpts', 'text_domain'), // Name
                array('description' => __('It displays posts with title and excerpt', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        $gp_args = array(
            'posts_per_page' => 3,
            'post_type' => 'post',
            'post_status' => 'publish',
            "cat"=>1
        );
        wp_reset_postdata();
        $posts = get_posts($gp_args);
        ?>

        <div class="grove-recent-blog">
            <?php
            foreach ($posts as $post) {
                setup_postdata($post);
                ?>
				<div class="single-rp">
					<h3><?php echo $post->post_title; ?></h3>
					<p><?php echo $post->post_excerpt; ?></p>
					<a href="<?php echo get_permalink($post->ID); ?>" class="grove-read-more">Read More</a>
				</div>
                <?php
            }wp_reset_postdata();
            ?>
        </div>
        <?php
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'text_domain');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}

// class Foo_Widget
// register Foo_Widget widget
function register_foo_widget() {
    register_widget('RecentPostsExcerpt_Widget');
}

add_action('widgets_init', 'register_foo_widget');

function custom_age_verification_button_text( $translated, $text, $domain ) {
    if( 'popup-maker-age-verification-modals' == $domain ) {
        if( 'Enter' == $text ) {
            $translated = 'Yes, I am at least 18 years old';  // not recipe instructions!
        }
        elseif( 'Exit' == $text ) {
            $translated = 'No, I am not';  // not recipe instructions!
        }
    }

    return $translated;
}

add_filter( 'gettext', 'custom_age_verification_button_text', 10, 3 );


add_filter( 'wp_nav_menu_items', 'grove_menu_item', 10, 2 );
function grove_menu_item ( $items, $args ) {
	if ($args->menu == 'Top Menu') {
        $items .= '<li class="loyalty loyalty_title">Loyalty Program</li>';
		$items .= '<li class="loyalty loyalty_btn"><a href="http://www.thegrovenv.com/the-grove-society/" class="btn btn-primary btn-hollow">The Grove Society</a></li>';
    }
    return $items;
}

/* Function for reducing the post content to specified string length. */
function get_teaser_text($string,$number_of_characters) {
		
	$string = strip_tags($string);//striping html tags from the content
	if(strlen($string)>$number_of_characters) {
		return substr(strip_tags($string),0,$number_of_characters).'...';
	} else {
		return $string;
	}
}


// code for validation user age 18+
add_filter('gform_validation_3', 'verify_minimum_age');
function verify_minimum_age($validation_result){
 
    // retrieve the $form
    $form = $validation_result['form'];
 
        // date of birth is submitted in field 7 in the format YYYY-MM-DD
        // change the 7 here to your field ID
        $dob = rgpost('input_6');
 
        // this the minimum age requirement we are validating
        $minimum_age = 18;
 
        // calculate age in years like a human, not a computer, based on the same birth date every year
        $age = date('Y') - substr($dob, 6, 4);
        if (strtotime(date('Y-m-d')) - strtotime(date('Y') . '-' . substr($dob, 0, 2) . '-' . substr($dob, 3, 2)) < 0) {
            $age--;
        }
 
    // is $age less than the $minimum_age?
    if( $age < $minimum_age ){
 
        // set the form validation to false if age is less than the minimum age
        $validation_result['is_valid'] = false;
 
        // find field with ID of 7 and mark it as failed validation
        foreach($form['fields'] as &$field){
 
            // NOTE: replace 7 with the field you would like to mark invalid
            if($field['id'] == '6'){
                $field['failed_validation'] = true;
                $field['validation_message'] = "Sorry, you must be at least $minimum_age years old.";
                break;
            }
 
        }
 
    }
    // assign modified $form object back to the validation result
    $validation_result['form'] = $form;
    return $validation_result;
}
