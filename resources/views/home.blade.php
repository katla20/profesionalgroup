@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				
				<h5>Hi <strong><span role="img" aria-label="waving hand">👋</span> {{ Auth::user()->name }},
					</strong> {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}
				</h5>
			</div>
			<div class="card-body">
				<div class="row w-100">
					<div class="col-md-3 m-3">
                        <div class="card card-section border-info p-3 text-center" >
                            <a href="{{ route('authorizations_.create') }}" class="nav-link">
								<h4>New Microblanding</h4>
                            </a>
                        </div>
					</div>
					<div class="col-md-3 m-3">
                        <div class="card card-section border-info p-3 text-center" >
                            <a href="{{ url('/authorizations') }}" class="nav-link">
								<h4>Search Microblanding</h4>
                            </a>
                        </div>
					</div>
                    <div class="col-md-3 m-3">
                        <div class="card card-section border-info text-info p-3 text-center" >
							<a href="{{ url('/clients') }}" class="nav-link">
                                <h4>Search Client</h4>
                            </a> 
                        </div>
					</div>
				</div>
		</div>
	</div>
</div>
</div>
<style type="text/css">
    .card-section{
		background-color: #08AEEA;
		background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);
		border: 0px;

	}
	

</style>
@endsection