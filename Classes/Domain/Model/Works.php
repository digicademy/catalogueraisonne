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
 * A work of Gluck
 */
class Tx_Catalogueraisonne_Domain_Model_Works extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Hidden
	 *
	 * @var integer $hidden
	 */
	protected $hidden;

	/**
	 * The title of the work
	 *
	 * @var string $title
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Unique identifier within the catalogue
	 *
	 * @var string $identifier
	 */
	protected $identifier;

	/**
	 * Unique resource name for the work
	 *
	 * @var string $urn
	 */
	protected $urn;

	/**
	 * Number from the Wotquenne catalogue
	 *
	 * @var string $wotquenneNumber
	 */
	protected $wotquenneNumber;

	/**
	 * The type of the work (opera, sinfony etc.)
	 *
	 * @var string $type
	 */
	protected $type;

	/**
	 * The instrumentation for the work
	 *
	 * @var string $instrumentation
	 */
	protected $instrumentation;

	/**
	 * Information about the work's genesis
	 *
	 * @var string $genesis
	 */
	protected $genesis;

	/**
	 * Information about the premiere of the work
	 *
	 * @var string $premiere
	 */
	protected $premiere;

	/**
	 * Information from the title page to whom this work was dedicated
	 *
	 * @var string $dedication
	 */
	protected $dedication;

	/**
	 * History of the work including earliest reception dates
	 *
	 * @var string $history
	 */
	protected $history;

	/**
	 * Any texts/parts within the work that come from anonymus authors
	 *
	 * @var string $anonymusTexts
	 */
	protected $anonymusTexts;

	/**
	 * The naming of the work at it's time
	 *
	 * @var string $naming
	 */
	protected $naming;

	/**
	 * Commentary to the work
	 *
	 * @var string $commentary
	 */
	protected $commentary;

	/**
	 * Number in GGA
	 *
	 * @var string $gga
	 */
	protected $gga;

	/**
	 * Authentic or doubtful origin
	 *
	 * @var string $authenticity
	 */
	protected $authenticity;

	/**
	 * Original language of the work
	 *
	 * @var string $originalLanguage
	 */
	protected $originalLanguage;

	/**
	 * Geographical location where the work's premiere took place
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_Places $placeOfPremiere
	 * @lazy
	 */
	protected $placeOfPremiere;

	/**
	 * Normalized date information for the work - necessary for the date search
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_DateRanges $dateRange
	 * @lazy
	 */
	protected $dateRange;

	/**
	 * Persons that are related to the work in a specific function (like composer, singer, publisher etc.)
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations> $relatedPersons
	 * @lazy
	 */
	protected $relatedPersons;

	/**
	 * Sources of the work
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Sources> $sources
	 * @lazy
	 */
	protected $sources;

	/**
	 * Other Places where the work was staged
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Places> $stagingPlaces
	 * @lazy
	 */
	protected $stagingPlaces;

	/**
	 * The parts constitute the work as a whole
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $parts
	 * @lazy
	 */
	protected $parts;

	/**
	 * Literary references that are relevant for the work
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Literature> $literature
	 * @lazy
	 */
	protected $literature;

	/**
	 * Editor of the Work for citation
	 *
	 * @var string $editor
	 * @lazy
	 */
	protected $editor;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
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
		$this->sources = new Tx_Extbase_Persistence_ObjectStorage();
		$this->stagingPlaces = new Tx_Extbase_Persistence_ObjectStorage();
		$this->parts = new Tx_Extbase_Persistence_ObjectStorage();
		$this->literature = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Sets hidden
	 *
	 * @param integer $hidden
	 * @return void
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}

	/**
	 * Returns hidden
	 *
	 * @return integer
	 */
	public function getHidden() {
		return $this->hidden;
	}

	/**
	 * getIdentifier
	 *
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}

	/**
	 * setIdentifier
	 *
	 * @param string $identifier
	 * @return void
	 */
	public function setIdentifier($identifier) {
		$this->identifier = $identifier;
	}

	/**
	 * Returns the title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the type
	 *
	 * @return string
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
	 * Returns the instrumentation
	 *
	 * @return string $instrumentation
	 */
	public function getInstrumentation() {
		return $this->instrumentation;
	}

	/**
	 * Sets the instrumentation
	 *
	 * @param string $instrumentation
	 * @return void
	 */
	public function setInstrumentation($instrumentation) {
		$this->instrumentation = $instrumentation;
	}

	/**
	 * Returns the genesis
	 *
	 * @return string $genesis
	 */
	public function getGenesis() {
		return $this->genesis;
	}

	/**
	 * Sets the genesis
	 *
	 * @param string $genesis
	 * @return void
	 */
	public function setGenesis($genesis) {
		$this->genesis = $genesis;
	}

	/**
	 * Returns the premiere
	 *
	 * @return string $premiere
	 */
	public function getPremiere() {
		return $this->premiere;
	}

	/**
	 * Sets the premiere
	 *
	 * @param string $premiere
	 * @return void
	 */
	public function setPremiere($premiere) {
		$this->premiere = $premiere;
	}

	/**
	 * Returns the dedication
	 *
	 * @return string $dedication
	 */
	public function getDedication() {
		return $this->dedication;
	}

	/**
	 * Sets the dedication
	 *
	 * @param string $dedication
	 * @return void
	 */
	public function setDedication($dedication) {
		$this->dedication = $dedication;
	}

	/**
	 * Returns the history
	 *
	 * @return string $history
	 */
	public function getHistory() {
		return $this->history;
	}

	/**
	 * Sets the history
	 *
	 * @param string $history
	 * @return void
	 */
	public function setHistory($history) {
		$this->history = $history;
	}

	/**
	 * Returns the urn
	 *
	 * @return string $urn
	 */
	public function getUrn() {
		return $this->urn;
	}

	/**
	 * Sets the urn
	 *
	 * @param string $urn
	 * @return void
	 */
	public function setUrn($urn) {
		$this->urn = $urn;
	}

	/**
	 * Returns the anonymusTexts
	 *
	 * @return string $anonymusTexts
	 */
	public function getAnonymusTexts() {
		return $this->anonymusTexts;
	}

	/**
	 * Sets the anonymusTexts
	 *
	 * @param string $anonymusTexts
	 * @return void
	 */
	public function setAnonymusTexts($anonymusTexts) {
		$this->anonymusTexts = $anonymusTexts;
	}

	/**
	 * Returns the placeOfPremiere
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_Places $placeOfPremiere
	 */
	public function getPlaceOfPremiere() {
		return $this->placeOfPremiere;
	}

	/**
	 * Sets the placeOfPremiere
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Places $placeOfPremiere
	 * @return void
	 */
	public function setPlaceOfPremiere($placeOfPremiere) {
		$this->placeOfPremiere = $placeOfPremiere;
	}

	/**
	 * Returns the sources
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Sources> $sources
	 */
	public function getSources() {
		return $this->sources;
	}

	/**
	 * Sets the sources
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Sources> $sources
	 * @return void
	 */
	public function setSources($sources) {
		$this->sources = $sources;
	}

	/**
	 * Returns the stagingPlaces
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Places> $stagingPlaces
	 */
	public function getStagingPlaces() {
		return $this->stagingPlaces;
	}

	/**
	 * Sets the stagingPlaces
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Places> $stagingPlaces
	 * @return void
	 */
	public function setStagingPlaces($stagingPlaces) {
		$this->stagingPlaces = $stagingPlaces;
	}

	/**
	 * Returns the parts
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $parts
	 */
	public function getParts() {
		return $this->parts;
	}

	/**
	 * Sets the parts
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $parts
	 * @return void
	 */
	public function setParts($parts) {
		$this->parts = $parts;
	}

	/**
	 * Returns the naming
	 *
	 * @return string $naming
	 */
	public function getNaming() {
		return $this->naming;
	}

	/**
	 * Sets the naming
	 *
	 * @param string $naming
	 * @return void
	 */
	public function setNaming($naming) {
		$this->naming = $naming;
	}

	/**
	 * Returns the wotquenneNumber
	 *
	 * @return string $wotquenneNumber
	 */
	public function getWotquenneNumber() {
		return $this->wotquenneNumber;
	}

	/**
	 * Sets the wotquenneNumber
	 *
	 * @param string $wotquenneNumber
	 * @return void
	 */
	public function setWotquenneNumber($wotquenneNumber) {
		$this->wotquenneNumber = $wotquenneNumber;
	}

	/**
	 * Returns the commentary
	 *
	 * @return string $commentary
	 */
	public function getCommentary() {
		return $this->commentary;
	}

	/**
	 * Sets the commentary
	 *
	 * @param string $commentary
	 * @return void
	 */
	public function setCommentary($commentary) {
		$this->commentary = $commentary;
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
	 * Returns the relatedPersons
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations> $relatedPersons
	 */
	public function getRelatedPersons() {
		return $this->relatedPersons;
	}

	/**
	 * Sets the relatedPersons
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations> $relatedPersons
	 * @return void
	 */
	public function setRelatedPersons($relatedPersons) {
		$this->relatedPersons = $relatedPersons;
	}

	/**
	 * Returns the literature
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Literature> $literature
	 */
	public function getLiterature() {
		return $this->literature;
	}

	/**
	 * Sets the literature
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Literature> $literature
	 * @return void
	 */
	public function setLiterature($literature) {
		$this->literature = $literature;
	}

	/**
	 * Returns the gga
	 *
	 * @return string $gga
	 */
	public function getGga() {
		return $this->gga;
	}

	/**
	 * Sets the gga
	 *
	 * @param string $gga
	 * @return void
	 */
	public function setGga($gga) {
		$this->gga = $gga;
	}

	/**
	 * Returns the authenticity
	 *
	 * @return string $authenticity
	 */
	public function getAuthenticity() {
		return $this->authenticity;
	}

	/**
	 * Sets the authenticity
	 *
	 * @param string $authenticity
	 * @return void
	 */
	public function setAuthenticity($authenticity) {
		$this->authenticity = $authenticity;
	}

	/**
	 * Returns the originalLanguage
	 *
	 * @return string $originalLanguage
	 */
	public function getOriginalLanguage() {
		return $this->originalLanguage;
	}

	/**
	 * Sets the originalLanguage
	 *
	 * @param string $originalLanguage
	 * @return void
	 */
	public function setOriginalLanguage($originalLanguage) {
		$this->originalLanguage = $originalLanguage;
	}

	/**
	 * Returns the editor
	 *
	 * @return string $editor
	 */
	public function getEditor() {
		return $this->editor;
	}
	
	/**
	 * Sets the editor
	 *
	 * @param string $editor
	 * @return void
	 */
	public function setEditor($editor) {
		$this->editor = $editor;
	}

}
?>