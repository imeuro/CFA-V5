<?php
$baseurl = str_replace('/ads/advblock2.php','','https://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
?>

<div class="adv-block newitem">
  <a href="https://www.flapper.it/?cid=CFA" target="_blank" class="left">
      <div class="adv-image">
        <img src="<?php echo $baseurl.'/ads/FLAPPER-cover.jpg' ?>" loading="lazy" />
      </div>
      <div class="adv-copy">
        <p><img src="<?php echo $baseurl.'/ads/FLAPPER-logo.svg' ?>" loading="lazy" /></p>
      </div>
  </a>
</div>
