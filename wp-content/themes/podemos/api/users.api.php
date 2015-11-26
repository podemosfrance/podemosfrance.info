<?php
// $api_vars['id']
// $api_vars['get']
$userdata = get_userdata($api_vars['id']);
$return = array (
					'ID' => $userdata->ID,
					$api_vars['get'] => $userdata->data->$api_vars['get']
				);
wp_send_json($return);

?>