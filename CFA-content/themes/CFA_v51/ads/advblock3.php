<?php
$baseurl = str_replace('/ads/advblock3.php','','https://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
?>

<div class="adv-block newitem">
  <a href="https://www.chiaraleto.com/?cid=CFA" target="_blank" class="left">
      <div class="adv-image">
        <img src="<?php echo $baseurl.'/ads/chiaraleto-cover.jpg' ?>" loading="lazy" />
      </div>
      <div class="adv-copy" id="chiaraleto">
        <p><img src="<?php echo $baseurl.'/ads/chiaraleto-logo.svg' ?>" loading="lazy" /></p>
      </div>
  </a>
</div>  