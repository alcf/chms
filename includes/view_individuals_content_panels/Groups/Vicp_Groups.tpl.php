<h3>Ministry Participation
	<button class="primary" onclick="document.location='#groups/add_group'; return false;">Add</button></h3>
<div class="section">
	<p>The following are groups and ministries that this person is <strong>explicitly</strong> a part of.
	<br/>Smart Groups and Group Categories will not be listed here.</p>
<?php $_CONTROL->dtgGroups->Render(); ?>
<div class="buttonBar buttonBarLeft" style="color: #333; margin-top:20px;"><?php $_CONTROL->chkViewAll->Render(); ?></div>
</div>
<br/>

<h3>Events and Classes@ALCF</h3>
<div class="section">
	<p>The following are Event or Class Signups that this person has completed <strong>OR</strong> cancelled a registration for.</p>
<?php $_CONTROL->dtgEvents->Render(); ?>
</div>
<br/>

<h3>Communication Lists
	<button class="primary" onclick="document.location='#groups/add_list'; return false;">Add</button></h3>
<div class="section">
<?php $_CONTROL->dtgCommunicationLists->Render(); ?>
</div>