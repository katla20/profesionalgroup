@extends('layouts.app')
@section('content')
<link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
<div class="container-fluid">
    <div class="row justify-content-center">
			<h2 class="text-center" style="color: #374151;">COMING SOON...</h2>
            <br>
            <a href="{{ route('authorizations_.pdf',$authorizations_) }}">
                <button type="button" class="transition bg-keppel py-2 rounded px-4 text-grey font-bold tracking-wide">{{ __('Print') }}</button>
            </a>
            <br>
            <x-vaadin-tools style="color: #374151; width:60%;height:60%;text-align:center" />    
    </div>   
</div>
<script type="text/javascript">
    console.log('print javascript');
</script>
@endsection
