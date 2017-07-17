<?php //netteCache[01]000388a:2:{s:4:"time";s:21:"0.99615900 1420903365";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:66:"/data/www/virtuals/jamuna/html/nix/app/templates/Search/form.latte";i:2;i:1420903043;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /data/www/virtuals/jamuna/html/nix/app/templates/Search/form.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'aou2g13wji')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7785316e4d_content')) { function _lb7785316e4d_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
<fieldset>
  <legend>Kritéria</legend>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("searchForm") ? "searchForm" : $_control["searchForm"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
		<table class="form">
		  <tr>
		  	<th><?php if ($_label = $_form["text_name"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_name"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["text_email"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_email"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["select_leadership_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_leadership_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["text_surname"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_surname"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["text_phone"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_phone"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["select_centre_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_centre_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["text_spiritual_name"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_spiritual_name"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["text_city"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_city"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["select_zone_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_zone_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["select_membership_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_membership_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["text_street"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_street"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["select_spiritual_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_spiritual_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["text_zip"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["text_zip"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["select_membership_cat_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_membership_cat_id"]->getControl()->addAttributes(array()) ?></td>
        <th><?php if ($_label = $_form["select_region_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_region_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["select_care_type_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_care_type_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["select_develop_potential_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["select_develop_potential_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["search"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["search"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		</table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</fieldset>
<?php if ($persons): ?><h2>Počet výsledků <?php echo Nette\Templating\Helpers::escapeHtml($persons->count(), ENT_NOQUOTES) ?>:</h2>
<table id="persons-list" style="margin-bottom: 20px;">
  <tbody>
<?php $iterations = 0; foreach ($persons as $person): ?>
    <tr id="<?php echo htmlSpecialChars($_control->link("detailPerson!", array($person->id))) ?>
" name="pid_<?php echo htmlSpecialChars($person->id) ?>" class="ajax<?php if (isset($detail_person) && $detail_person["id"] == $person->id): ?>
 current<?php endif ?>" >
        <td class="icon"><?php if (isset($person->centre->id)): ?><img src="<?php echo htmlSpecialChars($basePath) ?>
/images/icons/<?php echo htmlSpecialChars($person->centre->icon) ?>" title="<?php echo htmlSpecialChars($person->centre->title) ?>
" /><?php endif ?></td>
        <td class="leadership"><?php if (isset($person->leadership->id)): echo Nette\Templating\Helpers::escapeHtml($person->leadership->subject, ENT_NOQUOTES) ;endif ?></td>
        <td class="subject <?php echo htmlSpecialChars($person->das) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($person->subject, ENT_NOQUOTES) ?></td>
        <td class="zone"><?php if (isset($person->zone->title)): echo Nette\Templating\Helpers::escapeHtml($person->zone->title, ENT_NOQUOTES) ;endif ?></td>
        <td class="region"><?php if (isset($person->region->title)): echo Nette\Templating\Helpers::escapeHtml($person->region->title, ENT_NOQUOTES) ;endif ?></td>
    	<td class="city"><?php echo Nette\Templating\Helpers::escapeHtml($person->street, ENT_NOQUOTES) ;if ($person->street != "" && $person->city != ""): ?>
, <?php endif ;echo Nette\Templating\Helpers::escapeHtml($person->city, ENT_NOQUOTES) ?></td>
    	<td class="icon"><?php if (isset($person->spiritual_lvl->id)): ?><img src="<?php echo htmlSpecialChars($basePath) ?>
/images/icons/<?php echo htmlSpecialChars($person->spiritual_lvl->icon) ?>" title="<?php echo htmlSpecialChars($person->spiritual_lvl->title) ?>
" /><?php endif ?></td>
    	<td class="icon"><?php if (isset($person->membership_lvl->id)): ?><img src="<?php echo htmlSpecialChars($basePath) ?>
/images/icons/<?php echo htmlSpecialChars($person->membership_lvl->icon) ?>" title="<?php echo htmlSpecialChars($person->membership_lvl->title) ?>
" /><?php endif ?></td>
    	<td class="icon"><?php if (isset($person->membership_cat->id)): ?><img src="<?php echo htmlSpecialChars($basePath) ?>
/images/icons/<?php echo htmlSpecialChars($person->membership_cat->icon) ?>" title="<?php echo htmlSpecialChars($person->membership_cat->title) ?>
" /><?php endif ?></td>
    	<td class="icon"><?php if (isset($person->develop_potential->id)): ?><img src="<?php echo htmlSpecialChars($basePath) ?>
/images/icons/<?php echo htmlSpecialChars($person->develop_potential->icon) ?>" title="<?php echo htmlSpecialChars($person->develop_potential->title) ?>
" /><?php endif ?></td>
    	<td class="icon"><?php if (isset($person->care_type->id)): ?><img src="<?php echo htmlSpecialChars($basePath) ?>
/images/icons/<?php echo htmlSpecialChars($person->care_type->icon) ?>" title="<?php echo htmlSpecialChars($person->care_type->title) ?>
" /><?php endif ?></td>
    </tr>
<?php $iterations++; endforeach ?>
  </tbody>
  </table>
<div id="<?php echo $_control->getSnippetId('personInfo') ?>"><?php call_user_func(reset($_l->blocks['_personInfo']), $_l, $template->getParameters()) ?>
</div><?php endif ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb5da6514af7_title')) { function _lb5da6514af7_title($_l, $_args) { extract($_args)
?><h1>Vyhledávání</h1>
<?php
}}

//
// block _personInfo
//
if (!function_exists($_l->blocks['_personInfo'][] = '_lb181df95fa8__personInfo')) { function _lb181df95fa8__personInfo($_l, $_args) { extract($_args); $_control->validateControl('personInfo')
;if (isset($person_id)): ?>
        <ul id="tabs">
            <li class="active"><a rel="general_info">Obecné</a></li>
            <li><a rel="spirit_dev">Duchovní vývoj</a></li>
            <li><a rel="events">Události</a></li>
            <li><a rel="location">Poloha</a></li>
            <li><a rel="record">Záznam</a></li>
            <li><a rel="note">Poznámka</a></li>
        </ul>
<?php else: ?>
        <ul id="tabs">
            <li><div>Obecné</div></li>
            <li><div>Duchovní vývoj</div></li>
            <li><div>Události</div></li>
            <li><div>Poloha</div></li>
            <li><div>Záznam</div></li>
            <li><div>Poznámka</div></li>            
        </ul>
<?php endif ?>
    <div id="tab_content" style="min-height: 340px;">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("personForm") ? "personForm" : $_control["personForm"]), array('class' => 'ajax')) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
        <div id="general_info">
		<table class="form">
		  <tr>
		  	<th><?php if ($_label = $_form["data-name"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-name"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-email"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-email"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-leadership_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-leadership_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-surname"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-surname"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-phone"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-phone"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-centre_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-centre_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-subject"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-subject"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-city"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-city"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-zone_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-zone_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-spiritual_name"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-spiritual_name"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-street"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-street"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-zone2_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-zone2_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["birth_day"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["birth_day"]->getControl()->addAttributes(array()) ;echo $_form["birth_month"]->getControl()->addAttributes(array('class' => 'month')) ;echo $_form["birth_year"]->getControl()->addAttributes(array('class' => 'year')) ?></td>
		  	<th><?php if ($_label = $_form["data-zip"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-zip"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["data-zone3_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-zone3_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-das"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-das"]->getControl()->addAttributes(array()) ?></td>
            <th><?php if ($_label = $_form["data-region_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-region_id"]->getControl()->addAttributes(array()) ?></td>
            <th rowspan="5" colspan="2"><?php if (isset($detail_person['image'])): ?>
<img class="person_picture" src="<?php echo htmlSpecialChars($basePath) ?>/images/persons/<?php echo htmlSpecialChars($detail_person['image']) ?>
" /><?php endif ?></th>
		  </tr>
		  <tr>
		    <th><?php if ($_label = $_form["data-leader"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-leader"]->getControl()->addAttributes(array()) ?></td>
            <th rowspan="5" colspan="2"></th>
		  </tr>
		  <tr>
		    <th><?php if ($_label = $_form["data-guru_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-guru_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		    <th><?php if ($_label = $_form["data-category_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-category_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["update"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["update"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
        </table>
        </div>
        
        <div id="spirit_dev">
        <table class="form" style="width: 855px;">
		  <tr>
		  	<th><?php if ($_label = $_form["data-membership_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-membership_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th></th><td>První kontakt:</td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-spiritual_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-spiritual_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["first_contact-contact_how"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["first_contact-contact_how"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-membership_cat_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-membership_cat_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["first_contact-contact_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["first_contact-contact_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-care_type_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-care_type_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["first_contact-contact_when"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["first_contact-contact_when"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-develop_potential_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-develop_potential_id"]->getControl()->addAttributes(array()) ?></td>
		  	<th><?php if ($_label = $_form["first_contact-contact_where"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["first_contact-contact_where"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-bhakti_vriksa_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-bhakti_vriksa_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
  		  	<th><?php if ($_label = $_form["update"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["update"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
        </table>
        </div>
        
        <div id="events">
            Události
        </div>
        <div id="location">
        <table class="form slim" style="width: 500px;">
		  <tr>
		  	<th>Bydliště:</th><td><?php echo Nette\Templating\Helpers::escapeHtml($address, ENT_NOQUOTES) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-latitude"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-latitude"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-longitude"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-longitude"]->getControl()->addAttributes(array()) ?>
&nbsp;<?php echo $_form["calc_location"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
  		  	<th><?php if ($_label = $_form["update"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["update"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
        </table>
        </div>
        <div id="record">
        <table class="form" style="width: 500px;">
		  <tr>
		  	<th style="width: 150px"><?php if ($_label = $_form["data-created"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-created"]->getControl()->addAttributes(array()) ?></td>  
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-last_update"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-last_update"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-user_created_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-user_created_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-send_news"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-send_news"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
  		  	<th><?php if ($_label = $_form["update"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["update"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
        </table>
        </div>
        <div id="note">
            <table class="form slim" style="margin-left: 15px;">
                <tr>
                    <th style="text-align: left;"><?php if ($_label = $_form["data-note"]->getLabel()) echo $_label->addAttributes(array()) ?></th>
                </tr>
                <tr>
                    <td><?php echo $_form["data-note"]->getControl()->addAttributes(array()) ?></td>
                </tr>
                <tr>
                    <td><?php echo $_form["update"]->getControl()->addAttributes(array()) ?></td>
                </tr>

            </table>
        </div>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
    </div>

<script>
    $('#tabs a').click(function() {
        $('#tab_content form > div').hide();
        $('#tab_content #' + this.rel).show();
        $('#tabs li').removeClass('active');
        $(this).parent('li').addClass('active');
        return false;
    });
    
  $(function() {
    $.datepicker.regional['cs'] = { 
                 closeText: 'Cerrar', 
                 prevText: 'Předchozí', 
                 nextText: 'Další', 
                 currentText: 'Hoy', 
                 monthNames: ['Leden','Únor','Březen','Duben','Květen','Červen', 'Červenec','Srpen','Září','Říjen','Listopad','Prosinec'],
                 monthNamesShort: ['Le','Ún','Bř','Du','Kv','Čn', 'Čc','Sr','Zá','Ří','Li','Pr'], 
                 dayNames: ['Neděle','Pondělí','Úterý','Středa','Čtvrtek','Pátek','Sobota'], 
                 dayNamesShort: ['Ne','Po','Út','St','Čt','Pá','So',], 
                 dayNamesMin: ['Ne','Po','Út','St','Čt','Pá','So'], 
                 weekHeader: 'Sm', 
                 dateFormat: 'dd.mm.yy', 
                 firstDay: 1, 
                 isRTL: false, 
                 showMonthAfterYear: false, 
                 yearSuffix: ''}; 
 
 
    $.datepicker.setDefaults($.datepicker.regional['cs']);
    $( "#frmpersonForm-first_contact-contact_when").datepicker();
  });
</script>
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