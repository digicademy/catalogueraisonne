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
 * Relations of persons to a specific work
 */
class Tx_Catalogueraisonne_Domain_Model_WorksPersonsRelations extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * Each person has a specific function in respect to the work
	 *
	 * @var integer
	 */
	protected $function;

	/**
	 * Special information about the persons function within the work context
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * The related work
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_Works
	 */
	protected $work;

	/**
	 * The related person
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_Persons
	 */
	protected $person;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the function
	 *
	 * @return integer $function
	 */
	public function getFunction() {
		return $this->function;
	}

	/**
	 * Sets the function
	 *
	 * @param integer $function
	 * @return void
	 */
	public function setFunction($function) {
		$this->function = $function;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the work
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_Works $work
	 */
	public function getWork() {
		return $this->work;
	}

	/**
	 * Sets the work
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Works $work
	 * @return void
	 */
	public function setWork($work) {
		$this->work = $work;
	}

	/**
	 * Returns the person
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_Persons $person
	 */
	public function getPerson() {
		return $this->person;
	}

	/**
	 * Sets the person
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Persons $person
	 * @return void
	 */
	public function setPerson($person) {
		$this->person = $person;
	}

}
?>