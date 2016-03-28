<?php

    # CHECK IF POSTED DATAS OR FILES
    
    # text value
    $textValue = $_POST['data'][2]; # 3 if title value is active

    # count files
    $fileCount = count($_FILES['file']['name']);
    
    if (empty($textValue) && $fileCount < 1) {
	
	# message
	echo "Vous ne pouvez pas envoyer de post vide. Merci d'écrire un texte ou d'ajouter un fichier.";
    
    } else {

	
	
    # GENERATED DATAS
    
    # generate uniqid
    $uniqidValue = uniqid();

    # generate upload date and time
    $uploadYearValue = date('y');
    $uploadMonthValue = date('m');
    $uploadDayValue = date('d');
    $uploadHourValue = date('H');
    $uploadMinuteValue = date('i');
    $uploadSecondValue = date('s');
    $uploadDateTimeValue = $uploadYearValue.$uploadMonthValue.$uploadDayValue.$uploadHourValue.$uploadMinuteValue.$uploadSecondValue;

    
    
    # FILES

    # dirPath 
    $dirPath = "../data/" . $uploadDateTimeValue . "_" . $uniqidValue;

    if ($fileCount > 0) {

	# create dir
	mkdir($dirPath, 0777);

	# iterate trough files and move in dir 
	for($i = 0; $i < $fileCount; $i++) {

	    move_uploaded_file($_FILES['file']['tmp_name'][$i],  "../data/" . $dirPath . "/" . $_FILES['file']['name'][$i]);

	}
    }

    
    
    # POSTED DATAS
    
    # get datas from post
    # $titleValue = $_POST['data'][0]; # décalage if active +1 others values    
    $authorValue = $_POST['data'][0];    
    $tagValue = $_POST['data'][1];    
    $textValue = $_POST['data'][2];    
    
    
    # DOM DOC

    # file
    $file = "../data/post.xml";

    # new dom doc
    $xmldoc = new DOMDocument('1.0');
    
    # format output
    $xmldoc->formatOutput = true;

    # preserve whitespace
    $xmldoc->preserveWhiteSpace = false;

    # load xml
    $xmldoc->load($file);
    
    # get root
    $root = $xmldoc->firstChild;

    # create new item
    $post = $xmldoc->createElement("post");

    # create elements
    $uniqid = $xmldoc->createElement("uniqid", $uniqidValue);
    $uploadDateTime = $xmldoc->createElement("uploadDateTime", $uploadDateTimeValue);
    #$title = $xmldoc->createElement("title", $titleValue);
    $author = $xmldoc->createElement("author", $authorValue);
    $tag = $xmldoc->createElement("tag", $tagValue);
    $text = $xmldoc->createElement("text", $textValue);
    
    # append elements to post 
    $post->appendChild($uniqid); 
    $post->appendChild($uploadDateTime);
    #$post->appendChild($title);
    $post->appendChild($author);
    $post->appendChild($tag);
    $post->appendChild($text);

    # append item to root
    $root->appendChild($post);


    
    # SAVE XML

    # save xml
    $xmldoc->save($file);
    

    # message 
    echo "Votre post a bien été envoyer. Merci.";
    
    }


?>
