<?php
$url = 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
var_dump(parse_url($url, PHP_URL_PATH));
?>

<article id="post-ad-insert" class="post type-post has-post-thumbnail hentry isotope-item">
  <div class="adv-block newitem">
    <a href="https://kalliste.shop/?cid=CFA" target="_blank" class="left">
        <div class="adv-image">
          <img src="<?php echo parse_url($url, PHP_URL_PATH); ?>ads/kalliste-cover.jpg" loading="lazy" />
        </div>
        <div class="adv-copy">
          <p><img src="<?php echo parse_url($url, PHP_URL_PATH); ?>ads/kalliste-logo.svg" loading="lazy" /></p>
        </div>
    </a>
  </div>
</article>
