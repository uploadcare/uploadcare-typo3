<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
include_once(t3lib_extMgm::extPath('uploadcare').'uploadcare-php/uploadcare/lib/5.2/Uploadcare.php');

function test_uc($PA,$fobj) {
	global $TYPO3_CONF_VARS;
	$extConfig = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['uploadcare']);
	$api = new Uploadcare_Api($extConfig['public_key'], $extConfig['secret_key']);
	
	$name = $PA['itemName'];
	$name = str_replace(array('[', ']'), array('\\\\[', '\\\\]'), $name);
	
	$result = "
	<script>
		//Ext.select('*[name=".$name."]').hide();
		Ext.select('*[name=".$name."]').set({'role': 'uploadcare-uploader'});
	</script>
	";
	$result .= $api->widget->getScriptTag();
	return $result;
}

$tempColumns = array(
		'tx_uploadcare_widget' => array(
				'exclude' => 1,
				'label' => 'Upload Image',
				'config' => array(
						'type' => 'input',
						'wizards' => array(
								'uc_widget' => array(
										'type' => 'userFunc',
										'userFunc' => 'test_uc',
								),
						),
				),
		),
);

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types'][$_EXTKEY.'_pi1']['showitem'] = '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
		header;LLL:EXT:cms/locallang_ttc.xml:header.ALT.html_formlabel,
		tx_uploadcare_widget,
		--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
		--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
		--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended';
t3lib_extMgm::addPlugin(Array('Uploadcare', 'uploadcare_pi1'),'CType');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist']['uploadcare_pi1']='layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist']['iframe2_pi1'] = 'tx_uploadcare_widget';
t3lib_extMgm::addPlugin(Array('Uploadcare', 'uploadcare_pi1'),'list_type');


if (TYPO3_MODE=='BE') $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_uploadcare_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_uploadcare_pi1_wizicon.php';
?>
