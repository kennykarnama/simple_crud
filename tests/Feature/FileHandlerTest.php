<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Libraries\FileHandler;

class FileHandlerTest extends TestCase
{
    public function testInstanceNotNull()
	{
		# code...
		$fileHandler = new FileHandler();

		$this->assertNotNull($fileHandler);
	}

	public function testAttributesNotNull()
    {
    	# code...
    	$fileHandler = new FileHandler();

    	$this->assertNotNull($fileHandler->getLocation());

    }

    public function testRetrieveFileContents()
    {
    	# code...

    	// file and location not found

    	$fileHandler = new FileHandler('test');

    	$contents = $fileHandler->retrieveFileContents('zzz','txt');

    	// location found, file not found

    	$this->assertNull($contents);

    	$fileHandler = new FileHandler('csv');

    	$contents = $fileHandler->retrieveFileContents('meong2-14062018051121','txt');

    	$this->assertNull($contents);

    	// location found, file found

    	$fileHandler = new FileHandler('csv');

    	$contents = $fileHandler->retrieveFileContents('meong-14062018051121','txt');

    	$this->assertNotNull($contents);


    	

    }

    public function testWriteToFile()
    {
    	# code...
    	// location not found

    	$fileHandler = new FileHandler('test');

    	$csv = 'kenny,kennykarnama@gmail.com,1996-24-09,Surabaya Mulyorejo';

    	$writeStatus = $fileHandler->writeToFile('zzz',$csv,'txt');

    	$this->assertFalse($writeStatus);

    	// location found

    	$fileHandler = new FileHandler('csv');

    	$csv = 'kenny,kennykarnama@gmail.com,1996-24-09,Surabaya Mulyorejo';

    	$writeStatus = $fileHandler->writeToFile('zzz',$csv,'txt');

    	$this->assertTrue($writeStatus);
    }

}
