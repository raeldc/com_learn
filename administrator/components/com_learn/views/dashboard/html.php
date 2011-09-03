<?php

class ComLearnViewDashboardHtml extends ComDefaultViewHtml
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'layout' => 'default',
			'auto_assign' => false
		));

		parent::_initialize($config);
	}
}