<?php

/**
* 
*/
namespace App\Libraries;

use Illuminate\Support\Facades\Storage;

class FileHandler
{
	
	private $location;

	function __construct($location = '')
	{
		# code...
		$this->location = $location;
	}

	public function retrieveFileContents($fileName = '',$fileExtension = '')
	{
		# code...

		try {

			$exists = Storage::disk($this->location)->exists($fileName.'.'.$fileExtension);

			if($exists){

				$contents = Storage::disk($this->location)->get($fileName.'.'.$fileExtension);

				return $contents;
			}

			else{
				return null;
			}
			
		} catch (\Exception $e) {

			return null;
			
		}

		
	}

	public function writeToFile($fileName = '', $fileContent = '',$fileExtension = '')
	{
		# code...

		try {

			Storage::disk($this->location)->put($fileName.'.'.$fileExtension, $fileContent);

			$exists = Storage::disk($this->location)->exists($fileName.'.'.$fileExtension);

			return $exists;
			
		} catch (\Exception $e) {

			return false;
			
		}
		
	}

	public function getLocation()
	{
		# code...
		return $this->location;
	}
}