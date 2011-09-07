<?php

class ComLearnTemplateFilterMarkdown extends KTemplateFilterAbstract implements KTemplateFilterWrite
{
    protected function _initialize(KConfig $config)
    {
        KLoader::load('com://admin/learn.library.markdown');

        $config->append(array(
            'priority' => KCommand::PRIORITY_HIGHEST,
        ));
        
        parent::_initialize($config);
    }

    public function write(&$text)
    {
        $text = '<div class="-md-wrapper">'.Markdown($text).'</div>';

        return $this;
    }    
}