<?php

// Adds widget: CityWide Address
class Citywideaddress_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'citywideaddress_widget',
			esc_html__( 'CityWide Address', 'citywide' ),
			array( 'description' => esc_html__( 'Citywide Address Info widget', 'citywide' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Address',
			'id' => 'contact-address',
			'type' => 'textarea',
		),
		array(
			'label' => 'Phone Number',
			'id' => 'phone-number',
			'type' => 'text',
		),
		array(
			'label' => 'Email',
			'id' => 'email-address',
			'type' => 'text',
		),
	);

	public function widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        echo '<div class="footer-address-info">';

            if ( ! empty( $instance['contact-address'] ) ) {
                echo '<div class="single-info"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> '.wpautop( $instance['contact-address'] ).'</div>';
            }
            if ( ! empty( $instance['phone-number'] ) ) {
                echo '<div class="single-info"><span><i class="fa fa-phone" aria-hidden="true"></i></i></span> '.wpautop( $instance['phone-number'] ).'</div>';
            }
            if ( ! empty( $instance['contact-address'] ) ) {
                echo '<div class="single-info"><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> '.wpautop( $instance['email-address'] ).'</div>';
            }

        echo '</div>';
		
        echo wp_kses_post( $args['after_widget'] );
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'citywide' );
			switch ( $widget_field['type'] ) {
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'citywide' ).':</label> ';
					$output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'citywide' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'citywide' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'citywide' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_citywideaddress_widget() {
	register_widget( 'Citywideaddress_Widget' );
}
add_action( 'widgets_init', 'register_citywideaddress_widget' );