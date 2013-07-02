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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_Works.
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
class Tx_Catalogueraisonne_Domain_Model_WorksTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_Works
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_Works();
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
	public function getIdentifierReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setIdentifierForStringSetsIdentifier() { 
		$this->fixture->setIdentifier('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getIdentifier()
		);
	}
	
	/**
	 * @test
	 */
	public function getUrnReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setUrnForStringSetsUrn() { 
		$this->fixture->setUrn('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getUrn()
		);
	}
	
	/**
	 * @test
	 */
	public function getWotquenneNumberReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setWotquenneNumberForStringSetsWotquenneNumber() { 
		$this->fixture->setWotquenneNumber('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getWotquenneNumber()
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
	public function getInstrumentationReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setInstrumentationForStringSetsInstrumentation() { 
		$this->fixture->setInstrumentation('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getInstrumentation()
		);
	}
	
	/**
	 * @test
	 */
	public function getGenesisReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setGenesisForStringSetsGenesis() { 
		$this->fixture->setGenesis('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getGenesis()
		);
	}
	
	/**
	 * @test
	 */
	public function getPremiereReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setPremiereForStringSetsPremiere() { 
		$this->fixture->setPremiere('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getPremiere()
		);
	}
	
	/**
	 * @test
	 */
	public function getDedicationReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDedicationForStringSetsDedication() { 
		$this->fixture->setDedication('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDedication()
		);
	}
	
	/**
	 * @test
	 */
	public function getHistoryReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setHistoryForStringSetsHistory() { 
		$this->fixture->setHistory('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getHistory()
		);
	}
	
	/**
	 * @test
	 */
	public function getAnonymusTextsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAnonymusTextsForStringSetsAnonymusTexts() { 
		$this->fixture->setAnonymusTexts('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAnonymusTexts()
		);
	}
	
	/**
	 * @test
	 */
	public function getNamingReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNamingForStringSetsNaming() { 
		$this->fixture->setNaming('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNaming()
		);
	}
	
	/**
	 * @test
	 */
	public function getCommentaryReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCommentaryForStringSetsCommentary() { 
		$this->fixture->setCommentary('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCommentary()
		);
	}
	
	/**
	 * @test
	 */
	public function getGgaReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setGgaForStringSetsGga() { 
		$this->fixture->setGga('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getGga()
		);
	}
	
	/**
	 * @test
	 */
	public function getAuthenticityReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAuthenticityForStringSetsAuthenticity() { 
		$this->fixture->setAuthenticity('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAuthenticity()
		);
	}
	
	/**
	 * @test
	 */
	public function getOriginalLanguageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOriginalLanguageForStringSetsOriginalLanguage() { 
		$this->fixture->setOriginalLanguage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOriginalLanguage()
		);
	}
	
	/**
	 * @test
	 */
	public function getPlaceOfPremiereReturnsInitialValueForTx_Catalogueraisonne_Domain_Model_Places() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getPlaceOfPremiere()
		);
	}

	/**
	 * @test
	 */
	public function setPlaceOfPremiereForTx_Catalogueraisonne_Domain_Model_PlacesSetsPlaceOfPremiere() { 
		$dummyObject = new Tx_Catalogueraisonne_Domain_Model_Places();
		$this->fixture->setPlaceOfPremiere($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getPlaceOfPremiere()
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
	public function getRelatedPersonsReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_WorksPersonsRelations() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelatedPersons()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedPersonsForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_WorksPersonsRelationsSetsRelatedPersons() { 
		$relatedPerson = new Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations();
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
		$relatedPerson = new Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations();
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
		$relatedPerson = new Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations();
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
	
	/**
	 * @test
	 */
	public function getStagingPlacesReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Places() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getStagingPlaces()
		);
	}

	/**
	 * @test
	 */
	public function setStagingPlacesForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_PlacesSetsStagingPlaces() { 
		$stagingPlace = new Tx_Catalogueraisonne_Domain_Model_Places();
		$objectStorageHoldingExactlyOneStagingPlaces = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneStagingPlaces->attach($stagingPlace);
		$this->fixture->setStagingPlaces($objectStorageHoldingExactlyOneStagingPlaces);

		$this->assertSame(
			$objectStorageHoldingExactlyOneStagingPlaces,
			$this->fixture->getStagingPlaces()
		);
	}
	
	/**
	 * @test
	 */
	public function addStagingPlaceToObjectStorageHoldingStagingPlaces() {
		$stagingPlace = new Tx_Catalogueraisonne_Domain_Model_Places();
		$objectStorageHoldingExactlyOneStagingPlace = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneStagingPlace->attach($stagingPlace);
		$this->fixture->addStagingPlace($stagingPlace);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneStagingPlace,
			$this->fixture->getStagingPlaces()
		);
	}

	/**
	 * @test
	 */
	public function removeStagingPlaceFromObjectStorageHoldingStagingPlaces() {
		$stagingPlace = new Tx_Catalogueraisonne_Domain_Model_Places();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($stagingPlace);
		$localObjectStorage->detach($stagingPlace);
		$this->fixture->addStagingPlace($stagingPlace);
		$this->fixture->removeStagingPlace($stagingPlace);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getStagingPlaces()
		);
	}
	
	/**
	 * @test
	 */
	public function getPartsReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Parts() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getParts()
		);
	}

	/**
	 * @test
	 */
	public function setPartsForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_PartsSetsParts() { 
		$part = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$objectStorageHoldingExactlyOneParts = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneParts->attach($part);
		$this->fixture->setParts($objectStorageHoldingExactlyOneParts);

		$this->assertSame(
			$objectStorageHoldingExactlyOneParts,
			$this->fixture->getParts()
		);
	}
	
	/**
	 * @test
	 */
	public function addPartToObjectStorageHoldingParts() {
		$part = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$objectStorageHoldingExactlyOnePart = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePart->attach($part);
		$this->fixture->addPart($part);

		$this->assertEquals(
			$objectStorageHoldingExactlyOnePart,
			$this->fixture->getParts()
		);
	}

	/**
	 * @test
	 */
	public function removePartFromObjectStorageHoldingParts() {
		$part = new Tx_Catalogueraisonne_Domain_Model_Parts();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($part);
		$localObjectStorage->detach($part);
		$this->fixture->addPart($part);
		$this->fixture->removePart($part);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getParts()
		);
	}
	
	/**
	 * @test
	 */
	public function getLiteratureReturnsInitialValueForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_Literature() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getLiterature()
		);
	}

	/**
	 * @test
	 */
	public function setLiteratureForObjectStorageContainingTx_Catalogueraisonne_Domain_Model_LiteratureSetsLiterature() { 
		$literature = new Tx_Catalogueraisonne_Domain_Model_Literature();
		$objectStorageHoldingExactlyOneLiterature = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneLiterature->attach($literature);
		$this->fixture->setLiterature($objectStorageHoldingExactlyOneLiterature);

		$this->assertSame(
			$objectStorageHoldingExactlyOneLiterature,
			$this->fixture->getLiterature()
		);
	}
	
	/**
	 * @test
	 */
	public function addLiteratureToObjectStorageHoldingLiterature() {
		$literature = new Tx_Catalogueraisonne_Domain_Model_Literature();
		$objectStorageHoldingExactlyOneLiterature = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneLiterature->attach($literature);
		$this->fixture->addLiterature($literature);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneLiterature,
			$this->fixture->getLiterature()
		);
	}

	/**
	 * @test
	 */
	public function removeLiteratureFromObjectStorageHoldingLiterature() {
		$literature = new Tx_Catalogueraisonne_Domain_Model_Literature();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($literature);
		$localObjectStorage->detach($literature);
		$this->fixture->addLiterature($literature);
		$this->fixture->removeLiterature($literature);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getLiterature()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>