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
 * Controller for the Sources object
 */
 class Tx_Catalogueraisonne_Controller_SourcesController extends Tx_Extbase_MVC_Controller_ActionController {

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
		$this->sourcesRepository->setDefaultQuerySettings($defaultQuerySettings);
		$this->worksRepository->setDefaultQuerySettings($defaultQuerySettings);
	}

	/**
	 * Displays searchform
	 *
	 * @return string The rendered view
	 */
	public function formAction() {
		$works = array(999 => Tx_Extbase_Utility_Localization::translate('sources.searchAllWorks', 'catalogueraisonne'));
		$workObjectStorage = $this->worksRepository->findAll();
		foreach ($workObjectStorage as $work) {
			$works[$work->getPid()] = $work->getTitle();
		}
		$this->view->assign('works', $works);
//		$this->view->assign('works', $this->worksRepository->findAll());
		$this->view->assign('arguments', $this->request->getArguments());
	}

	/**
	 * Takes arguments of searchform, performs a search on the works repository and displays a result list. The result list should be
	 * group by work, but, alas!, a source doesn't know to which work/part it belongs. Therefore a little trick is used: Each work, part
	 * and source share the same pid. This common value can therefore be used by using a sorted list of pids of all non-hidden works in
	 * conjunction with the resulting pids of the sources from the query. Always the full grouped result is assigned to the view. Should there
	 * ever be the need to paginate the result, the strategy would be to just use the pids of sources as ordering property; but: in this case
	 * the pages in BE should be sorted alphabetically and the pagetitles should be *exactly* as the title of the works.
	 *
	 * @param array $pids
	 * @param integer $category
	 * @param integer $type
	 * @param integer $subtype
	 * @param integer $kind
	 * @param integer $quality
	 * @param string $sourcesTimeFrom
	 * @param string $sourcesTimeTo
	 * 
	 * @validate $sourcesTimeFrom regularExpression(regularExpression="#^[^\\\/\[\]\(\)\<\>\@\&\=\?\!\$\+]*$#")
	 * @validate $sourcesTimeTo regularExpression(regularExpression="#^[^\\\/\[\]\(\)\<\>\@\&\=\?\!\$\+]*$#")
	 * 
	 * @return void
	 */
	public function searchAction($pids=array(), $category=0, $type=0, $subtype=0, $kind=0, $quality=0, $sourcesTimeFrom='', $sourcesTimeTo='') {

		$arguments = $this->request->getArguments();
		unset($arguments['submit']);

			// only allow search if some works were selected
		if (is_array($pids)) {
				// get all works grouped by pid for grouping the sources in the repository
			$works = $this->worksRepository->findAll();
			if ($works) {
				$worksByPid = array();
				foreach ($works as $work) {
					$worksByPid[$work->getPid()]['work'] = $work->getTitle();
				}
			}
			$this->view->assign('result', $this->sourcesRepository->findBySearch($arguments, $worksByPid));
		}

		$this->view->assign('arguments', $arguments);
	}

	/**
	 * Displays a single Source
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Sources $source
	 * 
	 * @return string The rendered view
	 */
	public function showAction(Tx_Catalogueraisonne_Domain_Model_Sources $source) {
		$this->view->assign('relatedWorks', $this->worksRepository->findBySource($source));
		$this->view->assign('source', $source);
		$this->view->assign('arguments', $this->request->getArguments());
	}

}
?>