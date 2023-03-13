<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\RatingAndBenefit;
use http\Client\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function downloadPdf()
    {
        $pdf = Pdf::loadView('pdf');
//        return $pdf->stream('invoice.pdf');
        return $pdf->download('cvp-tools.pdf');
    }

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

    public function storeBenefit(Request $request)
    {
        $validator = $request->validate([
            "benefit"    => "required",
            "benefit.*"  => "required",
            'type'          => 'required',
            'type.*'        => 'required_with:benefit.*',
        ]);
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        session()->forget('step_one_data');
        session()->forget('step_two_data');

        $req_data = $request->all();
        $formatted_data = [];

        foreach ($req_data['benefit'] as $key => $value) {
            if (isset($req_data['type'][$key])) {
                $formatted_data[$req_data['type'][$key]][] = $value;
            }else{
                session()->flash('benefit_type_error', 'Please select all benefit type.');
                return redirect()->back()->withInput();
            }
        }

        foreach ($formatted_data as $key => $value) {
            $length[$key] = count($value);
        }
        $ra_data = [
            'benefit' => array_values($req_data['benefit']),
            'type' => array_values($req_data['type']),
        ];
        $data = [
            'raw_data' => $ra_data,
            'count_raw_data' => count($req_data['benefit']),
            'formatted_data' => $formatted_data,
            'max_data_key' => array_search(max($length), $length),
        ];

        session()->put('step_one_data', $data);
        return redirect(url()->previous() .'#step_2')->withInput();
//        return redirect()->back();
    }

    public function storeBenefitsRatings(Request $request)
    {
        session()->forget('step_two_data');
        $req_data = $request->except(['_token']);
        $step_one_data = session()->get('step_one_data');
        $max_data_key = $step_one_data['max_data_key'];
        $new_req_data = [];
        $max_value_array = [];

        if (isset($req_data[$max_data_key])) {
            foreach ($req_data[$max_data_key]['benefit'] as $key => $value) {

                if (isset($req_data['emotional']['benefit'][$key])) {
                    $this->storeRatingAndBenefit([
                        'benefit' => $req_data['emotional']['benefit'][$key],
                        'type' => 'emotional',
                        'rating' => $req_data['emotional']['rating'][$key],
                        'ip' => $request->ip(),
                        'user_agent' => $request->header('User-Agent'),
                    ]);
                    if ($req_data['emotional']['rating'][$key] > 2) {
                        $new_req_data['emotional']['benefit'][] = $req_data['emotional']['benefit'][$key];
                        $new_req_data['emotional']['rating'][] = $req_data['emotional']['rating'][$key];
//                        unset($req_data['emotional']['benefit'][$key]);
//                        unset($req_data['emotional']['rating'][$key]);
                    }
                }
                if (isset($req_data['economic']['benefit'][$key])) {
                    $this->storeRatingAndBenefit([
                        'benefit' => $req_data['economic']['benefit'][$key],
                        'type' => 'economic',
                        'rating' => $req_data['economic']['rating'][$key],
                        'ip' => $request->ip(),
                        'user_agent' => $request->header('User-Agent'),
                    ]);
                    if ($req_data['economic']['rating'][$key] > 2) {
                        $new_req_data['economic']['benefit'][] = $req_data['economic']['benefit'][$key];
                        $new_req_data['economic']['rating'][] = $req_data['economic']['rating'][$key];
//                        unset($req_data['economic']['benefit'][$key]);
//                        unset($req_data['economic']['rating'][$key]);
                    }
                }
                if (isset($req_data['functional']['benefit'][$key])) {
                    $this->storeRatingAndBenefit([
                        'benefit' => $req_data['functional']['benefit'][$key],
                        'type' => 'functional',
                        'rating' => $req_data['functional']['rating'][$key],
                        'ip' => $request->ip(),
                        'user_agent' => $request->header('User-Agent'),
                    ]);
                    if ($req_data['functional']['rating'][$key] > 2) {
                        $new_req_data['functional']['benefit'][] = $req_data['functional']['benefit'][$key];
                        $new_req_data['functional']['rating'][] = $req_data['functional']['rating'][$key];
//                        unset($req_data['functional']['benefit'][$key]);
//                        unset($req_data['functional']['rating'][$key]);
                    }
                }
            }
        }
        $max_value_array['emotional'] = isset($new_req_data['emotional']['rating']) ? count(@$new_req_data['emotional']['rating']) : 0;
        $max_value_array['economic'] = isset($new_req_data['economic']['rating']) ? count(@$new_req_data['economic']['rating']) : 0;
        $max_value_array['functional'] = isset($new_req_data['functional']['rating']) ? count(@$new_req_data['functional']['rating']) : 0;

        session()->put('step_two_data', [
            'formatted_data' => $new_req_data,
            'max_data_key' => array_search(max($max_value_array), $max_value_array),
            'step_two_input_data' => $request->except('_token'),
        ]);
        return redirect(url()->previous() .'#step_3')->withInput();
    }

    protected function storeRatingAndBenefit($data)
    {

        $ratingAndBenefits = new RatingAndBenefit();
        $ratingAndBenefits->request_user_ip = $data['ip'];
        $ratingAndBenefits->user_agent = $data['user_agent'];
        $ratingAndBenefits->benefit = $data['benefit'];
        $ratingAndBenefits->type = $data['type'];
        $ratingAndBenefits->rating = $data['rating'];
        $ratingAndBenefits->save();
    }

    public function storeClientInfo(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()->first(),
                ]);
            }

            Client::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
            ]);

//            session()->forget('step_one_data');
//            session()->forget('step_two_data');

            return response()->json([
                'status' => true,
                'message' => 'Client info saved successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
