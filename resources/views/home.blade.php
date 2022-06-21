@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><x-vaadin-home-o style="color: #374151; width:22px;height:22px;" /> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hi <strong>{{ Auth::user()->name }},</strong> {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}</h5>
				</br> 
				<hr>
				<!--<img height="50px" width="50px" src='{{Auth::user()->name}}' />-->
				
				<div class="row w-100">
					<div class="col-md-3 m-3">
                        <div class="card border-info text-info p-3 text-center" >
                            <a href="{{ url('/authorizations') }}" class="nav-link">
                                <h4>Microblandings</h4>
                            </a> 
                        </div>
					</div>
                    <div class="col-md-3 m-3">
                        <div class="card border-info text-info p-3 text-center" >
							<!--<a href="{{ url('/clients') }}" class="nav-link">-->
                            <a href="#" class="nav-link">
                                <h4>Clients</h4>
                            </a> 
                        </div>
					</div>
				</div>
		</div>
	</div>
</div>
</div>
@endsection