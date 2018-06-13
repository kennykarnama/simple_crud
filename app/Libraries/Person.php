<?php

namespace App\Libraries;

/**
* 
*/
class Person
{

	private $nama;
	private $email;
	private $dateOfBirth;
	private $alamat;
	
	function __construct($nama = '',$email = '',$dateOfBirth = '',$alamat = '')
	{
		# code...
		$this->nama = $nama;

		$this->email = $email;

		$this->dateOfBirth = $dateOfBirth;

		$this->alamat = $alamat;
	}

	public function formatToCSV()
	{
		# code...
		$csv = $this->nama.",".$this->email.",".$this->dateOfBirth.",".$this->alamat;

		return $csv;
	}

	public function retrieveFromCSV($csv = '')
	{
		# code...

		$attributes = array();

		if(strcmp($csv, '')!=0){
			
			$attributes = explode(",", $csv);

			if(strcmp($attributes[0], "Not Found")!=0){
				$this->nama = $attributes[0];

			$this->email = $attributes[1];

			$this->dateOfBirth = $attributes[2];

			$this->alamat  =$attributes[3];
	
			}

			
		}

		return $attributes;
	}

	public function isEmptyAttributes()
	{
		# code...
		return (
			empty($this->nama) && empty($this->email) && empty($this->dateOfBirth) 
				&& empty($this->alamat)
			);
	}

	public function getNama()
	{
		# code...
		return $this->nama;
	}

	public function getEmail()
	{
		# code...
		return $this->email;
	}

	public function getDateOfBirth()
	{
		# code...
		return $this->dateOfBirth;
	}

	public function getAlamat()
	{
		# code...
		return $this->alamat;
	}
}