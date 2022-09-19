<?php

namespace App\Helpers;

/**
 * 
 */
class SocialiteHelper
{
	public function getAcceptedProviders()
	{
		return [
			'bitbucket',
			'facebook',
			'google',
			'github',
			'linkedin',
			'twitter',
		];
	}
}