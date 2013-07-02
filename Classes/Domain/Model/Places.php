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
 * Places
 */
class Tx_Catalogueraisonne_Domain_Model_Places extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of the place
	 *
	 * @var string $name
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Latitude/Longitude of the place (decimal)
	 *
	 * @var string $coordinates
	 */
	protected $coordinates;

	/**
	 * Name variants of the place
	 *
	 * @var string $nameVariants
	 */
	protected $nameVariants;

	/**
	 * The theater in which the work was staged
	 *
	 * @var string $locality
	 */
	protected $locality;

	/**
	 * The country of the locality
	 *
	 * @var integer $country
	 */
	protected $country;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
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
	 * Returns the coordinates
	 *
	 * @return string $coordinates
	 */
	public function getCoordinates() {
		return $this->coordinates;
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
	 * Returns the locality
	 *
	 * @return string $locality
	 */
	public function getLocality() {
		return $this->locality;
	}

	/**
	 * Sets the locality
	 *
	 * @param string $locality
	 * @return void
	 */
	public function setLocality($locality) {
		$this->locality = $locality;
	}

	/**
	 * Returns the country uid
	 *
	 * @return integer $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country uid
	 *
	 * @param integer $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

}
?>