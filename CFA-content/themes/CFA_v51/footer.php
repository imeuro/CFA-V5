<?php
/**
 * The template for displaying the footer.
 */

?>



</div><!-- // close wrap div -->
</div>

<div id="modal" class="single hidden empty">
</div>

<?php wp_footer();
ob_end_flush();
 ?>
 
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '508657780012788'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=508657780012788&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

</body>
</html>
