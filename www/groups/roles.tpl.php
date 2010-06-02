<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h3>Roles for <?php _p($this->objMinistry->Name); ?></h3>
	<p><a href="" <?php $this->pxyEditRole->RenderAsEvents(); ?>>Create New Role</a></p>
	
	<?php $this->dtgRoles->Render(); ?>
	<br/><br/>
	<?php $this->pnlEditRole->Render(); ?>

	<a href="/groups/">Back to View All Groups</a>
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>