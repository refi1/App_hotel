
<html>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
      <div class="container">
        <a class="navbar-brand" href="#home"><img src="images/logo.png" width="100" height="100" alt="Hotel DELUXE Tirana" >
        <a class="btn btn-secondary" href="#home" id="backTop">Krye
        </a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home" id="navA">Kryefaqe
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about" id="navA">Reth nesh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery" id="navA">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact" id="navA">Kontakt</a>
            </li>
          </ul>
        </div>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
            if(isset($_SESSION['username'])) {
              if ($_SESSION['RoletId'] == 2 ) {
                echo '<li class="nav-item">
                  <a class="nav-link" id="navA" href="admin-home.php">Admin Panel</a>
                  </li>'; }

            echo '
            <li class="nav-item">
              <a class="nav-link" id="navA" href="profile.php">Profili Im</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" id="navA" href="backend/backend.logout.php">Dil</a>
              </li>';
            } else {
              echo '<li class="nav-item">
                <a class="nav-link" href="login.php" id="navA">Kycu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php" id="navA">Regjistrohu</a>
              </li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
            <li data-target="#carouselIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox" id="home">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url('images/1.jpg')">
              <div class="carousel-caption d-none d-md-block" id="boxing">
                <h3>Mikpritje</h3>
                <p>Do ndiheni si ne shtepi.</p>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url('images/2.jpg')">
              <div class="carousel-caption d-none d-md-block" id="boxing">
                <h3>Luks</h3>
                <p>Krijojme nje standart te ri.</p>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('images/3.jpg')">
              <div class="carousel-caption d-none d-md-block" id="boxing">
                <h3>Ekselence</h3>
                <p>Sherbim i pakrahasueshem.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </header>
<script>$('a[href*="#"]')

  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {

    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

      if (target.length) {

        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {

          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) {
            return false;
          } else {
            $target.attr('tabindex','-1');
            $target.focus(); 
          };
        });
      }
    }
  });

</script>
    </html>
