@extends('layouts.home')

@section('content')
	<section class="section">
		
		<div class="container">
			<article class="message is-primary">
				  <div class="message-header">
				    <p>Submission Result</p>
				 
				  </div>
				  <div class="message-body">
				   {{Session::get('message')}}
				  </div>
				</article>
		</div>
	</section>
@stop