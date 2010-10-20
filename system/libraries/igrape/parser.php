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
 * System Front Views
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @subpackage	parser
 * @category	Front-views
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 */
class Parser {
	
	public $output = array();
	
	function Parser($file)
	{
		file_exists($file) ? $this->output=file_get_contents($file) : error('Template file '.$file.' not found');
	}
	
	function template($tags=array())
	{
		if(count($tags)>0)
		{
			foreach($tags as $tag=>$data){
				if(is_array($data))
				{
				foreach($data AS $id=>$value)
				{
					if(is_array($value))
					{
						foreach($value AS $_id=>$_value)
						{
							$_tag = $tag.".".$id.".".$_id;
							$_print = $_value;
							$this->output=str_replace('{'.$_tag.'}',$_print,$this->output);
						}
					}else
					{
						$_tag = $tag.".".$id;
						$_print = $value;
						$this->output=str_replace('{'.$_tag.'}',$_print.".".$id,$this->output);
					}
				}
				}else
				{
					$data=file_exists($data)?$this->file($data):$data;
					$this->output=str_replace('{'.$tag.'}',$data,$this->output);
				}
			}
		}else
		{
			error('No tags were provided for replacement');
		}
		
		//preg_match('/{%(?P<name>\w+)%}/', $this->output, $matches);
		//echo $this->output = preg_replace_callback('/{%(?P<name>\w+)%}/',"next_year",$this->output);
	}
	
	function file($file)
	{
		ob_start();
		include($file);
		$content=ob_get_contents();
		return $content;
	}
	
	function display()
	{
		return $this->output;
	}
}
?>