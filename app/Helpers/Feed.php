<?php

namespace App\Helpers;

class Feed
{
    public static function read($data = [], $page = 1)
    {
        $items = [];

        foreach ($data as $item) {
            if (self::checkSourceLink($item['source'], $item['link'])) {
                switch ($item['source']) {
                    case 'vnexpress':
                        $items = array_merge_recursive($items, self::readVNExpress($item['link']));
                        break;
                    case 'cafebiz':
                        $items = array_merge_recursive($items, self::readCafeBiz($item['link']));
                        break;
                    case 'tuoitre':
                        $items = array_merge_recursive($items, self::readTuoiTre($item['link']));
                        break;
                }
            }
        }

        return $items;
    }

    public static function readVNExpress($link)
    {
        try {
            $xml = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA);

            $xmlJson    = json_encode($xml);
            $xmlArr     = json_decode($xmlJson, 1);
            $items = $xmlArr['channel']['item'];
            $result = [];

            foreach ($items as $item) {
                $tmp1 = [];
                $tmp2 = [];

                preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
                $pattern = '.*br>(.*)';
                preg_match('/' . $pattern . '/', $item['description'], $tmp2);

                $image = $tmp1[1] ?? '';
                $description = $tmp2[1] ?? $item['description'];

                $result[] = [
                    'name' => $item['title'],
                    'description' => $description,
                    'pubDate' => date('d/m/Y H:i:s', strtotime($item['pubDate'])),
                    'link' => $item['link'],
                    'thumb' => $image
                ];
            }

            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public static function readTuoiTre($link)
    {
        try {
            $xml = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA);

            $xmlJson    = json_encode($xml);
            $xmlArr     = json_decode($xmlJson, 1);
            $items = $xmlArr['channel']['item'];
            $result = [];

            foreach ($items as $item) {
                $tmp1 = [];
                $tmp2 = [];

                preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
                preg_match('/.*<\/a>(.*)/', $item['description'], $tmp2);

                $image = $tmp1[1] ?? '';
                $description = $tmp2[1] ?? $item['description'];

                $result[] = [
                    'name' => $item['title'],
                    'description' => $description,
                    'pubDate' => date('d/m/Y H:i:s', strtotime($item['pubDate'])),
                    'link' => $item['link'],
                    'thumb' => $image
                ];
            }

            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public static function readCafeBiz($link)
    {
        try {
            $xml = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA);
            $xmlJson    = json_encode($xml);
            $xmlArr     = json_decode($xmlJson, 1);
            $items = $xmlArr['channel']['item'];
            $result = [];

            foreach ($items as $item) {
                $tmp1 = [];
                $tmp2 = [];

                preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
                preg_match('/.*<span>(.*)<\/span>/', $item['description'], $tmp2);

                $image = $tmp1[1] ?? '';
                $description = $tmp2[1] ?? $item['description'];

                $result[] = [
                    'name' => $item['title'],
                    'description' => $description,
                    'pubDate' => date('d/m/Y H:i:s', strtotime($item['pubDate'])),
                    'link' => $item['link'],
                    'thumb' => $image
                ];
            }

            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public static function checkSourceLink($source, $link)
    {
        $sourceFromLink = explode('.', parse_url($link, PHP_URL_HOST))[0];
        return ($source == $sourceFromLink);
    }

    public static function getGold()
    {
        $link = 'http://www.sjc.com.vn/xml/tygiavang.xml';
        $xml = simplexml_load_file($link)->ratelist->city;

        $xmlJSON = json_encode($xml);
        $xmlArr = json_decode($xmlJSON, true);

        $goldList = $xmlArr['item'];
        return array_column($goldList, '@attributes');
    }

    public static function getCoin()
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '10',
            'convert' => 'USD'
        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: 2e80a8cb-d753-4236-897c-55b86ca8ed83'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $arrCoin = json_decode($response, true)['data'];
        curl_close($curl); // Close request

        return $arrCoin;
    }
}
