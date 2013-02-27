<?php
class tx_tcemain_uploadcare_hooks
{
  public function processDatamap_preProcessFieldArray(&$incomingFieldArray, $table, $id, $pObj) {
    global $TYPO3_CONF_VARS;
    if ($incomingFieldArray['CType'] == 'uploadcare_pi1') {
      include_once(t3lib_extMgm::extPath('uploadcare').'uploadcare-php/uploadcare/lib/5.2/Uploadcare.php');
      $file_id = $incomingFieldArray['tx_uploadcare_widget'];
      if ($file_id) {
        $extConfig = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['uploadcare']);
        $api = new Uploadcare_Api($extConfig['public_key'], $extConfig['secret_key']);
        $file = $api->getFile($file_id);
        $file->store();
        $incomingFieldArray['bodytext'] = $file->getUrl();
      }else {
        $incomingFieldArray['bodytext'] = '';
      }
    }
  }
}
?>