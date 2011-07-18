<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Events and Signups</h1>
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