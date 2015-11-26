<?php
// $api_vars['id']
// $api_vars['get']
function get_api_value($id , $get)
{
	if($get == 'post_title')
	{
		return mb_convert_encoding(get_the_title(),'HTML-ENTITIES','UTF-8');
	}
	else
	{
		return mb_convert_encoding(get_field($get,$id),'HTML-ENTITIES','UTF-8');
	}
}
$return = array (
					$api_vars['get'] => get_api_value($api_vars['id'] , $api_vars['get'])
				);
wp_send_json($return);

?>