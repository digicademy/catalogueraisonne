<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Torsten Schrade <Torsten.Schrade@adwmainz.de>
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 *
 * @author Torsten Schrade
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @package dabase
 */

class Tx_Catalogueraisonne_ViewHelpers_LeafletViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * {0 : {0 : {coordinates : 'x,y'}}, 1 : objectStorage}
	 * 
	 * @param array $objects
	 * @param string $coordinatesProperty
	 * @param string $setView
	 * @param integer $zoom
	 * @param integer $mapHeight
	 * 
	 * @return void
	 */
	public function render($objects, $coordinatesProperty, $setView = '50.0,14.0', $zoom = 10, $mapHeight = 400) {

		$content = '
			<div id="map" style="height : '.$mapHeight.'px;"></div>
			<script type="text/javascript">
				var map = L.map(\'map\').setView(['.$setView.'], '.$zoom.');
		';
		foreach ($objects as $object) {
			foreach ($object as $subobjects) {
				if (is_object($subobjects)) {
					$getCoordinates = 'get' . ucfirst($coordinatesProperty);
					$content .= '
					L.marker(['.$subobjects->$getCoordinates().']).addTo(map);
					';
				} else {
					$content .= '
					L.marker(['.$subobjects[$coordinatesProperty].']).addTo(map);
					';
				}
			}
		}
		$content .= '
				L.tileLayer(\'http://{s}.tile.osm.org/{z}/{x}/{y}.png\', {
				attribution: \'&copy; <a href=\"http://osm.org/copyright\">OpenStreetMap</a> contributors\'
				}).addTo(map);
			</script>
		';

		return $content;
	}
}
?>