<html>

<head>
	<title>Social Buttons</title>
	<link rel="stylesheet" type="text/css" href="socialbox.css">
</head>

<body>

<?php
  $image_link = "http://www.myaffirmationlist.com/" . $_GET['url'];
?>

<div id="fb-root"></div>


	<div class="rs_share">

		<div class="rs_fb_share">
			<!--div class="fb-like" data-href="<?php echo $image_link;?>" data-width="90" data-layout="button_count" data-show-faces="false" data-send="false"></div-->
      <div class="fb-share-button" data-href="<?php echo $image_link;?>" data-layout="button"></div>
		</div>    


<!--
		<div class="rs_tweet_share">	
			<a href="<?php echo $image_link;?>" class="twitter-share-button" data-lang="en">Tweet</a>
		</div>

		<div class="rs_gplus_share">
			<div class="g-plus" data-action="share"></div>
		</div>
		
		<div class="rs_image_download">
			<a href="<?php echo $image_link;?>" target="_blink" ><img src="colorboxpluginimage/download_button.png" alt="Download Image" width="96" height="28"/></a>
		</div>
-->
	</div>
	
	<!--div class="fb-comments" data-href="<?php echo $image_link;?>" data-width="980" num_posts="4"></div-->
	
<!--FACEBOOK SCRIPT-->
	
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=796049200471516";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>	
<!--FACEBOOK SCRIPT-->

<!--TWITTER SCRIPT	
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	
TWITTER SCRIPT-->	

<!--GOOGLE PLUS SCRIPT
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
GOOGLE PLUS SCRIPT-->	

</body>

</html>
