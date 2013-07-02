<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature, Mainz
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
 * Repository for Tx_Catalogueraisonne_Domain_Model_Places
 */
class Tx_Catalogueraisonne_Domain_Repository_PlacesRepository extends Tx_Catalogueraisonne_Domain_Repository_CommonRepository {

	/**
	 * Overrides findAll in CommonRepository
	 * Performs a findAll with the possibility to influence the result ordering and/or to return a raw result
	 * instead of an object storage.
	 *
	 * @param array $settings
	 * @param boolean $raw
	 *
	 * @return object The result from the query
	 */
	public function findAll($settings = array(), $raw = FALSE) {

			// initialize query object and set storage page to false - use TS/FF settings instead
		$query = $this->createQuery();

			// test if to return raw results
		if ($raw == TRUE) $query->getQuerySettings()->setReturnRawQueryResult(TRUE);

			// set the storagePid(s) for the query using the FF/TS settings instead of the default storagePid
		$query->getQuerySettings()->setRespectStoragePage(FALSE);

			// selects only objecs from folder "Orte"
		$constraints = array();
		$constraints[] = $query->equals('pid', 1367);

			// apply to query
		$query->matching($query->logicalAnd($constraints));

			// determine the result order and sorting
		$orderings = array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);

		$query->setOrderings($orderings);

			// go
		return $query->execute();
	}

	/**
	 * Performs a findBy (properties act as filters).
	 *
	 * @param array $settings
	 * @param array $filters
	 * @param boolean $raw
	 *
	 * @return object The result from the query
	 */
	public function findByFilters($settings = array(), $filters = array(), $raw = FALSE) {

			// initialize query object and set storage page to false - use TS/FF settings instead
		$query = $this->createQuery();

			// test if to return raw results
		if ($raw == TRUE) $query->getQuerySettings()->setReturnRawQueryResult(TRUE); 

			// set the storagePid(s) for the query using the FF/TS settings instead of the default storagePid
		$query->getQuerySettings()->setRespectStoragePage(FALSE);

			// set ordering of the result
		$orderings = array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
		$query->setOrderings($orderings);

			// set filters as constraints
		$constraints = array();
		if ((int) $filters['country'] > 0) {
			$constraints[] = $query->equals('country', (int) $filters['country']);
		}
		$constraints[] = $query->equals('pid', 1367);

			// apply to query
		$query->matching($query->logicalAnd($constraints));

			// go
		return $query->execute();
	}
}
?>