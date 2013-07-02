<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_catalogueraisonne_domain_model_parts'] = array(
	'ctrl' => $TCA['tx_catalogueraisonne_domain_model_parts']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, act, scene, title, incipits, borrowed_from, featured_in, sources, external_source, borrowing_information',
	),
	'types' => array(
		'1' => array('showitem' => '
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.div1, hidden, works, act, scene, title, borrowed_from, featured_in, borrowing_information, external_source,
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.div2, incipits,
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.div3, sources
		'),
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
				'foreign_table' => 'tx_catalogueraisonne_domain_model_parts',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_parts.pid=###CURRENT_PID### AND tx_catalogueraisonne_domain_model_parts.sys_language_uid IN (-1,0)',
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
		'act' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.act',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.act.I.0', '0'),
					array('I.', '1'),
					array('II.', '2'),
					array('III.', '3'),
					array('IV.', '4'),
					array('V.', '5'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'scene' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.scene',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.scene.I.0', '0'),
					array('1', '1'),
					array('2', '2'),
					array('3', '3'),
					array('4', '4'),
					array('5', '5'),
					array('6', '6'),
					array('7', '7'),
					array('8', '8'),
					array('9', '9'),
					array('10', '10'),
					array('11', '11'),
					array('12', '12'),
					array('13', '13'),
					array('14', '14'),
					array('15', '15'),
					array('16', '16'),
					array('17', '17'),
					array('18', '18'),
					array('19', '19'),
					array('20', '20'),
					array('21', '21'),
					array('22', '22'),
					array('23', '23'),
					array('24', '24'),
					array('25', '25'),
					array('26', '26'),
					array('27', '27'),
					array('28', '28'),
					array('29', '29'),
					array('30', '30'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.scene.I.99', '99'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'incipits' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.incipits',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_incipits',
				'foreign_field' => 'parts',
				'foreign_sortby' => 'sorting',		
				'maxitems'      => 9999,
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
		'borrowed_from' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.borrowed_from',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_parts',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_parts.uid != ###THIS_UID### ORDER BY works, title',
				'MM' => 'tx_catalogueraisonne_parts_parts_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'suggest' => Array(
						'type' => 'suggest',
						'title' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_tca_wizards.suggest',
					),
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
		'featured_in' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.featured_in',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_parts',
				'foreign_table_where' => 'ORDER BY works, title',
				'MM' => 'tx_catalogueraisonne_parts_parts_mm',
				'MM_opposite_field' => 'borrowed_from',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'readOnly' => 1,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'suggest' => Array(
						'type' => 'suggest',
						'title' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_tca_wizards.suggest',					
					),
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
		'sources' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.sources',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_sources',
				'foreign_table_where' => 'ORDER BY signature',		
				'MM' => 'tx_catalogueraisonne_parts_sources_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'suggest' => Array(
						'type' => 'suggest',
						'title' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_tca_wizards.suggest',					
					),
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
		'works' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.works',		
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_works',
				'minitems' => 0,
				'maxitems' => 1,
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.works.I.0', '0'),					
				),		
			),
		),
		'external_source' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.external_source',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'borrowing_information' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_parts.borrowing_information',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'sorting' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),		
	),
);
?>