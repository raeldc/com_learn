<?php

class ComLearnLoaderAdapterYaml extends KLoaderAdapterAbstract
{
	/** 
	 * The adapter type
	 * 
	 * @var string
	 */
	protected $_type = 'yaml';

	/**
	 * The class prefix
	 * 
	 * @var string
	 */
	protected $_prefix = '';
	
	/**
	 * Get the path based on a class name
	 *
	 * @param  string		  	The class name 
	 * @return string|false		Returns the path on success FALSE on failure
	 */
	protected function _pathFromClassname($classname)
	{
		return false;
	}

	/**
	 * Get the path based on an identifier
	 *
	 * @param  object  			An Identifier object - com:[//application/]component.view.[.path].name
	 * @return string|false		Returns the path on success FALSE on failure
	 */
	protected function _pathFromIdentifier($identifier)
	{
		$path = false;
		
		if($identifier->type == 'yaml')
		{
			$parts = $identifier->path;
	
			$component = 'com_'.strtolower($identifier->package);
			
			//Store the basepath for re-use
		    if($identifier->basepath) {
	            $this->_basepath = $identifier->basepath;
		    }

			if(!empty($identifier->name))
			{
				if(count($parts)) 
				{
					$path    = KInflector::pluralize(array_shift($parts));
					$path   .= count($parts) ? '/'.implode('/', $parts) : '';
					$path   .= '/'.strtolower($identifier->name);	
				} 
				else $path  = strtolower($identifier->name);	
			}
				
			$path = $this->_basepath.'/components/'.$component.'/'.$path.'.yaml';
		}	
		
		return $path;
	}
}