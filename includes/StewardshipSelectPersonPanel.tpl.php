<?php if ($_CONTROL->ParentControl->objSelectedPerson) { ?>

<h3><?php _p($_CONTROL->ParentControl->objSelectedPerson->Name); ?>
	<span class="subhead">
	<a href="#" class="cancel" <?php $_CONTROL->ParentControl->pxyViewPerson->RenderAsEvents(); ?>>View Individual's Record</a>
	</span>
</h3>

<h4>Associated Addresses</h4>

<ul>
<?php foreach ($_CONTROL->ParentControl->objSelectedPerson->GetAddressArray() as $objAddress) { ?>
	<li><?php _p($objAddress->AddressShortLine); ?></li>
<?php } ?>
</ul>

<?php if ($_CONTROL->ParentControl->imgPersonCheckImageArray && count($_CONTROL->ParentControl->imgPersonCheckImageArray)) { ?>
	<h4>Recent Check Images (up to 5)</h4>
	<?php foreach ($_CONTROL->ParentControl->imgPersonCheckImageArray as $imgPersonCheckImage) $imgPersonCheckImage->Render(); ?>
<?php } ?>

<?php } ?>