<?php

class ComLearnViewPageHtml extends ComLearnViewMarkdown
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'auto_assign' => false,
			'template_filters' => array('com://admin/learn.template.filter.gistit'),
		));
	
		parent::_initialize($config);
	}

	public function setLayout($layout)
    {
        $identifier = KFactory::identify('md://admin/com.learn.docs.pages.'.$layout);

        $this->_layout = $identifier;
        return $this;
    }
}