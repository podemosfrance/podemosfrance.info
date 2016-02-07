<aside id="sidebar">
	<p>Il y a actuellement <?php $result = count_users();
echo $result['total_users'];?> inscrits</p>
	<?php if (! dynamic_sidebar('primary-widget-area')) { ?>

	<?php } ?>
</aside>
