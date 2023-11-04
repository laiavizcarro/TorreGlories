<!DOCTYPE html>
<html>
<head>
    <title>Platilla de bootstrapp</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="view/styleHome.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>


  <body>
    <section>  
      <div>
      <p class="welcomeText">Benvinguts al Restaurant Torre Glòries</p>
      </div>      
    </section>

    <section>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="TorreGlories\images\home\carrousselCocktail.webp" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="TorreGlories\images\home\vistes.jpg" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="/TorreGlories/images/home/restaurant.webp" class="d-block w-100" alt="">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col-6">
          <a href="/torreGlories/images//home/carrousselCocktail.webp"></a>
        </div>
        <div class="col-6">
          One of three columns
        </div>
        
      </div>
    </div>
  
  


  </body>
</html>