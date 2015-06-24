$(window).load(function(){
  Cufon.set('hover', true);

  Cufon.set('fontFamily', 'DINMedium');
  Cufon.replace('#content_container h1, #content_container h2:not(.nocufon), #content_container h3, #content_container h4, #content_container h5, #content_container h6');
  Cufon.replace('ul.expandable_list li .anchor');
  //Cufon.replace('ul.list li .anchor');
  Cufon.replace('#content_container .more');
  Cufon.replace('.tabs > .tab_set > a');
  Cufon.replace('.tabs .tab_set > div > ul > li > a');
  
  $('.callout_container.set_of_3 div.inner .more cufon').css('height', '14px');
});
