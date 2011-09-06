<?php

class ComLearnDatabaseSerializerYaml extends ComLearnDatabaseSerializerAbstract
{
	public function getDocument()
	{
	    if(empty($this->_document))
		{
			try 
			{
				KLoader::load('com://admin/learn.library.spyc.spyc');
				$this->_document = Spyc::YAMLLoadString(parent::getDocument());
			}
			catch(KException $e)
			{
				throw new ComLearnDatabaseSerializerException($e->getMessage());
			}
		}
		
		return $this->_document;
	}
}