<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Classified Acts
		<input type="button" class="primary" value="Submit Request" onclick="document.location='/classifieds/post.php/<?php _p($this->objCategory->Token); ?>'; return false;"/>
		<input type="button" class="primary" value="Back to All Categories" onclick="document.location='/classifieds/'; return false;"/>
	</h1>
	<h4><?php _p($this->objCategory->Name); ?></h4>
	<br/>
	<?php _p($this->objCategory->DescriptionHtml, false); ?>
	<br/><br/>
	<div class="section">
		<?php $this->dtgPosts->Render(); ?>
	</div>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>