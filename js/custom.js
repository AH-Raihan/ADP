

window.addEventListener('scroll',function(){
  var sitebranding=document.getElementsByClassName('sitebranding');
  sitebranding[0].classList.toggle('sticky', window.scrollY > 0);
  var logo=document.getElementsByClassName('logo-area');
  logo[0].classList.toggle('dnone', window.scrollY > 0);
});
