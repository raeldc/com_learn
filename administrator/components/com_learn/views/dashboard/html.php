<?php

class ComLearnViewDashboardHtml extends ComDefaultViewHtml
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'layout' => 'default',
			'auto_assign' => false,
		));

		parent::_initialize($config);
	}

	public function display()
	{
		$state = $this->getModel()->getState();

		$pages = array();
		if (!is_null($chapter = $state->chapter)) {
			$pages = new KConfig(KFactory::get('com://admin/learn.model.chapters')->id($chapter)->getItem()->pages);
		}

		$this->assign('chapters', KFactory::get('com://admin/learn.model.chapters')->getList());
		$this->assign('pages', $pages);

		$this->assign('chapter', $state->chapter);
		$this->assign('page', $state->page);

		return parent::display();
	}
}