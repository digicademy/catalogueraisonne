<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_catalogueraisonne_domain_model_persons'] = array(
	'ctrl' => $TCA['tx_catalogueraisonne_domain_model_persons']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, name_variants, titles, curriculum_vitae, pnd, related_works, related_sources',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, name_variants, titles, curriculum_vitae, pnd, related_works, related_sources'),
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
				'foreign_table' => 'tx_catalogueraisonne_domain_model_persons',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_persons.pid=###CURRENT_PID### AND tx_catalogueraisonne_domain_model_persons.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'name_variants' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.name_variants',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'titles' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.titles',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),			
		'curriculum_vitae' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.curriculum_vitae',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'pnd' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.pnd',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'related_works' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.related_works',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_workspersonsrelations',
				'foreign_field' => 'person',
				'foreign_label' => 'work',
				'minitems' => 0,
				'maxitems' => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
				'behaviour' => array(
					'disableMovingChildrenWithParent' => 1,
				),
			),
		),
		'related_sources' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_persons.related_sources',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_sourcespersonsrelations',
				'foreign_field' => 'person',
				'foreign_label' => 'source',
				'minitems' => 0,
				'maxitems' => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
				'behaviour' => array(
					'disableMovingChildrenWithParent' => 1,
				),				
			),
		),		
	),
);
?>