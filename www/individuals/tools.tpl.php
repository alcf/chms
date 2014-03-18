<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1>Tools and Utilities</h1>
<p>Tools and Utilities that can be used to assist in managing the NOAH user database.
<div class="section">
<p>Check User Participation</p>
<p>
	This tool alows you to check to see what groups and email lists an individual email address is associated with. 
	Unfortunately at this time it does not include smart groups, since these are dynamically created.	
</p>
Enter email address to check: 
<?php 
$this->txtEmail->Render();
$this->btnCheck->Render();
?>
<p>
<br><br>&nbsp;&nbsp; <?php $this->objDefaultWaitIcon->Render(); ?>
<?php 
$this->lblResult->Render();
?>
</p>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>