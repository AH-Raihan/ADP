

window.addEventListener('scroll',function(){
  var sitebranding=document.getElementsByClassName('sitebranding')[0];
  sitebranding.classList.toggle('sticky', window.scrollY > 0);
}
