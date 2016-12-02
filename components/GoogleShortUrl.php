<?php
namespace app\components;
use yii\base\component;
class GoogleShortUrl extends Component
{
    
    public function shortUrl($longUrl) {
        $apiParams = json_encode(['longUrl' => $longUrl]);
        $apiKey = 'AIzaSyBSfy1zusRbYRVw1OFYBdb_uGxgjguvk_Y';
        $curl = curl_init();        
        curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,['Content-type:application/json']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $apiParams);
        $curl_response = curl_exec($curl);
        $result = json_decode($curl_response, TRUE);
        curl_close($curl);
        return $result['id'];
    }
    public function expandUrl($shortUrl){
        $apiKey = 'AIzaSyBSfy1zusRbYRVw1OFYBdb_uGxgjguvk_Y';
        $expand_api_url = 'https://www.googleapis.com/urlshortener/v1/url?shortUrl='.$shortUrl.'&key='.$apiKey;
        $get_json = json_decode(file_get_contents($expand_api_url),TRUE);
        return  $get_json['longUrl'];
    }
}