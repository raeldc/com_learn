<?php

class ComLearnControllerPage extends ComDefaultControllerResource
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'model' => 'pages'
		));

		parent::_initialize($config);
	}
}