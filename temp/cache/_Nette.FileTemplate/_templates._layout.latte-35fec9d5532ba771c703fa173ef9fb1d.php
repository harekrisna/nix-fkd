<?php //netteCache[01]000384a:2:{s:4:"time";s:21:"0.19258400 1422959904";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:62:"/data/www/virtuals/jamuna/html/nix/app/templates/@layout.latte";i:2;i:1422959901;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /data/www/virtuals/jamuna/html/nix/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'x8erjegvqq')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbe0c9d882ce_title')) { function _lbe0c9d882ce_title($_l, $_args) { extract($_args)
?>PB Database<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbec34dc0af1_head')) { function _lbec34dc0af1_head($_l, $_args) { extract($_args)
;
}}

//
// block _flashes
//
if (!function_exists($_l->blocks['_flashes'][] = '_lb2a67a8bd48__flashes')) { function _lb2a67a8bd48__flashes($_l, $_args) { extract($_args); $_control->validateControl('flashes')
;$iterations = 0; foreach ($flashes as $flash): ?>        <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
        <script>
        $('.flash').hide().fadeIn(800).delay(2800).fadeOut(800);
        </script>
<?php
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb4573b0dc0a_scripts')) { function _lb4573b0dc0a_scripts($_l, $_args) { extract($_args)
;
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
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="description" content="Prabhupad Bhavan Database" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/style.css" type="text/css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" type="text/css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/smoothness/jquery-ui-1.8.23.custom.css" />
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>   
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	<script type='text/javascript' src="<?php echo htmlSpecialChars($basePath) ?>/js/timepicker.js"></script>
	<script type='text/javascript' src="<?php echo htmlSpecialChars($basePath) ?>/js/scripts.js"></script>
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>  
<div id="header">
    <div id="header-inner">
        <div class="menu">
          <a <?php try { $_presenter->link("Persons:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="current"<?php endif ?> href="<?php echo htmlSpecialChars($_control->link("Persons:list")) ?>">Osoby</a>
          <a <?php try { $_presenter->link("Search:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="current"<?php endif ?> href="<?php echo htmlSpecialChars($_control->link("Search:form")) ?>">Vyhledávání</a>
          <a <?php try { $_presenter->link("Map:*"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="current"<?php endif ?> href="<?php echo htmlSpecialChars($_control->link("Map:map")) ?>">Mapa</a>
        </div>
<?php if ($user->isLoggedIn()): ?>
        <div class="user">      
          <div class="loading">
            <div class="circle"></div>
            <div class="circle1"></div>
          </div>
          <span class="icon user"><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->fullname, ENT_NOQUOTES) ?></span> |
          <!-- <a n:href="User:password">Změna hesla</a> | -->
          <a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>">Odhlásit se</a>
        </div>                  
<?php endif ?>
    </div>
</div>

<div id="container">
    <div id="content">
<div id="<?php echo $_control->getSnippetId('flashes') ?>"><?php call_user_func(reset($_l->blocks['_flashes']), $_l, $template->getParameters()) ?>
</div><?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
    </div>

    <div id="footer">

    </div>
</div> 
<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>

</body>
</html>
