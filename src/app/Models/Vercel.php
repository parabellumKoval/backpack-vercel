<?php 

namespace Backpack\Vercel\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Http;

class Vercel extends Model
{	
  
  private $token;
  
  public $endpoints = array(
    'checkout' => ''
  );

  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */
  

  /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */

	public function __construct(){
    $this->token = config('parabellumkoval.vercel.token');

    if(empty($this->token)){
      throw new \Exception('No vercel token specified');
    }
	}

  public static function vercelUrl($path = ''){
    return config('parabellumkoval.vercel.base_url') . '/' . ltrim($path, '/');
  } 
	
  public static function status($status) {
    $ss = '';

    switch($status) {
      case 'ERROR':
        $ss = 'error';
        break;
      case 'READY':
        $ss = 'success';
        break;
      case 'BUILDING':
        $ss = 'warning';
        break;
      case 'INITIALIZING':
        $ss = 'info';
        break;
      case 'QUEUED':
        $ss = 'default';
        break;
      case 'CANCELED':
        $ss = 'dark';
        break;
      default:
        $ss = 'default';
        break;
    }

    return $ss;
  }

  public function getDeployments($data = ['limit' => 10]) {

    try {
      $response = Http::withToken($this->token)->get(self::vercelUrl("/v6/deployments"), $data);
    }catch(\Exception $e){
      return false;
    }

    $results = $response->json();

    if(empty($results)){
      return [
        'deployments' => [],
        'pagination' => []
      ];
    }

    return $results;
  }

  public function redeploy() {

    $list = $this->getDeployments([
      "limit" => 1,
      "state" => "READY"
    ]);

    if(!$list || empty($list['deployments']) || !isset($list['deployments'][0])) {
      \Alert::add('error', 'Ошибка. Рабочие сборки отсутсвуют.')->flash();
      return false;
    }
    
    $last_success_deployment = $list['deployments'][0];

    $data = [
      "name" => config('parabellumkoval.vercel.project_name'),
      "deploymentId" => $last_success_deployment['uid'],
      "target" => "production"
    ];

    try {
      $response = Http::withToken($this->token)->post(self::vercelUrl("/v13/deployments?forceNew=1&skipAutoDetectionConfirmation=1"), $data);
    }catch(\Exception $e){
      return false;
    }


    if($response->successful()){
      \Alert::add('success', 'Перезборка проекта запущена, следите за стутусом последней сборки. (Предположительное время: 3 мин)')->flash();
    }else {
      \Alert::add('error', 'Ошибка. Перезборка проекта не была запущена или произошла с ошибкой.')->flash();
    }
    return true;
  }
  /*
  |--------------------------------------------------------------------------
  | RELATIONS
  |--------------------------------------------------------------------------
  */
  
      
  /*
  |--------------------------------------------------------------------------
  | SCOPES
  |--------------------------------------------------------------------------
  */

  /*
  |--------------------------------------------------------------------------
  | ACCESSORS
  |--------------------------------------------------------------------------
  */
	
	
  /*
  |--------------------------------------------------------------------------
  | MUTATORS
  |--------------------------------------------------------------------------
  */        
}