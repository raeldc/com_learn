<?php

class ComLearnModelChapters extends ComLearnModelNosql
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
            
        // Insert as id as unique
        $this->_state->reset()->insert('id', 'cmd', null, true);
	}	
}