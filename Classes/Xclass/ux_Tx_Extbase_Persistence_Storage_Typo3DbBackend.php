<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ux_Tx_Extbase_Persistence_Storage_Typo3DbBackend extends Tx_Extbase_Persistence_Storage_Typo3DbBackend{

/*
	public function __construct($databaseHandle) {
		t3lib_div::debug('test xclass');
		parent::__construct($databaseHandle);
	}
*/

	/**
	 * Builds the language field statement
	 *
	 * @param string $tableName The database table name
	 * @param array &$sql The query parts
	 * @return void
	 */
	protected function addSysLanguageStatement($tableName, array &$sql) {
		if (is_array($GLOBALS['TCA'][$tableName]['ctrl'])) {
			if(isset($GLOBALS['TCA'][$tableName]['ctrl']['languageField']) && $GLOBALS['TCA'][$tableName]['ctrl']['languageField'] !== NULL) {
				$sql['additionalWhereClause'][] = $tableName . '.' . $GLOBALS['TCA'][$tableName]['ctrl']['languageField'] . ' IN (0,-1)';
				
				/*/$sql['additionalWhereClause'][] .= ' OR ('.$tableName . '.' . $GLOBALS['TCA'][$tableName]['ctrl']['languageField'] . ' = '.$GLOBALS['TSFE']->sys_language_uid.
						' AND  '.$tableName . '.' . $GLOBALS['TCA'][$tableName]['ctrl']['transOrigPointerField'] . ' = "")';
				 *
				 */
			}
		}
	}
}
?>
