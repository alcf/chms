<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<?php if (QApplication::$Login->IsPermissionAllowed(PermissionType::ManageClasses)) { ?>
		<h1>Events, Classes and Signups
			<button class="primary" onclick="document.location='/classes/'; return false;">Manage Classes@ALCF</button>
		</h1>
	<?php } else { ?>
		<h1>Events and Signups</h1>
	<?php } ?>

	<?php $this->pnlMinistries->Render(); ?>
	<div class="subnavContent">
		<?php $this->lblMinistry->Render(); ?>
		<div class="section">
			<?php $this->dtgSignupForms->Render(); ?>
			<?php $this->lblStartText->Render(); ?>
		</div>
		<div class="buttonBar" style="height: 0px;"><?php $this->lstSignupFormType->Render(); ?></div>
		<div class="buttonBar buttonBarLeft" style="color: #333;"><?php $this->chkViewAll->Render(); ?></div>
	</div>
	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>