<?php
	if (!defined ('TYPO3_MODE')) die ('Access denied.');
		 
	t3lib_extMgm::addTypoScript($_EXTKEY, 'editorcfg', '
		tt_content.CSS_editor.ch.tx_uploadcare_pi1 = < plugin.tx_uploadcare_pi1.CSS_editor
		', 43);
	 
	t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_uploadcare_pi1.php', '_pi1', 'CType', 1);
	 
	t3lib_extMgm::addTypoScript($_EXTKEY, 'setup', '
		tt_content.uploadcare_pi1 = COA
		tt_content.uploadcare_pi1 < tt_content.uploadcare_pi1
		tt_content.list.20.uploadcare_pi1 = < plugin.tx_uploadcare_pi1
		', 43); 
	
	$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] = 'EXT:uploadcare/hooks/class.tcemain_uploadcare_hooks.php:&tx_tcemain_uploadcare_hooks';
	
?>