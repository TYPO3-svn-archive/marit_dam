<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
/**
 * Configure the Plugin to call the
 * right combination of Controller and Action according to
 * the user input (default settings, FlexForm, URL etc.)
 */
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,																		// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1',																			// A unique name of the plugin in UpperCamelCase
	array(																			// An array holding the controller-action-combinations that are accessible
		'Dam' => 'list,gallery',									// The first controller and its first action will be the default
	),
	array(																			// An array holding the controller-action-combinations that are accessible
		'Dam' => 'list,gallery',									// The first controller and its first action will be the default
	)	

);

//added for XClass
//$extensionClassesPath = t3lib_extMgm::extPath('marit_dam') . 'Classes/';
//require_once($extensionClassesPath . 'Xclass/ux_Tx_Extbase_Persistence_Storage_Typo3DbBackend.php');
?>