<?php

$canonical_url=get_bloginfo('url');
$title=get_bloginfo('name');
$canonical_url_encode=urlencode($canonical_url);
$title_encode=urlencode($title);

?>

<div class="sns-area-container">
  <ul class="sns-area">
    <li>
      <a class="tweet" href="http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode;?>&text=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
      <i class="fab fa-twitter" id="twitter-icon"></i>
      </a>
    </li>
    <li>
      <a class="fb-iine" href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&amp;t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
      <i class="fab fa-facebook" id="facebook-icon"></i>
      </a>
    </li>
    <li>
      <a class="gplus" href="https://plus.google.com/share?url=<?php echo $canonical_url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;">
      <i class="fab fa-google-plus-g" id="google-icon"></i>
      </a>
    </li>
  </ul>
</div>
