@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white">
        <a href="{{ URL::previous() }}" class="btn btn-link py-2 rounded px-4 tracking-wide" role="button"><x-vaadin-chevron-circle-left-o style="color: #374151; width:22px;height:22px;" /></i></a>
        <div class="col-md-8 offset-md text-center">
            <h4>update user</h4>
            <hr class="my-8">
        </div>
        <div class="col-md-8 offset-md 2">
            <h4>Contact details:</h4>
                <form method="POST" id="client_form" action="{{ route('clients_.update', $client->id) }}">
                @method('PUT')
                @csrf
                <input type="hidden" wire:model="selected_id" value="{{$client->id}}">    
                <div class="form-group col-12">
                    <label for="name" class="form-label"><font style="vertical-align: inherit;">Full name</font></label>
                    <input wire:model="fullname" type="text" name="fullname" class="form-control" id="fullname"  value="{{ old('fullname', $client->fullname) }}">
                </div>
                <div class="form-group col-12">
                    <label for="dob" class="form-label"><font style="vertical-align: inherit;">DOB</font></label>
                    <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $client->dob) }}">
                </div>
                <div class="form-group col-12">
                  <label for="occupation" class="form-label">
                    <font style="vertical-align: inherit;">Occupation</font>
                    <small class="text-muted">optional</small>
                  </label>
                  <input type="text" name="occupation" class="form-control" id="occupation" placeholder="" value="{{ old('occupation', $client->occupation) }}">
                </div>
                <div class="form-group col-12">
                    <label for="email" class="form-label"><font style="vertical-align: inherit;">Email</font></label>
                    <input type="text" class="form-control"  id="email" name="email" value="{{ old('email', $client->email) }}">
                </div>               
                <div class="form-group col-12">
                    <label for="phonenumber" class="form-label">
                        <font style="vertical-align: inherit;">Number Phone</font>
                    </label>
                  <input type="number" class="form-control"   id="phone" name="phone" value="{{ old('phone') ?? $client->phone}}">
                </div>
                <div class="form-group col-12">
                    <label for="address" class="form-label">
                        <font style="vertical-align: inherit;">Address</font>
                        <small class="text-muted">optional</small>
                    </label>
                  <input type="text" name="address" class="form-control" id="address" value="{{ old('address') ?? $client->address}}" >
                </div>
                <div class="form-group col-12">
                    <label for="citycode" class="form-label">
                        <font style="vertical-align: inherit;">City and Zip Code</font>
                    </label>
                  <input type="text" class="form-control" id="citycode" name="citycode" value="{{ old('citycode') ?? $client->citycode}}">
                </div> 
                <div class="form-group col-12">
                    <label for="knowabout" class="form-label">
                        <font style="vertical-align: inherit;">Know about us by</font>
                        <small class="text-muted">optional</small>
                    </label>
                    <select class="form-control" name="knowabout" id="knowabout" value="{{ old('knowabout') ?? $client->knowabout}}">
                        <option value="">Choose...</option>
                        <option value="1">Through a friend</option>
                        <option value="0">Social media</option>
                        <option value="2">Other</option>
                    </select>
                </div>
                @if ($errors->any())
                    <div class="error text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <div class="col-12">
                    <br/>
                    <a href="{{ url('/clients') }}" class="btn btn-link py-2 rounded px-4 tracking-wide" role="button" ><x-vaadin-chevron-circle-left-o style="color: #374151; width:22px;height:22px;" /></a>
                    <button  onclick="update()" class="transition bg-keppel py-2 rounded px-4 text-grey font-bold tracking-wide">{{ __('Update') }}</button>
                    <button  type="reset" class="float-right btn btn-link">
                        <x-vaadin-rotate-left style="color: #374151; width:18px;height:18px;" />
                    </button>
                </div>
          </form>
        </div>
    </div>
</div>
<style>

label{
    font-size: 1.075em;
    color:darkslategrey;
}

</style>
<script type="text/javascript">
    console.log('work javascript');

    function update(){
        document.getElementById("client_form").submit();
    }
</script>
@endsection
