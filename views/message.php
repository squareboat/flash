<?php if(session()->has('flash_notification.message')) { ?>
	<div class="marginbottom-sm margintop-sm flash alert alert-<?= e(session('flash_notification.level')); ?> <?= session()->has('flash_notification.important') ? 'alert-important' : '' ?>">
		<span class="icon">
			<span class="fa <?= e(session('flash_notification.icon')); ?>"></span>
		</span>
		<?php if(session()->has('flash_notification.important')) { ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php } ?>
		<?= session('flash_notification.message'); ?>
	</div>
<?php } ?>
