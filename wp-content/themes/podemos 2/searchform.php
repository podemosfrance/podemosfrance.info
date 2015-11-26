<form method="get" id="searchform" class="search-form" action="<?php echo home_url(); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php _e('Buscar en el sitio','mythemeshop'); ?>" onblur="if (this.value == '') {this.value = '<?php _e('Buscar en el sitio','mythemeshop'); ?>';}" onfocus="if (this.value == '<?php _e('Buscar en el sitio','mythemeshop'); ?>') {this.value = '';}" >
		<input id="search-image" class="sbutton" type="submit" style="border:0; vertical-align: top;" value="<?php _e('Buscar','mythemeshop'); ?>">
	</fieldset>
</form>