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
 * Controller for the works object
 */
 class Tx_Catalogueraisonne_Controller_WorksController extends Tx_Extbase_MVC_Controller_ActionController {

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
	 * Initializes default query settings for the works repository: don't use storage page
	 *
	 * @return void
	 */
	public function initializeAction() {
		$defaultQuerySettings = $this->objectManager->get('Tx_Extbase_Persistence_QuerySettingsInterface');
		$defaultQuerySettings->setRespectStoragePage(FALSE);
		$this->worksRepository->setDefaultQuerySettings($defaultQuerySettings);
	}

	/**
	 * Displays a single work in the context of a search query or a register
	 * 
	 * @param Tx_Catalogueraisonne_Domain_Model_Works $work
	 * 
	 * @return string The rendered view
	 */
	public function showAction(Tx_Catalogueraisonne_Domain_Model_Works $work) {
		if (is_object($work)) {
			$sources = $this->worksRepository->collectAllSources($work);
			$relatedPersons = $this->worksRepository->collectRelatedPersons($work);
			$borrowings = $this->worksRepository->collectBorrowings($work);
			$this->view->assign('work', $work);
			$this->view->assign('sources', $sources);
			$this->view->assign('borrowings', $borrowings);
			$this->view->assign('relatedPersons', $relatedPersons);
			$this->view->assign('arguments', $this->request->getArguments());
			if ($this->request->hasArgument('searchterm')) {
				$this->view->assign('searchwords', Tx_Catalogueraisonne_Utility_Search::wordSplit($this->request->getArgument('searchterm')));
			}
		}
	}

	/**
	 * Displays a single work with all fields for printout
	 * 
	 * @return string The rendered view
	 */
	public function printAction() {

		$result = $this->worksRepository->findByPid($GLOBALS['TSFE']->id);
		$work = $result->getFirst();

		if (is_object($work)) {
			$sources = $this->worksRepository->collectAllSources($work);
			$relatedPersons = $this->worksRepository->collectRelatedPersons($work);
			$borrowings = $this->worksRepository->collectBorrowings($work);

			$this->view->assign('work', $work);
			$this->view->assign('sources', $sources);
			$this->view->assign('borrowings', $borrowings);
			$this->view->assign('relatedPersons', $relatedPersons);
		}
	}

	/**
	 * Displays searchform
	 * 
	 * @return string The rendered view
	 */
	public function formAction() {
		$this->view->assign('data', $this->request->getContentObjectData());
		$this->view->assign('arguments', $this->request->getArguments());
	}

	/**
	 * Takes arguments of searchform, performs a search on the works repository and displays a result list
	 * 
	 * @param string $searchterm
	 * @param integer $worktype
	 * @param integer $originalLanguage
	 * @param integer $authenticity
	 * @param string $worksTimeFrom
	 * @param string $worksTimeTo
	 * 
	 * @validate $searchterm regularExpression(regularExpression="#^[^\\\/\[\]\(\)\<\>\@\&\=\?\!\$\+]*$#")
	 * @validate $worksTimeFrom regularExpression(regularExpression="#^[^\\\/\[\]\(\)\<\>\@\&\=\?\!\$\+]*$#")
	 * @validate $worksTimeTo regularExpression(regularExpression="#^[^\\\/\[\]\(\)\<\>\@\&\=\?\!\$\+]*$#")
	 * 
	 * @return void
	 */
	public function searchAction($searchterm='', $worktype=0, $originalLanguage=0, $authenticity=0, $worksTimeFrom='', $worksTimeTo='') {

		$arguments = $this->request->getArguments();
		unset($arguments['submit']);

		$this->view->assign('result', $this->worksRepository->findBySearch($arguments));
		$this->view->assign('arguments', $arguments);
		if ($searchterm) {
			$this->view->assign('searchwords', Tx_Catalogueraisonne_Utility_Search::wordSplit($searchterm));
		}
	}
}
?>