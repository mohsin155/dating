<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UtilityController;
use App\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Languages;
use App\Models\UserPersonality;
use App\Models\SubscriptionPricing;
use App\Models\MembershipFeatures;

class PaymentController extends UtilityController {

    public function __construct() {
        
    }

    public function getSubscription() {
        $pricing = SubscriptionPricing::orderBy('duration', 'desc')->get();
        $features = MembershipFeatures::get();
        //dd($pricing);
        return view('payments.subscription')->with('pricing', $pricing)->with('features', $features);
    }

    public function postOrder() {
        $inputs = Input::all();
        if ($inputs['package'] == 1) {
            $pricing_id = $inputs['gold'];
            $package_name = trans('messages.gold_desc');
        } elseif ($inputs['package'] == 2) {
            $pricing_id = $inputs['platinum'];
            $package_name = trans('messages.platinum_desc');
        }
        $subs = SubscriptionPricing::where('pricing_id', $pricing_id)->first();
        if ($subs != null) {
            $amount = $subs->amount;
            $data = ['VERSION' => '108.0',
                'METHOD'=> 'SetExpressCheckout',
                'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE',
                'PAYMENTREQUEST_0_AMT' => $amount,
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
                'PAYMENTREQUEST_0_ITEMAMT' => $amount,
                'L_PAYMENTREQUEST_0_NAME0' => $package_name,
                'L_PAYMENTREQUEST_0_DESC0' => $package_name,
                'L_PAYMENTREQUEST_0_AMT0' => $amount,
                'L_PAYMENTREQUEST_0_QTY0' => '1',
                'RETURNURL' => url('payment/success'),
                'CANCELURL' => url('payment/subscription')];
            $responseNvp = $this->paypalRequest($data);
            //dd($responseNvp);
            if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {
                $query = array(
                    'cmd' => '_express-checkout',
                    'token' => $responseNvp['TOKEN']
                );
                $redirectURL = sprintf('%s?%s', config('paypal.express_url'), http_build_query($query));
                //echo $redirectURL;exit;
                return Redirect::to($redirectURL);
            }else{
                return Redirect::to('payment/error');
            }
        }
    }

    private function paypalRequest($data) {
        $user_name = config('paypal.username');
        $password = config('paypal.password');
        $signature = config('paypal.signature');
        $api_url = config('paypal.api_url');
        $data['USER'] = $user_name;
        $data['PWD'] = $password;
        $data['SIGNATURE'] = $signature;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($curl);
        //echo $response;exit;
        curl_close($curl);
        $result = $this->processResponse($response);
        return $result;
    }
    
    private function processResponse($response) {
        $nvp = array();
        if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
            foreach ($matches['name'] as $offset => $name) {
                $nvp[$name] = urldecode($matches['value'][$offset]);
            }
        }

        return $nvp;
    }

}
