var $jslide = jQuery.noConflict();

$jslide(document).ready(function() {

// initialise the visibility check
var is_visible = false;

// append show/hide links to the element directly preceding the element with a class of "toggle"
$jslide('.toggle').prev().append(' <a href="#" class="toggleLink">'+showText+'</a>');

// hide all of the elements with a class of 'toggle'
$jslide('.toggle').hide();

// capture clicks on the toggle links
$jslide('a.toggleLink').click(function() {

// switch visibility
is_visible = !is_visible;

// change the link depending on whether the element is shown or hidden
$jslide(this).html( (!is_visible) ? showText : hideText);

// toggle the display - uncomment the next line for a basic "accordion" style
//$('.toggle').hide();$('a.toggleLink').html(showText);
$jslide(this).parent().next('.toggle').toggle('slow');

// return false so any link destination is not followed
return false;

});
});
