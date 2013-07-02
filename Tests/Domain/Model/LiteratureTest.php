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
 * Testcase for class Tx_Catalogueraisonne_Domain_Model_Literature.
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
class Tx_Catalogueraisonne_Domain_Model_LiteratureTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Catalogueraisonne_Domain_Model_Literature
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Catalogueraisonne_Domain_Model_Literature();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getAutReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAutForStringSetsAut() { 
		$this->fixture->setAut('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAut()
		);
	}
	
	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() { 
		$this->fixture->setTitel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitel()
		);
	}
	
	/**
	 * @test
	 */
	public function getSeriesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSeriesForStringSetsSeries() { 
		$this->fixture->setSeries('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSeries()
		);
	}
	
	/**
	 * @test
	 */
	public function getOrtReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOrtForStringSetsOrt() { 
		$this->fixture->setOrt('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOrt()
		);
	}
	
	/**
	 * @test
	 */
	public function getJahrReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setJahrForStringSetsJahr() { 
		$this->fixture->setJahr('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getJahr()
		);
	}
	
	/**
	 * @test
	 */
	public function getCodReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCodForStringSetsCod() { 
		$this->fixture->setCod('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCod()
		);
	}
	
	/**
	 * @test
	 */
	public function getQnReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setQnForStringSetsQn() { 
		$this->fixture->setQn('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getQn()
		);
	}
	
	/**
	 * @test
	 */
	public function getBibReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBibForStringSetsBib() { 
		$this->fixture->setBib('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBib()
		);
	}
	
	/**
	 * @test
	 */
	public function getArReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setArForStringSetsAr() { 
		$this->fixture->setAr('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAr()
		);
	}
	
}
## KICKSTARTER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the kickstarter
?>