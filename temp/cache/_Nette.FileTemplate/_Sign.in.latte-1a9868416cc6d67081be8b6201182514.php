<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.85421600 1452509899";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:57:"/Users/bart/PHP/NIX farma/web/app/templates/Sign/in.latte";i:2;i:1452509873;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/bart/PHP/NIX farma/web/app/templates/Sign/in.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6sktd74wnv')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb5d97f256d5_content')) { function _lb5d97f256d5_content($_l, $_args) { extract($_args)
;Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("signInForm") ? "signInForm" : $_control["signInForm"]), array()) ?>
<div class="login_legend"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/nix.png" style="margin: 0px 5px -2px 43px; width: 38px" />Přihlášení</div>
<fieldset class="sign-in-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>
    <table>
    <tr>
      <td><?php if ($_label = $_form["username"]->getLabel()) echo $_label->addAttributes(array()) ?></td>
      <td><?php echo $_form["username"]->getControl()->addAttributes(array()) ?></td>
    </tr>
    <tr>
      <td><?php if ($_label = $_form["password"]->getLabel()) echo $_label->addAttributes(array()) ?></td>
      <td><?php echo $_form["password"]->getControl()->addAttributes(array()) ?></td>
    <!--
    <div class="pair">
        <div class="input"><?php echo $_form["persistent"]->getControl()->addAttributes(array()) ?>
 <?php if ($_label = $_form["persistent"]->getLabel()) echo $_label->addAttributes(array()) ?></div>
    </div>
    -->
    </tr>
    <tr>
      <td></td>
      <td><?php echo $_form["login"]->getControl()->addAttributes(array()) ?></td>
    </tr>
    </table>
</fieldset>
<br />
<img src="<?php echo htmlSpecialChars($basePath) ?>/images/nix.png" style="display: block; margin: 50px auto 0px; width: 380px" />
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
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