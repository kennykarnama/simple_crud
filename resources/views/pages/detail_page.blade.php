@extends('layouts.home')

@section('content')

	<section class="section">
	    <div class="container">

	  @php
	  	
	  	$message = '';

	  	$typeMessage = '';

	  	if($person->isEmptyAttributes()){
	  		$message = 'Not Found';
	  		$typeMessage = 'is-danger';
	  	}
	  	else{

	  		$message = 'Detail';
	  		$typeMessage = 'is-info';

	  	}

	  @endphp  	
	  
      <article class="message {{$typeMessage}}">
      <div class="message-header">
        <p>{{$message}}</p>
        <button class="delete" aria-label="delete"></button>
      </div>
    </article>


    @if(!$person->isEmptyAttributes())
	    <form>
	    	

	      <div class="field">
			  <label class="label">Nama</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Nama" id="nama" name="nama" value="{{$person->getNama()}}" disabled="true">
			  </div>
			</div>

			<div class="field">
			  <label class="label">Email</label>
			  <div class="control">
			    <input class="input" type="email" placeholder="Email" id="email" name="email" value="{{$person->getEmail()}}" disabled="true">
			  </div>
			</div>

			<div class="field">
			  <label class="label">Date Of Birth</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Date Of Birth" id="date-of-birth" name="date-of-birth" value="{{$person->getDateOfBirth()}}" disabled="true">
			  </div>
			</div>

			<div class="field">
			  <label class="label">Alamat</label>
			  <div class="control">
			    <textarea class="textarea" placeholder="Alamat" name="alamat" id="alamat" disabled="true">{{$person->getAlamat()}}</textarea>
			  </div>
			</div>
	    	
        </div>

	    	
	    </form>

	    @endif
		     </section>





@stop