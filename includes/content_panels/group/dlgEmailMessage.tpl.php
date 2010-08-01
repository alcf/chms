<?php if ($_CONTROL->ParentControl->objSelectedEmailMessageRoute) { ?>

	<?php _p($_CONTROL->ParentControl->objSelectedEmailMessageRoute->EmailMessage->Subject); ?>
	<br/><br/>

	<div class="messageBody"><pre><code><?php _p($_CONTROL->ParentControl->objSelectedEmailMessageRoute->EmailMessage->ResponseBody); ?></code></pre></div>
	
	<br/><br/>
	<?php $_CONTROL->ParentControl->btnEmailMessage->Render('CssClass=primary'); ?>

<?php } ?>