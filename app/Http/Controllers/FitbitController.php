<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use brulath\fitbit\FitbitPHPOAuth2;
use brulath\fitbit\FitbitPHPOAuth2;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FitbitController extends Controller
{

    public $fitbit;

    public function __construct()
    {
        $this->fitbit = new FitbitPHPOAuth2('228L83', 'f43e0430d7832be16a522de7907f8a72', 'http://localhost/laravelDemo/laravel_fitbit/public/auth', '', true);
    }

    public function auth()
    {

        if (isset($_GET['state'])) {
            $_SESSION['fitbit-php-oauth2-state'] = $_GET['state'];
        }

        $profile = $this->fitbit->getToken();

         Cache::forever('userId', $profile['user_id']);
         Cache::forever('accessToken', $profile['access_token']);

        $this->fitbit->getRefreshToken();

        echo "<pre>";
        print_r($profile);
        exit;


        //return redirect('success');

    }

    public function success()
    {

        echo "data successfully added";

    }
}
