@extends('layouts.home')

@section('content')

	<section class="section">
	    <div class="container">

      <article class="message">
      <div class="message-header">
        <p>Simple CRUD</p>
      </div>
    </article>

	    <form>
	    	
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
			    <input class="input sr-date" type="text"  id="date-of-birth" name="date-of-birth">
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

				  <button class="button is-link" id="btn-submit-form">
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

    var dateOfBirth;

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

  

    dateOfBirth = new bulmaCalendar( document.getElementById( 'date-of-birth' ),{
     
    closeOnSelect: true,
    // callback function
    onSelect: null,   // callback(new Date(year, month, day))
    onOpen: null,     // callback(this)
    onClose: null,    // callback(this)
    onRender: null    // callback(this)
    });
        // process the form
   

      $('#btn-submit-form').click(function (e) {
        // body...
        e.preventDefault();

         var formData = {
            'nama'              : $('input[name=nama]').val(),
            'email'             : $('input[name=email]').val(),
            'date-of-birth'     : $('input[name=date-of-birth').val(),
            'alamat'            : $.trim($("#alamat").val())
        };

        // process the form

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : "{{route('home.create')}}", // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
            // using the done promise callback
            .done(function(data) {

              if(data.status == 1){
                window.location.replace("{{route('home.submission_result')}}");
                
              }
              else{

                  var str = "";

                   for(var i=0;i<data.errors.length;i++){
                     var sub_str = "<p><b>"+data.errors[i]+" </b>"+"<p>";
                     str+=sub_str;
                   }

                   $('#modal-pesan-error-form .modal-card-body').html(str);

                   $('#modal-pesan-error-form').addClass('is-active');
              }

                
        });


      });

      
       

       
  	});
  </script>

  @endpush

@stop