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
 * System Front Modal
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @subpackage	phpBurn
 * @category	Front-modal
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 */
class Model extends PhpBURN_Core {

	public $data = array();
	public $model = '';
	public $name = '';

	public function __construct()
	{
	}

	public function missing()
	{
		exit("missing ".$this->model." on model ".$this->name);
	}

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	public function __isset($name)
	{
		return isset($this->data[$name]);
	}
	
	public function __unset($name)
	{
		unset($this->data[$name]);
	}
	
	public function __destruct()
	{
	}

}
?>