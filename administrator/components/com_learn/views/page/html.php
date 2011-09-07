<?php

class ComLearnViewPageHtml extends ComLearnViewMarkdown
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'layout' => 'md://admin/com.learn.docs.pages.01-01',
		));
	
		parent::_initialize($config);
	}
	
}