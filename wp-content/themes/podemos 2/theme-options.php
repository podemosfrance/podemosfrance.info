<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 *
 */
require_once( dirname( __FILE__ ) . '/options/options.php' );

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('Sección añadida', 'mythemeshop'),
				'desc' => __('<p class="description">Esta es una sección creada por la adición de un filtro a la matriz de secciones</p>', 'mythemeshop'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there are to be overridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;
//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'mythemeshop');

//Setup custom links in the footer for share icons


//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'point';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Opciones del tema', 'mythemeshop');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Opciones del tema', 'mythemeshop');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
/*

$args['page_position'] = 62;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-1',
							'title' => __('Support', 'mythemeshop'),
							'content' => __('<p>If you are facing any problem with our theme or theme option panel, head over to our <a href="http://mythemeshop.com/support">Knowledge Base</a></p>', 'mythemeshop')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-3',
							'title' => __('Credit', 'mythemeshop'),
							'content' => __('<p>Options Panel created using the <a href="http://leemason.github.com/NHP-Theme-Options-Framework/" target="_blank">NHP Theme Options Framework</a> Version 1.0.5</p>', 'mythemeshop')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-2',
							'title' => __('Earn Money', 'mythemeshop'),
							'content' => __('<p>Earn 60% commision on every sale by refering your friends and readers. Join our <a href="http://mythemeshop.com/affiliate-program/">Affiliate Program</a>.</p>', 'mythemeshop')
							);

//Set the Help Sidebar for the options page - no sidebar by default										
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'mythemeshop');

*/

$sections = array();


$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/generalsetting.png',
				'title' => __('Opciones Generales', 'mythemeshop'),
				'desc' => __('<p class="description">Desde esta pestaña puedes configurar las opciones generales.</p>', 'mythemeshop'),
				'fields' => array(
				
					array(
						'id' => 'mts_logo',
						'type' => 'upload',
						'title' => __('Logo imagen', 'mythemeshop'), 
						'sub_desc' => __('Sube tu logo <strong>(Tamaño recomendado de 152x60px)</strong> utilizando el botón de subida o inserta la dirección donde este alojada la imagen.', 'mythemeshop')
						),
					array(
						'id' => 'mts_footer_logo',
						'type' => 'upload',
						'title' => __('Logo Imagen del pie de página', 'mythemeshop'), 
						'sub_desc' => __('Sube tu logo <strong>(Tamaño recomendado de 152x60px)</strong> utilizando el botón de subida o inserta la dirección donde este alojada la imagen.', 'mythemeshop')
						),
					array(
						'id' => 'mts_favicon',
						'type' => 'upload',
						'title' => __('Favicon', 'mythemeshop'), 
						'sub_desc' => __('Suba una imagen con tamaño <strong>16 x 16 px</strong> que represente el favicon del sitio web', 'mythemeshop')
						),
					array(
						'id' => 'mts_header_code',
						'type' => 'textarea',
						'title' => __('Código de la cabecera', 'mythemeshop'), 
						'sub_desc' => __('Ingresa el código que necesites', 'mythemeshop')
						),
					array(
						'id' => 'mts_copyrights',
						'type' => 'textarea',
						'title' => __('Texto en el pie de página', 'mythemeshop'), 
						'sub_desc' => __('Ingresa texto o codigo en el pie de pagina. Ej: iconos de las redes sociales', ''),
						
						),
					array(
						'id' => 'mts_trending_articles',
						'type' => 'checkbox_hide_below',
						'title' => __('Código para menu arriba', 'nhp-opts'), 
						'sub_desc' => __('<strong>Permite</strong> que se cree un menu en la parte superior de la web que puede ser utilizado para lo que deseas. Ej: utilizar el rss de podemos.info o rss de una categoria que puede ser la de EVENTOS/NOTICIAS.', 'nhp-opts'),
						),
						array(
						'id' => 'mts_trending_articles_cat',
						'type' => 'cats_select',
						'title' => __('Categoria para el menu arriba(top)', 'nhp-opts'), 
						'sub_desc' => __('Seleccione una categoría en el menú desplegable, las últimas cuatro artículos de esta categoría se mostrarán en el menu top que se creará.', 'nhp-opts'),
						'args' => array('number' => '100')
						),
					array(
						'id' => 'mts_featured_slider',
						'type' => 'checkbox_hide_below',
						'title' => __('Seccion en el index relacionadas', 'mythemeshop'), 
						'sub_desc' => __('<strong>Permite o no</strong> en la pagina principal una seccion para categorias relacionadas usando un check box. Aparecen 4 nuevas noticias de esa categoria seleccionada.', 'mythemeshop'),
						'std' => '0',
						),
						array(
						'id' => 'mts_featured_slider_cat',
						'type' => 'cats_multi_select',
						'title' => __('Categoria relacionada', 'mythemeshop'), 
						'sub_desc' => __('Selecciona una categortia del menu (ultimas 4 noticias de una categoria escogida). Usa el boton control para añadir mas de una.', 'mythemeshop'),
						'args' => array('number' => '100'),
						),
					array(
						'id' => 'mts_featured_carousel',
						'type' => 'checkbox_hide_below',
						'title' => __('Pie de página. Noticias relacionadas', 'mythemeshop'), 
						'sub_desc' => __('<strong>Permite o no</strong> crear una seccion de noticias relacionadas usando un check box. Apareceran 6 entrads recientes de la categoria seleccionada.', 'mythemeshop'),
						'std' => '0',
						),
						array(
						'id' => 'mts_featured_carousel_cat',
						'type' => 'cats_select',
						'title' => __('Carousel Categoria', 'mythemeshop'), 
						'sub_desc' => __('Seleccionar una categoria del menu. Aparecerá las 6 ultimas entradas de la categoria que elijas<strong>en la sección del pie de página</strong>.', 'mythemeshop'),
						'args' => array('number' => '100')
						),
					array(
						'id' => 'mts_pagenavigation',
						'type' => 'checkbox',
						'title' => __('Paginación', 'mythemeshop'),
						'sub_desc' => __('Activar o desactivar la navegación, sustituye el titulo "Entradas antiguas" y "Entradas más recientes" por páginas numeradas.', 'mythemeshop'),
						'std' => '1'
						),				
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/stylesetting.png',
				'title' => __('Opciones de estilo', 'mythemeshop'),
				'desc' => __('<p class="description">Control visual de la apariencia.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_color_scheme',
						'type' => 'color',
						'title' => __('Esquema del color primario', 'mythemeshop'), 
						'sub_desc' => __('Utiliza como color principal el morado #672F6C o el verde #019875', 'mythemeshop'),
						'std' => '#672F6C'
						),
					array(
						'id' => 'mts_color2_scheme',
						'type' => 'color',
						'title' => __('Esquema del color secundario', 'mythemeshop'), 
						'sub_desc' => __('Utiliza como color secundario el verde #97C2B8 o el morado #A081A1', 'mythemeshop'),
						'std' => '#97C2B8'
						),
					array(
						'id' => 'mts_layout',
						'type' => 'radio_img',
						'title' => __('Estructura', 'mythemeshop'), 
						'sub_desc' => __('Elige dos opciones <strong>como estructura</strong> para la web.', 'mythemeshop'),
						'options' => array(
										'cslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/cs.png'),
										'sclayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/sc.png')
											),
						'std' => 'cslayout'
						),
					array(
						'id' => 'mts_bg_color',
						'type' => 'color',
						'title' => __('Color de fondo', 'mythemeshop'), 
						'sub_desc' => __('Recomendación. Utiliza como color principal el violeta #672F6C, el verde #019875 o el gris #d5d5d5', 'mythemeshop'),
						'std' => '#672F6C'
						),
					array(
						'id' => 'mts_bg_pattern_upload',
						'type' => 'upload',
						'title' => __('Imagen de fondo', 'mythemeshop'), 
						'sub_desc' => __('Sube una imagen de fondo.', 'mythemeshop')
						),
					array(
						'id' => 'mts_custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'mythemeshop'), 
						'sub_desc' => __('Introducir su propio CSS personalizado para personalizar aún más el tema. Esto anulará la CSS por defecto utilizado.', 'mythemeshop')
						),
					array(
						'id' => 'mts_responsive',
						'type' => 'button_set',
						'title' => __('Responsive', 'mythemeshop'),
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Podemos Point WL es un tema tema responsive, lo que significa que se adapta a la tableta y los dispositivos móviles, asegurando que su contenido se muestra siempre bien, no importa qué dispositivo utilicen. Recomendamos activar ', 'mythemeshop'),
						'std' => '1'
						),																	
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/singlepost.png',
				'title' => __('Configuración de las entradas', 'mythemeshop'),
				'desc' => __('<p class="description">Desde aqui puedes controlar la apariencia y funcionalibilidad de las entradas.</p>', 'mythemeshop'),
				'fields' => array(
					array(
						'id' => 'mts_tags',
						'type' => 'button_set',
						'title' => __('Enlace etiqueta', 'mythemeshop'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Activa si quieres mostrar una nube de etiquetas abajo de las entradas relacionadas.', 'mythemeshop'),
						'std' => '0'
						),
					array(
						'id' => 'mts_related_posts',
						'type' => 'button_set',
						'title' => __('Entradas relacionadas', 'mythemeshop'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Usa este botón para mostrar entradas relacionadas en miniaturas debajo del contenido de la entrada.', 'mythemeshop'),
						'std' => '1'
						),
					array(
						'id' => 'mts_author_box',
						'type' => 'button_set',
						'title' => __('Caja del autor', 'mythemeshop'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Usa el boton para mostrar la información del autor de la entrada después del articulo.', 'mythemeshop'),
						'std' => '1'
						)
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/adsetting.png',
				'title' => __('Gestión de banners', 'mythemeshop'),
				'desc' => __('<p class="description">PODEMOS POINT WL permite ingresar banners desde el panel de opciones sin necesidad de plugins adicionales (aunque si quieres mas, puedes instalar plugins, sientáte libre de hacerlo/modificar.</p>', 'mythemeshop'),
				'fields' => array(	
					array(
						'id' => 'mts_header_adcode',
						'type' => 'textarea',
						'title' => __('Banner en la cabecera', 'mythemeshop'), 
						'sub_desc' => __('Ingresa codigo para añadir un banner despues de la cabecera de las entradas No recomendable.', 'mythemeshop'),
					),
					array(
						'id' => 'mts_posttopleft_adcode',
						'type' => 'textarea',
						'title' => __('Cabecera lado derecho', 'mythemeshop'), 
						'sub_desc' => __('Ingresa codigo para ese box. Esta función es para crear un banner superior en la cabecera.)', 'mythemeshop'),
						
							),
					array(
						'id' => 'mts_posttop_adcode',
						'type' => 'textarea',
						'title' => __('Debajo del titulo de la entrada', 'mythemeshop'), 
						'sub_desc' => __('Ingresa codigo para ese box. Esta función es para crear un banner que se situe debajo del titulo de la entrada.', 'mythemeshop')
						),
					
					/* OPCIONAL FUNCIONES DE CONTENO DE DIAS PARA ESOS BANNERS
					array(
						'id' => 'mts_posttop_adcode_time',
						'type' => 'text',
						'title' => __('Show After X Days', 'mythemeshop'), 
						'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad before it expires. Enter 0 to disable this feature.', 'mythemeshop'),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text'
						),
					
					array(
						'id' => 'mts_postend_adcode',
						'type' => 'textarea',
						'title' => __('Below Post Content', 'mythemeshop'), 
						'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below the post content on single posts.', 'mythemeshop')
						),
					array(
						'id' => 'mts_postend_adcode_time',
						'type' => 'text',
						'title' => __('Show After X Days', 'mythemeshop'), 
						'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad before it expires. Enter 0 to disable this feature.', 'mythemeshop'),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text'
						),					
					*/
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/navsetting.png',
				'title' => __('Navegación', 'mythemeshop'),
				'desc' => __('<p class="description"><div class="controls"><b>Configuración de la navegación te permite modificar los <a href="nav-menus.php">Menus de las Secciones</a>.</b><br></div></p>', 'mythemeshop')
				);
				
				
	$tabs = array();

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function

?>