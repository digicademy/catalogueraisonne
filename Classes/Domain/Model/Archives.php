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
 * Archives
 */
class Tx_Catalogueraisonne_Domain_Model_Archives extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of the holding institution
	 *
	 * @var string $name
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Name of the holding institution
	 *
	 * @var string $description
	 */
	protected $description;

	/**
	 * Geographical location where the archive is located
	 *
	 * @var Tx_Catalogueraisonne_Domain_Model_Places $placeOfArchive
	 * @lazy
	 */
	protected $placeOfArchive;
	
	/**
	 * Country uid of the holding institution
	 *
	 * @var integer $country
	 */
	protected $country;

	/**
	 * Coordinates of the archive
	 *
	 * @var string $coordinates
	 */
	protected $coordinates;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
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
	 * Returns the name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
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
	 * Returns the description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Returns the placeOfArchive
	 *
	 * @return Tx_Catalogueraisonne_Domain_Model_Places $placeOfArchive
	 */
	public function getPlaceOfArchive() {
		return $this->placeOfArchive;
	}

	/**
	 * Sets the placeOfArchive
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Places $placeOfArchive
	 * @return void
	 */
	public function setPlaceOfArchive($placeOfArchive) {
		$this->placeOfPremiere = $placeOfArchive;
	}
	
	/**
	 * Sets the country
	 *
	 * @param integer $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Returns the country
	 *
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the coordinates
	 *
	 * @param string $coordinates
	 * @return void
	 */
	public function setCoordinates($coordinates) {
		$this->coordinates = $coordinates;
	}

	/**
	 * Returns the coordinates
	 *
	 * @return string
	 */
	public function getCoordinates() {
		return $this->coordinates;
	}

}
?>