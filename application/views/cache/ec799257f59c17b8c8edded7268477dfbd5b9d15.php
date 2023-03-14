<?php

$ci = &get_instance();
$ci->load->model('Menu_model');

$base_url1 = $ci->uri->segment(1);
$role_login = $ci->session->userdata('role');
$level1 = $ci->Menu_model->getRoleMenu(1, $role_login);

$level3 = $ci->Menu_model->getRoleMenu(2, $role_login);

if($role_login ==99){
	$level1 = $ci->Menu_model->getMenu(1);
	$level3 = $ci->Menu_model->getMenu(2);
}
$level2 = [];
foreach ($level3 as $key => $value) {
	$level2[$value->parent][$key] = $value;
}

?>

<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
		<ul class="menu-nav">
			<?php $__currentLoopData = $level1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
			$url = $value->uri;
			?>
			<?php if(isset($level2[$value->id_menu])): ?>
			<?php
			$level4 = $level2[$value->id_menu];
			?>
			<li class="menu-item menu-item-submenu 
			<?php $__currentLoopData = $level4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
			$url2 = $value2->uri;
			?>
			<?php if($base_url1==$url2): ?>
			<?php echo e('menu-item-open'); ?>

			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" aria-haspopup="true" data-menu-toggle="hover">
			<a href="javascript:;" class="menu-link menu-toggle">
				<span class="svg-icon menu-icon">
					<i class="<?php echo e($value->icon); ?>"></i>
				</span>
				<span class="menu-text"><?php echo e(ucfirst($value->nm_menu)); ?></span>
				<i class="menu-arrow"></i>
			</a>
			
			<div class="menu-submenu">
				<i class="menu-arrow"></i>
				<ul class="menu-subnav">

					<?php $__currentLoopData = $level4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="menu-item <?php if($base_url1 == $value2->uri): ?><?php echo e("menu-item-active"); ?><?php endif; ?>" aria-haspopup="true">
						<a href="<?= base_url() ?><?php echo e($value2->uri); ?>" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text"><?php echo e(ucfirst($value2->nm_menu)); ?></span>
						</a>
					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</ul>
			</div>
		</li>
		<?php else: ?>
		<li class="menu-item <?php if($base_url1 == $value->uri): ?><?php echo e("menu-item-active"); ?><?php endif; ?>" aria-haspopup="true">
			<a href="<?php echo base_url()  ?><?php echo e($value->uri); ?>" class="menu-link">
				<span class="svg-icon menu-icon"><i class="<?php echo e($value->icon); ?>"></i> </span>
				<span class="menu-text"><?php echo e(ucfirst($value->nm_menu)); ?></span>
			</a>
		</li>
		<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
</div><?php /**PATH D:\xampp\htdocs\trans\application\views/metronic/sidebar.blade.php ENDPATH**/ ?>