<?php //netteCache[01]000390a:2:{s:4:"time";s:21:"0.49770300 1456292297";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"/data/web/virtuals/91735/virtual/www/nix/app/templates/Map/map.latte";i:2;i:1456214488;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /data/web/virtuals/91735/virtual/www/nix/app/templates/Map/map.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6ohjcrqvyz')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1e33f9a7b4_content')) { function _lb1e33f9a7b4_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
  <div id="map-canvas" />     
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9ySGrKGQZxPaYTRf7SdwUNTNPNldzjBc&sensor=false"></script>
  <script type="text/javascript">
    var mapOptions = {
      center: new google.maps.LatLng(49.815, 15.5),
      zoom: 8
    };
    
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);

    geocoder = new google.maps.Geocoder();
    
    function placeMarker(map, x, y, title, address, color) {
          
      var infowindow = new google.maps.InfoWindow({
        content: '<div style="width: 100px">'+title+'</div>'
      });
          
      var marker = new google.maps.Marker({
            map: map, 
            icon: 'http://maps.google.com/mapfiles/ms/icons/'+color+'-dot.png',
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng(x, y),
            title: address,
          });

      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
      });
    }
    
  </script>
  <script type="text/javascript">  
<?php Nette\Diagnostics\Debugger::barDump(array('$markers' => $markers), "Template " . str_replace(dirname(dirname($template->getFile())), "\xE2\x80\xA6", $template->getFile())) ;$iterations = 0; foreach ($markers as $marker): Nette\Diagnostics\Debugger::barDump(array('$marker' => $marker), "Template " . str_replace(dirname(dirname($template->getFile())), "\xE2\x80\xA6", $template->getFile())) ?>
    placeMarker(map, <?php echo Nette\Templating\Helpers::escapeJs($marker['latitude']) ?>
, <?php echo Nette\Templating\Helpers::escapeJs($marker['longitude']) ?>, <?php echo Nette\Templating\Helpers::escapeJs($marker['title']) ?>
, <?php echo Nette\Templating\Helpers::escapeJs($marker['address']) ?>, <?php echo Nette\Templating\Helpers::escapeJs($marker['color']) ?>);
<?php $iterations++; endforeach ?>
  </script>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbb7857efa01_title')) { function _lbb7857efa01_title($_l, $_args) { extract($_args)
?><h1>Mapa</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 