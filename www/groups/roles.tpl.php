<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Roles for <?php _p($this->objMinistry->Name); ?>
		<a href="#" onclick="javascript:history.back(); return false;" class="right">Back to <?php _p($this->objMinistry->Name); ?></a></h1>
	<div class="section">
		<div class="sectionButtons"><button class="primary" <?php $this->pxyEditRole->RenderAsEvents(); ?>>Create New Role</a></div>
		<?php $this->dtgRoles->Render(); ?>
	</div>

	<?php $this->pnlEditRole->Render(); ?>

	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>