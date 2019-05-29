var $j = jQuery.noConflict();

$j(document).ready(function() {

 openNav();

 closeNav(); 

 $j("#menu-primary-menus").find(".current_page_item").addClass("active");

});


function openNav() {
	document.getElementById("ggSidenav").style.width = "100%";
}

function closeNav() {
	document.getElementById("ggSidenav").style.width = "0";
}