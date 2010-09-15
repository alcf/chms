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

<h4>Recent Contributions (up to 15)</h4>

<ul>
<?php foreach ($_CONTROL->ParentControl->objSelectedPerson->GetStewardshipContributionArray(array(QQ::OrderBy(QQN::StewardshipContribution()->Id, false), QQ::LimitInfo(15))) as $objContribution) { ?>
	<li>
		<?php _p($objContribution->LineDescription); ?>
		<?php if (is_file($objContribution->Path)) { ?>
			&nbsp;|&nbsp; <a href="#" <?php $_CONTROL->ParentControl->pxyViewCheckImage->RenderAsEvents($objContribution->Id); ?>>View Image</a>
		<?php } ?>
	</li>
<?php } ?>
</ul>

<?php } ?>