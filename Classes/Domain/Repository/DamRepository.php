<?php

/* * *************************************************************
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
 * ************************************************************* */

/**
 * A repository for Dam
 */
class Tx_MaritDam_Domain_Repository_DamRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * orderBy
	 * @var string
	 */
	protected $orderBy;
	/**
	 * limit
	 * @var integer
	 */
	protected $limit;
	/**
	 * offset
	 * @var integer
	 */
	protected $offset;
	/**
	 * imageFileTypes
	 * @var string
	 */
	protected $imageFileTypes;
	/**
	 * imageFileTypes
	 * @var array
	 */
	protected $filter;
	
	/**
	 * queryObject
	 * @var object
	 */
	protected $query;

	/**
	 *
	 * @param string $source
	 * @param array $settings
	 * @param integer $uid
	 * @param boolean $countAll
	 * @return object The matching object if found, otherwise NULL
	 */
	public function findBySource($source, $settings, $uid, $countAll=FALSE) {

		//set sorting
		$this->setOrderBy($settings['sorting']);

		$this->setOrder($settings['order']);

		$this->setFilter($settings['filter']);
		
		$this->query = $this->createQuery();
		$this->query->getQuerySettings()->setRespectSysLanguage(FALSE);

		switch ($source) {
			case 'asset':
				// assign DAM assets
				$queries = $this->findByContentId($uid);
				break;
			case 'category':
				//explode uids
				$uids = t3lib_div::intExplode(',', $settings['category']['data']);
				//set OrderBy from settings
				$queries = $this->findByCategory($uids);
				break;
			case 'path':
				//set OrderBy from settings
				$queries = $this->findByPath($settings['path']['data'],
								($settings['path']['includeSubpaths']) ? TRUE : FALSE);
				break;
			case 'selection':
				//set OrderBy from settings
				$queries = $this->findBySelection($settings['selection']['data']);
				break;
			default:
				break;
		}
		if($queries){
			$dam = $this->executeQueries($queries, $countAll);
		}
		return $dam;
	}

	/**
	 *
	 * @param string $source
	 * @param array $settings
	 * @param integer $uid
	 * @return object The matching object if found, otherwise NULL
	 */
	public function countBySource($source, $settings, $uid) {
		return $this->findBySource($source, $settings, $uid, TRUE);
	}
	
	public function executeQueries($queries, $countAll=FALSE){		
		if (is_array($this->filter)) {
			$queries = $this->searchFilter($queries);
		}
		
		if($countAll){
			return $this->query->matching($queries)->count();
		}	
		
		if ($this->getLimit()) {
			$this->query->setLimit($this->getLimit());
			if ($this->getOffset()) {
				$this->query->setOffset($this->getOffset());
			}
		}

		if ($this->getOrderBy()) {
			$this->query->setOrderings(array($this->getOrderBy() => $this->getOrder()));
		}		
		return $this->query->matching($queries)->execute();	
	}

	/*  findByContentId
	 *
	 * @param integer $uid uid of Content Element
	 * @return object The matching object if found, otherwise NULL
	 */

	public function findByContentId($uid) {		
		
		$queries = $this->query->contains('fileUsage', $uid);
		
		return $queries;
	}

/**
	 * findByCategory
	 *
	 * @param array $uids List of category uids
	 * @return object The matching object if found, otherwise NULL
	 */
	public function findByCategory(array $uids) {
		
		foreach($uids as $uid) {
			if($queries){
				$queries = $this->query->logicalOR($queries, $this->query->contains('category', $uid));
			} else {
				$queries = $this->query->contains('category', $uid);
			}
		}
		
		return $queries;
	}

	/**
	 * findByPath
	 *
	 * @param string  $path Path of dam Items
	 * @return object The matching object if found, otherwise NULL
	 */
	public function findByPath($path, $includeSubpath=FALSE) {
		if ($includeSubpath) {
			$queries = $this->query->like('file_path', $path . '%');
		} else {
			$queries = $this->query->equals('file_path', $path);
		}
		
		return $queries;
	}
	
	/**
	 * findBySelection
	 *
	 * @param int $selection uid of a DAM selection (table tx_dam_selection)
	 * @return object The matching object if found, otherwise NULL
	 */
	public function findBySelection($selection) {
		$selectionRepository = t3lib_div::makeInstance('Tx_MaritDam_Domain_Repository_SelectionRepository');
		$selectionObject = $selectionRepository->findByUid($selection);
		if(is_object($selectionObject)){
//var_dump($selectionObject->getDefinition());
			$selectionSerialized = $selectionObject->getDefinition();
			if($selectionSerialized!=''){
				if($selectionArr = unserialize($selectionSerialized)){
					foreach($selectionArr as $operator => $items) {
						if(is_array($items) AND count($items)){
							foreach($items as $field => $valueArray) {
								$values = array_keys($valueArray);
								foreach($values as $value){
//var_dump($operator, $value, $field);
									if($value){								
										$statement = $this->getDamStatement($field, $value);
										if($statement) {
											switch($operator) {
												case 'NOT':
													$queriesNot[] = $statement;
												break;
												case 'AND':										
													if($queriesAnd){
														$queriesAnd = $this->query->logicalAnd($queriesAnd, $statement);
													} else {
														$queriesAnd = $statement;
													} 
												break;
												default:										
													if($queriesOr){
														$queriesOr = $this->query->logicalOr($queriesOr, $statement);
													} else {
														$queriesOr = $statement;
														//$this->query->equals($field, $value[0]);
													} 
												break;
											}	
										}				
									}
								}
							}
						}
					}
					if($queriesAnd){
						$queries = $queriesAnd;
					}
					if($queriesOr){
						if($queries){
							$queries = $this->query->logicalAnd($queries, $queriesOr);
						} else {
							$queries = $queriesOr;
						}
					}	
					if($queriesNot){
						foreach($queriesNot as $queryNot){
							if($queries){
								$queries = $this->query->logicalAND($queries, $this->query->logicalNot($queryNot));
							} else {
								$queries = $this->query->logicalNot($queryNot);
							}					
						}
					}
					
					return $queries;	
				} else {
					throw new Tx_Extbase_Persistence_Exception('Marit AG: Error in selection definition!', 1287590835);
				}			
			} else {
				throw new Tx_Extbase_Persistence_Exception('Marit AG: No selection definition found!', 1287590835);
			}	
	  } else {
			throw new Tx_Extbase_Persistence_Exception('Marit AG: No Selection found!', 1287590835);
		}	
	}
	
	function getDamStatement($field, $value) {
		switch($field) {
			case 'txdamCat':
				//Because of a strange bug in DAM (http://bit.ly/a2aN3f) we can't use categories in selections
				/*$files = $this->findByCategory(array($value));
				for($i=0; $i<count($files); $i++){
					$fileUids[] = $files[$i]->getUid();
				}
				$statement = $this->query->in('uid', $fileUids);*/
				throw new Tx_Extbase_Persistence_Exception('Marit AG: Because of a strange bug in DAM (http://bit.ly/a2aN3f) we can\'t use categories in selections!', 1287590835);
				break;
			case 'txdamFolder':
				$statement = $this->query->like('file_path', tx_dam::path_makeRelative($value).'%');
				break;
			case 'txdamMedia':
				if (t3lib_div::testInt($value)) {
					$statement = $this->query->equals('media_type', $value);
				} else {
					$statement = $this->query->equals('file_type', $value);
				}
				break;
			case 'txdamRecords':
				$statement = $this->query->equals('uid', $value);
				break;
		}
		return $statement;
	}
	
	function searchFilter($queries=false){
		foreach ($this->filter as $field => $value) {
			if ($value) {
				if($field == 'language'){
					$uids = explode(',', $value);
					foreach($uids as $uid) {
						if($queriesLang){
							$queriesLang = $this->query->logicalOR($queriesLang, $this->query->contains('language', $uid));
						} else {
							$queriesLang = $this->query->contains('language', $uid);
						}
					}
					if($queriesLang){
						$allUid = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid', 'static_languages', 'lg_name_en LIKE "--All--"');
						if($queries){
							$queries = $this->query->logicalAND($queries,  $this->query->logicalOR($queriesLang,  $this->query->contains('language', $allUid[0]['uid'])));
						} else {
							$queries =  $this->query->logicalOR($queriesLang,  $this->query->contains('language', $allUid[0]['uid']));
						}
					}
				} else {
					if($queries){
						$queries = $this->query->logicalAND($queries,  $this->query->equals($field, $value));
					} else {
						$queries =  $this->query->equals($field, $value);
					}
				}
				
			}
		}
		return $queries;
	}

	/**
	 * Setter for orderBy
	 *
	 * @param string $orderBy orderBy
	 * @return void
	 */
	public function setOrderBy($orderBy) {
		$this->orderBy = $orderBy;
	}

	/**
	 * Getter for orderBy
	 *
	 * @return string $orderBy orderBy
	 */
	public function getOrderBy() {
		return $this->orderBy;
	}

	/**
	 * Setter for order
	 *
	 * @param string $order order
	 * @return void
	 */
	public function setOrder($order) {
		if ($order == 'DESC') {
			$this->order = Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING;
		} else {
			$this->order = Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING;
		}
	}

	/**
	 * Getter for order
	 *
	 * @return string $order order
	 */
	public function getOrder() {
		return $this->order;
	}

	/**
	 * Setter for limit
	 *
	 * @param integer $limit limit
	 * @return void
	 */
	public function setLimit($limit) {
		$this->limit = intval($limit);
	}

	/**
	 * Getter for limit
	 *
	 * @return integer $limit limit
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * Setter for offset
	 *
	 * @param integer$offset offset
	 * @return void
	 */
	public function setOffset($offset) {
		$this->offset = intval($offset);
	}

	/**
	 * Getter for offset
	 *
	 * @return integer $offset offset
	 */
	public function getOffset() {
		return $this->offset;
	}

	/**
	 * Setter for Filter
	 *
	 * @param array $filter
	 */
	public function setFilter($filter) {
		$this->filter = $filter;
	}

	/**
	 * Getter for Filter
	 *
	 * @return array $filter
	 */
	public function getFilter() {
		return $this->filter;
	}

}

?>