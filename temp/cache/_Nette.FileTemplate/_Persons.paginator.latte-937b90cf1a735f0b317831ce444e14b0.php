<?php //netteCache[01]000389a:2:{s:4:"time";s:21:"0.99435500 1452509903";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"/Users/bart/PHP/NIX farma/web/app/templates/Persons/paginator.latte";i:2;i:1452509872;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /Users/bart/PHP/NIX farma/web/app/templates/Persons/paginator.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'oprddhl0ii')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<div class="paginator">
<?php if ($paginator->isFirst()): ?>
    <span class="button">&laquo;</span>
<?php else: ?>
    <a href="<?php echo htmlSpecialChars($_control->link("this", array('page' => $paginator->page - 1))) ?>">&laquo;</a>
<?php endif ;for ($step = $min; $step < $max; $step++): if ($step == $paginator->page): ?>
        <span class="current"><?php echo Nette\Templating\Helpers::escapeHtml($step, ENT_NOQUOTES) ?></span>
<?php else: ?>
        <a href="<?php echo htmlSpecialChars($_control->link("this", array('page' => $step))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($step, ENT_NOQUOTES) ?></a>
<?php endif ;endfor ?>

<?php if ($paginator->isLast()): ?>
    <span class="button">&raquo;</span>
<?php else: ?>
    <a href="<?php echo htmlSpecialChars($_control->link("this", array('page' => $paginator->page + 1))) ?>">&raquo;</a>
<?php endif ?>
</div>