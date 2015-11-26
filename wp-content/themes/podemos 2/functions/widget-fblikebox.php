<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: PODEMOS FACEBOOK WDGT
	Description: Widget para mostrar las noticias de la pagina de Facebook de nuestro grupo.
	Version: BETA

-----------------------------------------------------------------------------------*/
add_action('widgets_init', 'facebook_like_load_widgets');

function facebook_like_load_widgets()
{
	register_widget('Facebook_Like_Widget');
}

class Facebook_Like_Widget extends WP_Widget {
	
	function Facebook_Like_Widget()
	{
		$widget_ops = array('classname' => 'facebook_like', 'description' => __('Añade el widget para Facebook.','mythemeshop'));

		$control_ops = array('id_base' => 'facebook-like-widget');

		$this->WP_Widget('facebook-like-widget', __('PODEMOS FACEBOOK WDGT','mythemeshop'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$page_url = $instance['page_url'];
		$width = $instance['width'];
		$color_scheme = $instance['color_scheme'];
		$show_faces = isset($instance['show_faces']) ? 'true' : 'false';
		$show_stream = isset($instance['show_stream']) ? 'true' : 'false';
		$show_header = isset($instance['show_header']) ? 'true' : 'false';
		$height = '65';
		
		if($show_faces == 'true') {
			$height = '238';
		}
		
		if($show_stream == 'true') {
			$height = '600';
		}
		
		if($show_header == 'true') {
			$height = '600';
		}
		
		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		
		if($page_url): ?>
		<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($page_url); ?>&amp;width=<?php echo $width; ?>&amp;colorscheme=<?php echo $color_scheme; ?>&amp;show_faces=<?php echo $show_faces; ?>&amp;stream=<?php echo $show_stream; ?>&amp;header=<?php echo $show_header; ?>&amp;height=<?php echo $height; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $width; ?>px; height: <?php echo $height; ?>px; background: #FFF;" ></iframe>
		<?php endif;
		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['page_url'] = $new_instance['page_url'];
		$instance['width'] = $new_instance['width'];
		$instance['color_scheme'] = $new_instance['color_scheme'];
		$instance['show_faces'] = $new_instance['show_faces'];
		$instance['show_stream'] = $new_instance['show_stream'];
		$instance['show_header'] = $new_instance['show_header'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => __('Búscanos en Facebook','mythemeshop'), 'page_url' => '', 'width' => '300', 'color_scheme' => 'light', 'show_faces' => 'on', 'show_stream' => false, 'show_header' => false);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titulo','mythemeshop'); ?>:</label>
			<input type="text" class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Dirección de la página de FACEBOOK','mythemeshop'); ?>:</label>
			<input type="text" class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" value="<?php echo $instance['page_url']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Anchura','mythemeshop'); ?>:</label>
			<input type="text" class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $instance['width']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('color_scheme'); ?>"><?php _e('Esquema de color','mythemeshop'); ?>:</label> 
			<select id="<?php echo $this->get_field_id('color_scheme'); ?>" name="<?php echo $this->get_field_name('color_scheme'); ?>" style="width:100%;">
				<option <?php if ('light' == $instance['color_scheme']) echo 'selected="selected"'; ?>><?php _e('claro','mythemeshop'); ?></option>
				<option <?php if ('dark' == $instance['color_scheme']) echo 'selected="selected"'; ?>><?php _e('oscuro','mythemeshop'); ?></option>
			</select>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_faces'], 'on'); ?> id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_faces'); ?>"><?php _e('Mostrar caras','mythemeshop'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_stream'], 'on'); ?> id="<?php echo $this->get_field_id('show_stream'); ?>" name="<?php echo $this->get_field_name('show_stream'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_stream'); ?>"><?php _e('Mostrar stream','mythemeshop'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_header'], 'on'); ?> id="<?php echo $this->get_field_id('show_header'); ?>" name="<?php echo $this->get_field_name('show_header'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_header'); ?>"><?php _e('Mostrar cabecera de Facebook','mythemeshop'); ?></label>
		</p>
	<?php
	}
}
?>