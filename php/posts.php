<?php
    # DOM DOC

    # file
    $file = "post.xml/data/post.xml";

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


		$dirPath = "post.xml/data/" . $uploadDateTime . "_" . $uniqid;
		
		echo "<div class=\"images\">";
		
		# images
		$imagesExt =".jpg,.JPG,.jpeg,.JPEG,.gif,.GIF,.png,.PNG";
		$images = glob($dirPath . "/*" . "{" . $imagesExt . "}",GLOB_BRACE );

		foreach ($images as $image) {
		    $imageName = basename($image);
		    $imageExt = pathinfo($image, PATHINFO_EXTENSION);
		    $imagePath = substr($image,0);

		    echo "<img class=\"image\" src=\"" . $imagePath . "\">"; 
		}	    
		
		echo "</div>";

		echo "<div class=\"files\">";

		$files = glob($dirPath . "/*");
		
		foreach ($files as $file) {

		    $fileName = basename($file);
		    $fileExt = pathinfo($file, PATHINFO_EXTENSION);
		    $filePath = substr($file,0);
		    
		    if ($fileExt == "jpg" || $fileExt == "JPG" || $fileExt == "jpeg" || $fileExt == "JPEG" || $fileExt == "gif" || $fileExt == "GIF" || $fileExt == "png" || $fileExt == "PNG") {

			echo "<p><a class=\"file img\" href=\"" . $filePath . "\">" . $fileName . "</a></p>"; 

		    } else {
			
			echo "<p><a class=\"file\" href=\"" . $filePath . "\">" . $fileName . "</a></p>"; 

		    }
		}

		echo "</div>";
		

	echo "</div>";

    }

?>
