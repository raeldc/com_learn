<?php

abstract class ComLearnViewMarkdown extends KViewHtml
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'template'         => 'markdown',
            'template_filters' => array('com://admin/learn.template.filter.markdown'),
        ));
        
        parent::_initialize($config);
    }
}