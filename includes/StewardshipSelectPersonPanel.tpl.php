<h3><?php _p($_CONTROL->ParentControl->objSelectedPerson->Name); ?></h3>

<h4>Associated Addresses</h4>

<ul>
<?php foreach ($_CONTROL->ParentControl->objSelectedPerson->GetAddressArray() as $objAddress) { ?>
	<li><?php _p($objAddress->AddressShortLine); ?></li>
<?php } ?>
</ul>

<h4>Recent Check Images (up to 5)</h4>
<?php foreach ($_CONTROL->ParentControl->imgPersonCheckImageArray as $imgPersonCheckImage) $imgPersonCheckImage->Render(); ?>