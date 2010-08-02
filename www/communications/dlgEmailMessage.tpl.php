<?php if ($_FORM->objSelectedEmailMessageRoute) { ?>

	<?php _p($_FORM->objSelectedEmailMessageRoute->EmailMessage->Subject); ?>
	<br/><br/>

	<div class="messageBody"><pre><code><?php _p($_FORM->objSelectedEmailMessageRoute->EmailMessage->ResponseBody); ?></code></pre></div>
	
	<br/><br/>
	<?php $_FORM->btnEmailMessage->Render('CssClass=primary'); ?>

<?php } ?>