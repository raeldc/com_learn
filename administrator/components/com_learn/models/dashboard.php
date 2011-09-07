<?php

class ComLearnModelDashboard extends KModelAbstract
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_state
			->insert('chapter', 'cmd', 'C01')
			->insert('page', 'cmd', '00-00');
	}
}