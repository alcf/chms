<h3>Safari Kids / ParentPager Information</h3>

<?php if (!$_CONTROL->dtgAttendantHistory && !$_CONTROL->dtgChildHistory) { ?>
	<div class="section">
		<p><em>Not currently associated with a ParentPager record.</em></p>
		<p><a href="#sk/select">Associate a ParentPager Record</a> to <?php _p($this->objPerson->Name); ?>'s NOAH Account.</p>
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

	<div class="buttonBar">
		<a href="#sk/select" class="cancel">Associate <em>another</em> ParentPager Record to <?php _p($this->objPerson->Name); ?>'s NOAH Account.</a>
	</div>

<?php } ?>