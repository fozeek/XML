<?php

class Curl
{
	private $path;

	public function __construct($path)
	{
		$this->path = $path;
	}

	public function getContent()
	{
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $this->path);
		curl_setopt($ch, CURLOPT_FAILONERROR,10);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,10);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		
		$result = curl_exec($ch);			 
		
		curl_close($ch);

		return $result;
	}
	
}