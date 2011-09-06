<?php

class ComLearnLoaderAdapterMarkdown extends KLoaderAdapterAbstract
{
	/** 
	 * The adapter type
	 * 
	 * @var string
	 */
	protected $_type = 'md';

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
		
		if($identifier->type == 'md')
		{
			$parts = $identifier->path;

			if ($identifier->package == 'com' || $identifier->package == 'media') 
			{
				$parts[0] = 'components/com_'.$parts[0];
			}
			elseif ($identifier->package == 'mod') 
			{
				$parts[0] = 'modules/mod_'.$parts[0];
			}
			
			//Store the basepath for re-use
		    if($identifier->basepath) {
	            $this->_basepath = $identifier->basepath;
		    }

			if(!empty($identifier->name))
			{
				if(count($parts)) 
				{
					$path    = array_shift($parts);
					$path   .= count($parts) ? '/'.implode('/', $parts) : '';
					$path   .= '/'.$identifier->name;
				} 
				else $path  = strtolower($identifier->name);	
			}
				
			$path = $this->_basepath.'/'.$path.'.md';
		}	
		
		return $path;
	}
}