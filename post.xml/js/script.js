// # INIT

window.onload = vars();

window.onload = dataGet();



////////////////////////////////////////



// # FUNCTIONS JS 

// ## VARS

function vars(){

    // ### CONTENT

    // contentDiv    
    contentDiv = document.getElementById("contentDiv");

    // posts
    posts = document.getElementsByClassName("post");
    
    // ### NAV

    // navDiv    
    navDiv = document.getElementById("navDiv");

    // researchArea 
    researchArea = document.getElementById("researchArea");
   
    // sortArea
    sortArea = document.getElementById("sortArea");
    
    // filterArea
    filterArea = document.getElementById("filterArea");

    // filterBtn
    filterBtn = document.getElementsByClassName("filterBtn");

    // ### UPLOAD

    // uploadDiv    
    uploadDiv = document.getElementById("uploadDiv");
    
    // uploadBtn    
    uploadBtn = document.getElementById("uploadBtn");

}


// ## EVENTS LISTENERS

function eventsListeners() {

    // ### NAV

    //sortDateTimeBtn
    sortDateTimeBtn.addEventListener("click", sort);

    //filterBtn
    for (i = 0; i < filterBtn.length; i ++) {
	filterBtn[i].addEventListener("click", filter);
    } 

    // ### UPLOAD

    //uploadBtn
    uploadBtn.addEventListener("click", dataPost);

}

// ## CREATE NAV

function createNav () {

    //getFilters("tag");
    //getFilters("author");

}

// ## GET FILTERS

function getFilters(arg) {

    place = document.createElement("div");
    place.id = arg;
    filters = document.getElementsByClassName(arg);
    for (i = 0; i < filters.length; i ++) {
	clone = filters[i].cloneNode(true);
	clone.classList.remove(arg)
	clone.classList.add("filterBtn")
	place.appendChild(clone);
    }
    filterArea.innerHTML = "";
    filterArea.appendChild(place);

}

// ## SEARCH

function search() {

}

// ## SORT

function sort() {

    console.log("sort");

}

// ## FILTER

function filter() {

    console.log("filter");
    
    filterBtnRequest = this.innerHTML;
    console.log(filterBtnRequest);

    tags = document.getElementsByClassName("tag");
    for (i = 0; i < tags.length; i ++) {
	if (tags[i].innerHTML == filterBtnRequest) {
	   

	} else {

	}
    }
    

}

////////////////////////////////////////



// # FUNCTIONS AJAX

// ## DATA GET 
// load the xml file and display as html

function dataGet(){
    
    console.log("dataGet");
    
    // ### REQUEST
    var request = $.ajax({
	url: "php/dataGet.php",
	type: "GET",
    });

    // ### DONE
    request.done(function(content) {
	contentDiv.innerHTML = content;
	createNav();
	vars();
	eventsListeners();
    });
}

// ## DATA POST 
// upload content and write the xml file

function dataPost(){

    console.log("dataPost");

    
    // ### DATAS
    
    // #### CREATE FORM DATA
    var formData = new FormData();
    
    // #### GET DATAS
    //var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var tag = document.getElementById("tag").value;
    var text = document.getElementById("text").value;
    var file = document.getElementById("file").files;
    console.log(file);
    console.log(file.length);

    // #### APPEND DATAS TO FORM DATA
    //formData.append('data[]', title); 
    formData.append('data[]', author); 
    formData.append('data[]', tag); 
    formData.append('data[]', text); 

    // #### APPEND FILES TO FORM DATA
    for (i = 0; i < file.length; i ++) {
    	formData.append('file[]', file[i]);
    }
    
   // ### REQUEST
    var request = $.ajax({
	url: "php/dataPost.php",
	type: "POST",
	processData: false,
	contentType: false,
	data: formData 
    });

    // ### DONE
    request.done(function(content) {
	alert(content);
	dataGet();
    });
}
