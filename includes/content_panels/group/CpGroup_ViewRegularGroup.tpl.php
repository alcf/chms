<h3>
	Regular Group Details
	<button class="primary" onclick="document.location = '#<?php _p($_CONTROL->objGroup->Id); ?>/edit'; return false;">Edit Details</button>
</h3>
<div class="section">
	<?php $_CONTROL->lblMinistry->RenderWithName(); ?>
	<?php $_CONTROL->lblCategory->RenderWithName(); ?>
	<?php $_CONTROL->lblConfidential->RenderWithName(); ?>
	<?php $_CONTROL->lblEmail->RenderWithName(); ?>
</div>
<br/>

<h3>
	Group Participants
	<button class="primary" onclick="document.location = '#<?php _p($_CONTROL->objGroup->Id); ?>/add_participation'; return false;">Add Participant</button>
</h3>
<div class="section">
	<?php $_CONTROL->dtgMembers->Render(); ?>
</div>
