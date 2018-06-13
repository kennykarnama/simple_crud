<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\FileHandler;
use App\Libraries\Person;
use Validator;
use Session;

class HomeController extends Controller
{
    //

    private $fileHandler;
    private $submission_result;

    public function __construct()
    {
    	# code...
    	$this->fileHandler = new Filehandler('csv');

        $this->submission_result = '';

    }

    public function index()
    {
    	# code...
    	return view('pages.home_page',[]);
    }

    public function retrieve($fileName)
    {
    	# code...
    	$fileExtension = 'txt';

    	$contents = $this->fileHandler->retrieveFileContents($fileName,$fileExtension);

    	$person = new Person;

    	$person->retrieveFromCSV($contents);

    	return view('pages.detail_page',[
    		'person'=>$person
    		]);

    	//dd($person);

    }

    public function submission_resut()
    {
        # code...
        return view('pages.status_create_page',[
            'message'=>$this->submission_result
            ]);
    }

    public function create(Request $request)
    {
        # code...
         $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'date-of-birth'=>'required',
            'alamat'=>'required'
        ]);

         $data = array();


          if ($validator->fails()) {

            $data['errors'] = $validator->errors()->all();

            $data['status'] = 0;

            
          }

          else{

             $nama = $request['nama'];

             $email = $request['email'];
                
             $date_of_birth = $request['date-of-birth'];

             $alamat = $request['alamat'];

             $person = new Person($nama,$email,$date_of_birth,$alamat);

             $current_date =  date('dmYHis');

             $fileName = $nama.'-'.$current_date;

             $fileExtension = "txt";

             $fileContents = $person->formatToCSV();

             $exist = $this->fileHandler->writeToFile($fileName,$fileContents,$fileExtension);

             $message = '';

             if($exist){



                 $message = "Terima kasih telah mengisi form";
             
             }
             else{
                 $message = "Gagal di submit";
             }

             Session::flash('message', $message);

             $this->submission_result = $message;

             $data['message'] = $message;

             $data['status'] = 1;

            
          }

          return response()->json($data);

    }


    // public function create(Request $request)
    // {
    // 	# code...
    // 	$nama = $request['nama'];

    // 	$email = $request['email'];
    	
    // 	$date_of_birth = $request['date-of-birth'];

    // 	$alamat = $request['alamat'];

    // 	$person = new Person($nama,$email,$date_of_birth,$alamat);

    // 	$current_date =  date('dmYHis');

    // 	$fileName = $nama.'-'.$current_date;

    // 	$fileExtension = "txt";

    // 	$fileContents = $person->formatToCSV();

    // 	$exist = $this->fileHandler->writeToFile($fileName,$fileContents,$fileExtension);

    // 	$message = '';

    // 	if($exist){
    // 		$message = "Terima kasih telah mengisi form";
    // 	}
    // 	else{
    // 		$message = "Gagal di submit";
    // 	}

    // 	return view('pages.status_create_page',[
    // 		'message'=>$message
    // 		]);
    // }
}
