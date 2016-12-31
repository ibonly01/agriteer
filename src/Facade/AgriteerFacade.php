<?php

namespace Ibonly\Agriteer\Facades;

use Illuminate\Support\Facades\Facade;

class AgriteerFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'agriteer-agriteer';
	}
}