<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Markus Kleinhenz <mkl@marit.ag>
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
 * A repository for Dam
 */
class Tx_MaritDam_Domain_Repository_CategoryRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * Finds Categories matching the given uids.
	 *
	 * @param array $uids Uids od the Categories
	 * @return object object of matching Categories or NULL
	 */
	public function findByUids(array $uids) {
		$query = $this->createQuery();
		return $query->matching($query->equals('uid', $uids))->execute();
	}

	/**
	 * Finds subcategories matching the given uid.
	 *
	 * @param int $uid The identifier of the object to find
	 * @return object The matching object if found, otherwise NULL
	 */
	public function findBySubCategories($uid, $depth=0) {
		$query = $this->createQuery();
		// get Subcategories of first level
		$result = $query->matching($query->equals('parent_id', $uid))
					->execute();

		if ($depth > 0){
			// TODO:  implement feature
		}

		return $result;

	}
	
}
?>