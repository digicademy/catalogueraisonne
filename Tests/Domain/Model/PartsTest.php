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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_Parts.
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
class Tx_Catalogueraisonne_Domain_Model_PartsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_Parts
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_Parts();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getActReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setActForStringSetsAct() { 
		$this->fixture->setAct('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAct()
		);
	}
	
	/**
	 * @test
	 */
	public function getSceneReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSceneForStringSetsScene() { 
		$this->fixture->setScene('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getScene()
		);
	}
	
	/**
	 * @test
	 */
	public function getExternalSourceReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setExternalSourceForStringSetsExternalSource() { 
		$this->fixture->setExternalSource('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getExternalSource()
		);
	}
	
	/**
	 * @test
	 */
	public function getIncipitsReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Incipits() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getIncipits()
		);
	}

	/**
	 * @test
	 */
	public function setIncipitsForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_IncipitsSetsIncipits() { 
		$incipit = new Tx_Catalogueraisonne_Domain_Model_Incipits();
		$objectStorageHoldingExactlyOneIncipits = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneIncipits->attach($incipit);
		$this->fixture->setIncipits($objectStorageHoldingExactlyOneIncipits);

		$this->assertSame(
			$objectStorageHoldingExactlyOneIncipits,
			$this->fixture->getIncipits()
		);
	}
	
	/**
	 * @test
	 */
	public function addIncipitToObjectStorageHoldingIncipits() {
		$incipit = new Tx_Catalogueraisonne_Domain_Model_Incipits();
		$objectStorageHoldingExactlyOneIncipit = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneIncipit->attach($incipit);
		$this->fixture->addIncipit($incipit);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneIncipit,
			$this->fixture->getIncipits()
		);
	}

	/**
	 * @test
	 */
	public function removeIncipitFromObjectStorageHoldingIncipits() {
		$incipit = new Tx_Catalogueraisonne_Domain_Model_Incipits();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($incipit);
		$localObjectStorage->detach($incipit);
		$this->fixture->addIncipit($incipit);
		$this->fixture->removeIncipit($incipit);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getIncipits()
		);
	}
	
	/**
	 * @test
	 */
	public function getBorrowedFromReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Parts() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getBorrowedFrom()
		);
	}

	/**
	 * @test
	 */
	public function setBorrowedFromForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_PartsSetsBorrowedFrom() { 
		$borrowedFrom = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$objectStorageHoldingExactlyOneBorrowedFrom = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneBorrowedFrom->attach($borrowedFrom);
		$this->fixture->setBorrowedFrom($objectStorageHoldingExactlyOneBorrowedFrom);

		$this->assertSame(
			$objectStorageHoldingExactlyOneBorrowedFrom,
			$this->fixture->getBorrowedFrom()
		);
	}
	
	/**
	 * @test
	 */
	public function addBorrowedFromToObjectStorageHoldingBorrowedFrom() {
		$borrowedFrom = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$objectStorageHoldingExactlyOneBorrowedFrom = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneBorrowedFrom->attach($borrowedFrom);
		$this->fixture->addBorrowedFrom($borrowedFrom);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneBorrowedFrom,
			$this->fixture->getBorrowedFrom()
		);
	}

	/**
	 * @test
	 */
	public function removeBorrowedFromFromObjectStorageHoldingBorrowedFrom() {
		$borrowedFrom = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($borrowedFrom);
		$localObjectStorage->detach($borrowedFrom);
		$this->fixture->addBorrowedFrom($borrowedFrom);
		$this->fixture->removeBorrowedFrom($borrowedFrom);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getBorrowedFrom()
		);
	}
	
	/**
	 * @test
	 */
	public function getFeaturedInReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Parts() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getFeaturedIn()
		);
	}

	/**
	 * @test
	 */
	public function setFeaturedInForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_PartsSetsFeaturedIn() { 
		$featuredIn = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$objectStorageHoldingExactlyOneFeaturedIn = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneFeaturedIn->attach($featuredIn);
		$this->fixture->setFeaturedIn($objectStorageHoldingExactlyOneFeaturedIn);

		$this->assertSame(
			$objectStorageHoldingExactlyOneFeaturedIn,
			$this->fixture->getFeaturedIn()
		);
	}
	
	/**
	 * @test
	 */
	public function addFeaturedInToObjectStorageHoldingFeaturedIn() {
		$featuredIn = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$objectStorageHoldingExactlyOneFeaturedIn = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneFeaturedIn->attach($featuredIn);
		$this->fixture->addFeaturedIn($featuredIn);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneFeaturedIn,
			$this->fixture->getFeaturedIn()
		);
	}

	/**
	 * @test
	 */
	public function removeFeaturedInFromObjectStorageHoldingFeaturedIn() {
		$featuredIn = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($featuredIn);
		$localObjectStorage->detach($featuredIn);
		$this->fixture->addFeaturedIn($featuredIn);
		$this->fixture->removeFeaturedIn($featuredIn);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getFeaturedIn()
		);
	}
	
	/**
	 * @test
	 */
	public function getSourcesReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Sources() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getSources()
		);
	}

	/**
	 * @test
	 */
	public function setSourcesForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_SourcesSetsSources() { 
		$source = new Tx_Catalogueraisonne_Domain_Model_Sources();
		$objectStorageHoldingExactlyOneSources = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSources->attach($source);
		$this->fixture->setSources($objectStorageHoldingExactlyOneSources);

		$this->assertSame(
			$objectStorageHoldingExactlyOneSources,
			$this->fixture->getSources()
		);
	}
	
	/**
	 * @test
	 */
	public function addSourceToObjectStorageHoldingSources() {
		$source = new Tx_Catalogueraisonne_Domain_Model_Sources();
		$objectStorageHoldingExactlyOneSource = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSource->attach($source);
		$this->fixture->addSource($source);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneSource,
			$this->fixture->getSources()
		);
	}

	/**
	 * @test
	 */
	public function removeSourceFromObjectStorageHoldingSources() {
		$source = new Tx_Catalogueraisonne_Domain_Model_Sources();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($source);
		$localObjectStorage->detach($source);
		$this->fixture->addSource($source);
		$this->fixture->removeSource($source);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getSources()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>