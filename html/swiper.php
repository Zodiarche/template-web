<?php

$page = "swiper.php";
$title = "";
$description = "";
?>

<?php require_once "./components/head.php"; ?>

<body>
  <div id="wrapper">
    <?php require_once "./components/header.php" ?>

    <main id="swiper">
      <section id="main-section">
        <div class="wrapper">
          <div class="swiper-container animation" data-animation="moveToDown">
            <p class="h3">Swiper Navigation</p>
            <div class="swiper" id="templateNavigation">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
          </div>


          <div class="swiper-container animation" data-animation="moveToLeft">
            <p class="h3">Swiper Pagination</p>
            <div class="swiper" id="templatePagination">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="swiper-container animation" data-animation="moveToRight">
            <p class="h3">Swiper Autoplay</p>
            <div class="swiper" id="templateAutoplay">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/320x240" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/320x240" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/320x240" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/320x240" alt=""></a></div>
              </div>
            </div>
          </div>

          <div class="swiper-container animation" data-animation="moveToUp">
            <p class="h3">Swiper Scrollbar</p>
            <div class="swiper" id="templateScrollbar">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
                <div class="swiper-slide"><a href="#"><img src="https://place-hold.it/640x480" alt=""></a></div>
              </div>
              <div class="swiper-scrollbar"></div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <?php require_once "./components/footer.php"; ?>
  <script src="javascripts/swiper/main.js" type="module"></script>
  </body=>

  </html>