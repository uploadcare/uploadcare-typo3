<?php
class tx_uploadcare_tca {
  var $extKey = 'uploadcare';

  function renderWidget($PA,$fobj) {
    global $TYPO3_CONF_VARS;
    $extConfig = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['uploadcare']);
    $api = new Uploadcare_Api($extConfig['public_key'], $extConfig['secret_key']);

    $name = $PA['itemName'];
    $name = str_replace(array('[', ']'), array('\\\\[', '\\\\]'), $name);

    $result = "
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
        <script>
        Ext.select('input[name=".$name."]').setStyle('display', 'none');
            Ext.select('input[name=".$name."]').set({'role': 'uploadcare-uploader'});
                jQuery('input[name=".$name."]').prev().hide();
                    </script>
                    ";
    $result .= $api->widget->getScriptTag();
    return $result;
  }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/uploadcare/class.tx_uploadcare.php']) {
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/uploadcare/class.tx_uploadcare.php']);
}
?>