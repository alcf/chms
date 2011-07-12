	<p style="font-size: 14px;">
		Last step!  We need to double check the address<?php if ($_FORM->objMailingAddressValidator) _p('es'); ?> that you entered.
	</p>
	<br/>

<?php if ($_FORM->objHomeAddressValidator) { ?>
	<h4>Home Address</h4>
	<div class="section">
		<div class="renderWithName">
			<div class="left">You Entered</div>
			<div class="right" style="font-size: 14px;">
				<?php _p($_FORM->txtHomeAddress1->Text); ?><br/>
				<?php if (strlen(trim($_FORM->txtHomeAddress2->Text))) { ?>
					<?php _p($_FORM->txtHomeAddress2->Text); ?><br/>
				<?php } ?>
				<?php _p($_FORM->txtHomeCity->Text); ?>, <?php _p($_FORM->lstHomeState->SelectedValue); ?> <?php _p($_FORM->txtHomeZipCode->Text); ?>
			</div>
		</div>
		<br/>

		<?php if ($_FORM->objHomeAddressValidator->AddressValidFlag) { ?>
			<div class="renderWithName">
				<div class="left">We Found</div>
				<div class="right" style="font-size: 14px;">
					<?php _p($_FORM->objHomeAddressValidator->PrimaryAddressLine); ?><br/>
					<?php if (strlen(trim($_FORM->objHomeAddressValidator->SecondaryAddressLine))) { ?>
						<?php _p($_FORM->objHomeAddressValidator->SecondaryAddressLine); ?><br/>
					<?php } ?>
					<?php _p($_FORM->objHomeAddressValidator->City); ?>, <?php _p($_FORM->objHomeAddressValidator->State); ?> <?php _p($_FORM->objHomeAddressValidator->ZipCode); ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="renderWithName">
				<div class="left">No Match Found</div>
				<div class="right" style="width: 680px; font-size: 14px;">
					<strong>We were not able to find your address in the US Postal Service database.</strong><br/><br/>
					If you entered part of the address correctly,
					you can <strong>Go Back and Edit</strong> the address and make changes.<br/>Otherwise, if what you entered is correct,
					please click on <strong>Confirm Address</strong> below and we can still proceed.
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>

<?php if ($_FORM->objMailingAddressValidator) { ?>
	<h4>Mailing Address</h4>
	<div class="section">
		<div class="renderWithName">
			<div class="left">You Entered</div>
			<div class="right" style="font-size: 14px;">
				<?php _p($_FORM->txtMailingAddress1->Text); ?><br/>
				<?php if (strlen(trim($_FORM->txtMailingAddress2->Text))) { ?>
					<?php _p($_FORM->txtMailingAddress2->Text); ?><br/>
				<?php } ?>
				<?php _p($_FORM->txtMailingCity->Text); ?>, <?php _p($_FORM->lstMailingState->SelectedValue); ?> <?php _p($_FORM->txtMailingZipCode->Text); ?>
			</div>
		</div>
		<br/>

		<?php if ($_FORM->objMailingAddressValidator->AddressValidFlag) { ?>
			<div class="renderWithName">
				<div class="left">We Found</div>
				<div class="right" style="font-size: 14px;">
					<?php _p($_FORM->objMailingAddressValidator->PrimaryAddressLine); ?><br/>
					<?php if (strlen(trim($_FORM->objMailingAddressValidator->SecondaryAddressLine))) { ?>
						<?php _p($_FORM->objMailingAddressValidator->SecondaryAddressLine); ?><br/>
					<?php } ?>
					<?php _p($_FORM->objMailingAddressValidator->City); ?>, <?php _p($_FORM->objMailingAddressValidator->State); ?> <?php _p($_FORM->objMailingAddressValidator->ZipCode); ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="renderWithName">
				<div class="left">No Match Found</div>
				<div class="right" style="width: 680px; font-size: 14px;">
					<strong>We were not able to find your address in the US Postal Service database.</strong><br/><br/>
					If you entered part of the address correctly,
					you can <strong>Go Back and Edit</strong> the address and make changes.<br/>Otherwise, if what you entered is correct,
					please click on <strong>Confirm Address</strong> below and we can still proceed.
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>

	<div class="buttonBar">
		<?php $_FORM->btnSave->Render('CssClass=primary'); ?>
		&nbsp;or&nbsp;
		<?php $_FORM->btnGoBack->Render('CssClass=cancel'); ?>
	</div>
