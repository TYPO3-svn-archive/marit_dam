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


class Tx_MaritDam_Domain_Model_Dam extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * mediaType
	 * @var string
	 * @validate NotEmpty
	 */
	protected $mediaType;
	
	/**
	 * title
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;
	
	/**
	 * indexType
	 * @var string
	 * @validate NotEmpty
	 */
	protected $indexType;
	
	/**
	 * fileMimeType
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileMimeType;
	
	/**
	 * fileMimeSubtype
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileMimeSubtype;
	
	/**
	 * fileType
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileType;
	
	/**
	 * fileTypeVersion
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileTypeVersion;
	
	/**
	 * fileName
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileName;
	
	/**
	 * filePath
	 * @var string
	 * @validate NotEmpty
	 */
	protected $filePath;
	
	/**
	 * fileSize
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileSize;
	
	/**
	 * fileMtime
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileMtime;
	
	/**
	 * fileInode
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileInode;
	
	/**
	 * fileCtime
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileCtime;
	
	/**
	 * fileHash
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileHash;
	
	/**
	 * fileStatus
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileStatus;
	
	/**
	 * fileOrigLocation
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileOrigLocation;
	
	/**
	 * fileOrigLocDesc
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileOrigLocDesc;
	
	/**
	 * fileCreator
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileCreator;
	
	/**
	 * fileDlName
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileDlName;
	
	/**
	 * fileUsage
	 * @var string
	 * @validate NotEmpty
	 */
	protected $fileUsage;
	
	/**
	 * meta
	 * @var string
	 * @validate NotEmpty
	 */
	protected $meta;
	
	/**
	 * ident
	 * @var string
	 * @validate NotEmpty
	 */
	protected $ident;
	
	/**
	 * creator
	 * @var string
	 * @validate NotEmpty
	 */
	protected $creator;
	
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
	 * alt_text
	 * @var string
	 * @validate NotEmpty
	 */
	protected $alt_text;
	
	/**
	 * caption
	 * @var string
	 * @validate NotEmpty
	 */
	protected $caption;
	
	/**
	 * abstract
	 * @var string
	 * @validate NotEmpty
	 */
	protected $abstract;
	
	/**
	 * search_content
	 * @var string
	 * @validate NotEmpty
	 */
	protected $search_content;
	
	/**
	 * language
	 * @var string
	 * @validate NotEmpty
	 */
	protected $language;
	
	/**
	 * pages
	 * @var string
	 * @validate NotEmpty
	 */
	protected $pages;
	
	/**
	 * publisher
	 * @var string
	 * @validate NotEmpty
	 */
	protected $publisher;
	
	/**
	 * copyright
	 * @var string
	 * @validate NotEmpty
	 */
	protected $copyright;
	
	/**
	 * instructions
	 * @var string
	 * @validate NotEmpty
	 */
	protected $instructions;
	
	/**
	 * dateCr
	 * @var string
	 * @validate NotEmpty
	 */
	protected $dateCr;
	
	/**
	 * dateMod
	 * @var string
	 * @validate NotEmpty
	 */
	protected $dateMod;
	
	/**
	 * locDesc
	 * @var string
	 * @validate NotEmpty
	 */
	protected $locDesc;
	
	/**
	 * locCountry
	 * @var string
	 * @validate NotEmpty
	 */
	protected $locCountry;
	
	/**
	 * locCity
	 * @var string
	 * @validate NotEmpty
	 */
	protected $locCity;
	
	/**
	 * hres
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $hres;
	
	/**
	 * vres
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $vres;
	
	/**
	 * hpixels
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $hpixels;
	
	/**
	 * vpixels
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $vpixels;
	
	/**
	 * colorSpace
	 * @var string
	 * @validate NotEmpty
	 */
	protected $colorSpace;
	
	/**
	 * width
	 * @var float
	 * @validate NotEmpty
	 */
	protected $width;
	
	/**
	 * height
	 * @var float
	 * @validate NotEmpty
	 */
	protected $height;
	
	/**
	 * heightUnit
	 * @var string
	 * @validate NotEmpty
	 */
	protected $heightUnit;
	
	/**
	 * category
	 * @lazy
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_MaritDam_Domain_Model_Category>
	 */
	protected $category;
	

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
	public function setMediaType($mediaType) {
		$this->mediaType = $mediaType;
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
	 * Getter for indexType
	 *
	 * @return string indexType
	 */
	public function getIndexType() {
		return $this->indexType;
	}

	/**
	 * Setter for indexType
	 *
	 * @param string $indexType indexType
	 * @return void
	 */
	public function setIndexType($indexType) {
		$this->indexType = $indexType;
	}
	
	/**
	 * Getter for fileMimeType
	 *
	 * @return string fileMimeType
	 */
	public function getFileMimeType() {
		return $this->fileMimeType;
	}

	/**
	 * Setter for fileMimeType
	 *
	 * @param string $fileMimeType fileMimeType
	 * @return void
	 */
	public function setFileMimeType($fileMimeType) {
		$this->fileMimeType = $fileMimeType;
	}
	
	/**
	 * Getter for fileMimeSubtype
	 *
	 * @return string fileMimeSubtype
	 */
	public function getFileMimeSubtype() {
		return $this->fileMimeSubtype;
	}

	/**
	 * Setter for fileMimeSubtype
	 *
	 * @param string $fileMimeSubtype fileMimeSubtype
	 * @return void
	 */
	public function setFileMimeSubtype($fileMimeSubtype) {
		$this->fileMimeSubtype = $fileMimeSubtype;
	}
	
	/**
	 * Getter for fileType
	 *
	 * @return string fileType
	 */
	public function getFileType() {
		return $this->fileType;
	}

	/**
	 * Setter for fileType
	 *
	 * @param string $fileType fileType
	 * @return void
	 */
	public function setFileType($fileType) {
		$this->fileType = $fileType;
	}
	
	/**
	 * Getter for fileTypeVersion
	 *
	 * @return string fileTypeVersion
	 */
	public function getFileTypeVersion() {
		return $this->fileTypeVersion;
	}

	/**
	 * Setter for fileTypeVersion
	 *
	 * @param string $fileTypeVersion fileTypeVersion
	 * @return void
	 */
	public function setFileTypeVersion($fileTypeVersion) {
		$this->fileTypeVersion = $fileTypeVersion;
	}
	
	/**
	 * Getter for fileName
	 *
	 * @return string fileName
	 */
	public function getFileName() {
		return $this->fileName;
	}

	/**
	 * Setter for fileName
	 *
	 * @param string $fileName fileName
	 * @return void
	 */
	public function setFileName($fileName) {
		$this->fileName = $fileName;
	}
	
	/**
	 * Getter for filePath
	 *
	 * @return string filePath
	 */
	public function getFilePath() {
		return $this->filePath;
	}

	/**
	 * Setter for filePath
	 *
	 * @param string $filePath filePath
	 * @return void
	 */
	public function setFilePath($filePath) {
		$this->filePath = $filePath;
	}
	
	/**
	 * Getter for fileSize
	 *
	 * @return string fileSize
	 */
	public function getFileSize() {
		return $this->fileSize;
	}

	/**
	 * Setter for fileSize
	 *
	 * @param string $fileSize fileSize
	 * @return void
	 */
	public function setFileSize($fileSize) {
		$this->fileSize = $fileSize;
	}
	
	/**
	 * Getter for fileMtime
	 *
	 * @return string fileMtime
	 */
	public function getFileMtime() {
		return $this->fileMtime;
	}

	/**
	 * Setter for fileMtime
	 *
	 * @param string $fileMtime fileMtime
	 * @return void
	 */
	public function setFileMtime($fileMtime) {
		$this->fileMtime = $fileMtime;
	}
	
	/**
	 * Getter for fileInode
	 *
	 * @return string fileInode
	 */
	public function getFileInode() {
		return $this->fileInode;
	}

	/**
	 * Setter for fileInode
	 *
	 * @param string $fileInode fileInode
	 * @return void
	 */
	public function setFileInode($fileInode) {
		$this->fileInode = $fileInode;
	}
	
	/**
	 * Getter for fileCtime
	 *
	 * @return string fileCtime
	 */
	public function getFileCtime() {
		return $this->fileCtime;
	}

	/**
	 * Setter for fileCtime
	 *
	 * @param string $fileCtime fileCtime
	 * @return void
	 */
	public function setFileCtime($fileCtime) {
		$this->fileCtime = $fileCtime;
	}
	
	/**
	 * Getter for fileHash
	 *
	 * @return string fileHash
	 */
	public function getFileHash() {
		return $this->fileHash;
	}

	/**
	 * Setter for fileHash
	 *
	 * @param string $fileHash fileHash
	 * @return void
	 */
	public function setFileHash($fileHash) {
		$this->fileHash = $fileHash;
	}
	
	/**
	 * Getter for fileStatus
	 *
	 * @return string fileStatus
	 */
	public function getFileStatus() {
		return $this->fileStatus;
	}

	/**
	 * Setter for fileStatus
	 *
	 * @param string $fileStatus fileStatus
	 * @return void
	 */
	public function setFileStatus($fileStatus) {
		$this->fileStatus = $fileStatus;
	}
	
	/**
	 * Getter for fileOrigLocation
	 *
	 * @return string fileOrigLocation
	 */
	public function getFileOrigLocation() {
		return $this->fileOrigLocation;
	}

	/**
	 * Setter for fileOrigLocation
	 *
	 * @param string $fileOrigLocation fileOrigLocation
	 * @return void
	 */
	public function setFileOrigLocation($fileOrigLocation) {
		$this->fileOrigLocation = $fileOrigLocation;
	}
	
	/**
	 * Getter for fileOrigLocDesc
	 *
	 * @return string fileOrigLocDesc
	 */
	public function getFileOrigLocDesc() {
		return $this->fileOrigLocDesc;
	}

	/**
	 * Setter for fileOrigLocDesc
	 *
	 * @param string $fileOrigLocDesc fileOrigLocDesc
	 * @return void
	 */
	public function setFileOrigLocDesc($fileOrigLocDesc) {
		$this->fileOrigLocDesc = $fileOrigLocDesc;
	}
	
	/**
	 * Getter for fileCreator
	 *
	 * @return string fileCreator
	 */
	public function getFileCreator() {
		return $this->fileCreator;
	}

	/**
	 * Setter for fileCreator
	 *
	 * @param string $fileCreator fileCreator
	 * @return void
	 */
	public function setFileCreator($fileCreator) {
		$this->fileCreator = $fileCreator;
	}
	
	/**
	 * Getter for fileDlName
	 *
	 * @return string fileDlName
	 */
	public function getFileDlName() {
		return $this->fileDlName;
	}

	/**
	 * Setter for fileDlName
	 *
	 * @param string $fileDlName fileDlName
	 * @return void
	 */
	public function setFileDlName($fileDlName) {
		$this->fileDlName = $fileDlName;
	}
	
	/**
	 * Getter for fileUsage
	 *
	 * @return string fileUsage
	 */
	public function getFileUsage() {
		return $this->fileUsage;
	}

	/**
	 * Setter for fileUsage
	 *
	 * @param string $fileUsage fileUsage
	 * @return void
	 */
	public function setFileUsage($fileUsage) {
		$this->fileUsage = $fileUsage;
	}
	
	/**
	 * Getter for meta
	 *
	 * @return string meta
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * Setter for meta
	 *
	 * @param string $meta meta
	 * @return void
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}
	
	/**
	 * Getter for ident
	 *
	 * @return string ident
	 */
	public function getIdent() {
		return $this->ident;
	}

	/**
	 * Setter for ident
	 *
	 * @param string $ident ident
	 * @return void
	 */
	public function setIdent($ident) {
		$this->ident = $ident;
	}
	
	/**
	 * Getter for creator
	 *
	 * @return string creator
	 */
	public function getCreator() {
		return $this->creator;
	}

	/**
	 * Setter for creator
	 *
	 * @param string $creator creator
	 * @return void
	 */
	public function setCreator($creator) {
		$this->creator = $creator;
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
	 * Getter for alt_text
	 *
	 * @return string alt_text
	 */
	public function getAlt_text() {
		return $this->alt_text;
	}

	/**
	 * Setter for alt_text
	 *
	 * @param string $alt_text alt_text
	 * @return void
	 */
	public function setAlt_text($alt_text) {
		$this->alt_text = $alt_text;
	}
	
	/**
	 * Getter for caption
	 *
	 * @return string caption
	 */
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Setter for caption
	 *
	 * @param string $caption caption
	 * @return void
	 */
	public function setCaption($caption) {
		$this->caption = $caption;
	}
	
	/**
	 * Getter for abstract
	 *
	 * @return string abstract
	 */
	public function getAbstract() {
		return $this->abstract;
	}

	/**
	 * Setter for abstract
	 *
	 * @param string $abstract abstract
	 * @return void
	 */
	public function setAbstract($abstract) {
		$this->abstract = $abstract;
	}
	
	/**
	 * Getter for search_content
	 *
	 * @return string search_content
	 */
	public function getSearch_content() {
		return $this->search_content;
	}

	/**
	 * Setter for search_content
	 *
	 * @param string $search_content search_content
	 * @return void
	 */
	public function setSearch_content($search_content) {
		$this->search_content = $search_content;
	}
	
	/**
	 * Getter for language
	 *
	 * @return string language
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * Setter for language
	 *
	 * @param string $language language
	 * @return void
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}
	
	/**
	 * Getter for pages
	 *
	 * @return string pages
	 */
	public function getPages() {
		return $this->pages;
	}

	/**
	 * Setter for pages
	 *
	 * @param string $pages pages
	 * @return void
	 */
	public function setPages($pages) {
		$this->pages = $pages;
	}
	
	/**
	 * Getter for publisher
	 *
	 * @return string publisher
	 */
	public function getPublisher() {
		return $this->publisher;
	}

	/**
	 * Setter for publisher
	 *
	 * @param string $publisher publisher
	 * @return void
	 */
	public function setPublisher($publisher) {
		$this->publisher = $publisher;
	}
	
	/**
	 * Getter for copyright
	 *
	 * @return string copyright
	 */
	public function getCopyright() {
		return $this->copyright;
	}

	/**
	 * Setter for copyright
	 *
	 * @param string $copyright copyright
	 * @return void
	 */
	public function setCopyright($copyright) {
		$this->copyright = $copyright;
	}
	
	/**
	 * Getter for instructions
	 *
	 * @return string instructions
	 */
	public function getInstructions() {
		return $this->instructions;
	}

	/**
	 * Setter for instructions
	 *
	 * @param string $instructions instructions
	 * @return void
	 */
	public function setInstructions($instructions) {
		$this->instructions = $instructions;
	}
	
	/**
	 * Getter for dateCr
	 *
	 * @return string dateCr
	 */
	public function getDateCr() {
		return $this->dateCr;
	}

	/**
	 * Setter for dateCr
	 *
	 * @param string $dateCr dateCr
	 * @return void
	 */
	public function setDateCr($dateCr) {
		$this->dateCr = $dateCr;
	}
	
	/**
	 * Getter for dateMod
	 *
	 * @return string dateMod
	 */
	public function getDateMod() {
		return $this->dateMod;
	}

	/**
	 * Setter for dateMod
	 *
	 * @param string $dateMod dateMod
	 * @return void
	 */
	public function setDateMod($dateMod) {
		$this->dateMod = $dateMod;
	}
	
	/**
	 * Getter for locDesc
	 *
	 * @return string locDesc
	 */
	public function getLocDesc() {
		return $this->locDesc;
	}

	/**
	 * Setter for locDesc
	 *
	 * @param string $locDesc locDesc
	 * @return void
	 */
	public function setLocDesc($locDesc) {
		$this->locDesc = $locDesc;
	}
	
	/**
	 * Getter for locCountry
	 *
	 * @return string locCountry
	 */
	public function getLocCountry() {
		return $this->locCountry;
	}

	/**
	 * Setter for locCountry
	 *
	 * @param string $locCountry locCountry
	 * @return void
	 */
	public function setLocCountry($locCountry) {
		$this->locCountry = $locCountry;
	}
	
	/**
	 * Getter for locCity
	 *
	 * @return string locCity
	 */
	public function getLocCity() {
		return $this->locCity;
	}

	/**
	 * Setter for locCity
	 *
	 * @param string $locCity locCity
	 * @return void
	 */
	public function setLocCity($locCity) {
		$this->locCity = $locCity;
	}
	
	/**
	 * Getter for hres
	 *
	 * @return integer hres
	 */
	public function getHres() {
		return $this->hres;
	}

	/**
	 * Setter for hres
	 *
	 * @param integer $hres hres
	 * @return void
	 */
	public function setHres($hres) {
		$this->hres = $hres;
	}
	
	/**
	 * Getter for vres
	 *
	 * @return integer vres
	 */
	public function getVres() {
		return $this->vres;
	}

	/**
	 * Setter for vres
	 *
	 * @param integer $vres vres
	 * @return void
	 */
	public function setVres($vres) {
		$this->vres = $vres;
	}
	
	/**
	 * Getter for hpixels
	 *
	 * @return integer hpixels
	 */
	public function getHpixels() {
		return $this->hpixels;
	}

	/**
	 * Setter for hpixels
	 *
	 * @param integer $hpixels hpixels
	 * @return void
	 */
	public function setHpixels($hpixels) {
		$this->hpixels = $hpixels;
	}
	
	/**
	 * Getter for vpixels
	 *
	 * @return integer vpixels
	 */
	public function getVpixels() {
		return $this->vpixels;
	}

	/**
	 * Setter for vpixels
	 *
	 * @param integer $vpixels vpixels
	 * @return void
	 */
	public function setVpixels($vpixels) {
		$this->vpixels = $vpixels;
	}
	
	/**
	 * Getter for colorSpace
	 *
	 * @return string colorSpace
	 */
	public function getColorSpace() {
		return $this->colorSpace;
	}

	/**
	 * Setter for colorSpace
	 *
	 * @param string $colorSpace colorSpace
	 * @return void
	 */
	public function setColorSpace($colorSpace) {
		$this->colorSpace = $colorSpace;
	}
	
	/**
	 * Getter for width
	 *
	 * @return float width
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Setter for width
	 *
	 * @param float $width width
	 * @return void
	 */
	public function setWidth($width) {
		$this->width = $width;
	}
	
	/**
	 * Getter for height
	 *
	 * @return float height
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Setter for height
	 *
	 * @param float $height height
	 * @return void
	 */
	public function setHeight($height) {
		$this->height = $height;
	}
	
	/**
	 * Getter for heightUnit
	 *
	 * @return string heightUnit
	 */
	public function getHeightUnit() {
		return $this->heightUnit;
	}

	/**
	 * Setter for heightUnit
	 *
	 * @param string $heightUnit heightUnit
	 * @return void
	 */
	public function setHeightUnit($heightUnit) {
		$this->heightUnit = $heightUnit;
	}
	
	/**
	 * Getter for category
	 * 
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_MaritDam_Domain_Model_Category> category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Setter for category
	 * 
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritDam_Domain_Model_Category> $category category
	 * @return void
	 */
	public function setCategory(Tx_Extbase_Persistence_ObjectStorage $category) {
		$this->category = $category;
	}
	
}
?>