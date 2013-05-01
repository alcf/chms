<?php
class GoogleGeoCoder
{
    const Status = "status";
    const Lat  = "lat";
    const Lng = "lng";
    const ResponseXml = "xml";
    const Accuracy = "accuracy";
    
    const ResultAddressFound = "200";
    const ResultServerError = "500";
    const ResultAddressNotFound1 = "602";
    const ResultAddressNotFound2 = "603";
    const ResultTooManyRequests = "620";
    
    /**
    *
    * @param string $strAddress
    * @return a json object containing lat and long
    */
    public static function GeoCodeV3 ($address)
    {
    	$ret = array ();
    	if (trim ($address))
    	{
    		$response = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).',+CA&sensor=false');
    		$ret = json_decode($response);
    	}
    	return $ret;
    }
    
    
	/**
	 * status codes: http://code.google.com/apis/maps/documentation/reference.html#GGeoStatusCode
	 *
	 * @param string $strAddress
	 * @return array an array of (status, lat,  lng, accuracy, xml)
	 */
	public static function GeoCode ($address)
	{
		$ret = array ();
		if (trim ($address))
		{
			$gmapUrl = "http://maps.google.com/maps/geo?output=xml"; //. "&key=" . GMAP_APIKEY;
			$request_url = $gmapUrl . "&q=" . urlencode($address);
//			              echo "request_url=" . $request_url  . "\n";
			$xml = null;
			$xml = @simplexml_load_file($request_url);
			//              echo print_r ($xml, true)  . "\n\n";
				
			if (is_null ($xml))
			{
				$ret[self::Status] = self::ResultServerError;
				return $ret;
			}

			$status = self::ResultServerError;
			if (isset ($xml->Response->Status->code))
			  $status = $xml->Response->Status->code;
			
			$ret[self::Status] = (string)$status;
				
			if (self::isAddressFound ($ret))
			{
				// Successful geocode
				$coordinates = $xml->Response->Placemark->Point->coordinates;
				$coordinatesSplit = explode(",", $coordinates);
				// Format: Longitude, Latitude, Altitude
				$lat = $coordinatesSplit[1];
				$lng = $coordinatesSplit[0];

				$ret [self::Lat] = $lat;
				$ret [self::Lng] = $lng;
				$ret [self::Accuracy] = (string) $xml->Response->Placemark->AddressDetails["Accuracy"];
			}
		}
		else
		  $ret [self::Status] = 601; // missing address
		  
		$ret[self::ResponseXml] = $xml;
		return $ret;
	}
	
	public static function isAddressFound ($retCode)
	{
          $r = (string) $retCode[self::Status];
		  
		return ($r ==  self::ResultAddressFound);
	}
	
	public static function isAddressNotFound ($retCode)
	{
		$r = (string) $retCode[self::Status];
		if  ( ( $r == self::ResultAddressNotFound1) ||
		      ($r == self::ResultAddressNotFound2) )
		      return true;
		else
		      return false;
	}
	
	public static function isApproximate ($retCode)
	{
		$accuracy = $retCode[self::Accuracy];
		return ( (int) $accuracy < 8);
	}
}

/*
 SimpleXMLElement Object
(
    [Response] => SimpleXMLElement Object
        (
            [name] => 1000 University Avenue, Palo Alto, CA
            [Status] => SimpleXMLElement Object
                (
                    [code] => 200
                    [request] => geocode
                )

            [Placemark] => SimpleXMLElement Object
                (
                    [@attributes] => Array
                        (
                            [id] => p1
                        )

                    [address] => 1000 University Ave, Palo Alto, CA 94301, USA
                    [AddressDetails] => SimpleXMLElement Object
                        (
                            [@attributes] => Array
                                (
                                    [Accuracy] => 8
                                )

                            [Country] => SimpleXMLElement Object
                                (
                                    [CountryNameCode] => US
                                    [AdministrativeArea] => SimpleXMLElement Object
                                        (
                                            [AdministrativeAreaName] => CA
                                            [SubAdministrativeArea] => SimpleXMLElement Object
                                                (
                                                    [SubAdministrativeAreaName] => Santa Clara
                                                    [Locality] => SimpleXMLElement Object
                                                        (
                                                            [LocalityName] => Palo Alto
                                                            [Thoroughfare] => SimpleXMLElement Object
                                                                (
                                                                    [ThoroughfareName] => 1000 University Ave
                                                                )

                                                            [PostalCode] => SimpleXMLElement Object
                                                                (
                                                                    [PostalCodeNumber] => 94301
                                                                )

                                                        )

                                                )

                                        )

                                )

                        )

                    [Point] => SimpleXMLElement Object
                        (
                            [coordinates] => -122.153205,37.454347,0
                        )

                )

        )

)
*/

?>
