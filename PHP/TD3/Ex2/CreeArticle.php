<?php	
include('Article.php');
 
$T_article= array();
$T_article[]= new Article(0,'Table',1000);
$T_article[]= new Article(1,'Chaise',10);
$s = serialize($T_article);
file_put_contents('./data/articles.txt', $s);


?>
