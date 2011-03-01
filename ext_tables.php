<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Marit DAM');

$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',				// A unique name of the plugin in UpperCamelCase
	'Dam'	// A title shown in the backend dropdown field
);
if (TYPO3_MODE == 'BE') {
//	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['Tx_MaritDam_Utility_Extension'] = t3lib_extMgm::extPath($_EXTKEY).'Classes/Utility/Extension.php';
}

t3lib_div::loadTCA("tx_dam");
$GLOBALS['TCA']['tx_dam']['columns']['sys_language_uid']['config']['default'] = -1;

$GLOBALS['TCA']['tx_dam']['columns']['language']['label'] = 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_dam_item.language';
$GLOBALS['TCA']['tx_dam']['columns']['language']['config']['size'] = 10;
$GLOBALS['TCA']['tx_dam']['columns']['language']['config']['maxitems'] = 999;
$GLOBALS['TCA']['tx_dam']['columns']['language']['config']['minitems'] = 0;
$GLOBALS['TCA']['tx_dam']['columns']['language']['config']['MM'] = 'tx_dam_mm_language';
$GLOBALS['TCA']['tx_dam']['columns']['language']['config']['foreign_table'] = 'static_languages';
$GLOBALS['TCA']['tx_dam']['columns']['language']['config']['foreign_table_where'] = ' ORDER BY static_languages.lg_name_en ';
unset($GLOBALS['TCA']['tx_dam']['columns']['language']['config']['items']);
unset($GLOBALS['TCA']['tx_dam']['columns']['language']['config']['itemsProcFunc']);
unset($GLOBALS['TCA']['tx_dam']['columns']['language']['config']['itemsProcFunc_config']);
t3lib_extMgm::addToAllTCAtypes("tx_dam","language", '', 'after:description');

$GLOBALS['TCA']['tx_dam']['columns']['category']['config']['foreign_class'] = 'Tx_MaritDam_Domain_Model_Category';

$GLOBALS['TCA']['tx_dam']['columns']['file_usage']['config']['MM'] = 'tx_dam_mm_ref';
$GLOBALS['TCA']['tx_dam']['columns']['file_usage']['config']['foreign_table'] = 'tt_content';
?>
