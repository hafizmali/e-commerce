<?php // Creating Recent Post With Thumbnail Widget
class recent_posts_widget2 extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'recent_posts_widget',
// Widget name will appear in UI
            esc_html__('Ecoshop Recent Posts With Thumbnails', 'ecoshop'),
// Widget description
            array( 'description' => esc_html__( 'Use this widget for recent posts with thumbnails.', 'ecoshop' ), )
        );
    }
// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $number_posts = apply_filters( 'number_posts', $instance['number_posts'] );
// before and after widget arguments are defined by themes
        echo ''.$args['before_widget'];
        if ( ! empty( $title ) )
            echo ''.$args['before_title'] . $title . $args['after_title'];
// This is where you run the code and display the output
        if(!empty ($number_posts))
            $argo = array(
                'post_type' => 'post',
                'posts_per_page'    => $number_posts,
                'order' => 'DESC',
                'post_status' => 'publish'
            );
        $query = new WP_Query( $argo );
        $rp_count = 50; ?>
        <ul class="papu-post margin-top-20">
            <?php while($query->have_posts()): $query->the_post(); ?>
                <li class="media">
                    <?php if(has_post_thumbnail()){ ?>
                        <div class="media-left">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo ecoshop_get_the_post_thumbnail( get_the_ID(),60,60); ?>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="media-body">
                        <a class="media-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <span><?php esc_attr_e('Posted on ','ecoshop'); echo get_the_time('M j'); ?></span>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
            <?php wp_reset_postdata();
        echo ''.$args['after_widget'];
    }
// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = "Recent Posts";
        }
        if ( isset( $instance[ 'number_posts' ] ) ) {
            $number_posts = $instance[ 'number_posts' ];
        } else {
            $number_posts = 5;
        }
    // Widget admin form
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'title' ); ?>" name="<?php echo ''.$this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number Of Posts:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'number_posts' ); ?>" name="<?php echo ''.$this->get_field_name( 'number_posts' ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>
    <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number_posts'] = ( ! empty( $new_instance['number_posts'] ) ) ? strip_tags( $new_instance['number_posts'] ) : '';
        return $instance;
    }
} // Class recent_posts_widget ends here
// Register and load the widget
function rp_load_widget2() {
    register_widget( 'recent_posts_widget2' );
}
add_action( 'widgets_init', 'rp_load_widget2' );

// Creating Feature Banner Widget
class feature_banner_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
// Base ID of your widget
            'feature_banner_widget',
// Widget name will appear in UI
            esc_html__('Ecoshop Feature Banner', 'ecoshop'),
// Widget description
            array( 'description' => esc_html__( 'Use this widget for feature banner.', 'ecoshop' ), )
        );
    }
// Creating widget front-end
// This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $currency_symbol = apply_filters( 'currency_symbol', $instance['currency_symbol'] );
        $price = apply_filters( 'price', $instance['price'] );
        $heading = apply_filters( 'heading', $instance['heading'] );
        $img_url = apply_filters( 'img_url', $instance['img_url'] );
    // before and after widget arguments are defined by themes
        echo ''.$args['before_widget'];
        if ( ! empty( $title ) )
            echo ''.$args['before_title'] . $title . $args['after_title'];
    // This is where you run the code and display the output
         ?>
        <div class="side-bnr margin-top-50">
            <img class="img-responsive" src="<?php echo esc_url($img_url); ?>" alt="">
            <div class="position-center-center">
            <span class="price">
                <small><?php echo esc_attr($currency_symbol); ?></small><?php echo esc_attr($price); ?>
            </span>
                <div class="bnr-text"><?php echo esc_attr($heading); ?></div>
            </div>
        </div>
        <?php echo ''.$args['after_widget'];
    }
    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = "";
        }
        if ( isset( $instance[ 'currency_symbol' ] ) ) {
            $currency_symbol = $instance[ 'currency_symbol' ];
        } else {
            $currency_symbol = '';
        }
        if ( isset( $instance[ 'price' ] ) ) {
            $price = $instance[ 'price' ];
        } else {
            $price = '';
        }
        if ( isset( $instance[ 'heading' ] ) ) {
            $heading = $instance[ 'heading' ];
        } else {
            $heading = '';
        }
        if ( isset( $instance[ 'img_url' ] ) ) {
            $img_url = $instance[ 'img_url' ];
        } else {
            $img_url = '';
        }
    // Widget admin form
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'title' ); ?>" name="<?php echo ''.$this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'currency_symbol' ); ?>"><?php esc_html_e( 'Currency Symbol:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'currency_symbol' ); ?>" name="<?php echo ''.$this->get_field_name( 'currency_symbol' ); ?>" type="text" value="<?php echo esc_attr( $currency_symbol ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'price' ); ?>"><?php esc_html_e( 'Price:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'price' ); ?>" name="<?php echo ''.$this->get_field_name( 'price' ); ?>" type="text" value="<?php echo esc_attr( $price ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'heading' ); ?>"><?php esc_html_e( 'Heading:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'heading' ); ?>" name="<?php echo ''.$this->get_field_name( 'heading' ); ?>" type="text" value="<?php echo esc_attr( $heading ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id( 'img_url' ); ?>"><?php esc_html_e( 'Image URL:','ecoshop' ); ?></label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id( 'img_url' ); ?>" name="<?php echo ''.$this->get_field_name( 'img_url' ); ?>" type="text" value="<?php echo esc_attr( $img_url ); ?>" />
        </p>
    <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['currency_symbol'] = ( ! empty( $new_instance['currency_symbol'] ) ) ? strip_tags( $new_instance['currency_symbol'] ) : '';
        $instance['price'] = ( ! empty( $new_instance['price'] ) ) ? strip_tags( $new_instance['price'] ) : '';
        $instance['heading'] = ( ! empty( $new_instance['heading'] ) ) ? strip_tags( $new_instance['heading'] ) : '';
        $instance['img_url'] = ( ! empty( $new_instance['img_url'] ) ) ? strip_tags( $new_instance['img_url'] ) : '';
        return $instance;
    }
} // Class recent_posts_widget ends here
// Register and load the widget
function feature_banner_widget() {
    register_widget( 'feature_banner_widget' );
}
add_action( 'widgets_init', 'feature_banner_widget' );
?>