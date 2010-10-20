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
 * System Front Functions
 *
 * Loads the base classes and executes the request.
 *
 * @package		iGrape
 * @category	html
 * @author		iGrape Dev Team
 * @link		http://wiki.github.com/igrape/igrape/
 * @version 	0.1.2
 */

abstract class html
{
	/**
	 * Inserts a tag
	 * @return
	 * @param $type Type tag
	 * @param $id Id and name flag
	 * @param $attrs Attributes in input
	 * @param $content Content that will be printed, Default false
	 */
	function tag($type,$id,$attrs='',$content=FALSE)
	{
		if($content==FALSE)
			$_end = " />";
		else
			$_end = " >";
			
		$render  = "<".$type." id='".$id."' name='".$id."' ".$attrs." ".$end."\n";
		$render .= $content."\n";
		$render .= "<".$type.">\n";
		
		return $render;
	}
	
	/**
	 * Inserts a link to a css file
	 * @return
	 * @param $file Object
	 */
	function css($file)
	{
		include CONFBASE.'_conf'.EXT;
		$_file = is_file(APPBASE."html/_css/".$file) ? $conf['base_url'].APPBASE."html/_css/".$file : $file;
		return "<link rel=\"stylesheet\" href=\"".$_file."\" type=\"text/css\" media=\"screen\" />\n";
	}

	/**
	 * Inserts an table tab (<table></table>)
	 */
	/*
	 * table(array("test"=>array(1,2,3,7),"la"=>array(4,5,6)),array("id"=>"iGTable","class"=>"mytable"));
	 */
	function table($array,$style=NULL)
	{
		if($style){
			$_style = "";
			foreach($style AS $attr=>$value)
				$_style .=  $attr."='".$value."'";
		}
		$c = 1;
		foreach($array AS $__colum => $__values){
			
			if(!is_array($__values))
				error("Values not is array!");
			else
				$_SESSION["iGrape"]["error"]=NULL;
			
			if($_SESSION["iGrape"]["error"] == 1)
				break;
				
			//$__tr = count($__values);
			$__th[$c] = $__colum;
				$v = 1;
				foreach($__values AS $_values){
					$var[$c][$v] = $_values;
					$v++;
				}
				if($v>=@$vMax)
					$vMax=$v;
			$c++;
		}
		$__td = @count($var);
		$__tr = $vMax-1;
		
		## CREATE TABLE
		$return = "<table ".@$_style." >\n";
			## TITLE TABLE
			$return .= "<tr>";
			for($y=1;$y<=$__td;$y++){
				$return .= "<th>";
					$return .= @$__th[$y];
				$return .= "</th>\n";
			}
			$return .= "</tr>\n";
			## TITLE TABLE
			for($i=1;$i<=@$__tr;$i++){
				$return .= "<tr>\n";
					for($y=1;$y<=$__td;$y++){
						$return .= "<td>";
							if(!@$var[$y][$i])
								$return .= "-";
							else
								$return .= @$var[$y][$i];
						$return .= "</td>\n";
					}
				$return .= "</tr>\n";
			}
		$return .= "</table>\n";
		## CREATE TABLE
		
		return $return;
	}
	/**
	 * Inserts an image tag (<img>)
	 * @return
	 * @param $file The image file name
	 * @param $attrs Atributs <img>
	 */
	function img($file, $attrs ='')
	{
		include CONFBASE.'_conf'.EXT;
		$_file = is_file(APPBASE."html/_imagens/".$file) ? $conf['base_url'].APPBASE."html/_imagens/".$file : $file;
		return "<img src=\"".$_file."\" ".$attrs." />\n";
	}
	
	/**
	 * @return
	 * @param $file The image file name
	 */
	function pathimg($file)
	{
		return APPBASE."html/_imagens/".$file;
	}
	
	/**
	 * Inserts an link tag for favicon
	 * @return
	 * @param $file The image file name
	 * @param $attrs Atributs <link>
	 */
	function favicon($file=NULL, $attrs ='')
	{
		include CONFBASE.'_conf'.EXT;
		$file = !$file ? "favicon.ico" : $file;
		$_file = is_file(APPBASE."html/_imagens/".$file) ? $conf['base_url'].APPBASE."html/_imagens/".$file : $file;
		return "<link href=\"".$_file."\" rel=\"icon\" ".$attrs." />\n";
	}
	
	/**
	 * Inserts an input tag (<input>)
	 * @return
	 * @param $type Type flag
	 * @param $id Id and name flag
	 * @param $attrs Attributes in input
	 * @param $file If the file already src
	 */
	function input($type, $id, $attrs ='', $file='')
	{
		if($file!="")
			return "<input id='".$id."' name='".$id."' type='".$type."' src=\"".APPBASE."html/_imagens/".$file."\" ".$attrs." />";
		return "<input id='".$id."' name='".$id."' type='".$type."' ".$attrs." />";
	}

	/**
	 * Returns TRUE if this in an AJAX request
	 * @return
	 */
	function isAjax()
	{
		return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&  ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
	}

	/**
	 * Inserts a script tag
	 * @return
	 * @param $file The script file name
	 */
	function js($file)
	{
		include CONFBASE.'_conf'.EXT;
		$_file = is_file(APPBASE."html/_js/".$file) ? $conf['base_url'].APPBASE."html/_js/".$file : $file;
		return "<script type=\"text/javascript\" src=\"".$_file."?".date("YmdHis")."\"></script>\n";
	}
	
	/**
	 * Checks which browser
	 * @return
	 */
	function brouser()
	{
		$nav = $_SERVER["HTTP_USER_AGENT"];
		if(ereg("Mozilla", $nav))
		{
			$navegador = "ff";
		}elseif(ereg("Opera", $nav))
		{
			$navegador = "op";
		}elseif(ereg("MSIE", $nav))
		{
			$navegador = "ie";
		}else{
			$navegador = NULL;
		}
		return $navegador;
	}
}


?>