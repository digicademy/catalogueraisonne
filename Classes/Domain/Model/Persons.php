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
 * Persons
 */
class Tx_Catalogueraisonne_Domain_Model_Persons extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The name of the person
	 *
	 * @var string $name
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Biographical information of the person
	 *
	 * @var string $curriculumVitae
	 */
	protected $curriculumVitae;

	/**
	 * The PND number of the Person
	 *
	 * @var integer $pnd
	 */
	protected $pnd;

	/**
	 * Variants of the persons name
	 *
	 * @var string $nameVariants
	 */
	protected $nameVariants;

	/**
	 * One or more titles a person has
	 *
	 * @var string $titles
	 */
	protected $titles;

	/**
	 * Works related to the person
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations> $relatedWorks
	 * @lazy
	 */
	protected $relatedWorks;

	/**
	 * Sources related to the person
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations> $relatedSources
	 * @lazy
	 */
	protected $relatedSources;

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
		$this->relatedWorks = new Tx_Extbase_Persistence_ObjectStorage();
		$this->relatedSources = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the curriculumVitae
	 *
	 * @return string $curriculumVitae
	 */
	public function getCurriculumVitae() {
		return $this->curriculumVitae;
	}

	/**
	 * Sets the curriculumVitae
	 *
	 * @param string $curriculumVitae
	 * @return void
	 */
	public function setCurriculumVitae($curriculumVitae) {
		$this->curriculumVitae = $curriculumVitae;
	}

	/**
	 * Returns the pnd
	 *
	 * @return integer $pnd
	 */
	public function getPnd() {
		return $this->pnd;
	}

	/**
	 * Sets the pnd
	 *
	 * @param integer $pnd
	 * @return void
	 */
	public function setPnd($pnd) {
		$this->pnd = $pnd;
	}

	/**
	 * Returns the nameVariants
	 *
	 * @return string $nameVariants
	 */
	public function getNameVariants() {
		return $this->nameVariants;
	}

	/**
	 * Sets the nameVariants
	 *
	 * @param string $nameVariants
	 * @return void
	 */
	public function setNameVariants($nameVariants) {
		$this->nameVariants = $nameVariants;
	}

	/**
	 * Returns the titles
	 *
	 * @return string $titles
	 */
	public function getTitles() {
		return $this->titles;
	}

	/**
	 * Sets the titles
	 *
	 * @param string $titles
	 * @return void
	 */
	public function setTitles($titles) {
		$this->titles = $titles;
	}

	/**
	 * Returns the relatedSources
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations> $relatedSources
	 */
	public function getRelatedSources() {
		return $this->relatedSources;
	}

	/**
	 * Sets the relatedSources
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations> $relatedSources
	 * @return void
	 */
	public function setRelatedSources($relatedSources) {
		$this->relatedSources = $relatedSources;
	}

	/**
	 * Returns the relatedWorks
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations> $relatedWorks
	 */
	public function getRelatedWorks() {
		return $this->relatedWorks;
	}

	/**
	 * Sets the relatedWorks
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations> $relatedWorks
	 * @return void
	 */
	public function setRelatedWorks($relatedWorks) {
		$this->relatedWorks = $relatedWorks;
	}

}
?>