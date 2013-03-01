<div class="section">
<h3>Step 2 - Search For Suitable Groups</h3>
<div style="background-color: #eeeeee; border: 1px solid #888888; padding:10px;">
<?php $_CONTROL->lblRegistrantInfo->RenderWithName(); ?>
</div>
<p>Search for best groups based on:</p>
<div style="float:left; padding-right:20px;"><?php $_CONTROL->chkLocation->Render(); ?></div>
<div style="float:left; padding-right:20px;"><?php $_CONTROL->chkGroupType->Render(); ?></div>
<div style="float:left; padding-right:20px;"><?php $_CONTROL->chkDayOfWeek->Render(); ?></div
<div style="float:left; padding-right:20px;"><?php $_CONTROL->chkAvailability->Render(); ?></div>

<div style="clear:both;"></div>

<br>
<?php $_CONTROL->dtgGroups->Render(); ?>
<br>
<?php $_CONTROL->btnAssign->Render(); ?>

</div>


