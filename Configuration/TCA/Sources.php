<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_catalogueraisonne_domain_model_sources'] = array(
	'ctrl' => $TCA['tx_catalogueraisonne_domain_model_sources']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, archive, other_archives, signature, category, type, subtype, kind, quality, date_range, related_persons, related_works, related_parts, description, external_references',
	),
	'types' => array(
		'1' => array('showitem' => '
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.div1, hidden, signature, date_range, archive, other_archives, category, type, subtype, kind, quality, description;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_catalogueraisonne/],
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.div2, related_persons,
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.div3, external_references;;;richtext[cut|copy|paste|formatblock|textcolor|bold|italic|underline|left|center|right|orderedlist|unorderedlist|outdent|indent|link|table|image|line|chMode]:rte_transform[mode=ts_css|imgpath=uploads/tx_catalogueraisonne/],
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.div4, related_works, related_parts
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
				'foreign_table' => 'tx_catalogueraisonne_domain_model_sources',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_sources.pid=###CURRENT_PID### AND tx_catalogueraisonne_domain_model_sources.sys_language_uid IN (-1,0)',
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
		'archive' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.archive',
			'config'  => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_catalogueraisonne_domain_model_archives',
				'foreign_table_where' => 'ORDER BY tx_catalogueraisonne_domain_model_archives.name',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'edit' => Array(
						'type' => 'popup',
						'title' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_tca_wizards.edit',
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=750,width=960,status=0,menubar=0,scrollbars=1',
						'popup_onlyOpenIfSelected' => 1,
						'script' => 'wizard_edit.php',
					),
				),
			)
		),
		'other_archives' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.other_archives',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_archives',
				'foreign_table_where' => 'ORDER BY name',
				'MM' => 'tx_catalogueraisonne_sources_archives_mm',
				'size' => 5,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
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
		'signature' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.signature',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'date_range' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.date_range',
			'config' => array(
				'type' => 'inline',
				'foreign_field' => 'parent_record',
				'foreign_table_field' => 'ident',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_dateranges',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1,
					'newRecordLinkPosition' => 'bottom',
				),
				'behaviour' => array(
					'disableMovingChildrenWithParent' => 1,
				),
			),
		),
		'related_persons' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.related_persons',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_sourcespersonsrelations',
				'foreign_field' => 'source',
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
		'related_works' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.related_works',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_works',
				'foreign_table_where' => 'ORDER BY title',
				'MM' => 'tx_catalogueraisonne_works_sources_mm',
				'MM_opposite_field' => 'uid_local',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999
			),
		),
		'related_parts' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.related_parts',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_catalogueraisonne_domain_model_parts',
				'foreign_table_where' => 'ORDER BY works',
				'MM' => 'tx_catalogueraisonne_parts_sources_mm',
				'MM_opposite_field' => 'uid_local',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999
			),
		),
		'category' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.category',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.category.I.1', '1'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.category.I.2', '2'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.type.I.1', '1'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.type.I.2', '2'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'subtype' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.0', '0'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.10', '10'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.20', '20'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.30', '30'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.40', '40'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.50', '50'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.subtype.I.60', '60'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'kind' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.0', '0'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.10', '10'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.20', '20'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.30', '30'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.40', '40'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.50', '50'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.60', '60'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.70', '70'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.80', '80'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.kind.I.90', '90'),

				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'quality' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.quality',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.quality.I.1', '1'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.quality.I.2', '2'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.quality.I.3', '3'),
					array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.quality.I.4', '4'),
				),
				'size' => 1,
				'maxitems' => 1,
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'external_references' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_sources.external_references',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
	),
);
?>
