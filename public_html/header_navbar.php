<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=796049200471516";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle left" data-toggle="collapse" data-target="#myNavbar2">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar2">
        <ul class="nav navbar-nav">
                <li class="dropdown active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="index.php">Affirmation Categories
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="http://www.myaffirmationlist.com/index.php">ALL CATEGORIES</a></li>
                <li><a href="http://www.myaffirmationlist.com/quotes.php">QUOTES</a></li>
                <li><a href="http://www.myaffirmationlist.com/love-affirmations.php">LOVE AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/family-affirmations.php">FAMILY AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/health-affirmations.php">HEALTH AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/happiness-affirmations.php">HAPPINESS AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/motivation-affirmations.php">MOTIVATIONAL AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/learning-affirmations.php">LEARNING AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/diet-affirmations.php">DIET AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/money-affirmations.php">MONEY AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/career-affirmations.php">CAREER AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/self-confidence-affirmations.php">SELF-CONFIDENCE AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/morning-affirmations.php">MORNING AFFIRMATIONS</a></li>
                <li><a href="http://www.myaffirmationlist.com/bedtime-affirmations.php">BEDTIME AFFIRMATIONS</a></li>

                </ul>
                </li>
                
                



        <li><a href="how-to-use-affirmations.php">How to use affirmations?</a></li>
        <li><a href="affirmation-success-stories.php">Success Stories</a></li>
        <?php
            if (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {
             echo '<li><a href="favourites.php">Favourites</a></li>';
            }
        ?>
    </ul>
    <ul class="login_status">
        <?php
            if (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {
             echo '<li><a href="logout.php?logout"><button type="button" class="btn btn-primary logout_btn">Log Out</button></a></li>
             <li id="welcome_msg">Hello ' . $_SESSION["user_name"] . '! You are logged in!</li>';
            } else {
             echo '<li><a href="views/not_logged_in.php"><button type="button" class="btn btn-primary login_btn">Log In</button></a></li>';
            }
        ?>
      </ul>
    </div>
  </div>
</nav>


