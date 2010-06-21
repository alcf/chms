<h3>Ministry Participation
	<button class="primary" onclick="document.location='#groups/add_group'; return false;">Add</button></h3>
<div class="section">
<?php $_CONTROL->dtgGroups->Render(); ?>
</div>
<br/>

<h3>Communication Lists
	<button class="primary" onclick="document.location='#groups/add_list'; return false;">Add</button></h3>
<div class="section">
<?php $_CONTROL->dtgCommunicationLists->Render(); ?>
</div>