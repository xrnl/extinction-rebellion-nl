/*
This script contains the dynamic creation of the back button to return to the citizen_assembly homepage 
from other citzen assembly pages (citizen_assembly_faq.php and citizen_assembly.php).
*/

function get_localized_url(path) {
  if (path.match("/en")) {
    return "/en/citizen-assembly";
  } else {
    return "burgerberaad";
  }
}

function get_back_button_text(path) {
  if (path.match("/en")) {
    return "Back";
  } else {
    return "Terug";
  }
}

jQuery(document).ready(function($){
  $("#back-button").attr("href", get_localized_url(window.location.pathname));
  $("#back-text").append(get_back_button_text(window.location.pathname));
});
