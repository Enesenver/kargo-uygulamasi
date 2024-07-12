<?php
include "navbar.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="ee.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="e.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="eee.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="p-5 text-center">
    <div class="container">
        <h1 class="mb-2">Hayatını Kolaylaştırıyoruz</h1>
        <hr>
        <p>Teknolojiyi merkezine alan yenilikçi yapımızla hayatını kolaylaştırmaya devam ediyoruz.</p>
    </div>
</section>


      <section class="p-5 text-center">
        <div class="container">
            <h1 class="pb-5">Ekibimiz
            </h1>

            <div class="row row-cols-1 row-cols-md-5 g-4">
                <div class="col">
                  <div class="card shadow" style="border: 2px solid black;">
                    <img src="ybir.jpeg" class="card-img-top" alt="" >
                    <div class="card-body">
                      <h5 class="card-title">Ceo</h5>
                      
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow" style="border: 2px solid black;">
                    <img src="yiki.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Yönetici</h5>
                    
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow" style="border: 2px solid black;">
                    <img src="yuc.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Müdür</h5>
                      
                    </div>
                  </div>
                </div>

                <div class="col">
                    <div class="card shadow" style="border: 2px solid black;">
                      <img src="ydort.jpeg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Mühendis</h5>
                        
                      </div>
                    </div>
                  </div>


                  <div class="col">
                    <div class="card shadow" style="border: 2px solid black;">
                      <img src="ybes.jpeg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Tasarımcı</h5>
                        
                      </div>
                    </div>
                  </div>

                    </div>
                  </div>
                  </div>
                </div>
              </div>

              



        </div>
      </section>

      <section class="p-5 text-center">
        <div class="container">
            <h1 class="mb-2">Neden Gönder Gelsin
            </h1>

            <div class="accordion p-5" id="accordionExample">
                <div class="accordion-item shadow">
                  <h2 class="accordion-header shadow">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Teslimat Seçeneklerine Göre Gelsin
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Teslimat için daha önce belirttiğin adres ya da tarihte uygun değilsen panik yapma! “İstediğim Zaman Gelsin” ya da “Farklı Adrese Gelsin” teslimat seçeneklerini kendine göre değiştir, gönderini getirelim.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header shadow">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Canlı Takip Ederek Gelsin
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Teslimat günü, gönderinin nerede olduğunu haritadan canlı izle, gönderini anlık olarak takip etme kolaylığını yakala.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header shadow">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Evde Yoksan Komşuna Gelsin
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Teslimat için belirttiğin adreste değilsen, "Komşuma Gelsin" hizmetini seç, gittiğinde gönderine kavuşmanın mutluluğunu yaşa.
                    </div>
                  </div>
                </div>
              </div>
            </section>




            <section class="p-6 text-center">
                <div class="container">
                    <h1 class="pb-5">İş Ortaklarımız
                    </h1>
        
                    <div class="row row-cols-1 row-cols-md-5 g-4">
                        <div class="col">
                          <div class="card shadow" style="border: 2px solid black;">
                            <img src="letgo.jpg" class="card-img-top" alt="" >
                            <div class="card-body">
                              <h5 class="card-title">Letgo</h5>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card shadow" style="border: 2px solid black;">
                            <img src="letgo.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Dolap</h5>
                            
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card shadow" style="border: 2px solid black;">
                            <img src="letgo.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Trendyol</h5>
                              
                            </div>
                          </div>
                        </div>
        
                        <div class="col">
                            <div class="card shadow" style="border: 2px solid black;">
                              <img src="letgo.jpg" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Hepsiburada</h5>
                                
                              </div>
                            </div>
                          </div>
        
        
                          <div class="col">
                            <div class="card shadow" style="border: 2px solid black;">
                              <img src="letgo.jpg" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">N11</h5>
                                
                              </div>
                            </div>
                          </div>
        
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
        
                      
        
        
        
                </div>
              </section>

              <div class="container-fluid my-5">

                <footer class="text-center text-lg-start" style="background-color: #3baf29;">
                  <div class="container d-flex justify-content-center py-5">
                    <button type="button" class="btn btn-primary btn-lg btn-floating mx-3" style="background-color: #54456b;">
                      <i class="fab fa-facebook-f">Play Store'den İndirin</i>
                    </button>
                    <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
                      <i class="fab fa-youtube">App Store'den İndirin
                      </i>
                    </button>
                    
                  </div>
              
                  <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © Telif Hakları Gönder Gelsin'de Saklıdır...
                    
                  </div>
                </footer>
                
              </div>
              







              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>