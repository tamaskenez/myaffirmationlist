<?php include 'login_index2.php'?>


<!DOCTYPE html>
<html>
<head>
  <title>My Favourite Affirmations</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="affirmation images, affirmations, affirmation, love, positive, thoughts, attraction">
  <meta name="description" content="Your personal, favourite affirmation images and affirmations.">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="stylesheet_lightbox.css"/>
  <link rel="stylesheet" type="text/css" href="bootstrap-social.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="affirmation_jquery.js"></script>
  <link rel="icon" type="image/png" href="pics/heart.png">

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
      <div class="col-xs-12 col-md-8"><img src="http://myaffirmationlist.com/pics/favourites_banner.jpg" alt="Favourite affirmation images header" class="img-responsive"/></div>
      <div class="col-md-2"><p></p></div>
    </div>

  	



<div class="row">
    <div class="col-md-2"><p></p></div>
    <div class="col-md-8"><p>
    <div class="table-responsive">
          <table class="table table-wrapper">

<?php

if (databaseConnection()) {
            $user_id=$_SESSION['user_id']; 
            $query_get_pictures =$conn->prepare('SELECT picture_source FROM user_favourites, picture_sources WHERE user_id=:user_id AND user_favourites.picture_id =picture_sources.picture_id');
            $query_get_pictures->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query_get_pictures->execute();
            $result = $query_get_pictures->fetchAll();
            
            if (count($result) > 0) {
                for ($i = 0; $i < count($result); $i++) {
                if($i==0){
                  echo '<tr><td width="33%" class="imageContainer"><img  src="' . $result[$i]['picture_source'] . '" class="img-responsive thumb"></td>';
                } 
                elseif($i%3==0){
                  echo '</tr> <tr><td width="33%" class="imageContainer"><img  src="' . $result[$i]['picture_source'] . '" class="img-responsive thumb"></td>';
                }else{
                  echo '<td width="33%" class="imageContainer"><img  src="' . $result[$i]['picture_source'] . '" class="img-responsive thumb"></td>';
                }
                }
              }
          }


function databaseConnection()
    {
        // if connection already exists
        global $conn;
        if ($conn != null) {
            return true;
        } else {
            try {
                $conn = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return true;
            } catch (PDOException $e) {
                 echo "Sorry! Database error!" . $e->getMessage();
            }
        }
        // default return
        return false;
    }
?>

</table>
</div>
</div>

  <div class="col-md-2"><p></p></div>
</div>


 <!--script type="text/javascript">
function show(){
    
    document.getElementById("overlay").style.display="block";
    document.getElementById("popup").style.display="block";
    

}
</script-->

<div id="popup">
  <div id=showPicContainer>
    <img class="prev" src="prev.png">
    <img class="showpic" class="img-responsive" id="showpic" src="love1.png">
    <img class="next" src="next.png">
  </div>
          <br>
          <!--a href="#" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
          <a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
          <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
          <a class="btn btn-social-icon btn-pinterest"><i class="fa fa-pinterest"></i></a-->
         <a class="btn btn-social-icon"><img src="http://www.myaffirmationlist.com/pics/removeFav.png" id="favouriteRemove" alt="Remove from favourites" title="Remove from favourites" onclick="removeFromFavourites()"></a>
          <a id="close_favourite">Close <img src="close.png"></a>
          <div id="favouriteMessage"></div>
          <div id="favouriteMessage2"></div>

</div>

 

<?php include 'footer_navbar.php';?>




</body>
</html>