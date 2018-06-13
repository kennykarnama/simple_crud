@extends('layouts.home')

@section('content')

	<section class="section">
	    <div class="container">

	    <form name="form" id="form" method="POST" action="{{route('home.create')}}" onsubmit="return validateForm()">
	    	
	    	 @csrf

	      <div class="field">
			  <label class="label">Nama</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Nama" id="nama" name="nama">
			  </div>
			</div>

			<div class="field">
			  <label class="label">Email</label>
			  <div class="control">
			    <input class="input" type="email" placeholder="Email" id="email" name="email">
			  </div>
			</div>

			<div class="field">
			  <label class="label">Date Of Birth</label>
			  <div class="control">
			    <input class="input" type="text" placeholder="Date Of Birth" id="date-of-birth" name="date-of-birth">
			  </div>
			</div>

			<div class="field">
			  <label class="label">Alamat</label>
			  <div class="control">
			    <textarea class="textarea" placeholder="Alamat" name="alamat" id="alamat"></textarea>
			  </div>
			</div>

			<div class="field is-grouped">
				  <p class="control">

				  <button class="button is-link" type="submit">
				  	Submit
				  </button>
				   
				  </p>
				 
				  <p class="control">
				    <button class="button is-danger" id="btn-reset-form" type="button">
				      Reset
				    </button>
				  </p>
				</div>
	    	</div>

	    	
	    </form>
		     </section>

<div class="modal" id="modal-pesan-error-form">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Error!</p>
      <button class="delete btn-tutup-modal" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->
    </section>
    <footer class="modal-card-foot">
    </footer>
  </div>
</div>

  @push('scripts')


  <script type="text/javascript">

  function validateForm() {
  	// body...
  	var inputs = document.forms["form"].getElementsByTagName("input");

  	var textareas = document.forms["form"].getElementsByTagName("textarea");


  	var err = [];

    for(var i=0; i < inputs.length; i++){

    	
    	if(inputs[i].value == ""){

    		err.push(inputs[i].placeholder);


    	}
    	
    }

    for(var i=0; i < textareas.length; i++){

    	if(textareas[i].value == ""){

    		err.push(textareas[i].placeholder);


    	}
    }

    if(err.length > 0){

    	var str = "";

    	for(var i=0;i<err.length;i++){
    		var sub_str = "<p><b>"+err[i]+" </b>tidak boleh kosong"+"<p>";
    		str+=sub_str;
    	}


    	$('#modal-pesan-error-form .modal-card-body').html(str);

    	$('#modal-pesan-error-form').addClass('is-active');

    	return false;
    
    }

    else{
    	return true;
    }

    
  }
  	$(document).ready(function () {
  		// body...

  		$('.btn-tutup-modal').click(function () {
  			// body...
  			$('.modal').removeClass('is-active');
  		});

  		$('#btn-reset-form').click(function () {
  			// body...
  			document.getElementById("form").reset();
  		});
  	});
  </script>

  @endpush

@stop