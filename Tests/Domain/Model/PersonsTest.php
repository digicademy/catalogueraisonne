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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_Persons.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Catalogue Raisonné
 * 
 * @author Torsten Schrade <Torsten.Schrade@adwmainz.de>
 */
class Tx_Catalogueraisonne_Domain_Model_PersonsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_Persons
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_Persons();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getCurriculumVitaeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCurriculumVitaeForStringSetsCurriculumVitae() { 
		$this->fixture->setCurriculumVitae('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCurriculumVitae()
		);
	}
	
	/**
	 * @test
	 */
	public function getPndReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getPnd()
		);
	}

	/**
	 * @test
	 */
	public function setPndForIntegerSetsPnd() { 
		$this->fixture->setPnd(12);

		$this->assertSame(
			12,
			$this->fixture->getPnd()
		);
	}
	
	/**
	 * @test
	 */
	public function getNameVariantsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameVariantsForStringSetsNameVariants() { 
		$this->fixture->setNameVariants('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNameVariants()
		);
	}
	
	/**
	 * @test
	 */
	public function getTitlesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitlesForStringSetsTitles() { 
		$this->fixture->setTitles('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitles()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedWorksReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_WorksPersonsRelations() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelatedWorks()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedWorksForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_WorksPersonsRelationsSetsRelatedWorks() { 
		$relatedWork = new Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations();
		$objectStorageHoldingExactlyOneRelatedWorks = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedWorks->attach($relatedWork);
		$this->fixture->setRelatedWorks($objectStorageHoldingExactlyOneRelatedWorks);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRelatedWorks,
			$this->fixture->getRelatedWorks()
		);
	}
	
	/**
	 * @test
	 */
	public function addRelatedWorkToObjectStorageHoldingRelatedWorks() {
		$relatedWork = new Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations();
		$objectStorageHoldingExactlyOneRelatedWork = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedWork->attach($relatedWork);
		$this->fixture->addRelatedWork($relatedWork);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRelatedWork,
			$this->fixture->getRelatedWorks()
		);
	}

	/**
	 * @test
	 */
	public function removeRelatedWorkFromObjectStorageHoldingRelatedWorks() {
		$relatedWork = new Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($relatedWork);
		$localObjectStorage->detach($relatedWork);
		$this->fixture->addRelatedWork($relatedWork);
		$this->fixture->removeRelatedWork($relatedWork);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRelatedWorks()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedSourcesReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelatedSources()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedSourcesForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_SourcesPersonsRelationsSetsRelatedSources() { 
		$relatedSource = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
		$objectStorageHoldingExactlyOneRelatedSources = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedSources->attach($relatedSource);
		$this->fixture->setRelatedSources($objectStorageHoldingExactlyOneRelatedSources);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRelatedSources,
			$this->fixture->getRelatedSources()
		);
	}
	
	/**
	 * @test
	 */
	public function addRelatedSourceToObjectStorageHoldingRelatedSources() {
		$relatedSource = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
		$objectStorageHoldingExactlyOneRelatedSource = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedSource->attach($relatedSource);
		$this->fixture->addRelatedSource($relatedSource);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRelatedSource,
			$this->fixture->getRelatedSources()
		);
	}

	/**
	 * @test
	 */
	public function removeRelatedSourceFromObjectStorageHoldingRelatedSources() {
		$relatedSource = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($relatedSource);
		$localObjectStorage->detach($relatedSource);
		$this->fixture->addRelatedSource($relatedSource);
		$this->fixture->removeRelatedSource($relatedSource);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRelatedSources()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>