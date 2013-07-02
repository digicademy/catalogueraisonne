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
 * Controller for the Literature object
 */
 class Tx_Catalogueraisonne_Controller_LiteratureController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * The literature repository with all entries
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_LiteratureRepository
	 */
	protected $literatureRepository;

	/**
	 * injectLiteratureRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_LiteratureRepository $literatureRepository
	 * @return void
	 */
	public function injectLiteratureRepository(Tx_Catalogueraisonne_Domain_Repository_LiteratureRepository $literatureRepository) {
		$this->literatureRepository = $literatureRepository;
	}

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
	}

	/**
	 * Displays a search form for a simple string search
	 *
	 * @param string $searchterm
	 * @dontvalidate $searchterm
	 * 
	 * @return The rendered searchform
	 */
	public function formAction($searchterm = '') {
			// if the form is called again in the context of a search modification we retrieve the former searchterm for display in the searchbox
		if ($this->request->hasArgument('searchterm')) {
			$this->view->assign('searchterm', $searchterm);
		}
	}

	/**
	 * Displays a search result from the string search
	 * 
	 * @param string $searchterm
	 * @dontvalidate $searchterm
	 * 
	 * @return string The rendered searchresult
	 */
	public function searchAction($searchterm = '') {
			// check if a searchterm was given - if there is none the view will show a message that there were no hits
		if ($this->request->hasArgument('searchterm') && $searchterm != '') {

				// assign pagUid to produce different search views for internal and external search
			$this->view->assign('pageUid', $GLOBALS['TSFE']->id);

				// simple LIKE search on the literature repository
			$results = $this->literatureRepository->findBySearchTerm($searchterm);

				// assign the result to th view
			$this->view->assign('results', $results);

				// assign the searchterm as well
			$this->view->assign('searchterm', $searchterm);

				// assign searchwords for highlighting
			$this->view->assign('searchwords', Tx_Catalogueraisonne_Utility_Search::wordSplit($this->request->getArgument('searchterm')));
		}
	}

	/**
	 * Displays a list of all literature records
	 *
	 * @return void
	 */
	public function listAction() {
		$literatures = $this->literatureRepository->findAll();
		$this->view->assign('literatures', $literatures);
	}

	/**
	 * Displays a single literature reference
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Literature $reference the Literature to display
	 * @param string $searchterm
	 * @dontvalidate $searchterm
	 * 
	 * @return string The rendered view
	 */
	public function showAction(Tx_Catalogueraisonne_Domain_Model_Literature $reference, $searchterm = '') {
			// assign the literature object to the view
		$this->view->assign('reference', $reference);

			// if a searchterm was given asign this for get transfer
		if ($this->request->hasArgument('searchterm')) {
			$this->view->assign('searchterm', $searchterm);
		}
	}
}
?>