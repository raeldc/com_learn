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

	public function display()
	{
		$this->assign('chapters', KFactory::get('com://admin/learn.model.chapters')->getList());

		$pages = array();
		if (!is_null($chapter = $this->getModel()->getState()->chapter)) {
			$pages = new KConfig(KFactory::get('com://admin/learn.model.chapters')->id($chapter)->getItem()->pages);
		}

		$this->assign('pages', $pages);

		return parent::display();
	}
}