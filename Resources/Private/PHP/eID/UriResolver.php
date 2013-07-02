<?php
/*
 * Script for resolving URIs to realUrl paths
 * 
 * Valid URI example: http://www.somedomain.org/id/1-20-00-0
 * 
 * This script is called by circumventing index.php with an .htaccess rule:
 * 
 * RewriteRule ^id index.php?eID=UriResolver&REQUEST_URI=%{REQUEST_URI} [L,QSA]
 */

	// Secure access
if (!defined('PATH_typo3conf')) die('Direct access not allowed');

	// include important classes
require_once(PATH_tslib.'class.tslib_pibase.php');
require_once(PATH_t3lib.'class.t3lib_div.php');
require_once(PATH_t3lib.'class.t3lib_cs.php');

	// initialize FE User and connect DB
$feUserObj = tslib_eidtools::initFeUser();
tslib_eidtools::connectDB();

	// debug stuff
//$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = TRUE;
//debug($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery);


/*
 * STEP 1: BASICS
*/

	// get a convenient format for request to work with
$pathComponents = t3lib_div::trimExplode('/', $_GET['REQUEST_URI'], 1);


/*
 * STEP 2: file endings 
 */


if (stripos(end($pathComponents), '.')) {
		// rearange components for safe replacement
	krsort($pathComponents);
	$pathComponents = array_values($pathComponents);
		// set id without file ending
	$resourceNameAndFormat = t3lib_div::trimExplode('.', $pathComponents[0]);
	$pathComponents[0] = $resourceNameAndFormat[0];
		// requested format is now known due to file ending
	$format = $resourceNameAndFormat[1];
		// set back to original order
	krsort($pathComponents);
	$pathComponents = array_values($pathComponents);
}


/*
 * STEP 3: response format - HTTP_ACCEPT is not available via t3lib_div, use $_SERVER
*/

/*
if ($_SERVER['HTTP_ACCEPT'] || $format) {

		// make sure to get rdf request from clients beyond file endings
	if (preg_match('/application\/rdf\+xml/', $_SERVER['HTTP_ACCEPT'])) $format = 'rdf';

		// RDF request
	if ($format == 'rdf') {
		$format = '.rdf';
		// XML request
	} elseif ($format == 'xml') {
		$format = '.rdf';
		throw new exception('XML response not yet implemented', 1350155314);
		// HTML default
	} else {
		$format = '.html';
	}

} else {
	throw new exception('No information about requested response format', 1350152933);
}
*/
// no content negotiation / format supported, just html
$format = '.html';

/*
 * STEP 4: record retrival and path construction
*/


if ($pathComponents['0'] == 'id' && count($pathComponents) > 1 && count($pathComponents) < 4) {

	switch ($pathComponents['1']) {

			// person
		case 'person':
			throw new exception('Retrival of persons not yet implemented', 1350152101);
			break;

			// location
		case 'place':
			throw new exception('Retrival of places not yet implemented', 1350152108);
			break;

			// thesaurus
		case 'archive':
			throw new exception('Retrival of archives terms not yet implemented', 1350152115);
			break;

			// object; note: as more objects join the id pool, it will have to be tested to which table the submitted id belongs
		case 'id':
		default:

				// fetch record 
			$identifier = $GLOBALS['TYPO3_DB']->fullQuoteStr($pathComponents['1'],'tx_catalogueraisonne_domain_model_works');
			$record = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid, title, identifier', 'tx_catalogueraisonne_domain_model_works', 'identifier='.$identifier.' AND deleted=0 AND hidden=0');
			if (empty($record)) {
				$target = '';
				break;
			}

				// set page and target
			$target = t3lib_div::getIndpEnv('TYPO3_SITE_URL') . 'gwv/werkregister/eintrag/'. encodeTitle($record[0]['title']) . $format;

			break;
		
	}
} else {
	throw new exception('Invalid URI request submitted', 1350151844);
}


/*
 * STEP 5: redirect - either successfull or not found
*/

if ($target) {
	header('HTTP/1.1 303 See Other');
	header('Location: ' . $target);
	exit;
} else {
	header('HTTP/1.1 404 Not Found');
	header('Location: ' . t3lib_div::getIndpEnv('TYPO3_SITE_URL') . 'index.php?id=1668');
	exit;
}

/*
 * HELPER FUNCTIONS
 */

/**
 * @see class.tx_realurl_advanced.php
 * 
 * Convert a title to something that can be used in an page path:
 * - Convert spaces to underscores
 * - Convert non A-Z characters to ASCII equivalents
 * - Convert some special things like the 'ae'-character
 * - Strip off all other symbols
 * Works with the character set defined as "forceCharset"
 *
 * @param	string		Input title to clean
 * @return	string		Encoded title, passed through rawurlencode() = ready to put in the URL.
 */
function encodeTitle($title) {

	$csConvObj = t3lib_div::makeInstance('t3lib_cs');

		// Convert to lowercase:
	$processedTitle = $csConvObj->conv_case('utf-8', $title, 'toLower');

		// Strip tags
	$processedTitle = strip_tags($processedTitle);

		// Convert some special tokens to the space character
	$space = '-';
	$processedTitle = preg_replace('/[ \-+_]+/', $space, $processedTitle); // convert spaces

		// Convert extended letters to ascii equivalents
	$processedTitle = $csConvObj->specCharsToASCII($charset, $processedTitle);

		// Strip the rest
	$processedTitle = preg_replace('/[^a-zA-Z0-9' . ($space ? preg_quote($space) : '') . ']/', '', $processedTitle);

	$processedTitle = preg_replace('/\\' . $space . '{2,}/', $space, $processedTitle); // Convert multiple 'spaces' to a single one
	$processedTitle = trim($processedTitle, $space);

		// Return encoded URL:
	return rawurlencode(strtolower($processedTitle));
}
?>