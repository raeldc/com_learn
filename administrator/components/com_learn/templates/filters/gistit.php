<?php

class ComLearnTemplateFilterGistit extends KTemplateFilterAbstract implements KTemplateFilterWrite
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'priority' => KCommand::PRIORITY_LOWEST,
        ));
        
        parent::_initialize($config);
    }

    public function write(&$text)
    {
        $text = preg_replace('#<a.*href="http://gist\-it\.appspot\.com/(.*)".*>[sS]cript</a>#iU', '<div class="-script-wrapper"><script inline src="http://gist-it.appspot.com/$1"></script></div>', $text);

        return $this;
    }  
}