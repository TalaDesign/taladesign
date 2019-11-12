function toggleMenu() {
  var menu = document.getElementById('menu'); 
  menu.addEventListener('click', () => {
  	if(menu.style.display == "block") { // if is menuBox displayed, hide it
    menu.style.display = "none";
  }
  else { // if is menuBox hidden, display it
    menu.style.display = "block";
  }
  })   
  
}