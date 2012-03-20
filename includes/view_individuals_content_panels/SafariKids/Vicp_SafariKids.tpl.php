<h3>Safari Kids / ParentPager Information</h3>

<?php if (!$_CONTROL->dtgParentPagerIndividuals) { ?>
	<div class="section">
		<p><em>Not currently associated with a ParentPager record.</em></p>
		<?php if (QApplication::$Login->IsPermissionAllowed(PermissionType::ManageSafariKids)) { ?>
			<p><a href="#sk/select">Associate a ParentPager Record</a> to <?php _p($this->objPerson->Name); ?>'s NOAH Account.</p>
		<?php } ?>
	</div>
	
	

	
	
	

<?php } else { ?>

	<?php if ($_CONTROL->dtgAttendantHistory) { ?>
		<div class="section">
			<h3>History as an Attendant</h3>
			<?php $_CONTROL->dtgAttendantHistory->Render(); ?>
		</div>
	<?php } ?>
	<?php if ($_CONTROL->dtgChildHistory) { ?>
		<div class="section">
			<h3>History as a Parent or Child</h3>
			<?php $_CONTROL->dtgChildHistory->Render(); ?>
		</div>
	<?php } ?>

	<div class="section">
		<h3>Associated ParentPagerIndividual Records</h3>
		<?php $_CONTROL->dtgParentPagerIndividuals->Render(); ?>
	</div>


	<?php if (QApplication::$Login->IsPermissionAllowed(PermissionType::ManageSafariKids)) { ?>
		<div class="buttonBar">
			<a href="#sk/select" class="cancel">Associate <em>another</em> ParentPager Record to <?php _p($this->objPerson->Name); ?>'s NOAH Account.</a>
		</div>
	<?php } ?>

<?php } ?>