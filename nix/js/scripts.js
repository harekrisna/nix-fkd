var leader_flag = 0;

$(document).ready(function () {  
  jQuery.ajaxSetup({
    cache: false,
    dataType: 'json',
    success: function (payload) {
      if (typeof(payload.redirect) != "undefined") {
        window.location.replace(payload.redirect);
        return;
      }
      
      if (payload.snippets) {
          for (var i in payload.snippets) {
              $('#' + i).html(payload.snippets[i]);
          }
      }

      //console.log(payload);
      if (typeof(payload.pid) != "undefined") {
        $('tr.current').removeClass('current');
        $('tr[name=pid_'+payload.pid+']').addClass('current');
      }                                           
      
      $('form[name=pictureForm] input[name=upload_image]').attr("disabled", "disabled");
      $('form[name=pictureForm] input[type=file]').change(function() {
      if(this.value != "") 
        $('form[name=pictureForm] input[name=upload_image]').removeAttr('disabled');
      });
      
      leader_flag = payload.leader_flag;
      
      //dynamické odstranění řádku výpisu osob při požadavku smazání záznamu
      if(payload.action == "deletePerson") {
        $('tr[name=pid_'+payload.pid+']').children('td, th')        
                                         .wrapInner('<div />')
                                         .children()
                                         .slideUp(function() { $(this).closest('tr').remove(); });
        clearPersonForm();                                        
        disablePesronForm();
      }
      
      $('div.loading').fadeOut(400);
    }
  });

  // odesílání odkazů
  $('a.ajax').live('click', function (event) {
    $('div.loading').fadeIn(300);
    event.preventDefault();
    $.get(this.href);
  });

  // radky tabulky osob
  $('table#persons-list tr.ajax').live('click', function (event) {
    $('div.loading').fadeIn(300);
    event.preventDefault();
    $.get(this.id);
  });

  // odesílání formulářů
  $('form.ajax').live('submit', function (event) {
    $('div.loading').fadeIn(300);
    event.preventDefault();
    $.post(this.action, $(this).serialize());
  });

  // potvrzení požadavku na smazání
  $('a.ajax_remove').live('click', function (event) {
    var name = $('tr.current td:nth-child(3)').html();
    if(leader_flag == "1")
      var text = "Opravdu si přeješ odstranit osobu " + name + " (vedoucí) z databáze?";
    else
      var text = "Opravdu si přeješ odstranit osobu " + name + " z databáze?";
      
    if(confirm(text)) {
      $('div.loading').fadeIn(300);
      event.preventDefault();
      $.get(this.href);
    }
    else {
      return false;
    }
  });

  
  $('div.loading').hide();
  $('form[name=pictureForm] input[name=upload_image]').attr("disabled", "disabled");
  
  // meneni sipek razeni v hlavicce tabulky osob
  $('#persons-list-head th a.visible').filter('.DESC').mouseover(function() {
    $(this).prev().attr("src", "./images/icons/arrow_ASC.png");
  });
  $('#persons-list-head th a.visible').filter('.DESC').mouseout(function() {
    $(this).prev().attr("src", "./images/icons/arrow_DESC.png");
  });

  $('#persons-list-head th a.visible').filter('.ASC').mouseover(function() {
    $(this).prev().attr("src", "./images/icons/arrow_DESC.png");
  });
  $('#persons-list-head th a.visible').filter('.ASC').mouseout(function() {
    $(this).prev().attr("src", "./images/icons/arrow_ASC.png");
  });

  $('#persons-list-head th a').mouseover(function() {
    $(this).prev().not('.visible').css("visibility", "visible");
  });
  $('#persons-list-head th a').mouseout(function() {
    $(this).prev().not('.visible').css("visibility", "hidden");
  });

});

$('.flash').hide().fadeIn(800).delay(2800).fadeOut(800);

$('.flash').click(function() {
  $(this).fadeOut(800);
});

function clearPersonForm() {
  $('form[name=personForm] input[type=text]').val("");
  $('form[name=personForm] input[type=email]').val("@");
  $('form[name=personForm] select').val($("#target option:first").val());
  $('img[name=person_picture]').remove();
}

function disablePersonForm() {
  $('form[name=personForm] input').attr("disabled", "disabled");
  $('form[name=personForm] select').attr("disabled", "disabled");
  $('form[name=pictureForm] input').attr("disabled", "disabled");
}

function hoverEffect() {
    $('#persons-list tr:not(.current)').mouseover(function () {
      $(this).css('background-color', '#F0F0F0'); 
    });
    
    $('#persons-list tr:not(.current)').mouseout(function () {
      $(this).css('background-color', '#FFFFFF'); 
    });
}