<?php if ($_CONTROL->CurrentItemIndex == 0) { ?>
	<div style="float: left; width: 440px;">
<?php } else if ($_CONTROL->CurrentItemIndex == (count($_CONTROL->DataSource) / 2)) { ?>
	</div><div style="float: left; width: 440px; margin-left: 30px;">
<?php } ?>

<div class="section">
	<h4><a href="/classifieds/list.php/<?php _p($_ITEM->Token); ?>"><?php _p($_ITEM->Name); ?></a></h4>
	<?php _p($_ITEM->DescriptionHtml); ?><br/><br/>
	<strong>
	<a href="/classifieds/list.php/<?php _p($_ITEM->Token); ?>">View Listings</a>
	</strong>
	&nbsp; | &nbsp;
	<strong>
	<a href="/classifieds/post.php/<?php _p($_ITEM->Token); ?>">Submit Request</a>
	</strong>
 </div><br/>

<?php if ($_CONTROL->CurrentItemIndex == (count($_CONTROL->DataSource) - 1)) { ?>
	</div><br clear="all"/>
<?php } ?>