<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALCF ChMS<?php _p($this->strPageTitle ? ' - ' . $this->strPageTitle : null); ?></title>
<style type="text/css">@import url("<?php _p(__CSS_ASSETS__); ?>/chms.css");</style>

<style type="text/css" media="screen">
	body { padding: 10px; }
	hi button.primary { margin-top: -30px; }
</style>

<style type="text/css" media="print">
	h1 button.primary { display: none; }
	table.datagrid th { background-image: none; background-color: #000; color: #fff; text-transform: uppercase; }
</style>

<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/chms.js"></script>
<script type="text/javascript" src="<?php _p(__JS_ASSETS__); ?>/_core/_qc_packed.js"></script>
</head><body>
<?php $this->RenderBegin(); ?>

	<h1>
		<?php _p($this->objBatch->DateEntered->ToString('MMM D YYYY')); ?> :: Batch <?php _p($this->objBatch->BatchLabel); ?> &mdash; &ldquo;<?php _p($this->objBatch->Description); ?>&rdquo;
		<br/>
		<span style="font-size: 10px; font-weight: normal; font-style: italic; color: #666;">
			This batch has <strong><?php _p($this->objBatch->ItemCount); ?></strong> items for a total amount of <strong><?php _p(QApplication::DisplayCurrency($this->objBatch->ActualTotalAmount)); ?></strong>
		</span>
		<button class="primary">Close Window</button>
	</h1>
	<h3>
		<?php printf('Post #%s :: %s<br/><span style="font-size: 10px; font-weight: normal; font-style: italic; color: #666;">Posted on %s by %s</span>',
		$this->objPost->PostNumber, QApplication::DisplayCurrency($this->objPost->TotalAmount), $this->objPost->DatePosted->ToString('MMMM D, YYYY'), $this->objPost->CreatedByLogin->Name); ?>
	</h3>
	
	<h3>
		<?php _p((QApplication::PathInfo(0) == 'funds') ? 'Overview' : 'Details of Changes'); ?>
	</h3>
	<?php $this->dtgReport->Render(); ?>

<?php $this->RenderEnd(); ?>
<script type="text/javascript">
	window.print();
	window.close();
</script>
</body></html>