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
 * Controller for the Persons object
 */
 class Tx_Catalogueraisonne_Controller_PersonsController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * personsRepository
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_PersonsRepository
	 */
	protected $personsRepository;

	/**
	 * injectPersonsRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_PersonsRepository $personsRepository
	 * @return void
	 */
	public function injectPersonsRepository(Tx_Catalogueraisonne_Domain_Repository_PersonsRepository $personsRepository) {
		$this->personsRepository = $personsRepository;
	}

	 /**
	  * Repository for works
	  *
	  * @var Tx_Catalogueraisonne_Domain_Repository_WorksRepository
	  */
	 protected $worksRepository;

	 /**
	  * Injects the works repository
	  *
	  * @param Tx_Catalogueraisonne_Domain_Repository_WorksRepository $worksRepository
	  *
	  * @return void
	  */
	 public function injectWorksRepository(Tx_Catalogueraisonne_Domain_Repository_WorksRepository $worksRepository) {
		 $this->worksRepository = $worksRepository;
	 }

	 /**
	  * sourcesRepository
	  *
	  * @var Tx_Catalogueraisonne_Domain_Repository_SourcesRepository
	  */
	 protected $sourcesRepository;

	 /**
	  * injectSourcesRepository
	  *
	  * @param Tx_Catalogueraisonne_Domain_Repository_SourcesRepository $sourcesRepository
	  * @return void
	  */
	 public function injectSourcesRepository(Tx_Catalogueraisonne_Domain_Repository_SourcesRepository $sourcesRepository) {
		 $this->sourcesRepository = $sourcesRepository;
	 }

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
	}

	/**
	 * Displays a single Person
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Persons $person
	 * @return string The rendered view
	 */
	public function showAction(Tx_Catalogueraisonne_Domain_Model_Persons $person) {
			// find related works to a person including hidden works
		$this->view->assign('relatedWorks', $this->worksRepository->findByPerson($person, TRUE));
			// find related works to a person including hidden works
		$this->view->assign('relatedSources', $this->sourcesRepository->findByPerson($person, TRUE));
			// assign the person
		$this->view->assign('person', $person);
			// arguments
		$this->view->assign('arguments', $this->request->getArguments());
	}
}
?>