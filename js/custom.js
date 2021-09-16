

window.addEventListener('scroll',function(){
  var sitebranding=document.getElementsByClassName('sitebranding');
  sitebranding[0].classList.toggle('sticky', window.scrollY > 0);
});
