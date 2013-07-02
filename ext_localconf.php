<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

// CONFIGURE PLUGINS
Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Literature',
	array(
		'Literature' => 'form, search, list, show',
	),
	array(
		'Literature' => 'form, search',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Works',
	array(
		'Works' => 'print',
	),
	array(
		'Works' => '',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Search',
	array(
		'Works' => 'form, search, show',
		'Sources' => 'form, search, show',
	),
	array(
		'Works' => 'form, search, show',
		'Sources' => 'form, search, show'
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Registers',
	array(
		'Registers' => 'show',
		'Works' => 'show',
		'Places' => 'show',
		'Persons' => 'show',
		'Archives' => 'show',
	),
	array(
		'Registers' => '',
		'Works' => '',
		'Places' => '',
		'Persons' => '',
		'Archives' => '',
	)
);

// URI Resolver
$TYPO3_CONF_VARS['FE']['eID_include']['UriResolver'] = 'EXT:catalogueraisonne/Resources/Private/PHP/eID/UriResolver.php';
?>