<?php

abstract class ComLearnDatabaseTableNosql extends KObject implements KObjectIdentifiable
{
	protected $_storage_path;
	protected $_storage_name;
	protected $_storage;
	protected $_selector;

	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_storage_path = $config->storage_path;
		$this->_storage_name = $config->storage_name;
		$this->_storage = $config->storage;
		$this->_selector = $config->selector;
	}

	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'storage_path' => 'docs',
			'storage_name' => null,
			'storage' 		=> null,
			'selector'		=> 'default',
			'type'			=> $this->_identifier->name
		));
	
		parent::_initialize($config);
	}
	
	public function getStorage()
	{
	    if(empty($this->_storage))
		{
			if (!is_dir($this->_storage_path)) {
				$this->setStorage($this->_storage_path);
			}

			try 
			{
				$this->_storage = file_get_contents($this->_storage_path);
			}
			catch(KException $e){
				throw new ComLearnDatabaseTableException($e->getMessage());
			}
		}
		
		return $this->_storage;
	}

	public function setStorage($path)
	{
		if (!is_file($path))
		{
			if (strpos($path, DS) === false ) 
			{
				$identifier = $this->_identifier->name.'://'.$this->_identifier->application.'/'.$this->_identifier->package.'.'.$path.'.'.$this->_storage_name;

				$path = KLoader::path($identifier);
			}
			else $path = $path.DS.$this->_storage_name.'.'.$this->_identifier->name;
		}

		if (is_file($path)) 
		{
			$this->_storage_path = $path;
			return $this->_storage_path;
		}
		else throw new ComLearnDatabaseTableException('Path: '.$path.' is not a valid storage path');
	}

	public function getSelector()
	{
		if (!($this->_selector instanceof ComLearnDatabaseTableSelectorDefault))
		{
			//Make sure we have a selector identifier
	        if(!($this->_selector instanceof KIdentifier)) {
	            $this->setSelector($this->_selector);
		    }
	        
	        $this->_selector = KFactory::get($this->_selector);
		}

		return $this->_selector;
	}

	public function setSelector($selector)
	{
		if (!($this->_selector instanceof ComLearnDatabaseTableSelectorDefault))
		{
			if(is_string($selector) && strpos($selector, '.') === false ) 
		    {
		        $identifier         = clone $this->_identifier;
		        $identifier->path   = array('database', 'table', 'selector');
		        $identifier->name   = $selector;
		    }
		    else  $identifier = KFactory::identify($selector);

			if($identifier->path[2] != 'selector') {
				throw new KDatabaseRowsetException('Identifier: '.$identifier.' is not a selector identifier');
			}

			$selector = $identifier;
		}

		$this->_selector = $selector;

		return $this;
	}

	public function select($query = null, $mode = KDatabase::FETCH_ROWSET)
    {
    	if (!($query instanceof ComLearnDatabaseTableSelectorDefault)) {
    		throw new ComLearnDatabaseTableException('Query Builder must be an instance of ComLearnDatabaseTableSelectorDefault');
    	}

   		$result = $query->find($this->getStorage());

    	switch($mode)
        {
            case KDatabase::FETCH_ROW    : 
            {
                $data = $this->getRow();
                if(!empty($result)) {
                   $data->setData($result, false)->setStatus(KDatabase::STATUS_LOADED);
                }
                break;
            }
            
            case KDatabase::FETCH_ROWSET : 
            {
                $data = $this->getRowset();
                if(!empty($result)) {
                    $data->addData($result, false);
                }
                break;
            }
        }

        return KConfig::toData($data);
    }

    public function getRow(array $options = array())
    {
        $identifier         = clone $this->_identifier;
        $identifier->path   = array('database', 'row');
        $identifier->name   = KInflector::singularize($this->_identifier->name);
            
        //The row default options
        $options['table'] = $this;
             
        return KFactory::get($identifier, $options); 
    }

    public function getRowset(array $options = array())
    {
        $identifier         = clone $this->_identifier;
        $identifier->path   = array('database', 'rowset');
            
        //The rowset default options
        $options['table'] = $this; 
    
        return KFactory::get($identifier, $options);
    }

    public function getDefaults()
    {
    	return array();
    }

	public function getIdentifier()
    {
        return $this->_identifier;
    }
}