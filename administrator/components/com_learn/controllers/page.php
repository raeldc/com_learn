<?php

class ComLearnControllerPage extends ComDefaultControllerResource
{
	public function getRequest()
	{
		$request = parent::getRequest();
		$request->layout = $request->page;

		return $request;
	}
}