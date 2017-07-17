<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.68432600 1452507946";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"/Users/bart/PHP/NIX farma/web/app/templates/Persons/add.latte";i:2;i:1452507944;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/bart/PHP/NIX farma/web/app/templates/Persons/add.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6ku11gwre6')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbcf26ad5d51_content')) { function _lbcf26ad5d51_content($_l, $_args) { extract($_args)
?><ul id="paraler-menu"><li><a href="<?php echo htmlSpecialChars($_control->link("list")) ?>
">Osoby</a></li><div>|</div><li>Nová duše</li></ul>
<hr style="clear: both; margin-bottom: 5px;" />
<fieldset>
    <legend>Vložit záznam</legend>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("personForm") ? "personForm" : $_control["personForm"]), array()) ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
    <table>
      <tr>
		  	<th><?php if ($_label = $_form["data-name"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-name"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-surname"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-surname"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-spiritual_name"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-spiritual_name"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-das"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-das"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["birth_day"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["birth_day"]->getControl()->addAttributes(array()) ;echo $_form["birth_month"]->getControl()->addAttributes(array('class' => 'month')) ;echo $_form["birth_year"]->getControl()->addAttributes(array('class' => 'year')) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-leadership_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-leadership_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-centre_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-centre_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-zone_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-zone_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-email"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-email"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-phone"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-phone"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-city"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-city"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-street"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-street"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-zip"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-zip"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-region_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-region_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-membership_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-membership_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-spiritual_lvl_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-spiritual_lvl_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-membership_cat_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-membership_cat_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-care_type_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-care_type_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["data-develop_potential_id"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["data-develop_potential_id"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th>&nbsp;</th><td><?php echo $_form["data-leader"]->getControl()->addAttributes(array()) ;if ($_label = $_form["data-leader"]->getLabel()) echo $_label->addAttributes(array()) ?></td>
		  </tr>		
		  <tr>
		  	<th>&nbsp;</th><td><?php echo $_form["data-send_news"]->getControl()->addAttributes(array()) ;if ($_label = $_form["data-send_news"]->getLabel()) echo $_label->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<th><?php if ($_label = $_form["image"]->getLabel()) echo $_label->addAttributes(array()) ?>
</th><td><?php echo $_form["image"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
		  <tr>
		  	<td colspan="2"><?php echo $_form["create"]->getControl()->addAttributes(array()) ?></td>
		  </tr>
    </table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</fieldset>
<script>
$('form[name=personForm]').submit(function() {
  if($('input#frmpersonForm-data-name').val() == "" && 
     $('input#frmpersonForm-data-surname').val() == "" && 
     $('input#frmpersonForm-data-spiritual_name').val() == "") {
    alert("Je nutné zadat příjmení nebo duchovní jméno.");
    return false;
  }
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 