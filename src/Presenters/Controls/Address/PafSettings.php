<?php


namespace Rhubarb\Leaf\Presenters\Controls\Address;


class PafSettings {

    const serverUrl = "http://paf.gcdtech.com/paf-data.php";

    const FORMAT_XML = "xml";
    const FORMAT_JSON = "json";

    private static $apiKey = "GCDTEST123";
    private static $outputFormat = self::FORMAT_JSON;
    private static $apiVersion = "2";

    public static function getApiKey()
    {
        return self::$apiKey;
    }

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function getApiVersion()
    {
        return self::$apiVersion;
    }

    public static function setApiVersion($apiVersion)
    {
        self::$apiVersion = $apiVersion;
    }

    public static function getOutputFormat()
    {
        return self::$outputFormat;
    }

    public static function setOutputFormat($outputFormat)
    {
        self::$outputFormat = $outputFormat;
    }

    public static function getUrlRequest( $searchParams = [ ] )
    {
        $requestParams = [
            "api" =>self::$apiVersion,
            "output" => self::$outputFormat,
            "apikey" => self::$apiKey
        ];
        foreach ($searchParams as $key => $value) {
            $requestParams[$key] = urlencode($value);
        }
        return implode( "?",
            [ self::serverUrl, http_build_query($requestParams, '&amp') ]
        );
    }
}