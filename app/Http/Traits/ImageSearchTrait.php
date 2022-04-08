<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Config;

trait ImageSearchTrait
{
    public static function getStoryBlocksResponse(string $resource, string $urlParams, string $httpMethod = 'GET')
    {
        if($resource == ""){
            return false;
        }
        $curl = curl_init();

        $publicKey = Config::get('constants.storyBlocks.publicKey');
        $privateKey = Config::get('constants.storyBlocks.privateKey');

        $baseUrl = Config::get('constants.storyBlocks.imageBaseUrl');
        $resource = ($resource) ? $resource : "/api/v2/images/search";

        $expires = time() + 100;
        $hmac = hash_hmac("sha256", $resource, $privateKey . $expires);

        $imageSearchApiUrl = $baseUrl;
        $imageSearchApiUrl .= $resource;
        $imageSearchApiUrl .= '?APIKEY='.$publicKey.'';
        $imageSearchApiUrl .= '&EXPIRES='.$expires.'';
        $imageSearchApiUrl .= '&HMAC='.$hmac.'';
        $imageSearchApiUrl .= '&project_id=ImageSearch';
        $imageSearchApiUrl .= '&user_id=chandan@avya-tech.com';
        $imageSearchApiUrl .= '&'.$urlParams;

        // echo $imageSearchApiUrl; die;
        curl_setopt_array($curl, array(
            // CURLOPT_URL => '/api/v2/images/search?APIKEY=%3Cstring%3E&EXPIRES=%3Cstring%3E&HMAC=%3Cstring%3E&project_id=%3Cstring%3E&user_id=%3Cstring%3E&keywords=%3Cstring%3E&content_type=%3Cstring%3E&orientation=%3Cstring%3E&color=%3Cstring%3E&has_transparency=%3Cboolean%3E&has_talent_released=%3Cboolean%3E&has_property_released=%3Cboolean%3E&is_editorial=%3Cboolean%3E&categories=%3Cstring%3E&page=%3Cint%3E&results_per_page=%3Cint%3E&sort_by=%3Cstring%3E&sort_order=%3Cstring%3E&required_keywords=%3Cstring%3E&filtered_keywords=%3Cstring%3E&translate=%3Cboolean%3E&source_language=%3Cstring%3E&contributor_id=%3Cint%3E&safe_search=%3Cboolean%3E&library_ids=%3Cstring%3E&exclude_library_ids=%3Cstring%3E&content_scores=%3Cboolean%3E',
            CURLOPT_URL => $imageSearchApiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => strtoupper($httpMethod),
        ));

        $response = curl_exec($curl);
        $errResponse = curl_error($curl);
        curl_close($curl);
        
        if ($errResponse) {
            return $errResponse;
        } else {
            $response = ['status' => 'success', 'response' => json_decode($response)];
            return json_encode($response);
        }
    }

    public function storyBlocksRequest(array $urlParamsArr)
	{
		if(empty($urlParamsArr)){
			return false;
		}
		$httpMethod = 'GET';
        $resource = "/api/v2/images/search";

        $urlParams = '';
        if (is_array($urlParamsArr)) {
            if (!empty($urlParamsArr)) {
                foreach ($urlParamsArr as $key => $value) {
                    $urlParams .= '&' . $key . '=' . $value;
                }
            }
        }
		 
		return self::getStoryBlocksResponse($resource, $urlParams, $httpMethod);
	}

    public function shutterStockResponse(array $queryFields){
        if(empty($queryFields)){
            return false;
        }

        $shutterStockApiKey = Config::get('constants.shutterStock.SHUTTERSTOCK_KEY');
        $shutterStockApisecret = Config::get('constants.shutterStock.SHUTTERSTOCK_SECRET');

        // echo "<pre>";
        // print_r($queryFields);
        // die;

        $options = [
            CURLOPT_URL => "https://api.shutterstock.com/v2/images/search?" . http_build_query($queryFields),
            CURLOPT_USERAGENT => "php/curl",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => "".$shutterStockApiKey.":".$shutterStockApisecret."",
            CURLOPT_RETURNTRANSFER => 1
        ];
          
        $handle = curl_init();
        curl_setopt_array($handle, $options);
        $response = curl_exec($handle);
        curl_close($handle);
          
        $response = ['status' => 'success', 'response' => json_decode($response)];
        return json_encode($response);
        // $decodedResponse = json_decode($response);
        // print_r($decodedResponse);
    }
}
