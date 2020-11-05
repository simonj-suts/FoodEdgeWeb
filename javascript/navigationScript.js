
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showButtonContentNav(button) {
    document.getElementById("dropbtn_nav_div").classList.toggle("showButtonContent");
    document.getElementById("button_icon").classList.toggle('fa-caret-up');
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn_nav')) {
        var dropdowns = document.getElementsByClassName("dropbtn_nav_contents");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}