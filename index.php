<!doctype html>
<html>

<?php include"php/head.php" ?>

  <body>
     
    <img id="atelier" src="img/atelier.jpg"/>
    
    <iframe id="map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=4.340305030345917%2C50.856606945380854%2C4.343845546245574%2C50.85812739649707&amp;layer=mapnik&amp;marker=50.85736717713556%2C4.342075288295746"></iframe>
    
    <div id="left"> 

	<ul class="info">
	    <li class="titre"><a href="http://atelier-bek.be/">Atelier Bek</a></li>
	    <li><a class="adresse" href="http://osm.org/go/0EoTOGtOL?m=&way=244951011" target="_blank">Rue du ruisseau 15</a></li>
	    <li><a class="adresse" href="http://osm.org/go/0EoTOGtOL?m=&way=244951011" target="_blank">1080 Molenbeek-Saint-Jean</a></li>
	    <li><a href="mailto:contact@atelier-bek.be">contact@atelier-bek.be</a></li>
	    <li>+&thinsp;32&thinsp;419&thinsp;60&thinsp;09</li>
	</ul>

	<ul class="membres">
	    <li>Cecilia Borettaz</li>
	    <li>Maria Delamarre</li>
	    <li><a href="http://antoine-gelgon.fr/" target="_blank">Antoine Gelgon</a></li>
	    <li>Fanny Devaux</li>
	    <li>Émile Greis</li>
	    <li>Alice Lapalu</li>
	    <li><a href="http://cargocollective.com/alexandreliziard" target="_blank">Alexandre Liziard</a></li>
	    <li>Léonard Mabille</li>
	    <li><a href="http://romainmarula.fr/" target="_blank">Romain Marula</a></li>
	    <li><a href="http://etienneozeray.fr" target="_blank">Étienne Ozeray</a></li>
	    <li><a href="http://baptiste-tosi.eu/" target="_blank">Baptiste Tosi</a></li>
	    <li>Marie Trossat</li>
	    <li><a href="https://morganetrouillet.wordpress.com/" target="_blank">Morgane Trouillet</a></li>
	    <li>Stéphanie Vérin</li>
	    <li><a href="http://www.xxx-clairewilliams-xxx.com/" target="_blank">Claire Williams</a></li>
	</ul>

	<ul class="links">
	    <li><a href="https://github.com/atelierBek/" target="_blank">Github</a></li>
	</ul>
    
    </div>
      
    
    <div id="posts">
	<?php include"php/posts.php"; ?>
    </div>
  
  </body>

</html>
