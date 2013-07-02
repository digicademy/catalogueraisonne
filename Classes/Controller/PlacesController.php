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
 * Controller for the Places object
 */
 class Tx_Catalogueraisonne_Controller_PlacesController extends Tx_Extbase_MVC_Controller_ActionController {

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
	 * Displays a single Place
	 *
	 * @param Tx_Catalogueraisonne_Domain_Model_Places $place
	 * @return string The rendered view
	 */
	public function showAction(Tx_Catalogueraisonne_Domain_Model_Places $place) {
		$this->view->assign('place', $place);
		$this->view->assign('worksStaged', $this->worksRepository->findByPlace($place, $onProperty = 'stagingPlaces', TRUE));
		$this->view->assign('placeOfPremiere', $this->worksRepository->findByPlace($place, $onProperty = 'placeOfPremiere', TRUE));
	}

}
?>