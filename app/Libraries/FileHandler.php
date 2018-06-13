<?php

/**
* 
*/
namespace App\Libraries;

use Illuminate\Support\Facades\Storage;

class FileHandler
{
	
	private $location;

	function __construct($location)
	{
		# code...
		$this->location = $location;
	}

	public function retrieveFileContents($fileName,$fileExtension)
	{
		# code...

		$exists = Storage::disk($this->location)->exists($fileName.'.'.$fileExtension);



		if($exists){

			$contents = Storage::disk($this->location)->get($fileName.'.'.$fileExtension);

			return $contents;
		}

		else{
			return "Not Found";
		}
	}

	public function writeToFile($fileName, $fileContent,$fileExtension)
	{
		# code...
		Storage::disk($this->location)->put($fileName.'.'.$fileExtension, $fileContent);

		$exists = Storage::disk($this->location)->exists($fileName.'.'.$fileExtension);

		return $exists;
	}
}