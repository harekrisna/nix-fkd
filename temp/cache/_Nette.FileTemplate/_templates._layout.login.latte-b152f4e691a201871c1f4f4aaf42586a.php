<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.88597500 1452509899";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"/Users/bart/PHP/NIX farma/web/app/templates/@layout.login.latte";i:2;i:1452509872;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/bart/PHP/NIX farma/web/app/templates/@layout.login.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'apfhbn00sc')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf9f054ffa1_title')) { function _lbf9f054ffa1_title($_l, $_args) { extract($_args)
?>PB Database<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbbed5588c6d_head')) { function _lbbed5588c6d_head($_l, $_args) { extract($_args)
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
<?php if (isset($robots)): ?>  <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
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

<body class="login_screen">  
<?php $iterations = 0; foreach ($flashes as $flash): ?><div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
</body>
</html>
