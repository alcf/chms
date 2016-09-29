<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>
	<div class="jumbotron text-center">
	<h1>Submit a Confidential Prayer Request</h1>
	</div>
	<div class="row">
	<div class="col-sm-12">
	<p>We welcome and invite you to express your prayer requests through the Prayer Ministry of Abundant Life Christian Fellowship.
	You may place a request or reach an intercessor by choosing one of the following options:</p>
	<ul>
	<li>Use this form to send your confidential prayer request.</li>
	<li>Send an email directly to <a href="mailto:prayer@alcf.net">prayer@alcf.net</a></li>
	<li>Leave a message at the church administration offices, 650 625 1500, x206</li>
	<li>Complete a prayer request card. (Available at the Worship Center Information Desk) and place it in the green "All Forms Box" at the Worship Center.</li>
	</ul>
	<div class="section">	<?php $this->txtName->RenderWithName();?>
	<?php $this->txtContent->RenderWithName();?>
	
	<div class="buttonBar">
		<?php $this->btnSubmitPrayer->Render('CssClass=primary'); ?>
	</div>
	</div>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>