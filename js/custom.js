

window.addEventListener('scroll',function(){
  var sitebranding=document.getElementsByClassName('sitebranding');
  sitebranding[0].classList.toggle('sticky', window.scrollY > 0);
  var logo=document.getElementsByClassName('logo-area');
  logo[0].classList.toggle('dnone', window.scrollY > 0);
});


// disable right click
    document.addEventListener('contextmenu', event => event.preventDefault());
 
    document.onkeydown = function (e) {
 
        // disable F12 key
        if(e.keyCode == 123) {
            return false;
        }
 
        // disable I key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
            return false;
        }
 
        // disable J key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
 
        // disable U key
        if(e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }
