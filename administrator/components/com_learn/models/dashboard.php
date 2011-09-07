<?php

class ComLearnModelDashboard extends KModelAbstract
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_state
			->insert('chapter', 'cmd', 'C1')
			->insert('page', 'cmd', 'default');
	}
}