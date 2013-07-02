<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Torsten Schrade <Torsten.Schrade@adwmainz.de>
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
 * Helper utility for search requests
 *
 * @package TYPO3
 * @subpackage tx_catalogueraisonne
 * @author Torsten Schrade <Torsten.Schrade@adwmainz.de>
 */

class Tx_Catalogueraisonne_Utility_Search {

	/**
	 * Splits a string into words by whitespace and other characters (,;+-<>()~); preserves quotes if flag is set
	 * 
	 * @param string $string
	 * @param boolean $preserveQuotes
	 * @return array
	 */
	public function wordSplit($string, $preserveQuotes = FALSE) {
			// break the string into words
		$wordSplit = array_unique(preg_split('/[\s\,\;\+\-\<\>\(\)\~]+/', $string, -1, PREG_SPLIT_NO_EMPTY));
			// if quotes should be preserved, do a second processing
		if ($preserveQuotes === TRUE) {
			$wordSplit = preg_split('/\G(?:"[^"]*"|\'[^\']*\'|[^"\'\s]+)*\K\s+/', implode(' ', $wordSplit), -1, PREG_SPLIT_NO_EMPTY);
		}
		return $wordSplit;
	}

	/**
	 * Amends a date string with possibly missing month/day components and ensures that the date is in the format YYYY-MM-DD
	 * 
	 * @param string $dateString
	 * @return string
	 */
	public function getFormattedDate($dateString) {
			// split into components
		$dateComponents = t3lib_div::intExplode('-', $dateString);
			// fill up year with leading zeros
		$dateComponents[0] = sprintf('%04d', $dateComponents[0]);
			// add month component if missing and/or pad with leading zeros
		if ($dateComponents[1]) {
			$dateComponents[1] = sprintf('%02d', $dateComponents[1]);
		} else {
			$dateComponents[1] = '00';
		}
			// add day component if missing or pad with leading zeros
		if ($dateComponents[2]) {
			$dateComponents[2] = sprintf('%02d', $dateComponents[2]);
		} else {
			$dateComponents[2] = '00';
		}
		return implode('-', $dateComponents);
	}

}
?>