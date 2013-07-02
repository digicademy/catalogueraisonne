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
 * Repository for common queries
 */
class Tx_Catalogueraisonne_Domain_Repository_CommonRepository extends Tx_Extbase_Persistence_Repository {

	/**
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
#		$query->matching($query->in('pid', t3lib_div::trimExplode(',', $settings['recordPids'], 1)));

			// determine the result order and sorting
		switch ((int) $settings['mode']) {
			case 20:
			case 30:
			case 40:
				$orderings = array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
				break;
			case 10:
			default:
				$orderings = array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
				break;
		}
		$query->setOrderings($orderings);

			// go
		return $query->execute();
	}
}
?>