<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_catalogueraisonne_domain_model_places'] = array(
	'ctrl' => $TCA['tx_catalogueraisonne_domain_model_places']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, name_variants, country, coordinates, locality',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, name_variants, locality, country, coordinates'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_catalogueraisonne_domain_model_places',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_places.pid=###CURRENT_PID### AND tx_catalogueraisonne_domain_model_places.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' =>array(
				'type' =>'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
			'type' => 'input',
			'size' => '30',
			'max' => '255',
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => '10',
				'max' => '20',
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => '0',
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => '8',
				'max' => '20',
				'eval' => 'datetime',
				'checkbox' => '0',
				'default' => '0',
				'range' => array(
					'upper' => mktime(0, 0, 0, 12, 31, date('Y') + 10),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				),
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_places.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'name_variants' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_places.name_variants',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'locality' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_places.locality',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'country' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_places.country',
			'displayCond' => 'EXT:static_info_tables:LOADED:true',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('',0),
				),
				'itemsProcFunc' => 'tx_staticinfotables_div->selectItemsTCA',
				'itemsProcFunc_config' => array (
					'table' => 'static_countries',
					'indexField' => 'uid',
					'prependHotlist' => 1,
					'hotlistLimit' => 5,
					'hotlistApp' => 'tx_cal',
				),
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'coordinates' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_places.coordinates',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'edit' => Array(
						'type' => 'popup',
						'title' => 'GEO Selector',
						'icon' => 'EXT:ql_googlemap_selector/geo_popup.gif',
						'JSopenParams' => 'height=600,width=800,status=0,menubar=0,scrollbars=1',
						'script' => 'EXT:ql_googlemap_selector/geo_selector.php',
					),
				),
			),
		),
	),
);
?>