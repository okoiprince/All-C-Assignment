 // Validating Empty Field
function check_empty() 
{ 
    if (document.getElementsById('form-control').value =="" ) 
    { 
        alert("Fill All Fields !"); 
    } 
    else { 
        document.getElementById('form_sig').submit(); 
        alert("Registered Successfully..."); 
    } 
} 

//Function To Display Popup
function div_show() 
{ 
    document.getElementById('signup_form').style.display = "block"; 
}
//Function to Hide Popup
function div_hide()
{ 
    document.getElementById('signup_form').style.display = "none"; 
}

//function for more opions drop down menu
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function drop_Nav() {
    document.getElementById("listed_nav").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.list')) {

    var dropdowns = document.getElementsByClassName("listed");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
