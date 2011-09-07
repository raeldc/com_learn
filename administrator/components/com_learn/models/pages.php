<?php

class ComLearnModelPages extends KModelAbstract
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_state
			->insert('page', 'cmd', null);
	}
}