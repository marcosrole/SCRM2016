$(document).ready(function(){

$("ul li:has(ul)>a ").addClass("dropdown-toggle");

$("ul li:has(ul)>a ").attr("data-toggle","dropdown");

$("ul li:has(ul) ul ").addClass("dropdown-menu multi-level");

$("ul ul li:has(ul) ").addClass("dropdown-submenu");

});
