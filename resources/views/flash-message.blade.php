@if (session()->has('message'))
<div wire:poll.4s class="btn btn-sm btn-danger" style="margin-top:0px; margin-bottom:0px;">
        <strong>{{ session('message') }}</strong>
</div>
@endif
 