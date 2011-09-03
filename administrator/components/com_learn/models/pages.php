<?php

class ComLearnModelPages extends KModelAbstract
{
	function __construct(KConfig $config) 
	{
		parent::__construct($config);

		$this->_state
            ->insert('chapter', 'word')
            ->insert('page', 'word');
	}
}