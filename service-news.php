<?php
$numPag = 0;
if(!$_GET){
  header('Location:index.php?pagina=1');
  $numPag = 1;

}else{
  $numPag = $_GET['pagina'];
}

//Call to News API
$url = 'http://newsapi.org/v2/top-headlines?country=mx&apiKey=5e824d442d7248738b1443b14d06b859&pageSize=10&page='.$numPag;
$data = json_decode(file_get_contents($url),true);

$total_articulos = $data['totalResults'];
$paginas = $total_articulos/10;
$paginas = ceil($paginas);



 $data = $data['articles'];


//  var_dump($data[0]['title']);
?>