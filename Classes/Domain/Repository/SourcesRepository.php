<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature | Mainz
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
 * Repository for Tx_Catalogueraisonne_Domain_Model_Sources
 */
class Tx_Catalogueraisonne_Domain_Repository_SourcesRepository extends Tx_Catalogueraisonne_Domain_Repository_CommonRepository {

	/**
	 * Performs a multivalued search on sources using the extbase's query object
	 *
	 * @param array $arguments
	 * @param array $worksByPid
	 * 
	 */
	public function findBySearch($arguments, $worksByPid) {

			// create the query object
		$query = $this->createQuery();
		$constraints = array();

		if (is_array($arguments['pids'])) {
			if ((int) $arguments['pids'][0] === 999) {
				$constraints[] = $query->in('pid', array_keys($worksByPid));
			} else {
				$constraints[] = $query->in('pid', $arguments['pids']);
			}
		}

		if ($arguments['category'] > 0) {
			$constraints[] = $query->equals('category', $arguments['category']);
		}

		if ($arguments['type'] > 0) {
			$constraints[] = $query->equals('type', $arguments['type']);
		}

		if ($arguments['subtype'] > 0) {
			$constraints[] = $query->equals('subtype', $arguments['subtype']);
		}

		if ($arguments['kind'] > 0) {
			$constraints[] = $query->equals('kind', $arguments['kind']);
		}

		if ($arguments['quality'] > 0) {
			$constraints[] = $query->equals('quality', $arguments['quality']);
		}

		if ($arguments['sourcesTimeFrom'] && $arguments['sourcesTimeTo']) {
			$constraints[] = $query->logicalAnd(
				$query->greaterThanOrEqual('dateRange.startDate', (int) $arguments['sourcesTimeFrom']),
				$query->lessThanOrEqual('dateRange.endDate', (int) $arguments['sourcesTimeTo'])
			);
		} elseif ($arguments['sourcesTimeFrom'] && empty($arguments['sourcesTimeTo'])) {
			$constraints[] = $query->greaterThanOrEqual('dateRange.startDate', (int) $arguments['sourcesTimeFrom']);
		} elseif (empty($arguments['sourcesTimeFrom']) && $arguments['sourcesTimeTo']) {
			$constraints[] = $query->lessThanOrEqual('dateRange.endDate', (int) $arguments['sourcesTimeTo']);
		}

			// put together all constraints
		if (count($constraints) > 0) {
			$query->matching($query->logicalAnd($constraints));
		} else {
			return;
		}

			// result order
		$query->setOrderings(
			array('signature' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING)
		);

			// execute query
		$result = $query->execute();

			// grouping of the found sources by work pid
		if ($result) {
			foreach ($result as $source) {
				$groupedSources[$source->getPid()][] = $source;
			}
				// if a work is hidden, it will not be in $worksByPid and related sources will therfore not be transferred to the final result
			foreach ($worksByPid as $key => $value) {
				if (array_key_exists($key, $groupedSources)) {
					$worksByPid[$key]['sources'] = $groupedSources[$key];
				} else {
					unset($worksByPid[$key]);
				}
			}
			$result = $worksByPid;
		}

			// go
		return $result; 

	}

	/**
	 * Finds all sources of a related person
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Persons $person
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByPerson($person) {

			// initialize query object and set storage page to FALSE
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);

		// apply constraints
		$query->matching(
			$query->logicalAnd(
				$query->lessThan('deleted', 1),
				$query->lessThan('relatedPersons.deleted', 1),
				$query->equals('relatedPersons.person.uid', $person->getUid())
			)
		);

			// result order
		$orderings = array('signature' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
		$query->setOrderings($orderings);

			// go
		return $query->execute();
	}
}
?>