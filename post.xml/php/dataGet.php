<?php

    # DOM DOC

    # file
    $file = "../data/post.xml";

    # simple xml 
    $xml = simplexml_load_file($file);

    # reverse simple xml
    $posts = array_reverse($xml->xpath('post'));

    # iterate posts
    foreach ($posts as $post) {

	# ➝ ➞

	#uniqid
	$uniqid = $post->uniqid;
	
	#uploadDateTime
	$uploadDateTime = $post->uploadDateTime;

	echo "<div id=\"" . $uploadDateTime . "_" . $uniqid . "\" class=\"post\">";

		# date
		$arr = str_split($uploadDateTime, 2);
		echo "<p class=\"uploadDateTime\">" . $arr[0] . "/" . $arr[1] . "/" . $arr[2] . " - " . $arr[3] . ":" . $arr[4] . ":" . $arr[5] . " ⇾" . "</p>";

		# text  
		$text = $post->text;
		echo "<p class=\"text\">" . $text . "</p>";


		echo "<div class=\"images\">";
		
		$dirPath = "../data/" . $uploadDateTime . "_" . $uniqid;
		
		# images
		$imagesExt =".jpg,.JPG,.jpeg,.JPEG,.gif,.GIF,.png,.PNG";
		$images = glob($dirPath . "/*" . "{" . $imagesExt . "}",GLOB_BRACE );

		foreach ($images as $image) {
		    $imageName = basename($image);
		    $imageExt = pathinfo($image, PATHINFO_EXTENSION);
		    $imagePath = substr($image,3);

		    echo "<img class=\"image\" src=\"" . $imagePath . "\">"; 
		}	    
		
		echo "</div>";

		echo "<div class=\"files\">";

		# files
		$imagesExcept= "";
		$files = glob($dirPath . "/*" . "{" . $imagesExcept . "}",GLOB_BRACE);
		
		$files = glob($dirPath . "/*");
		
		foreach ($files as $file) {

		    $fileName = basename($file);
		    $fileExt = pathinfo($file, PATHINFO_EXTENSION);
		    $filePath = substr($file,3);

		    echo "<p><a class=\"file\" href=\"" . $filePath . "\">" . $fileName . "</a></p>"; 

		}

		echo "</div>";
		

	echo "</div>";

    }

?>
