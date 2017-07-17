$('#persons-list-head th a').mouseover(function() {
  var test = $(this).parent();
  $(this).parent().('img').css("visibility", "visible");
});
