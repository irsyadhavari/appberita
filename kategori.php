<?php
$kategori = $_GET['kategori'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://newsapi.org/v2/top-headlines?country=id&category=" . $kategori . "&apiKey=b7c3f3c417d94e57b0d79139519ab952");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);
$data = json_decode($output, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NewsToday!</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body>


  <header>
    <a href="" class="brand"><i class="fab fa-neos"></i>ewsToday! <br><span>Top Headline News Media Indonesia</span></a>
    <div class="menu">
      <div class="btn">
        <i class="fas fa-times close-btn"></i>
      </div>
      <a href="index.php">Home</a>
      <a href="kategori.php?kategori=business">Bisnis</a>
      <a href="kategori.php?kategori=entertainment">Entertaiment</a>
      <a href="kategori.php?kategori=health">Kesehatan</a>
      <a href="kategori.php?kategori=sports">Olahraga</a>
      <a href="kategori.php?kategori=science">Sains</a>
      <a href="kategori.php?kategori=technology">Teknologi</a>
    </div>
    <div class="btn">
      <i class="fas fa-ellipsis-v menu-btn"></i>
    </div>
  </header>

  <div class="spasi" id="main"></div>

  <section class="section-main">
    <div class="title-section">
      <h2>Berita Terbaru Hari Ini</h2><i class="fas fa-arrow-down"></i>
    </div>
    <div class="wrapper">
      <?php foreach ($data['articles'] as $d) { ?>
        <div class="card">
          <div class="card-banner">
            <a href="<?php echo $d['url']; ?>"><img src="<?php echo $d['urlToImage']; ?>" class="banner-img" alt="Image not found" onerror="this.onerror=null;this.src='no-image.jpg';"></a>
          </div>
          <div class="card-body">
            <p class="category-tag"><time class="timeago profile-follower" datetime="<?php echo $d['publishedAt']; ?>"></time></p>
            <h3 class="blog-title"><a href="<?php echo $d['url']; ?>"><?php echo $d['title']; ?></a></h3>
            <p class="blog-description"><?php echo $d['description']; ?></p>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="scrollup-btn">
      <a href="#main"><i class="fas fa-arrow-up"></i> Scroll Up</a>
    </div>
  </section>

  <footer>
    <h5>By Muhammad Irsyad Havari 217280056 - 2021</h5>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="jquery.timeago.js"></script>
  <script type="text/javascript">
    $(window).on("load", function() {
      $(".loader-container").fadeOut(1000);
    });
    jQuery(document).ready(function() {
      $("time.timeago").timeago();
    });

    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    });
    var menu = document.querySelector('.menu');
    var menuBtn = document.querySelector('.menu-btn');
    var closeBtn = document.querySelector('.close-btn');
    var body = document.querySelector("body");

    menuBtn.addEventListener("click", () => {
      menu.classList.add('active');
      body.classList.add("disabledScroll");
    });
    closeBtn.addEventListener("click", () => {
      menu.classList.remove('active');
      body.classList.remove("disabledScroll");
    });
  </script>
  <!-- <script src="script.js"></script> -->
</body>

</html>