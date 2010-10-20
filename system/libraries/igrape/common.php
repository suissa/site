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
 * ---------------------------------------------------------------
 *
 * System Front Controller
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @subpackage	common
 * @category	Front-controller
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 */

/**
 * Auto loads a file from system/libraries/
 * @return
 */

include CONFBASE.'_conf'.EXT;
if(!isset($conf)) exit("You must configure the file _conf".EXT);

function __autoload($class) {
	if(file_exists(LIB.$class.EXT))
	{
		require LIB.$class.EXT;
	}else
	{
		$dir = dir(LIB);
		while (false !== ($entry=$dir->read())) {
			if(($entry!="." && $entry!=".." && $entry!="igrape") && $entry == $class)
			{
				if(file_exists(LIB.$class.DS.$class.EXT))
					require LIB.$class.DS.$class.EXT;
				else
				{
					iGrape::invalidModel();
					exit;
				}
			}
		}
		$dir->close();
	}
}

/**
 * Loads a file from system/libraries/
 * @return
 */
function load($class)
{
	static $objects			= array();
	static $_class			= array();
	static $count			= NULL;
	$path					= NULL;
	
	if(isset($objects[$class]))
		return $objects[$class];
	else
		$objects[$class] = $class;
	
	$_class					= explode(".",$class);
	$count					= count($_class)-1;
	foreach($_class AS $n=>$value)
	{
		if($count!=$n)
			$path .= $value.DS;
	}
	
	if($path)
	{
		if(file_exists(LIB.$path.$_class[$count].EXT))
		{
			include LIB.$path.$_class[$count].EXT;
			if(class_exists($_class[$count]))
				return new $_class[$count];
			else
				return $objects[$class];
		}
		else
			exit("Error load file/class [".$class."], please check documentation.");
	}else
	{
		if(file_exists(LIB.$_class[$count].EXT))
		{
			include LIB.$_class[$count].EXT;
			if(class_exists($_class[$count]))
				return new $_class[$count];
			else
				return $objects[$class];
		}else
			exit("Error load class [".$class."], please check documentation.");
	}
}

/**
 * Debug is array
 * @param $array The array for debug
 * @param $type The type for debug
 */
function debug($array, $type="text")
{
	echo $type=="text" ? "" : "<pre>";
	switch($type) {
		case "array":
			print_r($array);
			break;
		case "json":
			print_r(json($array,"encode"));
			break;
		case "text":
			print_r($array);
			break;
	}
	echo $type=="text" ? "\n" : "</pre>";
}

/**
 * Loads a element from application/views/_elements/
 * @param Element
 * @param Var constant
 * @param Folder (Path)
 */
function load_element($file,$_this=NULL,$path=NULL)
{
	if(is_file(APPBASE."views".DS."_elements".DS.$path.DS.$file.EXT))
	{
		include APPBASE."views".DS."_elements".DS.$path.DS.$file.EXT;
	}else
	{
		include APPBASE."views".DS."_elements".DS.$file.EXT;
	}
	
	return false;
}

/**
 * Display error
 * @param $text The error display
**/
function error($text)
{
	$_SESSION["iGrape"]["error"]=NULL;
	echo "<pre style='color: #FFF; background: #C00'> <b>ERROR</b> :: ".$text."</pre>";
	$_SESSION["iGrape"]["error"] = 1;
}

/**
 * Return the right url for the controller/action passed
 * @return
 * @param $to URL to go to, in the "controller/action/parameters" form
 */
function url($to)
{
	if($to == '/') $to = '';
	return WEBROOT.SCRIPT_NAME.$to;
}

/**
 * Reads or writes to the session
 * @return
 * @param $name The name of the variable
 * @param $value [optional] Value for the variable, if empty returns the variable's value
 * @param $id [optional] Value for the variable, if empty returns the variable's ie
 */
function session($name,$value=null,$id=null)
{
	if($value === null)
	{
		if(isset($_SESSION[$name]))
			return $_SESSION[$name];
		else
			return null;
	}else
	{
		if($id === null)
			$_SESSION[$name] = $value;
		else
		{
			foreach($id AS $_id)
			{
				$__id = "";
			}
			$_SESSION[$name][$id] = $value;
		}
	}
}

/**
 * Return the right json
 * @return
 * @param $type The type json (encode/decode)
 * @param $json The json for process
 */
function json($json,$type)
{
	switch($type){
		case "encode":
			$_json = json_encode($json);
			break;
		case "decode":
			$_json = json_decode($json);
			break;
		case "error":
			foreach($json as $string){
				$_json = 'Decoding: ' . $string;
				json_decode($string);
				switch(json_last_error())
				{
					case JSON_ERROR_DEPTH:
						$_json .= ' - Maximum stack depth exceeded';
						break;
					case JSON_ERROR_CTRL_CHAR:
						$_json .= ' - Unexpected control character found';
						break;
					case JSON_ERROR_SYNTAX:
 						$_json .= ' - Syntax error, malformed JSON';
						break;
					case JSON_ERROR_NONE:
 						$_json .= ' - No errors';
						break;
				}
				$_json .= PHP_EOL;
			}
			break;
	}
	return @$_json;
}

/**
 * Return the right obj/array/json
 * @return
 * @param $str String that will come
 * @param $type Way that will return
 */
function toConvert($str,$type)
{
	switch($type){
		case "obj":
			$object = new stdClass();
			if (is_array($str) && count($str) > 0) {
				foreach ($str as $name=>$value) {
					$name = strtolower(trim($name));
					if (!empty($name)) {
						$object->$name = $str;
					}
				}
			}
			return $object;
			break;
		case "array":
			$str = array();
			if (is_object($object)) {
				$str = get_object_vars($object);
			}
			return $str;
			break;
	}
}

/**
 * Redirects the user to another controller/action
 * @return
 * @param $to URL to go to, in the "controller/action/parameters" form
 * @param $meta Is meta or header
 * @param $timer Is time refresh
 */
function redirect($to,$meta=NULL,$timer=0)
{
	if(!$meta)
		header('Location: '.url($to));
	else
	{
		exit("<meta http-equiv=\"refresh\" content=\"".$timer.";url=".$to."\">");
	}
}

/**
 * Redirects the user to another controller/action
 * @return
 * @param $to URL to go to, in the "controller/action/parameters" form
 */
function nocache()
{
	@header("Pragma: no-cache");
	@header("Cache: no-cahce");
	@header("Cache-Control: no-cache, must-revalidate");
	@header("Expires: Mon, 05 Jan 1989 00:00:00 GMT");
}

?>