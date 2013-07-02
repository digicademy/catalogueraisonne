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
 * Parts
 */
class Tx_Catalogueraisonne_Domain_Model_Parts extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * The title of the part
	 *
	 * @var string $title
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * The work to which this part belongs
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_Works $works
	 * @lazy
	 */
	protected $works;

	/**
	 * The act of the part
	 *
	 * @var string $act
	 */
	protected $act;

	/**
	 * Scene within the act
	 *
	 * @var string $scene
	 */
	protected $scene;

	/**
	 * If the part was borrowed from an external source
	 *
	 * @var string $externalSource
	 */
	protected $externalSource;

	/**
	 * A part is constituted by its incipits that contain the musicological information
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Incipits> $incipits
	 */
	protected $incipits;

	/**
	 * Other parts of other works this part is borrowed from
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $borrowedFrom
	 * @lazy
	 */
	protected $borrowedFrom;

	/**
	 * Other parts in other works this part is featured in
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $featuredIn
	 * @lazy
	 */
	protected $featuredIn;

	/**
	 * Details about the borrowing
	 * 
	 * @var string $borrowingInformation
	 */
	protected $borrowingInformation;

	/**
	 * A part can have different sources
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Sources> $sources
	 * @lazy
	 */
	protected $sources;

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
		$this->incipits = new Tx_Extbase_Persistence_ObjectStorage();
		$this->borrowedFrom = new Tx_Extbase_Persistence_ObjectStorage();
		$this->featuredIn = new Tx_Extbase_Persistence_ObjectStorage();
		$this->sources = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the act
	 *
	 * @return string $act
	 */
	public function getAct() {
		return $this->act;
	}

	/**
	 * Sets the act
	 *
	 * @param string $act
	 * @return void
	 */
	public function setAct($act) {
		$this->act = $act;
	}

	/**
	 * Returns the scene
	 *
	 * @return string $scene
	 */
	public function getScene() {
		return $this->scene;
	}

	/**
	 * Sets the scene
	 *
	 * @param string $scene
	 * @return void
	 */
	public function setScene($scene) {
		$this->scene = $scene;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
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
	 * Returns the work
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Incipits> $incipits
	 */
	public function getIncipits() {
		return $this->incipits;
	}
	
	/**
	 * Sets the incipits
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Incipits> $incipits
	 * @return void
	 */
	public function setIncipits($incipits) {
		$this->incipits = $incipits;
	}

	/**
	 * Returns the works
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_Works $works
	 */
	public function getWorks() {
		return $this->works;
	}

	/**
	 * Sets the works
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Works $works
	 * @return void
	 */
	public function setWorks($works) {
		$this->works = $works;
	}

	/**
	 * Returns the borrowedFrom
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $borrowedFrom
	 */
	public function getBorrowedFrom() {
		return $this->borrowedFrom;
	}

	/**
	 * Sets the borrowedFrom
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $borrowedFrom
	 * @return void
	 */
	public function setBorrowedFrom($borrowedFrom) {
		$this->borrowedFrom = $borrowedFrom;
	}

	/**
	 * Returns the featuredIn
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $featuredIn
	 */
	public function getFeaturedIn() {
		return $this->featuredIn;
	}

	/**
	 * Sets the featuredIn
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_Parts> $featuredIn
	 * @return void
	 */
	public function setFeaturedIn($featuredIn) {
		$this->featuredIn = $featuredIn;
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
	 * Returns the externalSource
	 *
	 * @return string $externalSource
	 */
	public function getExternalSource() {
		return $this->externalSource;
	}

	/**
	 * Sets the externalSource
	 *
	 * @param string $externalSource
	 * @return void
	 */
	public function setExternalSource($externalSource) {
		$this->externalSource = $externalSource;
	}

	/**
	 * Returns the borrowingInformation
	 *
	 * @return string $borrowingInformation
	 */
	public function getBorrowingInformation() {
		return $this->borrowingInformation;
	}

	/**
	 * Sets the borrowingInformation
	 *
	 * @param string $borrowingInformation
	 * @return void
	 */
	public function setBorrowingInformation($borrowingInformation) {
		$this->borrowingInformation = $borrowingInformation;
	}

}
?>