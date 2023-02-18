<?php

namespace App\Http\Controllers;

use App\Models\RatingAndBenefit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
//        session()->forget('step_one_data');
//        session()->forget('step_two_data');
        return view('index');
    }
    public function flashSession()
    {
        session()->forget('step_one_data');
        session()->forget('step_two_data');
        return redirect()->route('index');
    }

    public function storeBenefit(Request $request){

        $validator = Validator::make($request->all(), [
            'benefit'   => 'required',
            'type'      => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $req_data       = $request->all();
        $formatted_data = [];

        foreach ($req_data['benefit'] as $key => $value){
            if(isset($req_data['type'][$key])){
                $formatted_data[$req_data['type'][$key]][]  = $value;
            }
        }

        foreach ($formatted_data as $key => $value){
           $length[$key] = count($value);
        }

        $data = [
            'formatted_data'    => $formatted_data,
            'max_data_key'      => array_search(max($length), $length),
        ];
        session()->put('step_one_data', $data);
        return redirect()->back();
    }

    public function storeBenefitsRatings(Request $request){
        $req_data           = $request->except(['_token']);
        $step_one_data      = session()->get('step_one_data');
        $max_data_key       = $step_one_data['max_data_key'];
        $new_req_data       = [];
        $max_value_array    = [];

        if(isset($req_data[$max_data_key])){
            foreach($req_data[$max_data_key]['benefit'] as $key => $value) {

                if(isset($req_data['emotional']['benefit'][$key])){
                    $this->storeRatingAndBenefit([
                        'benefit'       => $req_data['emotional']['benefit'][$key],
                        'type'          => 'emotional',
                        'rating'        => $req_data['emotional']['rating'][$key],
                        'ip'            => $request->ip(),
                        'user_agent'    => $request->header('User-Agent'),
                    ]);
                    if ($req_data['emotional']['rating'][$key] > 2) {
                        $new_req_data['emotional']['benefit'][] = $req_data['emotional']['benefit'][$key];
                        $new_req_data['emotional']['rating'][]  = $req_data['emotional']['rating'][$key];
//                        unset($req_data['emotional']['benefit'][$key]);
//                        unset($req_data['emotional']['rating'][$key]);
                    }
                }
                if(isset($req_data['economic']['benefit'][$key])){
                    $this->storeRatingAndBenefit([
                        'benefit'       => $req_data['economic']['benefit'][$key],
                        'type'          => 'economic',
                        'rating'        => $req_data['economic']['rating'][$key],
                        'ip'            => $request->ip(),
                        'user_agent'    => $request->header('User-Agent'),
                    ]);
                    if ($req_data['economic']['rating'][$key] > 2) {
                        $new_req_data['economic']['benefit'][] = $req_data['economic']['benefit'][$key];
                        $new_req_data['economic']['rating'][]  = $req_data['economic']['rating'][$key];
//                        unset($req_data['economic']['benefit'][$key]);
//                        unset($req_data['economic']['rating'][$key]);
                    }
                }
                if(isset($req_data['functional']['benefit'][$key])){
                    $this->storeRatingAndBenefit([
                        'benefit'       => $req_data['functional']['benefit'][$key],
                        'type'          => 'functional',
                        'rating'        => $req_data['functional']['rating'][$key],
                        'ip'            => $request->ip(),
                        'user_agent'    => $request->header('User-Agent'),
                    ]);
                    if ($req_data['functional']['rating'][$key] > 2) {
                        $new_req_data['functional']['benefit'][] = $req_data['functional']['benefit'][$key];
                        $new_req_data['functional']['rating'][]  = $req_data['functional']['rating'][$key];
//                        unset($req_data['functional']['benefit'][$key]);
//                        unset($req_data['functional']['rating'][$key]);
                    }
                }
            }
        }
        $max_value_array['emotional']       = isset($new_req_data['emotional']['rating']) ? count(@$new_req_data['emotional']['rating']) : 0;
        $max_value_array['economic']        = isset($new_req_data['economic']['rating']) ? count(@$new_req_data['economic']['rating']) : 0;
        $max_value_array['functional']      = isset($new_req_data['functional']['rating']) ? count(@$new_req_data['functional']['rating']) : 0;

        session()->put('step_two_data', [
            'formatted_data'    => $new_req_data,
            'max_data_key'      => array_search(max($max_value_array), $max_value_array),
        ]);
        return redirect()->back();
    }

    protected function storeRatingAndBenefit($data){

        $ratingAndBenefits                  = new RatingAndBenefit();
        $ratingAndBenefits->request_user_ip = $data['ip'];
        $ratingAndBenefits->user_agent      = $data['user_agent'];
        $ratingAndBenefits->benefit         = $data['benefit'];
        $ratingAndBenefits->type            = $data['type'];
        $ratingAndBenefits->rating          = $data['rating'];
        $ratingAndBenefits->save();
    }
}
