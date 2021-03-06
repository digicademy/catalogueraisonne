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
 * Repository for Tx_Catalogueraisonne_Domain_Model_Persons
 */
class Tx_Catalogueraisonne_Domain_Repository_PersonsRepository extends Tx_Catalogueraisonne_Domain_Repository_CommonRepository {

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
		if ((int) $filters['functionWorks'] > 0) {
			$constraints[] = $query->equals('relatedWorks.function', (int) $filters['functionWorks']);
		} elseif ((int) $filters['functionSources'] > 0) {
			$constraints[] = $query->equals('relatedSources.function', (int) $filters['functionSources']);
		}

			// apply to query
		$query->matching($query->logicalAnd($constraints));

			// go
		return $query->execute();
	}

}

?>