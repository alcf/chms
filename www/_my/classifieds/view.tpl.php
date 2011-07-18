<?php require(__INCLUDES__ . '/header_my.inc.php'); ?>

	<h1>Classified Acts
		<input type="button" class="primary" value="Back to List" onclick="document.location='/classifieds/list.php/<?php  _p($this->objCategory->Token); ?>'; return false;"/>
	</h1>
	<h4><?php _p($this->objCategory->Name); ?></h4>
	<br/><br/>
	<h2><?php _p($this->objPost->Title); ?></h2>
	<div class="section">
		<?php _p(nl2br(QApplication::HtmlEntities($this->objPost->Content), true), false); ?>
	</div>
	<span class="na">Posted on <?php _p($this->objPost->DatePosted->ToString('MMMM D, YYYY at h:mmz')); ?></span>
	
<?php require(__INCLUDES__ . '/footer_my.inc.php'); ?>