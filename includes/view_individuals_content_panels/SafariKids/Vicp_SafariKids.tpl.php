<h3>Safari Kids / ParentPager Information</h3>

<?php if (!$_CONTROL->dtgAttendentHistory && !$_CONTROL->dtgChildHistory) { ?>
	<div class="section">
		<p><em>Not currently associated with a ParentPager record.</em></p>
		<p><a href="#sk/select">Associate a ParentPager Record</a> to <?php _p($this->objPerson->Name); ?>'s NOAH Account.</p>
	</div>
<?php } ?>
