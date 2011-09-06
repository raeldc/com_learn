<?php

class ComLearnDatabaseTableYaml extends ComLearnDatabaseTableNosql
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			// sample data
			'storage_name' => 'chapters',
		));
	
		parent::_initialize($config);
	}

	public function getStorage()
	{
	    if(empty($this->_storage))
		{
			try 
			{
				KLoader::load('com://admin/learn.library.spyc.spyc');
				$this->_storage = Spyc::YAMLLoadString(parent::getStorage());
			}
			catch(KException $e)
			{
				throw new ComLearnDatabaseTableException($e->getMessage());
			}
		}
		
		return $this->_storage;
	}
}