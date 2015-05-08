<?php include 'login_index2.php'?>


<!DOCTYPE html>
<html>
<head>
  <title>Positive Affirmation Images</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="Affirmations, Affirmation image, Love, Positive, Thoughts, Attraction, Motivation, Happiness">
  <meta name="description" content="Beautiful affirmation images and affirmation blog. Create your own favourite list here and change your life!">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="stylesheet_lightbox.css"/>
  <link rel="stylesheet" type="text/css" href="bootstrap-social.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="affirmation_jquery.js"></script>
  <link rel="icon" type="image/png" href="pics/heart.png">

<!--facebook share-->

<?php
$image=$_GET['image'];
if(image != '') {
  echo "<meta property=\"og:url\"          content=\"http://www.myaffirmationlist.com/og_$image\" />\n";
  echo "<meta property=\"og:type\"         content=\"article\" />\n";
  echo "<meta property=\"og:title\"        content=\"Positive Affirmation Images\" />\n";
  echo "<meta property=\"og:description\"  content=\"Beautiful affirmation images and affirmation blog. Create your own favourite list here and change your life!\" />\n";
  echo "<meta property=\"og:image\"        content=\"http://www.myaffirmationlist.com/smallpics/$image.jpg\" />\n";
  echo "<meta property=\"og:image:width\"  content=\"400\" />\n";
  echo "<meta property=\"og:image:height\" content=\"400\" />\n";
}
?>

<!--google analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62495424-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>
<div id="overlay"></div>

  <div class="container-fluid">

<?php include 'header_navbar.php'?>
  
<!--photo header-->
    <div class="row">
      <div class="col-md-2"><p></p></div>
      <div class="col-xs-12 col-md-8"><img src="pics/TREE_PAFF.png" alt="Positive-Affirmations" class="img-responsive"/></div>
      <div class="col-md-2"><p></p></div>
      </div>

  


    <div class="tabs">

    <div class="row">
      <div class="col-md-3"><p></p></div>
      <div class="col-md-4"><img src="pics/quote-or-affirmation.png" alt="Positive quote or affirmation" class="img-responsive"/></div>
      <a href="http://www.myaffirmationlist.com/quotes.php"><div class="chooser col-md-2"><img src="pics/quotes_chooser.png" alt="Positive quotes" class="img-responsive"/></div></a>
      <div class="col-md-3"><p></p></div>

    </div>

    <!-- First row--> 
    <div class="row">
      <div class="col-md-3"><p></p></div>
      <a href="http://www.myaffirmationlist.com/love-affirmations.php"><div class="chooser col-md-2"><img src="pics/love_chooser.jpg" alt="Love Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/family-affirmations.php"><div class="chooser col-md-2"><img src="pics/family_chooser.jpg" alt="Family Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/health-affirmations.php"><div class="chooser col-md-2"><img src="pics/health_chooser.jpg" alt="Health Affirmations" class="img-responsive"/></div></a>
      <div class="col-md-3"><p></p></div>
    </div>


    <!-- Second row -->
    <div class="row">
      <div class="col-md-3"><p></p></div>
      <a href="http://www.myaffirmationlist.com/motivation-affirmations.php"><div class="chooser col-md-2"><img src="pics/motivation_chooser.jpg" alt="Motivation Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/learning-affirmations.php"><div class="chooser col-md-2"><img src="pics/learning_chooser.jpg" alt="Learning and Exam Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/diet-affirmations.php"><div class="chooser col-md-2"><img src="pics/diet_chooser.jpg" alt="Diet Affirmations" class="img-responsive"/></div></a>
      <div class="col-md-3"><p></p></div>
    </div>



  <!-- Third row  -->
  <div class="row">
      <div class="col-md-3"><p></p></div>
      <a href="http://www.myaffirmationlist.com/money-affirmations.php"><div class="chooser col-md-2"><img src="pics/money_chooser.jpg" alt="Money Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/career-affirmations.php"><div class="chooser col-md-2"><img src="pics/career_chooser.jpg" alt="Career Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/self-confidence-affirmations.php"><div class="chooser col-md-2"><img src="pics/confidence_chooser.jpg" alt="Self-Confidence Affirmations" class="img-responsive"/></div></a>
      <div class="col-md-3"><p></p></div>
    </div>

    

    <!-- Fourth row -->
  <div class="row">
      <div class="col-md-3"><p></p></div>
      <a href="http://www.myaffirmationlist.com/happiness-affirmations.php"><div class="chooser col-md-2"><img src="pics/happiness_chooser.jpg" alt="Happiness Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/morning-affirmations.php"><div class="chooser col-md-2"><img src="pics/morning_chooser.jpg" alt="Morning Affirmations" class="img-responsive"/></div></a>
      <a href="http://www.myaffirmationlist.com/bedtime-affirmations.php"><div class="chooser col-md-2"><img src="pics/bedtime_chooser.jpg" alt="Bedtime Affirmations" class="img-responsive"/></div></a>
      <div class="col-md-3"><p></p></div>
    </div>

    <!-- end of tabs -->
    </div>
  <!-- end of container-fluid -->
  </div>


<?php include 'footer_navbar.php';?>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>