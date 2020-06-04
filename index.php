<?php
include 'service-news.php';
//Call to RandomNameAPI
$url = 'https://randomuser.me/api/?results=10&page='.$_GET['pagina'];
$randomNames = json_decode(file_get_contents($url),true);
$randomNames = $randomNames['results'];
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Blog Noticias</title>
  </head> 
  <body data-spy="scroll" data-target="#navbarSupportedContent" data-offset="57">

    <!-- Header -->

        
        <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">

            <a class="navbar-brand" href="#car">
                <!-- <img src="img/logo.png"> -->
                <span class="ml-3" ></span>
                Blog Noticias
                
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#car">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news">Noticias</a>
                    </li>
                    
                    
                </ul>
                
            </div>
        </div>
        </nav>



    <!-- Carousel -->
    <section id="car">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/c1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/c2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/c3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/c4.jpg" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item">
            <img src="img/c4.jpg" class="d-block w-100" alt="...">
          </div>   
          
          
          <div class="overlay">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-md-6 offset-md-7 text-center text-md-right">
                          <h1>Blog de Noticias</h1>
                          <p class="d-none d-md-block ">Blog dedicado a reportar noticias desarrollado por <strong>Diego Valadez Olmos</strong></p>
                          <a class="btn btn-outline-light" href="#">Descubre lo nuevo</a>
                          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalNew">Envia una noticia</button>

                      </div>
                  </div>
              </div>
            </div>
        </div>     

    </div>


    </section>

    <!-- News -->
    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col text-center text-uppercase mb-5">
                    <small>Enterate de las</small>
                    <h2>Noticias</h2>
                </div>
            </div>


            <!-- Card -->

         
              <div class="row">
              <?php for($i=0;$i<count($data);$i++): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php  echo $data[$i]['urlToImage']; ?>"class="card-img-top" alt="...">
                        <div class="card-body">
                          <div class="badges mb-2">
                            <span class="badge badge-success"><?php  echo $data[$i]['source']['name']; ?></span>
                          </div>
                          <h5 class="card-title"><?php  echo $data[$i]['title']; ?></h5>
                          <h6 class="card-subtitle mt-3 mb-3 text-primary">
                           Author:
                          <?php 
                            echo $randomNames[$i]['name']['title'] ." ".$randomNames[$i]['name']['first']." ".$randomNames[$i]['name']['last'];                           
                           ?> 
</h6>

                          
                          <p class="card-text"><?php $newText = substr( $data[$i]['content'], 0, 100);
                           echo $newText . "..."  ; ?></p>
                          <a href="<?php  echo $data[$i]['url']; ?>" class="btn btn-success" target="_blank">Ver Más</a>
                        </div>
                      </div>
                      </div>

                  <?php endfor?>
          

 
              
            </div>

            <!-- Botones de paginacion -->
            <div class="row pt-3 col-4 offset-4">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item  <?php echo $_GET['pagina'] == 1 ? 'disabled' : ''?>"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>#news">Anterior</a></li>

                  <?php for($i=0;$i<$paginas;$i++): ?>
                  <li class="page-item <?php echo $_GET['pagina']== $i+1 ? 'active' : ''?>"><a class="page-link"
                   href="index.php?pagina=<?php echo $i+1?>#news">
                  <?php echo $i+1?>
                  </a></li>
                  <?php endfor?>



                  <li class="page-item <?php echo $_GET['pagina']>= $paginas ? 'disabled' : ''?>"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>#news">Siguiente</a></li>
                </ul>
              </nav>
            </div>
            
        </div>

        
        
    </section>

 

    <!-- Footer -->
    <footer id="footer" class="pb-4 pt-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 col-lg">
                    <a href="">Preguntas Frecuentes</a>
                </div>
                <div class="col-12 col-lg">
                    <a href="">Contactanos</a>
                </div>

                <div class="col-12 col-lg">
                    <a href="">Terminos y Condiciones</a>
                </div>

                <div class="col-12 col-lg">
                    <a href="">Privacidad</a>
                </div>             

            </div>

        </div>

    </footer>

    <!-- Modal -->
<div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿De qué trata la noticia?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
                <div class="form-group col">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Título</label>
                        <input type="text" class="form-control" id="title-txt-modal" placeholder="Escribe el título">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contenido</label>
                        <textarea class="form-control" id="cont-txt-modal" rows="5"></textarea>
                      </div>
                </div>
            </div>

          </form>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success">Enviar</button>
        </div>
      </div>
    </div>
  </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

   

  </body>
</html>
