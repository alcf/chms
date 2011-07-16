<h3>my.alcf Account Information</h3>
<div class="section">
	<?php if ($this->objPerson->PublicLogin) { ?>
		<div class="lvp">
			<div class="left">Username</div>
			<div class="right">
				<?php _p($this->objPerson->PublicLogin->Username); ?>
			</div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Active Account?</div>
			<div class="right">
				<?php _p($this->objPerson->PublicLogin->ActiveFlag ? 'Yes' : 'No'); ?>
				<?php $_CONTROL->btnToggle->Render('FontSize=10px'); ?>
			</div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Date Registered</div>
			<div class="right">
				<?php _p($this->objPerson->PublicLogin->DateRegistered->ToString('MMMM D YYYY @ h:mm z')); ?>
			</div>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="lvp">
			<div class="left">Date of Last Login</div>
			<div class="right">
				<?php _p(($this->objPerson->PublicLogin->DateLastLogin) ? $this->objPerson->PublicLogin->DateLastLogin->ToString('MMMM D YYYY @ h:mm z') : 'n/a'); ?>
			</div>
			<div class="cleaner">&nbsp;</div>
		</div>

	<?php } else { ?>
		<p>This person has not yet registered for a <strong>my.alcf</strong> account.
	<?php } ?>
</div>

<?php if ($_CONTROL->btnRemove) { ?>
	<div class="buttonBar">
		<?php $_CONTROL->btnRemove->Render(); ?>
	</div>
<?php } ?>