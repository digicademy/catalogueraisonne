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
 * Controller for the Archives object
 */
 class Tx_Catalogueraisonne_Controller_ArchivesController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * archivesRepository
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_ArchivesRepository
	 */
	protected $archivesRepository;

	/**
	 * injectArchivesRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_ArchivesRepository $archivesRepository
	 * @return void
	 */
	public function injectArchivesRepository(Tx_Catalogueraisonne_Domain_Repository_ArchivesRepository $archivesRepository) {
		$this->archivesRepository = $archivesRepository;
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
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
	}

	/**
	 * Displays a single Archive
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Archives $archive
	 * @return string The rendered view
	 */
	public function showAction(Tx_Catalogueraisonne_Domain_Model_Archives $archive) {
		$this->view->assign('archive', $archive);
		$this->view->assign('relatedWorks', $this->worksRepository->findByArchive($archive, TRUE));
	}

}
?>