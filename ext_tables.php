<?php
if (!defined ('TYPO3_MODE')){
	die ('Access denied.');
}

// CONFIGURE PLUGINS
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Literature',
	'Catalogue Raisonné: Literature Search and Display'
);

// CONFIGURE PLUGINS
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Works',
	'Catalogue Raisonné: Works'
);

// CONFIGURE PLUGINS
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Search',
	'Catalogue Raisonné: Search'
);

// CONFIGURE PLUGINS
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Registers',
	'Catalogue Raisonné: Registers'
);

// ADD FLEXFORM FOR REGISTERS PLUGIN
$TCA['tt_content']['types']['list']['subtypes_addlist']['catalogueraisonne_registers'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue('catalogueraisonne_registers', 'FILE:EXT:'.$_EXTKEY.'/Configuration/Flexforms/RegistersPlugin.xml');

// ADD FLEXFORM FOR SEARCH PLUGIN
$TCA['tt_content']['types']['list']['subtypes_addlist']['catalogueraisonne_search'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue('catalogueraisonne_search', 'FILE:EXT:'.$_EXTKEY.'/Configuration/Flexforms/SearchPlugin.xml');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Catalogue Raisonné');

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_works', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_works.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_works');
$TCA['tx_catalogueraisonne_domain_model_works'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_works',
		'label' 			=> 'title',
		'default_sortby'	=> 'ORDER BY title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Works.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_works.gif',
		'searchFields'		=> 'title'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_persons', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_persons.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_persons');
$TCA['tx_catalogueraisonne_domain_model_persons'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons',
		'label' 			=> 'name',
		'default_sortby'	=> 'ORDER BY name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Persons.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_persons.gif',
		'searchFields'		=> 'name,name_variants'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_parts', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_parts.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_parts');
$TCA['tx_catalogueraisonne_domain_model_parts'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts',
		'label' 			=> 'works',
		'label_alt' 		=> 'title',
		'label_alt_force'	=> 1,
		'default_sortby'	=> 'ORDER BY act,scene,title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Parts.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_parts.gif',
		'searchFields'		=> 'title'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_places', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_places.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_places');
$TCA['tx_catalogueraisonne_domain_model_places'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_places',
		'label' 			=> 'name',
		'label_alt' 		=> 'locality',
		'label_alt_force'	=> 1,
		'default_sortby'	=> 'ORDER BY name, locality',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Places.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_places.gif',
		'searchFields'		=> 'name,locality'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_dateranges', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_dateranges.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_dateranges');
$TCA['tx_catalogueraisonne_domain_model_dateranges'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges',
		'label' 			=> 'date_comment',
#		'label_alt' 		=> 'start_date,end_date',
#		'label_alt_force'	=> 1,
		'default_sortby'	=> 'ORDER BY uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/DateRanges.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_dateranges.gif',
		'searchFields'		=> 'date_comment'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_sourcespersonsrelations', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_tx_catalogueraisonne_domain_model_sourcespersonsrelations.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_sourcespersonsrelations');
$TCA['tx_catalogueraisonne_domain_model_sourcespersonsrelations'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sourcespersonsrelations',
		'label' 			=> 'person',
		'label_alt' 		=> 'function',
		'label_alt_force'	=> 1,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'default_sortby'	=> 'ORDER BY function',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/SourcesPersonsRelations.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_relations.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_workspersonsrelations', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_workspersonsrelations.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_workspersonsrelations');
$TCA['tx_catalogueraisonne_domain_model_workspersonsrelations'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_workspersonsrelations',
		'label' 			=> 'person',
		'label_alt' 		=> 'function',
		'label_alt_force'	=> 1,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'default_sortby'	=> 'ORDER BY function',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/WorksPersonsRelations.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_relations.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_sources', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_sources.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_sources');
$TCA['tx_catalogueraisonne_domain_model_sources'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources',
		'label' 			=> 'signature',
		'default_sortby'	=> 'ORDER BY signature',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Sources.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_sources.gif',
		'searchFields'		=> 'signature'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_archives', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_archives.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_archives');
$TCA['tx_catalogueraisonne_domain_model_archives'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_archives',
		'label' 			=> 'name',
		'dividers2tabs' 	=> true,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'default_sortby' 	=> 'ORDER BY name',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Archives.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_archives.gif',
		'searchFields'		=> 'name'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_incipits', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_incipits.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_incipits');
$TCA['tx_catalogueraisonne_domain_model_incipits'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_incipits',
		'label' 			=> 'instrumentation',
		'default_sortby'	=> 'ORDER BY parts',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Incipits.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_incipits.gif',
		'searchFields'		=> 'instrumentation'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_catalogueraisonne_domain_model_literature', 'EXT:catalogueraisonne/Resources/Private/Language/locallang_csh_tx_catalogueraisonne_domain_model_literature.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_catalogueraisonne_domain_model_literature');
$TCA['tx_catalogueraisonne_domain_model_literature'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_literature',
		'label' 			=> 'aut',
		'label_alt' 		=> 'titel',
		'label_alt_force'	=> 1,
		'dividers2tabs' 	=> true,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'cruser_id' 		=> 'cruser_id',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'default_sortby' 	=> 'ORDER BY aut, titel',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Literature.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_catalogueraisonne_domain_model_literature.gif',
		'searchFields'		=> 'aut,titel,ar,series,ort,jahr,cod,qn,bib'
	)
);

?>
