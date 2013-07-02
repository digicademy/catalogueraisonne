<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Torsten Schrade <schradt@uni-mainz.de>
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
 * @see: http://simplehtmldom.sourceforge.net/manual.htm
 * @see also: http://stackoverflow.com/questions/8564578/php-search-text-highlight-function
 * @see also: http://stackoverflow.com/questions/8193327/ignore-html-tags-in-preg-replace/8193700#8193700
 */

class Tx_Catalogueraisonne_ViewHelpers_HighlightViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Highlights terms (case insensitive) in the given HTML fragment using the Simple HTML DOM Library.
	 * Supports phrases ("my term") and word truncations (ter*). Truncations may only occur at the end of
	 * each term, any occurences at the beginning or in the middle of a term will be skipped.
	 *
	 * 
	 * @param array $terms
	 * @param string $class
	 * @param string $tag
	 * 
	 * @return string The content with the highlighted terms
	 */
	public function render($terms = array(), $class = 'term', $tag = 'span') {

			// first get complete HTML content by rendering the children
		$content = $this->renderChildren();

			// if terms were given
		if (count($terms) > 0) {

				// initialize HTML DOM parser
			$htmlFragment = t3lib_div::makeInstance('simple_html_dom');

			if ($htmlFragment instanceof simple_html_dom) {

					// read $current content into DOM
				$htmlFragment = str_get_html($content);

					// search the text nodes for the terms
				foreach($htmlFragment->find('text') as $textnode) {

					foreach ($terms as $term) {
							// fully remove quotes
						$term = str_ireplace('"', '', $term);
							// if term contains a wildcard/truncation at it's end match with ignoring the word endings
						if (substr($term, -1) == '*') {
							$term = str_ireplace('*', '', $term);
							$textnode->innertext = preg_replace('/(\b' . preg_quote($term) . '.*?\b)/i', '<' . htmlspecialchars($tag) . ' class="' . htmlspecialchars($class) . '">$1</' . htmlspecialchars($tag) . '>', $textnode->innertext);
							// match terms (case insensitive)
						} else {
							$textnode->innertext = preg_replace('/(\b' . preg_quote($term) . '\b)/i', '<' . htmlspecialchars($tag) . ' class="' . htmlspecialchars($class) . '">$1</' . htmlspecialchars($tag) . '>', $textnode->innertext);
						}
					}

				}
					// write DOM object back to string
				$content = $htmlFragment->save();

			} else {
				throw new t3lib_exception('Simple HTML DOM Library could not be instantiated', 1364804201);
			}
		}

		return $content;
	}
}
?>