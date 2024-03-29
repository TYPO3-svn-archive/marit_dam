<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Markus Kleinhenz <typo3-extension@marit.ag>, Marit AG
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Extension
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MaritDam_Utility_Extension {

	/**
	 * Processing the wizard items array
	 *
	 * @param	array		$wizardItems: The wizard items
	 * @return	Modified array with wizard items
	 */
	function proc($wizardItems) {
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_maritdam_pi1'] = array(
				'icon'=>t3lib_extMgm::extRelPath('marit_dam').'/Resources/Public/Icons/ce_wiz.gif',
				'title'=>$LANG->getLLL('tx_maritdam.pi1_title',$LL),
				'description'=>$LANG->getLLL('tx_maritdam.pi1_plus_wiz_description',$LL),
				'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=maritdam_pi1'
		);

		return $wizardItems;
	}

	/**
	 * Reads the [extDir]/locallang.xml and returns the $LOCAL_LANG array found in that file.
	 *
	 * @return	The array with language labels
	 */
	function includeLocalLang() {
		$llFile = t3lib_extMgm::extPath('marit_dam').'/Resources/Private/Language/locallang_db.xml';
		$LOCAL_LANG = t3lib_div::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);

		return $LOCAL_LANG;
	}
}