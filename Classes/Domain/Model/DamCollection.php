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
 * Dam
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_MaritDam_Domain_Model_DamCollection extends Tx_MaritDam_Domain_Model_Dam {
	
	/**
	 * mediaType
	 * @var string
	 * @validate NotEmpty
	 */
	protected $mediaType;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		
	}
	
	/**
	 * Getter for mediaType
	 *
	 * @return string mediaType
	 */
	public function getMediaType() {
		return $this->mediaType;
	}

	/**
	 * Setter for mediaType
	 *
	 * @param string $mediaType mediaType
	 * @return void
	 */
	public function setMediaType($mediaType = 10) {
		$this->mediaType = $mediaType;
	}
	
}
?>
