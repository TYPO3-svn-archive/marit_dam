<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');




$TCA['tx_maritdam_domain_model_dam'] = array(
	'ctrl' => $TCA['tx_maritdam_domain_model_dam']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'media_type,title,index_type,file_mime_type,file_mime_subtype,file_type,file_type_version,file_name,file_path,file_size,file_mtime,file_inode,file_ctime,file_hash,file_status,file_orig_location,file_orig_loc_desc,file_creator,file_dl_name,file_usage,meta,ident,creator,keywords,description,alt_text,caption,abstract,search_content,language,pages,publisher,copyright,instructions,date_cr,date_mod,loc_desc,loc_country,loc_city,hres,vres,hpixels,vpixels,color_space,width,height,height_unit,category'
	),
	'types' => array(
		'1' => array('showitem' => 'media_type,title,index_type,file_mime_type,file_mime_subtype,file_type,file_type_version,file_name,file_path,file_size,file_mtime,file_inode,file_ctime,file_hash,file_status,file_orig_location,file_orig_loc_desc,file_creator,file_dl_name,file_usage,meta,ident,creator,keywords,description,alt_text,caption,abstract,search_content,language,pages,publisher,copyright,instructions,date_cr,date_mod,loc_desc,loc_country,loc_city,hres,vres,hpixels,vpixels,color_space,width,height,height_unit,category')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
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
		
		'media_type' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.media_type',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'index_type' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.index_type',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_mime_type' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_mime_type',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_mime_subtype' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_mime_subtype',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_type' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_type',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_type_version' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_type_version',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_path' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_path',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_size' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_size',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_mtime' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_mtime',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_inode' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_inode',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_ctime' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_ctime',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_hash' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_hash',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_status' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_status',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_orig_location' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_orig_location',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_orig_loc_desc' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_orig_loc_desc',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_creator' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_creator',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_dl_name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_dl_name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'file_usage' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.file_usage',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'meta' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.meta',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'ident' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.ident',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'creator' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.creator',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'keywords' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.keywords',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.description',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'alt_text' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.alt_text',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'caption' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.caption',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'abstract' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.abstract',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'search_content' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.search_content',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'language' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.language',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'pages' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.pages',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'publisher' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.publisher',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'copyright' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.copyright',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'instructions' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.instructions',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'date_cr' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.date_cr',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'date_mod' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.date_mod',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'loc_desc' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.loc_desc',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'loc_country' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.loc_country',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'loc_city' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.loc_city',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'hres' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.hres',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			)
		),
		
		'vres' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.vres',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			)
		),
		
		'hpixels' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.hpixels',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			)
		),
		
		'vpixels' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.vpixels',
			'config'  => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			)
		),
		
		'color_space' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.color_space',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'width' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.width',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2,required'
			)
		),
		
		'height' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.height',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2,required'
			)
		),
		
		'height_unit' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.height_unit',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'category' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_dam.category',
			'config'  => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'foreign_table' => 'tx_maritdam_domain_model_category',
				'MM' => 'tx_maritdam_dam_category_mm',
			)
		),
		
		
	),
);

$TCA['tx_maritdam_domain_model_category'] = array(
	'ctrl' => $TCA['tx_maritdam_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title,nav_title,subtitle,keywords,description,parent_id'
	),
	'types' => array(
		'1' => array('showitem' => 'title,nav_title,subtitle,keywords,description,parent_id')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(

		'sys_language_uid' => array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)', // TODO
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array (
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
		
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_category.title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'nav_title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_category.nav_title',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'subtitle' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_category.subtitle',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'keywords' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_category.keywords',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'description' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_category.description',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		
		'parent_id' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:marit_dam/Resources/Private/Language/locallang_db.xml:tx_maritdam_domain_model_category.parent_id',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_maritdam_domain_model_category',
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		
		
	),
);

?>