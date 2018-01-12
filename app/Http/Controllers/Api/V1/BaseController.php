<?php

namespace App\Http\Controllers\Api\V1;

use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    // Interface help call
    use Helpers;

    // Returns the wrong request
    protected function errorBadRequest($validator)
    {
        // github like error messages
        // if you don't like this you can use code bellow
        //
        //throw new ValidationHttpException($validator->errors());

        $result = [];
        $messages = $validator->errors()->toArray();

        if ($messages) {
            foreach ($messages as $field => $errors) {
                foreach ($errors as $error) {
                    $result[] = [
                        'field' => $field,
                        'code' => $error,
                    ];
                }
            }
        }

        throw new ValidationHttpException($result);
    }
	
	public function getService($controller, $method, $param = null){
		$api = new \RestClient([
			'base_url' => "http://app.eiz.com.au", 
			'headers' => ['sessionData' => json_encode(['user' => $this->user()->toArray()])], 
		]);
		$result = $api->get($controller."/".$method."/".$param, $_GET);
		if($result->info->http_code == 200)
			print_r($result->decode_response());
		else
			var_dump($result);
		//print_r(http_build_query($query));
		exit;
	}
	
	public function postService($controller, $method, $param = null){
		print_r($controller);
		print_r($method);
		print_r($param);
		exit;
	}
}
