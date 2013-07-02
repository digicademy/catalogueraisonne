<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_catalogueraisonne_domain_model_dateranges'] = array(
	'ctrl' => $TCA['tx_catalogueraisonne_domain_model_dateranges']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,date_comment,start_date,end_date,date_key,before_after_christ,parent_record,ident'
	),
	'types' => array(
		'1' => array('showitem' => '
			--div--;LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.div1,date_comment,start_date,end_date,date_key,before_after_christ,parent_record,ident,
		')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
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
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
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
				'foreign_table' => 'tx_catalogueraisonne_domain_model_dateranges',
				'foreign_table_where' => 'AND tx_catalogueraisonne_domain_model_dateranges.uid=###REC_FIELD_l18n_parent### AND tx_catalogueraisonne_domain_model_dateranges.sys_language_uid IN (-1,0)',
			)
		),
		'l10n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'date_comment' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.date_comment',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'required,trim'
			)
		),		
		'start_date' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.start_date',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'end_date' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.end_date',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'date_key' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.date_key',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'before_after_christ' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.before_after_christ',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.before_after_christ.I.1', '1'),
					Array('LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.before_after_christ.I.2', '2'),
				),
				'eval' => 'required',
				'default' => '2',
			)
		),
		'parent_record' => array(
			'exclude' => 1,		
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.parent_record',
			'config'=>array(
				'type'=>'none'
			)
		),
		'ident' => array(
			'exclude' => 1,			
			'label'   => 'LLL:EXT:catalogueraisonne/Resources/Private/Language/locallang_db.xml:tx_catalogueraisonne_domain_model_dateranges.ident',
			'config'=>array(
				'type'=>'none'
			)
		),		
	),
);
?>