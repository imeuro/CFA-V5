<?php
$baseurl = str_replace('/ads/advblock1.php','','https://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
?>

<div class="adv-block newitem">
  <a href="https://kalliste.shop/?cid=CFA" target="_blank" class="left">
      <div class="adv-image">
        <img src="<?php echo $baseurl.'ads/kalliste-cover.jpg' ?>" loading="lazy" />
      </div>
      <div class="adv-copy" id="kalliste">
        <p><img src="<?php echo $baseurl.'ads/kalliste-logo.svg' ?>" loading="lazy" /></p>
      </div>
  </a>
</div>
