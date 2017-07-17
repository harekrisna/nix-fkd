$('body').keydown(function(event) {
  if (event.which == 38) {
    if($('#persons-list .current')[0]) {
      var link = $('#persons-list .current').prev().attr('id');
    }
    else {
      var link = $('#persons-list tr:last').attr('id');
    }
  }
  if (event.which == 40) { 
    if($('#persons-list .current')[0]) {
      var link = $('#persons-list .current').next().attr('id');
    }
    else {
      link = $('#persons-list tr:first').attr('id');
    }
  }
  if(link != undefined) {
    $('div.loading').fadeIn(300);
    event.preventDefault();
    $.get(link);
  }
});

$("input[name=calc_location]").live('click', function() {
  var address = $("input#frmpersonForm-data-city").val();
  var street = $("input#frmpersonForm-data-street").val();
  if(street != "")
    address = address + ", " + street;
  
  var geocoder = new google.maps.Geocoder();
  
  geocoder.geocode( { 'address': address}, function(results, status) {
    var location = results[0].geometry.location;
    $("input#frmpersonForm-data-latitude").val(location.lat());
    $("input#frmpersonForm-data-longitude").val(location.lng());
  });
});

hoverEffect();




