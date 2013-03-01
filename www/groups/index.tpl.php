<?php require(__INCLUDES__ . '/header.inc.php'); ?>

	<h1>Ministries and Groups</h1>
	<?php $this->pnlMinistries->Render(); ?>
	<div class="subnavContent">
		<?php $this->lblMinistry->Render(); ?>

	    <div style="float:right; position:relative; top:-10px;">
	    <?php $this->btnGroupReport->Render(); ?>
	    <?php $this->btnGroupRegistrations->Render(); ?>
	    </div>
		<br>
		<div class="section">
			<?php $this->dtgGroups->Render(); ?>
			<?php $this->lblStartText->Render(); ?>
		</div>
		<div class="buttonBar" style="height: 0px;"><?php $this->lstGroupType->Render(); ?></div>
		<div class="buttonBar buttonBarLeft" style="color: #333;"><?php $this->chkViewAll->Render(); ?></div>
	</div>
	
	<br clear="all"/>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>