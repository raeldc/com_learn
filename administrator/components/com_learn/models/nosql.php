<?php

abstract class ComLearnModelNosql extends KModelAbstract
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_table = $config->table;
		$this->_storage_name = $config->storage_name;
            
        // Insert as id as unique
        $this->_state->insert('id', 'int', null, true);
	}

	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'storage_name' => $this->_identifier->name,
			'table' => 'yaml'
		));
	
		parent::_initialize($config);
	}

	protected function _buildSelection(ComLearnDatabaseTableSelectorDefault $selector)
	{
		$state = $this->getState();

		if ($state->id != null) {
			$selector->where('id', '=', $state->id);
		}

		return $this;
	}

	protected function _buildSelectionLimit(ComLearnDatabaseTableSelectorDefault $selector)
	{
		$limit = $this->_state->limit;
        
        if($limit) 
        {
            $offset = $this->_state->offset;
            $total  = $this->getTotal();

            //If the offset is higher than the total recalculate the offset
            if($offset !== 0 && $total !== 0)        
            {
                if($offset >= $total) 
                {
                    $offset = floor(($total-1) / $limit) * $limit;    
                    $this->_state->offset = $offset;
                }
             }
            
             $query->limit($limit, $offset);
        }
    }

	public function getList()
    {
        // Get the data if it doesn't already exist
        if (!isset($this->_list))
        {
            $selector = $this->getTable()->getSelector();

            if(!$this->_state->isEmpty())
            {
                $this->_buildSelection($selector);
                //$this->_buildSelectionLimit($selector);
            }
    
            $this->_list = $this->getTable()->select($selector, KDatabase::FETCH_ROWSET);
        }

        return $this->_list;
    }

    public function getItem()
    {
        // Get the data if it doesn't already exist
        if (!isset($this->_item))
        {
            $selector = $this->getTable()->getSelector();

            if(!$this->_state->isEmpty())
            {
                $this->_buildSelection($selector);
                //$this->_buildSelectionLimit($selector);
            }
    
            $this->_item = $this->getTable()->select($selector, KDatabase::FETCH_ROW);
        }

        return $this->_item;
    }

    public function getTotal()
    {
        return 1;
        // Get the data if it doesn't already exist
        if (!isset($this->_total))
        {
            $selector  = null;
   
            if(!$this->_state->isEmpty())
            {
                $selector = $this->getTable()->getSelector();
            
                $this->_buildSelection($selector);
            }
    
            $this->_total = $this->getTable()->count($selector);
        }

        return $this->_total;
    }

	public function getTable()
    {
        if(!($this->_table instanceof ComLearnDatabaseTableYaml))
	    {   		        
	        //Make sure we have a table identifier
	        if(!($this->_table instanceof KIdentifier)) {
	            $this->setTable($this->_table);
		    }
	        
	        try {
	        	$config = array(
	        		'storage_name' => $this->_storage_name
		        );

	            $this->_table = KFactory::get($this->_table);
            } catch (ComLearnDatabaseTableException $e) {
                $this->_table = false;
            }
        }

        return $this->_table;
    }

    public function setTable($table)
	{
		if(!($table instanceof ComLearnDatabaseTableTable))
		{
			if(is_string($table) && strpos($table, '.') === false ) 
		    {
		        $identifier         = clone $this->_identifier;
		        $identifier->path   = array('database', 'table');
		        $identifier->name   = $table;
		    }
		    else  $identifier = KFactory::identify($table);
		    
			if($identifier->path[1] != 'table') {
				throw new KDatabaseRowsetException('Identifier: '.$identifier.' is not a table identifier');
			}

			$table = $identifier;
		}

		$this->_table = $table;

		return $this;
	}
}