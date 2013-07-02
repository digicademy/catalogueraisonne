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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_Incipits.
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
class Tx_Catalogueraisonne_Domain_Model_IncipitsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_Incipits
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_Incipits();
	}

	public function tearDown() {
		unset($this->fixture);
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
	public function getTempoReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTempoForStringSetsTempo() { 
		$this->fixture->setTempo('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTempo()
		);
	}
	
	/**
	 * @test
	 */
	public function getLengthReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getLength()
		);
	}

	/**
	 * @test
	 */
	public function setLengthForIntegerSetsLength() { 
		$this->fixture->setLength(12);

		$this->assertSame(
			12,
			$this->fixture->getLength()
		);
	}
	
	/**
	 * @test
	 */
	public function getTextinfosReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTextinfosForStringSetsTextinfos() { 
		$this->fixture->setTextinfos('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTextinfos()
		);
	}
	
	/**
	 * @test
	 */
	public function getScoreReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setScoreForStringSetsScore() { 
		$this->fixture->setScore('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getScore()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>