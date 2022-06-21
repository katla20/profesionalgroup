@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="list-group list-group-radio d-grid gap-2 border-0 w-auto">
  <div class="position-relative">
    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid1" value="" checked="">
    <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid1">
      <strong class="fw-semibold">First radio</strong>
      <span class="d-block small opacity-75">With support text underneath to add more detail</span>
    </label>
  </div>

  <div class="position-relative">
    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid2" value="">
    <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid2">
      <strong class="fw-semibold">Second radio</strong>
      <span class="d-block small opacity-75">Some other text goes here</span>
    </label>
  </div>

  <div class="position-relative">
    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid3" value="">
    <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid3">
      <strong class="fw-semibold">Third radio</strong>
      <span class="d-block small opacity-75">And we end with another snippet of text</span>
    </label>
  </div>

  <div class="position-relative">
    <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid4" value="" disabled="">
    <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid4">
      <strong class="fw-semibold">Fourth disabled radio</strong>
      <span class="d-block small opacity-75">This option is disabled</span>
    </label>
  </div>
</div>







        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients_.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
