<?php

class ComLearnControllerDashboard extends ComLearnControllerPage
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'model' => 'com://admin/learn.model.dashboard',
		));
	
		parent::_initialize($config);
	}
	
}