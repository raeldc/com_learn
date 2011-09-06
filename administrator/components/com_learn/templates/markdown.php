<?php

class ComLearnTemplateMarkdown extends KTemplateAbstract
{
	public function loadIdentifier($template, $data = array(), $process = true)
	{
	    //Identify the template
	    $identifier = KFactory::identify($template);

	    // Find the template 
		$file = KLoader::path($identifier);
	    
		if ($file === false) {
			throw new KTemplateException('Template "'.$identifier->name.'" not found');
		}
		
		// Load the file
		$this->loadFile($file, $data, $process);
		
		return $this;
	}
}