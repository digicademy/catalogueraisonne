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
 * Controller for the Registers
 */
 class Tx_Catalogueraisonne_Controller_RegistersController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * worksRepository
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_WorksRepository
	 */
	protected $worksRepository;

	/**
	 * injectWorksRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_WorksRepository $worksRepository
	 * @return void
	 */
	public function injectWorksRepository(Tx_Catalogueraisonne_Domain_Repository_WorksRepository $worksRepository) {
		$this->worksRepository = $worksRepository;
	}

	/**
	 * placesRepository
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_PlacesRepository
	 */
	protected $placesRepository;

	/**
	 * injectPlacesRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_PlacesRepository $placesRepository
	 * @return void
	 */
	public function injectPlacesRepository(Tx_Catalogueraisonne_Domain_Repository_PlacesRepository $placesRepository) {
		$this->placesRepository = $placesRepository;
	}

	/**
	 * personsRepository
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_PersonsRepository
	 */
	protected $personsRepository;

	/**
	 * injectpersonsRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_PersonsRepository $personsRepository
	 * @return void
	 */
	public function injectPersonsRepository(Tx_Catalogueraisonne_Domain_Repository_PersonsRepository $personsRepository) {
		$this->personsRepository = $personsRepository;
	}

	/**
	 * archivesRepository
	 *
	 * @var Tx_Catalogueraisonne_Domain_Repository_ArchivesRepository
	 */
	protected $archivesRepository;

	/**
	 * injectarchivesRepository
	 *
	 * @param Tx_Catalogueraisonne_Domain_Repository_ArchivesRepository $archivesRepository
	 * @return void
	 */
	public function injectArchivesRepository(Tx_Catalogueraisonne_Domain_Repository_ArchivesRepository $archivesRepository) {
		$this->archivesRepository = $archivesRepository;
	}

	/**
	 * Fetches and displays objects for the current register depending on settings in the plugin flexform
	 */
	public function showAction() {

		$arguments = $this->request->getArguments();

		switch ($this->settings['mode']) {
			case 10:
				(is_array($arguments['filters'])) ? $entries = $this->worksRepository->findByFilters($this->settings, $arguments['filters']) : $entries = $this->worksRepository->findAll($this->settings);
				break;
			case 20:
				(is_array($arguments['filters'])) ? $entries = $this->placesRepository->findByFilters($this->settings, $arguments['filters']) : $entries = $this->placesRepository->findAll($this->settings);
				break;
			case 30:
				(is_array($arguments['filters'])) ? $entries = $this->personsRepository->findByFilters($this->settings, $arguments['filters']) : $entries = $this->personsRepository->findAll($this->settings);
				break;
			case 40:
				(is_array($arguments['filters'])) ? $entries = $this->archivesRepository->findByFilters($this->settings, $arguments['filters']) : $entries = $this->archivesRepository->findAll($this->settings);
				break;
		}
		$this->view->assign('entries', $entries);
	}
}
?>