<?php require(__INCLUDES__ . '/header.inc.php'); ?>

<h1><?php _p($this->objHousehold->Name); ?></h1>

<div style="float: left;">
	<div class="subnavSideContent">
		<h4>Add/Remove Individuals</h4>
		<button class="alternate" onclick="document.location = '/households/add.php/<?php _p($this->objHousehold->Id); ?>'; return false;">Add Individual</button>
		<button class="alternate" onclick="document.location = '/households/remove.php/<?php _p($this->objHousehold->Id); ?>'; return false;" style="margin-top: 8px;">Remove Individual</button>
	</div>
	
	<div class="subnavSideContent">
		<h4>Split/Merge Households</h4>
		<button class="alternate" onclick="document.location = '/households/split.php/<?php _p($this->objHousehold->Id); ?>'; return false;">Split Household</button>
		<button class="alternate" onclick="document.location = '/households/merge.php/<?php _p($this->objHousehold->Id); ?>'; return false;" style="margin-top: 8px;">Merge Households</button>
	</div>

<?php if ($this->lblStewardship) { ?>
	<div class="subnavSideContent">
		<h4>Stewardship Preferences</h4>
		<p><?php $this->lblStewardship->Render(); ?>
		<br/><br/><a href="" <?php $this->pxyStewardship->RenderAsEvents(); ?>>Toggle</a>
		</p>
	</div>
<?php } ?>

<?php if ($objSplitArray = $this->objHousehold->GetSplitArray()) { ?>
	<div class="subnavSideContent">
		<h4>Household Split History</h4>
		
		<div class="householdSplit">
		This household was split from another household:
		<ul>
<?php
		foreach ($objSplitArray as $objSplit) {
			$objSplitHousehold = $objSplit->GetSplitHousehold($this->objHousehold);
			printf('<li><a href="/households/view.php/%s">%s</a> <em>(on %s)</em></li>', $objSplitHousehold->Id, $objSplitHousehold->Name, $objSplit->DateSplit->ToString('MMM D YYYY'));
		}
?>
		</ul>
		</div>
	</div>
<?php } ?>
</div>

<div class="subnavContent">
	<h3>Home Address
		<button class="primary" onclick="document.location = '/households/edit_home_address.php/<?php _p($this->objHousehold->Id); ?>'; return false;" title="Edit Roles">Add New</button></h3>
	<div class="section"><?php $this->dtgHomeAddresses->Render(); ?></div>
	<br/>

	<h3>Household Members
		<button class="primary" onclick="document.location = '/households/edit_roles.php/<?php _p($this->objHousehold->Id); ?>'; return false;" title="Edit Roles">Edit Roles</button></h3>
	<div class="section"><?php $this->dtgMembers->Render(); ?></div>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>