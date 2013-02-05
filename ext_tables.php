<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
include_once(t3lib_extMgm::extPath('uploadcare').'uploadcare-php/uploadcare/lib/5.2/Uploadcare.php');

$tempColumns = array(
		'tx_uploadcare_widget' => array(
				'exclude' => 0,
				'label' => 'Upload Image',
				'config' => array(
						'type' => 'input',
						'wizards' => array(
								'uploadcareWizard' => array(
										'type' => 'userFunc',
										'userFunc' => 'EXT:uploadcare/class.tx_uploadcare_tca.php:tx_uploadcare_tca->renderWidget',
										'params' => array(),										
								),
						),
				),
		),
		//resize
		'tx_uploadcare_resize' => array(
				'exclude' => 1,
				'label' => 'Resize?',
				'config' => array(
						'type' => 'check',
				),
		),
		'tx_uploadcare_resize_width' => array(
				'exclude' => 1,
				'label' => 'Resize width',
				'config' => array(
						'type' => 'input',
						'eval' => 'int,trim',
				),
		),
		'tx_uploadcare_resize_height' => array(
				'exclude' => 1,
				'label' => 'Resize width',
				'config' => array(
						'type' => 'input',
						'eval' => 'int,trim',
				),
		),
		//scale crop
		'tx_uploadcare_scale_crop' => array(
				'exclude' => 1,
				'label' => 'Scale crop?',
				'config' => array(
						'type' => 'check',
						'default' => 1,
				),
		),
		'tx_uploadcare_scale_crop_width' => array(
				'exclude' => 1,
				'label' => 'Scale crop width',
				'config' => array(
						'type' => 'input',
						'eval' => 'int,trim',
						'default' => 800,
				),
		),
		'tx_uploadcare_scale_crop_height' => array(
				'exclude' => 1,
				'label' => 'Scale crop width',
				'config' => array(
						'type' => 'input',
						'eval' => 'int,trim',
						'default' => 634,
				),
		),		
		'tx_uploadcare_scale_crop_center' => array(
				'exclude' => 1,
				'label' => 'Scale crop center?',
				'config' => array(
						'type' => 'check',
						'default' => 1,
				),
		),	
		//effects	
		'tx_uploadcare_flip' => array(
				'exclude' => 1,
				'label' => 'Use flip effect?',
				'config' => array(
						'type' => 'check',
				),
		),
		'tx_uploadcare_grayscale' => array(
				'exclude' => 1,
				'label' => 'Use grayscale effect?',
				'config' => array(
						'type' => 'check',
				),
		),
		'tx_uploadcare_invert' => array(
				'exclude' => 1,
				'label' => 'Use invert filter?',
				'config' => array(
						'type' => 'check',
				),
		),		
		'tx_uploadcare_mirror' => array(
				'exclude' => 1,
				'label' => 'Use mirror filter?',
				'config' => array(
						'type' => 'check',
				),
		),		
		'tx_uploadcare_stretch' => array(
				'exclude' => 1,
				'label' => 'Stretch off?',
				'config' => array(
						'type' => 'check',
						'default' => 1,
				),
		),		
);

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types'][$_EXTKEY.'_pi1']['showitem'] = '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
		tx_uploadcare_widget,
		tx_uploadcare_resize,tx_uploadcare_resize_width,tx_uploadcare_resize_height,
		tx_uploadcare_scale_crop,tx_uploadcare_scale_crop_width,tx_uploadcare_scale_crop_height,tx_uploadcare_scale_crop_center,
		tx_uploadcare_flip,tx_uploadcare_grayscale,tx_uploadcare_invert,tx_uploadcare_mirror,tx_uploadcare_stretch';
t3lib_extMgm::addPlugin(Array('Uploadcare', 'uploadcare_pi1'),'CType');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist']['uploadcare_pi1']='layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist']['iframe2_pi1'] = 'tx_uploadcare_widget';
t3lib_extMgm::addPlugin(Array('Uploadcare', 'uploadcare_pi1'),'list_type');


if (TYPO3_MODE=='BE') $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_uploadcare_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_uploadcare_pi1_wizicon.php';
?>
