<?php

class ComLearnDatabaseSerializerYaml extends KObject implements KObjectIdentifiable
{
	protected $_document_path;
	protected $_document_name;
	protected $_document;
	protected $_data;

	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_document_path = $config->document_path;
		$this->_document_name = $config->document_name;
		$this->_document = $config->document;
	}

	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'document_path' => 'docs',
			'document_name' => null,
			'document' 		=> null
		));
	
		parent::_initialize($config);
	}
	
	public function getDocument()
	{
	    if(empty($this->_document))
		{
			if (!is_dir($this->_document_path)) {
				$this->setDocument($this->_document_path);
			}

			try 
			{
				KLoader::load('com://admin/learn.library.spyc.spyc');
				$this->_document = Spyc::YAMLLoad($this->_document_path);
			}
			catch(KException $e){
				throw new ComLearnDatabaseSerializerException($e->getMessage());
			}
		}
		
		return $this->_document;
	}

	public function setDocument($path)
	{
		if (!is_file($path))
		{
			if (strpos($path, DS) === false ) 
			{
				$identifier = 'yaml://'.$this->_identifier->application.'/'.$this->_identifier->package.'.'.$path.'.'.$this->_document_name;

				$path = KLoader::path($identifier);
			}
			else $path = $path.DS.$this->_document_name.'.yaml';
		}

		if (is_file($path)) 
		{
			$this->_document_path = $path;
			return $this->_document_path;
		}
		else throw new ComLearnDatabaseSerialException('Path: '.$path.' is not a valid document path');
	}

	public function getIdentifier()
    {
        return $this->_identifier;
    }
}