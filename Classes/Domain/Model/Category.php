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
 * Category
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_MaritDam_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * title
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;
	
	/**
	 * navTitle
	 * @var string
	 * @validate NotEmpty
	 */
	protected $navTitle;
	
	/**
	 * subtitle
	 * @var string
	 * @validate NotEmpty
	 */
	protected $subtitle;
	
	/**
	 * keywords
	 * @var string
	 * @validate NotEmpty
	 */
	protected $keywords;
	
	/**
	 * description
	 * @var string
	 * @validate NotEmpty
	 */
	protected $description;
	
	/**
	 * parentId
	 * @lazy
	 * @var Tx_MaritDam_Domain_Model_Category
	 */
	protected $parentId;
	
	/**
	 * assets
	 * @lazy
	 * @var Tx_MaritDam_Domain_Model_Dam
	 */
	protected $assets;

	/**
	 * subCategories
	 * @lazy
	 * @var Tx_MaritDam_Domain_Model_Category
	 */
	protected $subCategories;

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		
	}
	
	/**
	 * Getter for title
	 *
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Setter for title
	 *
	 * @param string $title title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * Getter for navTitle
	 *
	 * @return string navTitle
	 */
	public function getNavTitle() {
		return $this->navTitle;
	}

	/**
	 * Setter for navTitle
	 *
	 * @param string $navTitle navTitle
	 * @return void
	 */
	public function setNavTitle($navTitle) {
		$this->navTitle = $navTitle;
	}
	
	/**
	 * Getter for subtitle
	 *
	 * @return string subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Setter for subtitle
	 *
	 * @param string $subtitle subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}
	
	/**
	 * Getter for keywords
	 *
	 * @return string keywords
	 */
	public function getKeywords() {
		return $this->keywords;
	}

	/**
	 * Setter for keywords
	 *
	 * @param string $keywords keywords
	 * @return void
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}
	
	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 * Getter for parentId
	 *
	 * @return Tx_MaritDam_Domain_Model_Category parentId
	 */
	public function getParentId() {
		return $this->parentId;
	}

	/**
	 * Setter for parentId
	 *
	 * @param Tx_MaritDam_Domain_Model_Category $parentId parentId
	 * @return void
	 */
	public function setParentId(Tx_MaritDam_Domain_Model_Category $parentId) {
		$this->parentId = $parentId;
	}

	/**
	 * Getter for assets
	 * 
	 * @return Tx_MaritDam_Domain_Model_Dam assets
	 */
	public function getAssets() {
		$damRepository = t3lib_div::makeInstance('Tx_MaritDam_Domain_Repository_DamRepository');
		return $damRepository->findByCategory(array($this->getUid()));
		//return $this->assets;
	}

	/**
	 * Setter for assets
	 *
	 * @param Tx_MaritDam_Domain_Model_Dam $assets assets
	 * @return void
	 */
	public function setAssets(Tx_MaritDam_Domain_Model_Dam $assets) {
		$this->assets = $assets;
	}

	/**
	 * Getter for subCategories
	 *
	 * @return Tx_MaritDam_Domain_Model_Category subCategories
	 */
	public function getSubCategories() {
		$categoryRepository = t3lib_div::makeInstance('Tx_MaritDam_Domain_Repository_CategoryRepository');
		return $categoryRepository->findBySubCategories($this->getUid());
		//return $this->subCategories;
	}

	/**
	 * Setter for subCategories
	 *
	 * @param
	 * @return Tx_MaritDam_Domain_Model_Category $subCategories subCategories
	 * @return void
	 */
	public function setSubCategories(Tx_MaritDam_Domain_Model_CAtegory $subCategories) {
		$this->subCategories = $subCategories;
	}
}
?>