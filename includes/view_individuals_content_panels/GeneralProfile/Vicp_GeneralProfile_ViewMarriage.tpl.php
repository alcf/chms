<h3>Marriage Information</h3>

<p>Marital Status: <strong><?php $_CONTROL->lblStatus->Render(); ?></strong></p>

<?php if ($_CONTROL->btnToggleSingle) $_CONTROL->btnToggleSingle->Render(); ?><br/>
<?php if ($_CONTROL->btnAdd) $_CONTROL->btnAdd->Render(); ?>

<br/><br/>

<?php $_CONTROL->dtgMarriages->Render();?>