<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_catalogueraisonne_domain_model_archives'] = array(
	'ctrl' => $TCA['tx_catalogueraisonne_domain_model_archives']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, description, place_of_archive, country, coordinates',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, description, place_of_archive, country, coordinates'),
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
				'foreign_table' => 'tx_catalogueraisonne_domain_model_archives',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_archives.pid=###CURRENT_PID### AND tx_catalogueraisonne_domain_model_archives.sys_language_uid IN (-1,0)',
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
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_archives.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_archives.description',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'place_of_archive' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_archives.place_of_archive',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_places',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_places.pid=1653 ORDER BY name',
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 0,
					'edit' => array(
						'type' => 'popup',
						'title' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_tca_wizards.edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=750,width=960,status=0,menubar=0,scrollbars=1',
					),
				),
			),
		),
		'country' => Array (
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_archives.country',
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
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_archives.coordinates',
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
)
;
?>