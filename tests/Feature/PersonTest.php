<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Libraries\Person;

class PersonTest extends TestCase
{

	public function testInstanceNotNull()
	{
		# code...
		$person = new Person();

		$this->assertNotNull($person);
	}
    
    public function testAttributesNotNull()
    {
    	# code...
    	$person = new Person();

    	$this->assertNotNull($person->getNama());

    	$this->assertNotNull($person->getEmail());
    	
    	$this->assertNotNull($person->getDateOfBirth());
    	
    	$this->assertNotNull($person->getAlamat());

    }

    public function testAttributesIsEmptyString()
    {
    	# code...
    	$person = new Person();

    	$this->assertTrue($person->isEmptyAttributes());
    
    }

    public function testAttributesIsNotEmptyString()
    {
        # code...
        $person = new Person("kenny","kennykarnama@gmail.com","1996-24-09","Surabaya Mulyorejo");

        $this->assertFalse($person->isEmptyAttributes());
    
    }

    public function testFormatToCSV()
    {
        # code...

        $person = new Person();

        $this->assertEquals($person->formatToCSV(),"");

        $person = new Person("kenny","kennykarnama@gmail.com","1996-24-09","Surabaya Mulyorejo");

        $csv_result = $person->getNama().",".$person->getEmail().','.$person->getDateOfBirth().','.$person->getAlamat();

        $this->assertEquals($person->formatToCSV(),$csv_result);
    
    }

    public function testRetrieveFromCSV()
    {
           # code...
        $person = new Person();

        $csv = 'kenny,kennykarnama@gmail.com,1996-24-09,Surabaya Mulyorejo';

        $countData = count(explode(",", $csv));

        $person->retrieveFromCSV($csv);

        $attributes = $person->getAttributes();

        $countNonEmpty = 0;

        foreach ($attributes as $key => $value) {
            # code...
            if(!empty($value)){
                $countNonEmpty++;
            }
        }

        $this->assertEquals($countData,$countNonEmpty);

        $person = new Person();

        $csv = null;

        $countData = 0;

        $person->retrieveFromCSV($csv);

        $attributes = $person->getAttributes();

        $countNonEmpty = 0;

        foreach ($attributes as $key => $value) {
            # code...
            if(!empty($value)){
                $countNonEmpty++;
            }
        }

        $this->assertEquals($countData,$countNonEmpty);

    }       



}
