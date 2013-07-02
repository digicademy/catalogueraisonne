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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_Sources.
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
class Tx_Catalogueraisonne_Domain_Model_SourcesTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_Sources
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_Sources();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getSignatureReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSignatureForStringSetsSignature() { 
		$this->fixture->setSignature('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSignature()
		);
	}
	
	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCategoryForStringSetsCategory() { 
		$this->fixture->setCategory('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCategory()
		);
	}
	
	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTypeForStringSetsType() { 
		$this->fixture->setType('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getType()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubtypeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSubtypeForStringSetsSubtype() { 
		$this->fixture->setSubtype('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSubtype()
		);
	}
	
	/**
	 * @test
	 */
	public function getKindReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setKindForStringSetsKind() { 
		$this->fixture->setKind('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getKind()
		);
	}
	
	/**
	 * @test
	 */
	public function getQualityReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setQualityForStringSetsQuality() { 
		$this->fixture->setQuality('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getQuality()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getExternalReferencesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setExternalReferencesForStringSetsExternalReferences() { 
		$this->fixture->setExternalReferences('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getExternalReferences()
		);
	}
	
	/**
	 * @test
	 */
	public function getDateRangeReturnsInitialValueForTx_Catalogueraisonne_Domain_Model_DateRanges() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getDateRange()
		);
	}

	/**
	 * @test
	 */
	public function setDateRangeForTx_Catalogueraisonne_Domain_Model_DateRangesSetsDateRange() { 
		$dummyObject = new Tx_Catalogueraisonne_Domain_Model_DateRanges();
		$this->fixture->setDateRange($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getDateRange()
		);
	}
	
	/**
	 * @test
	 */
	public function getArchiveReturnsInitialValueForTx_Catalogueraisonne_Domain_Model_Archives() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getArchive()
		);
	}

	/**
	 * @test
	 */
	public function setArchiveForTx_Catalogueraisonne_Domain_Model_ArchivesSetsArchive() { 
		$dummyObject = new Tx_Catalogueraisonne_Domain_Model_Archives();
		$this->fixture->setArchive($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getArchive()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedPersonsReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelatedPersons()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedPersonsForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_SourcesPersonsRelationsSetsRelatedPersons() { 
		$relatedPerson = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
		$objectStorageHoldingExactlyOneRelatedPersons = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedPersons->attach($relatedPerson);
		$this->fixture->setRelatedPersons($objectStorageHoldingExactlyOneRelatedPersons);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRelatedPersons,
			$this->fixture->getRelatedPersons()
		);
	}
	
	/**
	 * @test
	 */
	public function addRelatedPersonToObjectStorageHoldingRelatedPersons() {
		$relatedPerson = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
		$objectStorageHoldingExactlyOneRelatedPerson = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneRelatedPerson->attach($relatedPerson);
		$this->fixture->addRelatedPerson($relatedPerson);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRelatedPerson,
			$this->fixture->getRelatedPersons()
		);
	}

	/**
	 * @test
	 */
	public function removeRelatedPersonFromObjectStorageHoldingRelatedPersons() {
		$relatedPerson = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($relatedPerson);
		$localObjectStorage->detach($relatedPerson);
		$this->fixture->addRelatedPerson($relatedPerson);
		$this->fixture->removeRelatedPerson($relatedPerson);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRelatedPersons()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>