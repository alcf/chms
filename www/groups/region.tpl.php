<?php
	require(__INCLUDES__ . '/header.inc.php');
?>

	<div id="titleBar">
		<h2><?php _p($this->mctGrowthGroupLocation->TitleVerb); ?></h2>
		<h1><?php _t('GrowthGroupLocation')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->txtLocation->RenderWithName('Name=Region Name'); ?>

		<?php $this->txtLatitude->RenderWithName(); ?>

		<?php $this->txtLongitude->RenderWithName(); ?>

		<?php $this->txtZoom->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>