	</div>
</div>

	<div id="bottomPad" style="height: 20px; font-size: 1px;">&nbsp;</div>

<div id="footerPane" class="footerPane"><div class="footerPaneBackground">&nbsp;</div></div>
<div class="footer">
	Developed and Maintained by the <a href="http://www.alcf.net/it-team" class="footerLink" target="_blank">ALCF Web Development Team</a><br/>
	
	Copyright &copy; 2010 - <?php _p(date('Y')); ?>, <a href="http://www.alcf.net/" class="footerLink" target="_blank">Abundant Life Christian Fellowship</a>,
	2581 Leghorn Street, Mountain View, CA 94043
	<br/>
	<a href="http://www.biblegateway.com/passage/?search=Romans%2012:1-8&version=31" target="_blank">Soli Deo Gloria</a>
</div>

<?php $this->RenderEnd(); ?>

<?php if (SERVER_INSTANCE != 'dev') { ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20970690-1']);
  _gaq.push(['_setDomainName', '.alcf.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php } ?>
</body></html>