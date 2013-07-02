<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature, Mainz
*  
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
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
 * The sources for the works in the catalogue
 */
class Tx_Catalogueraisonne_Domain_Model_Sources extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Unique identifier of the source
	 *
	 * @var string $signature
	 * @validate NotEmpty
	 */
	protected $signature;

	/**
	 * musical source or text
	 *
	 * @var string $category
	 * @validate NotEmpty
	 */
	protected $category;

	/**
	 * quellentyp: the type of the source - handschriften oder drucke
	 *
	 * @var string $type
	 * @validate NotEmpty
	 */
	protected $type;

	/**
	 * subtypus: autograph, autograph und abschrift, abschrift
	 *
	 * @var string $subtype
	 * @validate NotEmpty
	 */
	protected $subtype;

	/**
	 * überlieferungsform, partitur, stimmen, klavierauszug
	 *
	 * @var string $kind
	 * @validate NotEmpty
	 */
	protected $kind;

	/**
	 * original, parodie, bearbeitung
	 *
	 * @var string $quality
	 */
	protected $quality;

	/**
	 * Anything regarding the umfang, etc.
	 *
	 * @var string $description
	 */
	protected $description;

	/**
	 * References to external sources or digital representations
	 *
	 * @var string $externalReferences
	 */
	protected $externalReferences;

	/**
	 * Date information for the source
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_DateRanges $dateRange
	 */
	protected $dateRange;

	/**
	 * The institution where this source is kept
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_Archives $archive
	 * @lazy
	 */
	protected $archive;

	/**
	 * Other archives where a copy of the source is kept
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Archives> $otherArchives
	 * @lazy
	 */
	protected $otherArchives;

	/**
	 * Persons related to the source in a specific function
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations> $relatedPersons
	 * @lazy
	 */
	protected $relatedPersons;

	/**
	 * Works related to the source
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Works> $relatedWorks
	 * @lazy
	 */
	protected $relatedWorks;

	/**
	 * Parts related to the source
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $relatedParts
	 * @lazy
	 */
	protected $relatedParts;

	/**
	 * Work or part to which the source is bound
	 *
	 * @var int
	 */
	protected $boundTo;

	/**
	 * Title of the part to which the source is bound
	 *
	 * @var string
	 */
	protected $partTitle;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
			// Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the kickstarter
		 * You may modify the constructor of this class instead
		 */
		$this->relatedPersons = new Tx_Extbase_Persistence_ObjectStorage();
		$this->otherArchives = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the signature
	 *
	 * @return string
	 */
	public function getSignature() {
		return $this->signature;
	}

	/**
	 * Sets the signature
	 *
	 * @param string $signature
	 * @return void
	 */
	public function setSignature($signature) {
		$this->signature = $signature;
	}

	/**
	 * Returns the type
	 *
	 * @return string $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Returns the category
	 *
	 * @return string $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param string $category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * Returns the subtype
	 *
	 * @return string $subtype
	 */
	public function getSubtype() {
		return $this->subtype;
	}

	/**
	 * Sets the subtype
	 *
	 * @param string $subtype
	 * @return void
	 */
	public function setSubtype($subtype) {
		$this->subtype = $subtype;
	}

	/**
	 * Returns the kind
	 *
	 * @return string $kind
	 */
	public function getKind() {
		return $this->kind;
	}

	/**
	 * Sets the kind
	 *
	 * @param string $kind
	 * @return void
	 */
	public function setKind($kind) {
		$this->kind = $kind;
	}

	/**
	 * Returns the quality
	 *
	 * @return string $quality
	 */
	public function getQuality() {
		return $this->quality;
	}

	/**
	 * Sets the quality
	 *
	 * @param string $quality
	 * @return void
	 */
	public function setQuality($quality) {
		$this->quality = $quality;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the dateRange
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_DateRanges $dateRange
	 */
	public function getDateRange() {
		return $this->dateRange;
	}

	/**
	 * Sets the dateRange
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_DateRanges $dateRange
	 * @return void
	 */
	public function setDateRange($dateRange) {
		$this->dateRange = $dateRange;
	}

	/**
	 * Returns the archive
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_Archives $archive
	 */
	public function getArchive() {
		return $this->archive;
	}

	/**
	 * Sets the archive
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Archives $archive
	 * @return void
	 */
	public function setArchive($archive) {
		$this->archive = $archive;
	}

	/**
	 * Returns otherArchives
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Archives> $otherArchives
	 */
	public function getOtherArchives() {
		return $this->otherArchives;
	}

	/**
	 * Sets otherArchives
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Archives> $otherArchives
	 * @return void
	 */
	public function setOtherArchives($otherArchives) {
		$this->otherArchives = $otherArchives;
	}

	/**
	 * Returns the relatedPersons
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations> $relatedPersons
	 */
	public function getRelatedPersons() {
		return $this->relatedPersons;
	}

	/**
	 * Sets the relatedPersons
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations> $relatedPersons
	 * @return void
	 */
	public function setRelatedPersons($relatedPersons) {
		$this->relatedPersons = $relatedPersons;
	}

	/**
	 * Returns the externalReferences
	 *
	 * @return string $externalReferences
	 */
	public function getExternalReferences() {
		return $this->externalReferences;
	}

	/**
	 * Sets the externalReferences
	 *
	 * @param string $externalReferences
	 * @return void
	 */
	public function setExternalReferences($externalReferences) {
		$this->externalReferences = $externalReferences;
	}
	
	/**
	 * Gets the type (work/part) to which the source is bound
	 * 
	 * @return int $boundTo
	 */
	public function getBoundTo() {
		return $this->boundTo;
	}

	/**
	 * Sets the type (work/part) to which the source is bound
	 * 
	 * @param int $boundTo
	 */
	public function setBoundTo($boundTo = 0) {
		$this->boundTo = $boundTo;
	}

	/**
	 * Gets the title of the part to which the source is bound
	 * 
	 * @return string $partTitle
	 */
 	public function getPartTitle() {
		return $this->partTitle;
	}

	/**
	 * Sets the title of the part to which the source is bound
	 * 
	 * @param string $partTitle
	 */
  	public function setPartTitle($partTitle) {
		$this->partTitle = $partTitle;
	}

	/**
	 * Returns the relatedWorks
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Works> $relatedWorks
	 */
	public function getRelatedWorks() {
		return $this->relatedWorks;
	}

	/**
	 * Sets the relatedWorks
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Works> $relatedWorks
	 * @return void
	 */
	public function setRelatedWorks($relatedWorks) {
		$this->relatedWorks = $relatedWorks;
	}

	/**
	 * Returns the relatedParts
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPartsRelations> $relatedParts
	 */
	public function getRelatedParts() {
		return $this->relatedParts;
	}

	/**
	 * Sets the relatedParts
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPartsRelations> $relatedParts
	 * @return void
	 */
	public function setRelatedParts($relatedParts) {
		$this->relatedParts = $relatedParts;
	}
}
?>