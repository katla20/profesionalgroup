@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><x-vaadin-home-o style="color: #374151; width:22px;height:22px;" /> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
                @guest
                    Please contact admin to get your Login Credentials or click "Login" to go to your Dashboard.
                @else
                        Hi <span role="img" aria-label="waving hand">👋</span> {{ Auth::user()->name }}, Welcome back to {{ config('app.name', 'Laravel') }}
                        <a class="navbar-brand" href="{{ url('/home') }}">{{__(' Go to Options')}}</a>
                @endif	
				</h5>				
			</div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection