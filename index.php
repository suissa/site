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


/*
|---------------------------------------------------------------
| PHP ERROR REPORTING LEVEL
|---------------------------------------------------------------
|
| For more info visit:  http://www.php.net/error_reporting
|
*/
ob_start();
@session_start();

/*
|-------------------------------------------------------------
| OS used
|-------------------------------------------------------------
|
| win = Windows
| lin = Linux
| bsd = BSD
| osx = Mac OS X
|
*/
define("OS",		"lin");

/*
|-------------------------------------------------------------
| iGrape folders 
|-------------------------------------------------------------
*/
define("SYS",				"system");
define("APP",				"application");
define("CACHE",				"cache");
define("DS",				"/");

/*
|-------------------------------------------------------------
| In the system (CONSTANTS)
|-------------------------------------------------------------
|
| --
|
*/
define('EXT',				'.php');
define('EXTPL',				'.theme.php');
define('APPBASE',			is_dir(APP.DS)?APP.DS:"application".DS);
define('SYSBASE',			is_dir(SYS.DS)?SYS.DS:"system".DS);
define('CACHEBASE',			is_dir(CACHE.DS)?CACHE.DS:"cache".DS);	
define('CONFBASE',			APPBASE.'config'.DS);
define('MODELSBASE',		APPBASE.'models'.DS);
define('LIB',				SYSBASE.'libraries'.DS);
define('SELF',				pathinfo(__FILE__, PATHINFO_BASENAME));
define("PATH",				realpath(dirname(__FILE__)));
define('COREPATH',			LIB.'igrape'.DS);
define('COREFILE',			COREPATH.'core'.EXT);
define('SYSROOT',			PATH.DS.SYSBASE);
define('APPROOT',			PATH.DS.APPBASE);
define('CONFROOT',			APPROOT.'config'.DS);
define('COREROOT',			PATH.DS.COREPATH);
define('CGI',				TRUE);

require_once COREFILE;

new iGrape($cmd);

@ob_flush();
?>