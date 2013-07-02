<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Torsten Schrade <Torsten.Schrade@adwmainz.de>, Academy of Sciences and Literature, Mainz
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
 * Repository for Tx_Catalogueraisonne_Domain_Model_Works
 */
class Tx_Catalogueraisonne_Domain_Repository_WorksRepository extends Tx_Catalogueraisonne_Domain_Repository_CommonRepository {


	/**
	 * Performs a multivalued search with current arguments
	 * 
	 * @param array $arguments
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findBySearch($arguments) {

			// create the query object
		$query = $this->createQuery();

			// prepare constraints array
		$constraints = array();

		if ($arguments['searchterm']) {
				// break up the searchterm into searchwords
			$searchwords = Tx_Catalogueraisonne_Utility_Search::wordSplit($arguments['searchterm']);
			foreach ($searchwords as $searchword) {
				$searchword = '%' . $searchword. '%';
				$titleConstraint[] = $query->like('title', $searchword);
				$identifierConstraint[] = $query->like('identifier', $searchword);
				$namingConstraint[] = $query->like('naming', $searchword);
				$premiereConstraint[] = $query->like('premiere', $searchword);
				$dedicationConstraint[] = $query->like('dedication', $searchword);
				$historyConstraint[] = $query->like('history', $searchword);
				$genesisConstraint[] = $query->like('genesis', $searchword);
				$wotquenneNumberConstraint[] = $query->like('wotquenneNumber', $searchword);
				$anonymusTextsConstraint[] = $query->like('anonymusTexts', $searchword);
				$commentaryConstraint[] = $query->like('commentary', $searchword);
				$ggaConstraint[] = $query->like('gga', $searchword);
				$intrumentationConstraint[] = $query->like('instrumentation', $searchword);
				$genesisConstraint[] = $query->like('genesis', $searchword);
				$partsTitleConstraint[] = $query->like('parts.title', $searchword);
				$relatedPersonsNameConstraint[] = $query->like('relatedPersons.person.name', $searchword);
				$relatedPersonsNameVariantsConstraint[] = $query->like('relatedPersons.person.nameVariants', $searchword);
#				$stagingPlacesNameConstraint[] = $query->like('stagingPlaces.name', $searchword);
#				$stagingPlacesNameVariantsConstraint[] = $query->like('stagingPlaces.nameVariants', $searchword);
			}
			$constraints[] = $query->logicalOr(
				$query->logicalAnd($titleConstraint),
				$query->logicalAnd($identifierConstraint),
				$query->logicalAnd($namingConstraint),
				$query->logicalAnd($premiereConstraint),
				$query->logicalAnd($dedicationConstraint),
				$query->logicalAnd($historyConstraint),
				$query->logicalAnd($genesisConstraint),
				$query->logicalAnd($wotquenneNumberConstraint),
				$query->logicalAnd($anonymusTextsConstraint),
				$query->logicalAnd($commentaryConstraint),
				$query->logicalAnd($intrumentationConstraint),
				$query->logicalAnd($genesisConstraint),
				$query->logicalAnd($partsTitleConstraint),
				$query->logicalAnd($partsTitleConstraint),
				$query->logicalAnd($relatedPersonsNameConstraint),
				$query->logicalAnd($relatedPersonsNameVariantsConstraint)
#				$query->logicalAnd($stagingPlacesNameConstraint),
#				$query->logicalAnd($stagingPlacesNameVariantsConstraint)
			);
		}

		if ($arguments['worktype'] > 0) {
			$constraints[] = $query->equals('type', $arguments['worktype']);
		}

		if ($arguments['originalLanguage'] > 0) {
			$constraints[] = $query->equals('originalLanguage', $arguments['originalLanguage']);
		}

		if ($arguments['authenticity'] != 99) {
			$constraints[] = $query->equals('authenticity', $arguments['authenticity']);
		}

		if ($arguments['worksTimeFrom'] && $arguments['worksTimeTo']) {
			$constraints[] = $query->logicalAnd(
				$query->greaterThanOrEqual('dateRange.startDate', (int) $arguments['worksTimeFrom']),
				$query->lessThanOrEqual('dateRange.endDate', (int) $arguments['worksTimeTo'])
			);
		} elseif ($arguments['worksTimeFrom'] && empty($arguments['worksTimeTo'])) {
			$constraints[] = $query->greaterThanOrEqual('dateRange.startDate', (int) $arguments['worksTimeFrom']);
		} elseif (empty($arguments['worksTimeFrom']) && $arguments['worksTimeTo']) {
			$constraints[] = $query->lessThanOrEqual('dateRange.endDate', (int) $arguments['worksTimeTo']);
		}

			// put together all constraints
		if (count($constraints) > 0) {
			$query->matching($query->logicalAnd($constraints));
		} else {
			return;
		}

			// result order
		$query->setOrderings(
			array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING)
		);

			// go
		return $query->execute();
	}

	/**
	 * Performs a findBy with properties acting as filters
	 *
	 * @param array $settings
	 * @param array $filters
	 * @param boolean $raw
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByFilters($settings = array(), $filters = array(), $raw = FALSE) {

			// initialize query object and set storage page to false - use TS/FF settings instead
		$query = $this->createQuery();

			// test if to return raw results
		if ($raw == TRUE) $query->getQuerySettings()->setReturnRawQueryResult(TRUE);

			// set the storagePid(s) for the query using the FF/TS settings instead of the default storagePid
		$query->getQuerySettings()->setRespectStoragePage(FALSE);

			// set ordering of the result
		$orderings = array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
		$query->setOrderings($orderings);

			// set filters as constraints
		$constraints = array();
		if ((int) $filters['type'] > 0) {
			$constraints[] = $query->equals('type', (int) $filters['type']);
		}
		if ((int) $filters['originalLanguage'] > 0) {
			$constraints[] = $query->equals('originalLanguage', (int) $filters['originalLanguage']);
		}
		if (array_key_exists('authenticity', $filters)) {
			$constraints[] = $query->equals('authenticity', (int) $filters['authenticity']);
		}

			// apply to query
		$query->matching($query->logicalAnd($constraints));

			// go
		return $query->execute();
	}

	/**
	 * Finds a work by it's pid including hidden works
	 *
	 * @param integer $pid
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByPidIncludingHidden($pid) {

			// initialize query object and set storage page and enable fields to FALSE
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->getQuerySettings()->setRespectEnableFields(FALSE);

			// apply pid constraint
		$query->matching(
			$query->logicalAnd(
				$query->lessThan('deleted', 1),
				$query->equals('pid', $pid)
			)
		);

			// just get one
		$query->setLimit(1);

			// go
		return $query->execute();
	}

	/**
	 * Finds all works of a related person
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Persons $person
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByPerson($person, $includingHidden = FALSE) {

			// initialize query object and set storage page to FALSE
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);

			// set enable fields to false to find hidden works
		if ($includingHidden === TRUE) $query->getQuerySettings()->setRespectEnableFields(FALSE);

			// apply constraints
		$query->matching(
			$query->logicalAnd(
				$query->lessThan('deleted', 1),
				$query->lessThan('relatedPersons.deleted', 1),
				$query->equals('relatedPersons.person.uid', $person->getUid())
			)
		);

			// result order
		$orderings = array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
		$query->setOrderings($orderings);

			// go
		return $query->execute();
	}

	/**
	 * Finds all works to a source
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Sources $source
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findBySource($source) {

		$result = $this->objectManager->get('Tx_Extbase_Persistence_ObjectStorage');

		for ($i = 0; $i < 2; $i++) {

			if ($result->count() > 0) break;

				// initialize query object and set storage page to FALSE
			$query = $this->createQuery();
			$query->getQuerySettings()->setRespectStoragePage(FALSE);
			$query->getQuerySettings()->setRespectEnableFields(FALSE);

			$constraints = array();
			$constraints[] = $query->lessThan('deleted', 1);

			// either check parts relations or works relations
			if ($i === 0) $constraints[] = $query->equals('sources.uid', $source->getUid());
			if ($i === 1) $constraints[] = $query->equals('parts.sources.uid', $source->getUid());

				// apply constraints
			$query->matching($query->logicalAnd($constraints));

				// result order
			$orderings = array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
			$query->setOrderings($orderings);

			$result = $query->execute();
		}

		return $result;
	}

	/**
	 * Finds works by archive that are attached to the work's sources OR it's parts. Has to work around an extbase
	 * bug (http://forge.typo3.org/issues/10212 + others) that will end up with invalid SQL when joining more than two
	 * tables (work.sources.archive + parts.sources.archive) in one query. Therefore, two queries are executed one after
	 * the other and both results are put into one object storage. The objects in the storage have to be sorted
	 * in the view.
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Archives $archive
	 * @param boolean $includingHidden
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByArchive($archive, $includingHidden = FALSE) {

		$result = $this->objectManager->get('Tx_Extbase_Persistence_ObjectStorage');

		for ($i = 0; $i < 2; $i++) {

				// initialize query object and set storage page to false - use TS/FF settings instead
			$query = $this->createQuery();

				// set the storagePid(s) for the query using the FF/TS settings instead of the default storagePid
			$query->getQuerySettings()->setRespectStoragePage(FALSE);

				// set enable fields to false to find hidden works
			if ($includingHidden === TRUE) $query->getQuerySettings()->setRespectEnableFields(FALSE);

			$constraints = array();
			$constraints[] = $query->lessThan('deleted', 1);

				// either check parts relations or works relations
			if ($i === 0) $constraints[] = $query->equals('sources.archive.uid', $archive->getUid());
			if ($i === 1) $constraints[] = $query->equals('parts.sources.archive.uid', $archive->getUid());

			$query->matching($query->logicalAnd($constraints));

				// set ordering of the result
			$orderings = array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
			$query->setOrderings($orderings);

				// perform the query
			$items = $query->execute();

			if (count($items) > 0) {
				foreach ($items as $item) {
					$result->attach($item);
				}
			}
		}

			// go
		return $result;
	}

	/**
	 * Finds a work by it's attached placeOfPremiere or stagingPlaces
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Places $place
	 * @param string $onProperty
	 * @param boolean $includingHidden
	 *
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByPlace($place, $onProperty, $includingHidden = FALSE) {

			// initialize query object and set storage page to false - use TS/FF settings instead
		$query = $this->createQuery();

			// set the storagePid(s) for the query using the FF/TS settings instead of the default storagePid
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		if ($includingHidden === TRUE) $query->getQuerySettings()->setRespectEnableFields(FALSE);

			// set ordering of the result
		$orderings = array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);
		$query->setOrderings($orderings);

			// apply constraint to query
		switch ($onProperty) {
			case 'placeOfPremiere':
					$query->matching(
						$query->logicalAnd(
							$query->lessThan('deleted', 1),
							$query->equals('placeOfPremiere', $place)
						)
					);
				break;
			case 'stagingPlaces':
			default:
					$query->matching(
						$query->logicalAnd(
							$query->lessThan('deleted', 1),
							$query->contains('stagingPlaces', $place)
						)
					);
				break;
		}

			// go
		return $query->execute();
	}

	/**
	 * Collects all sources of a work from the work object itself and from its part objects
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Works $work
	 *
	 * @return array The collected sources
	 */
	public function collectAllSources(Tx_Catalogueraisonne_Domain_Model_Works $work) {

		if (is_object($work)) {

			$sourceList = array();

				// check and collect sources related to the work
			if ($work->getSources()) {
				foreach ($work->getSources() as $source) {
					$source->setBoundTo(1);
					$sourceList[] = clone $source;
				}
			}

				// check and collect sources related to parts of the work
			if ($work->getParts()) {
				foreach ($work->getParts() as $part) {
					if ($part->getSources()) {
						foreach ($part->getSources() as $source) {
							$source->setBoundTo(2);
							$source->setPartTitle($part->getTitle());
							$sourceList[] = clone $source;
						}
					}
				}
			}

		} else return FALSE;

		if (count($sourceList) > 1) {return $sourceList;} else return FALSE;

	}

	/**
	 * Collects all persons related to a work from the work object itself and from its source objects.
	 * Uses a fixed order determined by the values of the function property
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Works $work
	 *
	 * @return array The collected persons
	 */
	public function collectRelatedPersons(Tx_Catalogueraisonne_Domain_Model_Works $work) {

		if (is_object($work)) {

			$relatedPersons = array(
				'50' => array(),
				'210' => array(),
				'250' => array(),
				'240' => array(),
				'70' => array(),
				'230' => array(),
				'10' => array(),
				'40' => array(),
				'80' => array(),
				'220' => array(),
				'260' => array(),
				'110' => array(),
				'120' => array(),
				'130' => array(),
				'140' => array()
			);

				// check and collect persons related to the work, ensure uniqueness in array and collect all their functions
			if ($work->getRelatedPersons()) {
				foreach ($work->getRelatedPersons() as $relation) {
					$function = $relation->getFunction();
					$description = $relation->getDescription();
					$person = $relation->getPerson();
						// the key consists of the first three letters of the name + uid => unique but alphabetically sortable
					$key = substr($relation->getPerson()->getName(), 0, 3) . $relation->getPerson()->getUid();
					$relatedPersons[$function][$key] = array(0 => $person, 1 => $description);
				}
			}
				// check and collect persons related to the sources of the work, ensure uniqueness in array and collect all their functions
			if ($work->getSources()) {
				foreach ($work->getSources() as $source) {
					if ($source->getRelatedPersons()) {
						foreach ($source->getRelatedPersons() as $relation) {
							$function = $relation->getFunction();
							$description = $relation->getDescription();
							$person = $relation->getPerson();
								// the key consists of the first three letters of the name + uid => unique but alphabetically sortable
							$key = substr($relation->getPerson()->getName(), 0, 3) . $relation->getPerson()->getUid();
							$relatedPersons[$function][$key] = array(0 => $person, 1 => $description);
						}
					}
				}
			}

		} else return FALSE;

		foreach ($relatedPersons as $function => $persons) {
			if (count($relatedPersons[$function]) == 0) unset($relatedPersons[$function]);
		}

		if (count($relatedPersons) > 0) { return $relatedPersons; } else return FALSE;
	}

	/**
	 * Collects all borrowings of a work, including parts from borrowed works that are still hidden.
	 * Clones the found objects - otherwise real existing DB relations would be changed when the hidden
	 * works are set into the correlating borrowings
	 * 
	 * @param Tx_Catalogueraisonne_Domain_Model_Works $work
	 * 
	 * @return array The collected borrowing information
	 */
	public function collectBorrowings(Tx_Catalogueraisonne_Domain_Model_Works $work) {

		$borrowings = array();

		if (is_object($work)) {
			if ($work->getParts()) {
					// go through all parts
				foreach ($work->getParts() as $part) {

						// and see if there is a borrowing from, featured in or external source
					if (count($part->getBorrowedFrom()) > 0 || count($part->getFeaturedIn()) > 0 || $part->getExternalSource() != '') {

							// work with a clone - not to change existing relations
						$clonedPart = clone $part;

							// test for borrowed from
						if (count($part->getBorrowedFrom()) > 0) {

								// initialize an empty object storage that will replace the existing one for the part
							$objectStorage = $this->objectManager->get('Tx_Extbase_Persistence_ObjectStorage');

								// loop through all borrowed part objects to set the correlating (possibly still hidden) work
							foreach ($part->getBorrowedFrom() as $borrowedPart) {

									// uses the pid as criterion for finding the record - a part should always be on the same pid
								$relatedWork = $this->findByPidIncludingHidden($borrowedPart->getPid());

									// set the found work object into a clone
								$clonedFeaturedPart = clone $borrowedPart;
								$clonedFeaturedPart->setWorks($relatedWork->getFirst());
								$objectStorage->attach($clonedFeaturedPart);
							}
								// set the newly created borrowedFrom objects into the cloned part
							$clonedPart->setBorrowedFrom($objectStorage);
						}

							// test for featured in and loop through all featured part objects to set the correlating (possibly still hidden) work
						if (count($part->getFeaturedIn()) > 0) {

								// initialize an empty object storage that will replace the existing one for the part
							$objectStorage = $this->objectManager->get('Tx_Extbase_Persistence_ObjectStorage');

								// loop through all borrowed part objects to set the correlating (possibly still hidden) work
							foreach ($part->getFeaturedIn() as $featuredPart) {

									// uses the pid as criterion for finding the record - a part should always be on the same pid
								$relatedWork = $this->findByPidIncludingHidden($featuredPart->getPid());

									// set the found work object into a clone
								$clonedFeaturedPart = clone $featuredPart;
								$clonedFeaturedPart->setWorks($relatedWork->getFirst());
								$objectStorage->attach($clonedFeaturedPart);
							}

								// set the newly created featuredIn objects into the cloned part
							$clonedPart->setFeaturedIn($objectStorage);

						}

							// attach the modified clone to the borrowings container
						$borrowings[$part->getUid()] = $clonedPart;
					}
				}
			}
		} else return FALSE;

		if (count($borrowings) > 0) {return $borrowings;} else return FALSE;

	}
}
?>