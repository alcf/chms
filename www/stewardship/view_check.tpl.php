<html>
	<body>
	<div style="font: 11px arial;">
		<div style="float: left;"><a href="#" onclick="print(); return false;" style="color: #336;">Print Check Image</a></div>
		<div style="float: right;"><a href="#" onclick="window.close(); return false;" style="color: #336;">Close Window</a></div>
	</div>
	<br clear="all"/><br/>
	<?php $this->RenderBegin(); ?>
	<?php if ($this->imgCheckImage) { ?>
		<?php $this->imgCheckImage->Render(); ?>
	<?php } else { ?>
		<img src="/assets/images/no_check_image.png" style="width: 390px; height: 184px;"/>
	<?php } ?>
	<?php $this->RenderEnd(); ?>
	</body>
</html>