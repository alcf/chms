<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

<h3><?php $this->lblMessage->Render(); ?></h3>

<?php $this->lblExitMembership->Render();?>
<?php $this->chkMemberExit->Render();?>
<?php $this->lstTermination->RenderWithName(); ?>
<?php $this->txtTermination->RenderWithName(); ?>
<?php $this->btnSubmitMemberExit->Render();?>

<p><?php $this->btnReturnToSubscribe->Render();?></p>
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>
