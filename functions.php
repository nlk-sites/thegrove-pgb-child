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
