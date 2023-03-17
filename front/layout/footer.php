<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/js.js"></script>

<script>
  window.onscroll = function() {
    myFunction()
  };

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>

<script>
  var x = document.getElementById("myAudio");
  $("#play").show();
  $("#pause").hide();

  function playAudio() {
    x.play();
    $("#play").hide();
    $("#pause").show();

  }

  function pauseAudio() {
    x.pause();
    $("#pause").hide();
    $("#play").show();

  }
</script>

<script>
  window.onscroll = function() {
    myFunction()
  };

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>

</body>

</html>