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


}
