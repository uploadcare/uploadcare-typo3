<?php
require_once(PATH_tslib.'class.tslib_pibase.php');
include_once(t3lib_extMgm::extPath('uploadcare').'uploadcare-php/uploadcare/lib/5.2/Uploadcare.php');

class tx_uploadcare_pi1 extends tslib_pibase {
  var $prefixId = 'tx_uploadcare_pi1';
  var $scriptRelPath = 'pi1/class.tx_uploadcare_pi1.php';
  var $extKey = 'uploadcare';

  function main($content, $conf) {
    global $TYPO3_CONF_VARS;
    $extConfig = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['uploadcare']);
    $api = new Uploadcare_Api($extConfig['public_key'], $extConfig['secret_key']);

    $file_id = $this->cObj->data['tx_uploadcare_widget'];

    $resize = $this->cObj->data['tx_uploadcare_resize'];
    $resize_width = $this->cObj->data['tx_uploadcare_resize_width'];
    $resize_height = $this->cObj->data['tx_uploadcare_resize_height'];

    $scale_crop = $this->cObj->data['tx_uploadcare_scale_crop'];
    $scale_crop_width = $this->cObj->data['tx_uploadcare_scale_crop_width'];
    $scale_crop_height = $this->cObj->data['tx_uploadcare_scale_crop_height'];
    $scale_crop_center = $this->cObj->data['tx_uploadcare_scale_crop_center'];

    $flip = $this->cObj->data['tx_uploadcare_flip'];
    $grayscale = $this->cObj->data['tx_uploadcare_grayscale'];
    $invert = $this->cObj->data['tx_uploadcare_invert'];
    $mirror = $this->cObj->data['tx_uploadcare_mirror'];
    $stretch = $this->cObj->data['tx_uploadcare_stretch'];

    $file = $api->getFile($file_id);
    $orig = clone $file;

    if ($resize) {
      $file = $file->resize($resize_width, $resize_height);
    }
    if ($scale_crop) {
      $file = $file->scaleCrop($scale_crop_width, $scale_crop_height, $scale_crop_center);
    }
    if ($flip) {
      $file = $file->effect('flip');
    }
    if ($grayscale) {
      $file = $file->effect('grayscale');
    }
    if ($invert) {
      $file = $file->effect('invert');
    }
    if ($mirror) {
      $file = $file->effect('mirror');
    }
    if ($stretch) {
      $file = $file->op('stretch/off');
    }

    $content = '<a href="'.$orig->getUrl().'" target="_blank">'.$file->getImgTag().'</a>';

    return $this->pi_wrapInBaseClass($content);
  }
}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/uploadcare/pi1/class.tx_uploadcare_pi1.php"]) {
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/uploadcare/pi1/class.tx_uploadcare_pi1.php"]);
}

?>