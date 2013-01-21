<?php
require_once(PATH_tslib.'class.tslib_pibase.php');

class tx_uploadcare_pi1 extends tslib_pibase {
	var $prefixId = 'tx_uploadcare_pi1';
	var $scriptRelPath = 'pi1/class.tx_uploadcare_pi1.php';
	var $extKey = 'uploadcare';

	function main($content, $conf) {
		global $TYPO3_CONF_VARS;
		$extConfig = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['uploadcare']);
		$api = new Uploadcare_Api($extConfig['public_key'], $extConfig['secret_key']);
		$this->conf = $conf;

		$file_id = $this->cObj->data['tx_uploadcare_widget'];
		$file = $api->getFile($file_id);
		
		$content = $file->getImgTag();
		
		return $this->pi_wrapInBaseClass($content);
	}
}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/uploadcare/pi1/class.tx_uploadcare_pi1.php"]) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/uploadcare/pi1/class.tx_uploadcare_pi1.php"]);
}

?>