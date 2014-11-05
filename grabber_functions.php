<?php

/*
*
* getContact() 1
*
*/
function getItem1($html_dom, $tag="div[class=TellusProductContacts]") {
	$items=$html_dom->find($tag);
 	if ($items && $items[0]) {
        return "<div class='grabber_item1'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item1'></div>";
    }
	
}

/*
*
* getFacilities() 2
*
*/

function getItem2($html_dom, $tag="div[class=FacilityCategoryList]") {
	$items=$html_dom->find($tag);
 
	if ($items && $items[0]) {
        return "<div class='grabber_item2'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item2'></div>";
    }
	
}

/*
*
* getProductScheduleList() 3
*
*/
function getItem3($html_dom, $tag="div[class=ProductScheduleList]") {
	$items=$html_dom->find($tag);
 
	if ($items && $items[0]) {
        return "<div class='grabber_item3'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item3'></div>";
    }
	
}

/*
*
* getProductPriceCategoryList() 4
*
*/
function getItem4($html_dom, $tag="div[class=ProductPriceCategoryList]") {
	$items=$html_dom->find($tag);
 
	if ($items && $items[0]) {
        return "<div class='grabber_item4'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item4'></div>";
    }
	
}

/*
*
* getProductName() 5
*
*/
function getItem5($html_dom, $tag="section[class=ProductBodyContent]") {
	$items=$html_dom->find($tag);
 
	if ($items && $items[0]) {
        return "<div class='grabber_item5'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item5'></div>";
    }
	
}

/*
*
* getArticles2() 6
*
*/
function getItem6($html_dom, $tag="div[class=ProductTextList]") {
	$items=$html_dom->find($tag);
 
	if ($items && $items[0]) {
        return "<div class='grabber_item6'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item6'></div>";
    }
	
}

/*
*
* getImage() 7
*
*/
function getItem7($html_dom, $tag="div[id=slider2-img1]") {
	$items=$html_dom->find($tag);

	if ($items && $items[0]) {
		/*
		*
		$images = &$items[0]->find('img[data-href]');

	    foreach ($images as $image) {
	        $image->src = $image->getAttribute('data-href');
	        
	    }*/
        return "<div class='grabber_item7'>" .$items[0]. "</div>";
    } else {
    	return "<div class='grabber_item7'></div>";
    }
	
}

/*
*
* commonFun() 8
*
*/
function getItemCommon($itemName, $html_dom, $tag="") {
	if ($tag != "") {
		$items=$html_dom->find($tag);
	}
 
	if ($tag != "" && $items && $items[0]) {
        return "<div class='" .$itemName. "'>" .$items[0]. "</div>";
    } else {
    	return "<div class='" .$itemName. "'></div>";
    }
	
}

function getItemTitle($html_dom, $tag="") {
	if ($tag != "") {
		$items=$html_dom->find($tag);
	}

	if ($tag != "" && $items && $items[0]) {
        return $items[0]->plaintext;
    } else {
    	return "";
    }
}
	
?>