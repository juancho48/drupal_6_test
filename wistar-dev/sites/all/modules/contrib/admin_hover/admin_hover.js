
/**
 * Fetch admin_hover divs from the menu callback
 */
function admin_hover_init(ids, object, array) {
  $.post(Drupal.settings.admin_hover.ajax_path + '/' + object, {admin_hover: 1, ids: ids, destination: Drupal.settings.admin_hover.destination},
    function(response) {
      if (response.status) {
        items = response.data;
        for (i = 0; i < items.length; i++) {
          div = $('#' + items[i].id);
          div.append(items[i].admin_hover).addClass('has-admin_hover').addClass(object + '-has-admin_hover');
          admin_hover_hover(div, object);
        }
      }
  }, 'json');
}

/**
 * Set the hover events for admin_hover divs
 */
function admin_hover_hover(div, object) {
  hover_class = 'has-admin_hover-hover';
  object_hover_class = object + '-has-admin_hover-hover';
  div.hover(
    function () {
      id = $(this).addClass(hover_class).addClass(object_hover_class).attr('id');
      $('#' + id + '-admin_hover').stop().css({'opacity' : 0, 'display' : 'block'}).animate({opacity: 1.0});
    }, 
    function () {
      id = $(this).removeClass(hover_class).removeClass(object_hover_class).attr('id');
      $('#' + id + '-admin_hover').stop().animate({opacity: 0.0, display: 'none'}, function(){ $(this).hide() });
    }
  );
}

/**
 * Loop thru nodes and blocks and fecth admin_hover divs
 */
$(document).ready(function() {
  objects = Drupal.settings.admin_hover.objects;
  for (i = 0; i < objects.length; i++) {
    object = objects[i];
    ids = "";
    $('div.' + object).each(function() {
      id = $(this).attr('id');
      if (id) ids += id + ";";
    });
    if (ids.length > 0) admin_hover_init(ids, object);  
  };
});
