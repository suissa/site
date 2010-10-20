<?php
/**
 * iGrape Framework
 *
 * @category	iGrape
 * @author		iGrape Dev Team
 * @copyright	Copyright (c) 2007-2010 iGrape Framework. (http://www.igrape.org)
 * @license		LICENSE New BSD License
 * @version		0.2.2
 *
 */

	/**
	* ---------------------------------------------------------------
	*	Variables global application
	* ---------------------------------------------------------------
	*/
	global $conf;
	$conf['base_url'] 			= "http://localhost/igsite/php/";
	$conf['index_controllers']	= "run";
	$conf['index_function']		= "index";
	$conf['index_page']			= $conf['index_controllers'].DS.$conf['index_function'];
	$conf['language']			= "english";
	$conf['lang'] 				= "en";
	$conf['charset'] 			= "UTF-8";
	$conf['time_limit']			= 0; # The maximum execution time, in seconds. If set to zero, no time limit is imposed.
	$conf['time_now']			= date("H:i:s");
	$conf['date_now']			= date("Y-m-d");
	$conf['d_all_now']			= $conf['date_now']." ".$conf['time_now'];
	$conf['user_abort']			= TRUE;
	$conf['logout_tringger']	= "logout";
	
	/**
	* ---------------------------------------------------------------
	*	Functions CLEAN
	* ---------------------------------------------------------------
	*/
	$conf['ig_developer']	= TRUE;
	$conf['ig_parser']		= FALSE;
	$conf['friendly_url']	= TRUE;
	$conf['phpburn']		= TRUE;
	$conf['phpburn_debug']	= TRUE;
	
?>