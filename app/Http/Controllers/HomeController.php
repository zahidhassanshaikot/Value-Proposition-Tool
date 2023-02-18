<?php

namespace App\Http\Controllers;

use App\Models\BrandAndBenefits;
use App\Models\Client;
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
        return view('index');
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
            session()->put('step_two_data', $request->all());
            return redirect()->back();
    }




//    private function checkHas()
//    {
//        return BrandAndBenefits::query()
//            ->where('request_user_ip', request()->getClientIp())
//            ->where('date_time', now()->format('Y-m-d H:i:s A'))
//            ->first();
//    }
//
//    public function store(Request $request)
//    {
//        try {
//
//            $countAllClientData = BrandAndBenefits::query()->where('request_user_ip', request()->getClientIp())->count();
//            if ($countAllClientData == $request->first_data){
//                $getSingleRecord = BrandAndBenefits::query()
//                    ->where('request_user_ip', request()->getClientIp())
//                    ->orderByDesc('id')
//                    ->first();
//                $getSingleRecord->update([
//                    "request_time" => time(),
//                    "date_time" => now()->format('Y-m-d H:i:s A'),
//                    "brands" => json_encode($request->brands),
//                    "benefits" => json_encode($request->benefits),
//                ]);
//            }else{
//                BrandAndBenefits::query()->create([
//                    "request_user_ip" => $request->getClientIp(),
//                    "request_time" => time(),
//                    "date_time" => now()->format('Y-m-d H:i:s A'),
//                    "brands" => json_encode($request->brands),
//                    "benefits" => json_encode($request->benefits),
//                ]);
//            }
//
//            return response()->json(['success' => true]);
//
//        }catch (\Exception $e){
//            return response()->json(['error' => $e->getMessage()]);
//        }
//    }
//
//    public function flashRequestClientInfo()
//    {
//        try {
//
//            $hasData = BrandAndBenefits::query()->where('request_user_ip', request()->getClientIp())->first();
//
//            if ($hasData){
//                BrandAndBenefits::query()->where('request_user_ip', request()->getClientIp())->delete();
//                return response()->json(['success' => true]);
//            }
//
//        }catch (\Exception $e){
//            return response()->json(['error' => $e->getMessage()]);
//        }
//    }
//
//    public function storeClientInformation(Request $request)
//    {
//        $validation = Validator::make($request->all(), [
//            'full_name' => 'required|string',
//            'email' => 'required|email'
//        ]);
//
//        if ($validation->fails()){
//            return response()->json(['message' => $validation->messages()]);
//        }
//
//        Client::query()->create([
//            'full_name' => $request->full_name,
//            'email' => $request->email
//        ]);
//
//        return true;
//    }
}
