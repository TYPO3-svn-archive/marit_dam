<?php

/* * *************************************************************
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
 * ************************************************************* */

/**
 * Controller for the Dam object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MaritDam_Controller_DamController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var TX_MaritDam_Domain_Model_DamRepository
	 */
	protected $damRepository;
	/**
	 * @var TX_MaritDam_Domain_Model_CategoryRepository
	 */
	protected $categoryRepository;
	/**
	 * @var array
	 */
	protected $fileTypes;
	/**
	 * @var integer
	 */
	protected $contentUid;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->damRepository = t3lib_div::makeInstance('Tx_MaritDam_Domain_Repository_DamRepository');
		$this->categoryRepository = t3lib_div::makeInstance('Tx_MaritDam_Domain_Repository_CategoryRepository');

		// set Limit
		$this->damRepository->setLimit($this->settings['maxItems']);

		//set default partial
		if (empty($this->settings['source'])) {
			$this->settings['source'] = 'asset';
		}


		//File Extensions
		$this->fileTypes['all'] = array();
		foreach ($this->settings['fileTypes'] as $key => $fileType) {
			if (!empty($fileType)) {
				$this->fileTypes[$key] = t3lib_div::trimExplode(',', $fileType);
				$this->fileTypes['all'] = array_merge($this->fileTypes['all'], $this->fileTypes[$key]);
			}
		}

		//get content object
		$data = $this->request->getContentObjectData();
		$this->contentUid = $data['uid'];
		if ($data['_LOCALIZED_UID']) {
			$this->contentUid = $data['_LOCALIZED_UID'];
		}

		// check if a Workspace element is available
		if ($data['_ORIG_uid']) {
			$this->contentUid = $data['_ORIG_uid'];
		}


	}

	/**
	 * index action
	 *
	 * @return string The rendered index action
	 */
	public function indexAction() {

	}

	/**
	 * list action
	 * @param integer current Page
	 * @return string The rendered list action
	 */
	public function listAction($currentPage=0) {

		if ($this->settings['pageBrowser']['show']) {
			if($this->settings['pageBrowser']['useExtbasePager']==1 && $currentPage>0){
				$currentPage = $currentPage-1;
			}
						
			//set Offset
			$offset = intval($currentPage) * $this->settings['maxItems'];
			$this->damRepository->setOffset($offset);
			
			$numberItems = 	$this->damRepository->countBySource($this->settings['source'],
							$this->settings,
							$this->contentUid);
			
			if($this->settings['pageBrowser']['useExtbasePager']==1){
				$currentPage = $currentPage+1;
				$this->settings['pageBrowser']['currentPage'] = $currentPage;
				$page = intval($currentPage);
				$itemsPerPage = intval($this->settings['maxItems']);				
				if ($page < 1) {
					$page = 1;
				}
				if ($itemsPerPage < 1) {
					$itemsPerPage = 1;
				}				
				// count must be done before limit/offset!
				$count = $numberItems;				
				$pageCount = intval(ceil($count / $itemsPerPage));				
				if ($page > $pageCount) {
					$page = $pageCount;
				}
				$this->settings['pageBrowser']['pageCount'] = $pageCount;
				$this->view->assign('settings', $this->settings);
			} else {		
				$this->view->assign('numberItems', $numberItems);
			}
		}

		$this->view->assign('Dam',
				$this->damRepository->findBySource($this->settings['source'],
						$this->settings,
						$this->contentUid));
		// assign file Types
		$this->view->assign('fileTypes', $this->fileTypes);
	}

	/**
	 * path action
	 * @param integer current Page
	 * @return string The rendered index action
	 */
	public function galleryAction($currentPage=0) {
		if ($this->settings['pageBrowser']['show']) {
			//set Offset
			$offset = intval($currentPage) * $this->settings['maxItems'];
			$this->damRepository->setOffset($offset);

			$this->view->assign('NumberItems',
					$this->damRepository->countBySource($this->settings['source'],
							$this->settings,
							$this->contentUid));
		}

		$this->view->assign('Dam',
				$this->damRepository->findBySource($this->settings['source'],
						$this->settings,
						$this->contentUid));

		// assign file Types
		$this->view->assign('fileTypes', $this->fileTypes);
	}

}

?>
