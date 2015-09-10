<?php

// polls Photon via Spark.io


class pollPhoton {

	var $apiurl = "https://api.spark.io/v1/devices/";
	var $deviceid = "";
	var $accesstoken = "";

	public function __construct($deviceid = null,$accesstoken = null) {

		$this->accesstoken = $accesstoken;
		$this->deviceid = $deviceid;

	} // end construct

	// gets a variables output from photon
	public function getVar($variable = null) {

		// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->apiurl.$this->deviceid.'/'.$variable.'?access_token='.$this->accesstoken);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // SSL
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        // $output contains the output string
        $output = curl_exec($ch);
        //$error = curl_error($ch);
        //$info = curl_getinfo($ch);
        //print_r($info);

        // close curl resource to free up system resources
        curl_close($ch);

        //print_r($output);
        return json_decode($output);

	} // getVar



} // end class


?>