<?php

class Curl
{
	private $name;
	private $appId;
	private $mail;
	private $appSecret;
	private $host;

	public function __construct($name, $appId, $mail, $appSecret, $host)
	{
		$this->name = $name;
		$this->appId = $appId;
		$this->mail = $mail;
		$this->appSecret = $appSecret;
		$this->host = $host;
	}

	public function fetch($url, $data=false)
	{
		$time = round(time()/5);
        $hash = hash_hmac('sha256', $this->appSecret.$this->name.$time.$this->mail.$this->host, $this->appId);

        $header = [
            'name: '.$this->name,
            'app_id: '.$this->appId,
            'mail: '.$this->mail,
            'hash: '.$hash
        ];

        $ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,10);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 

        if($data){
            $data_string = '';

            foreach($data as $key=>$value){ 
                $data_string .= $key.'='.$value.'&'; 
            }
            rtrim($data_string, '&');

            curl_setopt($ch,CURLOPT_POST, count($data));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);
        }
        
        $result = curl_exec($ch);	
            
		curl_close($ch);

		return $result;
	}
	
}