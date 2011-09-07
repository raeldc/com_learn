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

	public function getRequest()
	{
		static $request;

		if (is_null($request)) 
		{
			$request = parent::getRequest();
			if (!is_null($request->page)) 
			{
				$page = explode('-', $request->page);
				$request->chapter = 'C'.$page[0];
			}
		}

		return $request;
	}
}