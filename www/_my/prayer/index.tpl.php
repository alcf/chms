<?php require(__INCLUDES__ . '/prayer_header_my.inc.php'); ?>
<div class="jumbotron text-center">
	<h1>Prayer Room</h1>

	<p style="font-size: 14px;">My house shall be called a House of Prayer.</p>
	<p style="font-size: 14px; padding-left:30px;">Matthew 21:13</p>
	<br/>
</div>
<div class="row">
	<div class="col-sm-12">
	<div class="section">
	<p>Submit your prayer requests here, lift your fellow brothers and sisters up in prayer, or give thanks 
	for what God has done for you, encouraging others in the process.</p>
	<p>All this can be done here, for the building up of the body.</p>
	<div>
		<?php $this->btnSubmitPrayer->Render('CssClass=primary'); ?><br><br>
		<?php $this->btnSubmitConfidentialPrayer->Render('CssClass=primary'); ?><br><br>
		<?php $this->btnViewPrayer->Render('CssClass=primary'); ?><br><br>
		<?php $this->btnPraises->Render('CssClass=primary'); ?><br><br>
	</div>
	</div>
	</div>
	</div>


<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>