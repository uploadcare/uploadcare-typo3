<?php
class tx_uploadcare_pi1_wizicon {
	function proc($wizardItems) {		
		$wizardItems['plugins_tx_uploadcare_pi1'] = array(
				'icon' => t3lib_extMgm::extRelPath('sr_uploadcare').'ext_icon.gif',
				'title' => 'Uploadcare',
				'description' => 'Uploadcare',
				'params' => '&defVals[tt_content][CType]=uploadcare_pi1' );

		return $wizardItems;
	}
}


if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/uploadcare/pi1/class.tx_uploadcare_pi1_wizicon.php"]) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/uploadcare/pi1/class.tx_uploadcare_pi1_wizicon.php"]);
}

?>