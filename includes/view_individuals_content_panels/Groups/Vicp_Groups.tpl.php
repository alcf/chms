<h3>Ministry Participation
	<button class="primary" onclick="document.location='#groups/add_group'; return false;">Add</button></h3>
<div class="section">
	<p>The following are groups and ministries that this person is <strong>explicitly</strong> a part of.
	<br/>Smart Groups and Group Categories will not be listed here.</p>
<?php $_CONTROL->dtgGroups->Render(); ?>
</div>
<br/>

<h3>Communication Lists
	<button class="primary" onclick="document.location='#groups/add_list'; return false;">Add</button></h3>
<div class="section">
<?php $_CONTROL->dtgCommunicationLists->Render(); ?>
</div>