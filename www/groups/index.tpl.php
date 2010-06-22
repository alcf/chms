<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Ministries and Groups</h1>
	<?php $this->pnlMinistries->Render(); ?>
	<div class="subnavContent">
		<?php $this->lblMinistry->Render(); ?>
		<div class="section">
			<?php $this->dtgGroups->Render(); ?>
		<div class="cleaner">&nbsp;</div>
		</div>
	</div>
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>