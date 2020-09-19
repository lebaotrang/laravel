<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;
use App\UserDetail;
use GuzzleHttp\Client;
use Session;
use Redirect;


class UserDetailController extends Controller
{

    public function store(Request $request){

      $user = new UserDetail([
        'full_name' => $request->get('full_name'),
        'street_address' => $request->get('street_address'),
        'city' => $request->get('city'),
        'zip_code' => $request->get('zip_code')
      ]);

      $user->save();
      return redirect('/index');
    }
    public function index(){

      $users = UserDetail::all();

      return view('index', compact('users'));
    }

    public function downloadPDF($id){
      $user = UserDetail::find($id);
      $pdf = PDF::loadView('pdf', compact('user'));
      return $pdf->download('invoice.pdf');

    }

    

    public function getData() {
        $users = Http::get('https://catfact.ninja/facts?limit=3')->json();
        // dd($users['data']);
        Session::put('dataapi', $users['data']);
        return view('data', compact('users'));

    }

    public function submitField(Request $request) {
      $num = $request->get('number');
      if($num*1<=0) {
        Session::flash('message', "Invalid number");
        return Redirect::back();
      }
      $users = Http::get('https://catfact.ninja/facts?limit='.$num*1)->json();
      // dd($users['data']);
      Session::put('dataapi', $users['data']);
      return view('data', compact('users'));
    }

    public function exportPDF($index){
      // dd( Session::get('dataapi'));
      $data = Session::get('dataapi')[$index];
      $pdf = PDF::loadView('datapdf', compact('data'));
      // save storage
      $pdf->save(storage_path('/datadetail.pdf'));
      return $pdf->download('datadetail.pdf');
    }

    public function exportPDFAll(){
      $data = Session::get('dataapi');
      $pdf = PDF::loadView('datapdfall', compact('data'));
      // save storage
      $pdf->save(storage_path('/dataall.pdf'));
      return $pdf->download('datadetail.pdf');
  }
}
