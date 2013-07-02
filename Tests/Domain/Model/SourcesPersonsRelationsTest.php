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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations.
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
class Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelationsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_SourcesPersonsRelations();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getFunctionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFunctionForStringSetsFunction() { 
		$this->fixture->setFunction('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFunction()
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
	public function getSourceReturnsInitialValueForTx_Catalogueraisonne_Domain_Model_Sources() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getSource()
		);
	}

	/**
	 * @test
	 */
	public function setSourceForTx_Catalogueraisonne_Domain_Model_SourcesSetsSource() { 
		$dummyObject = new Tx_Catalogueraisonne_Domain_Model_Sources();
		$this->fixture->setSource($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getSource()
		);
	}
	
	/**
	 * @test
	 */
	public function getPersonReturnsInitialValueForTx_Catalogueraisonne_Domain_Model_Persons() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getPerson()
		);
	}

	/**
	 * @test
	 */
	public function setPersonForTx_Catalogueraisonne_Domain_Model_PersonsSetsPerson() { 
		$dummyObject = new Tx_Catalogueraisonne_Domain_Model_Persons();
		$this->fixture->setPerson($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getPerson()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>