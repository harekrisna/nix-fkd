<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.05627200 1413127746";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:72:"/data/www/virtuals/jamuna/html/nix/app/templates/Persons/paginator.latte";i:2;i:1413116165;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f8aa369 released on 2012-08-30";}}}?><?php

// source file: /data/www/virtuals/jamuna/html/nix/app/templates/Persons/paginator.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '5k0zg8i1ag')
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