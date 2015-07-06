 
  function addToFavourites() {
        var xmlhttp = new XMLHttpRequest();
        var favImgSrc = document.getElementById("showpic").src;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("favouriteMessage").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "favourites_index.php?q=" + favImgSrc, true);
        xmlhttp.send();
}

function removeFromFavourites(){
        var xmlhttp = new XMLHttpRequest();
        var removeImgSrc = document.getElementById("showpic").src;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("favouriteMessage").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "remove_favourite.php?q=" + removeImgSrc, true);
        xmlhttp.send();


}


$(document).ready(function(){
    $('body').hide();
  $("#overlay").hide();
  $("#popup").hide();
  /*$("#login_form").hide();*/
});
<!--Lightbox and slider-->
$(document).ready(function(){

  $('body').fadeIn(2000);
  var isImageClicked = 0;
<!-- creating imgArray with the thumbs-->

  var imgArray=[];
  var authorArray=[];
  var imgArrayLength;
  $('img.thumb').each(function(){
    imgArray.push($(this).attr("src"));
    authorArray.push($(this).attr("data-author"));
    imgArrayLength = imgArray.length;

  });

<!--click on a thumb-->

  var imageClicked;
  var imageClickedIndex;

  $("img.thumb").click(function(){
      isImageClicked = 1;
      imageClicked = $(this);
      imageClickedIndex = imgArray.indexOf($(this).attr("src"));

    var srcPic= $(this).attr("src");
    var authorMsg= $(this).attr("data-author");
    $(".showpic").attr("src",srcPic);
    document.getElementById("authorMessage").innerHTML = authorMsg;

    $("#iframe-share").attr("src", "socialiframe.php?url=og2_" + srcPic.slice(10, -4));

    $("#overlay").fadeIn(1000);
    $("#popup").fadeIn(1000);
    /*$('#popup').animate({
        scrollTop: imageClicked.offset().top
    }, 1000);*/
    $("html, body").animate({ scrollTop: 0 }, "slow");
  });


    $("#close").click(function(){

        $("#popup").fadeOut(500);
        $("#overlay").fadeOut(50);
        $('html, body').animate({
        scrollTop: imageClicked.offset().top
    }, 1000);
        isImageClicked = 0;
        document.getElementById("favouriteMessage").innerHTML = "";
        document.getElementById("authorMessage").innerHTML = "";
  }); 
/*end of close*/
$("#close_favourite").click(function(){

        location.reload(true);
  }); 
/*end of close_favourite*/




/*next button*/
  $('.next').click(function(){
    /*Megoldas arra az esetre, ha mindegyik imageContainer egymás siblingje
    var nextImage = imageClicked.closest('.imageContainer').next().find('img');
    nextImage.trigger('click');
    */
    var nextImageIndex;
    nextImageIndex= (imageClickedIndex+1) % imgArrayLength;
    var srcNextPic = imgArray[nextImageIndex];
    var authorNextImg =authorArray[nextImageIndex];
    $(".showpic").attr("src",srcNextPic);

    $("#iframe-share").attr("src", "socialiframe.php?url=og2_" + srcNextPic.slice(10, -4));

    document.getElementById("authorMessage").innerHTML = authorNextImg;
    document.getElementById("favouriteMessage").innerHTML = "";
    imageClickedIndex = nextImageIndex;

});

/*previous button*/
$('.prev').click(function(){
    //imageClicked.closest('.imageContainer').prev().find('img').trigger('click');
    var nextImageIndex;
    nextImageIndex= (imageClickedIndex+imgArrayLength-1) % imgArrayLength;
    var srcNextPic = imgArray[nextImageIndex]; 
    var authorNextImg = authorArray[nextImageIndex];
    $(".showpic").attr("src",srcNextPic);

    $("#iframe-share").attr("src", "socialiframe.php?url=og2_" + srcNextPic.slice(10, -4));

    document.getElementById("authorMessage").innerHTML = authorNextImg;
    document.getElementById("favouriteMessage").innerHTML = "";
    imageClickedIndex = nextImageIndex;
});

$('#favouriteRemove').click(function(){
   imgArray.splice(imageClickedIndex,1);
   imgArrayLength=imgArray.length;
   imageClickedIndex = (imageClickedIndex-1)%imgArrayLength;
    document.getElementById("favouriteMessage2").innerHTML = imgArray.length;
});



$(document).keydown(function(e) {
  if(isImageClicked==1){
    switch(e.which) {
        case 37: $('.prev').click();// left
        break;


        case 39: $('.next').click();// right
        break;

        case 27: if($("#close").length == 0){
          $("#close_favourite").click();
      }else{
        $("#close").click();
      }
        // ESC
        break;

        default: return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  }else{
    switch(e.which) {

        case 27: $("#close_login").click();// ESC
        break;

        default: return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  }
});

$( ".readmore" ).click(function() {
  var nextSpanId = $(this).nextAll("span[id]:first").attr("id");
  $("#" + nextSpanId ).slideToggle( "slow");
});

/*$("button.login_btn").click(function(){
    $("#overlay").fadeIn(1000);
    $("#login_form").fadeIn(1000);

 });

 $("#close_login").click(function(){

        $("#login_form").fadeOut(500);
        $("#overlay").fadeOut(50);
        
  });*/
});


 
