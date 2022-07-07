@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white">
        <a href="{{ URL::previous() }}" class="btn btn-link py-2 rounded px-4 tracking-wide" role="button"><x-vaadin-chevron-circle-left-o style="color: #374151; width:22px;height:22px;" /></i></a>
        <div class="col-md-8 offset-md text-center">
            <h4>Microblanding</h4>
            <hr class="my-8">
        </div>
        <div class="col-md-8 offset-md 2">
            <h4>👸 Contact details:</h4>
                <form method="POST" id="auth_form" action="{{ route('authorizations_.save') }}">
                    @csrf
                <div class="form-group col-md-6">
                  <label for="proceeded_date" class="form-label"><font style="vertical-align: inherit;">Date</font></label>
                  <input wire:model="proceeded_date" type="date" name="proceeded_date" id="proceeded_date" class="form-control" value="{{ now()->toDateString('Y-m-d')}}" value="{{ old('proceeded_date') }}">@error('proceeded_date') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-12">
                    <label for="name" class="form-label"><font style="vertical-align: inherit;">Full name</font></label>
                    <input wire:model="fullname" type="text" name="fullname" class="form-control" id="fullname" value="{{ old('fullname') }}">@error('fullname') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-12">
                    <label for="dob" class="form-label"><font style="vertical-align: inherit;">DOB</font></label>
                    <input wire:model="dob" type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}">
                </div>
                <div class="form-group col-12">
                  <label for="occupation" class="form-label">
                    <font style="vertical-align: inherit;">Occupation</font>
                    <small class="text-muted">optional</small>
                  </label>
                  <input type="text" wire:model="occupation" name="occupation" class="form-control" id="occupation" placeholder="" value="{{ old('occupation') }}">
                </div>
                <div class="form-group col-12">
                    <label for="email" class="form-label"><font style="vertical-align: inherit;">Email</font></label>
                    <input type="text" class="form-control" wire:model="email" id="email" name="email" value="{{ old('email') }}">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>               
                <div class="form-group col-12">
                    <label for="phonenumber" class="form-label">
                        <font style="vertical-align: inherit;">Number Phone</font>
                    </label>
                  <input type="number" class="form-control"  wire:model="phone" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group col-12">
                    <label for="address" class="form-label">
                        <font style="vertical-align: inherit;">Address</font>
                        <small class="text-muted">optional</small>
                    </label>
                  <input type="text" wire:model="address" name="address" class="form-control" id="address" value="{{ old('address') }}" >
                </div>
                <div class="form-group col-12">
                    <label for="citycode" class="form-label">
                        <font style="vertical-align: inherit;">City and Zip Code</font>
                    </label>
                  <input type="text" class="form-control" wire:model="citycode" id="citycode" name="citycode" value="{{ old('citycode') }}">
                </div> 
                <div class="form-group col-12">
                    <label for="knowabout" class="form-label">
                        <font style="vertical-align: inherit;">Know about us by</font>
                        <small class="text-muted">optional</small>
                    </label>
                    <select class="form-control" wire:model="knowabout" name="knowabout" id="knowabout">
                        <option value="">Choose...</option>
                        @foreach ($knowabout as $key => $val)
                            <option value="{{ $key }}" @selected(old('knowabout') == $key)>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <!--section 2-->
                <hr class="my-8">
                <h4>Reason for consultation:<br/>
                    <small class="d-block text-muted">
                        <i class="fa fa-check-double"></i>Choose list...     
                    </small>
                </h4>
                <div class="col-12">
                    <div class="bg-white border-info">
                        <section class="w-100">
                          <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="checkbox"  wire:model="reason[eyebrows]" id="eyebrows" name="reason[eyebrows]" value="eyebrows" aria-label="..." {{ (is_array(old('reason')) && in_array('eyebrows', old('reason'))) ? ' checked' : '' }}></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="eyebrows">eyebrows</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start" ><input class="form-check-input" type="checkbox" wire:model="reason[eyeliner]" id="eyeliner" name="reason[eyeliner]" value="eyeliner" aria-label="..." {{ (is_array(old('reason')) && in_array('eyeliner', old('reason'))) ? ' checked' : '' }}></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="eyeliner">eyeliner</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="checkbox" id="microlips" wire:model="reason[microlips]" name="reason[microlips]" value="microlips" aria-label="..." {{ (is_array(old('reason')) && in_array('microlips', old('reason'))) ? ' checked' : '' }}></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="microlips">microlips</label></div>
                                </div>
                            </li>
                          </ul>
                          @error('reason') <span class="error text-danger">{{ $message }}</span> @enderror
                        </section>
                    </div>
                </div>

                <hr class="my-8">
                <h4>Pathological history:<br/>
                    <small class="d-block text-muted">
                        <i class="fa fa-check-double"></i>Choose list...     
                    </small>
                </h4>
                <div class="col-12">
                    <div class="bg-white border-info">
                        <section class="w-100">
                            <ul class="list-group">
                                @foreach ($history as $key => $value)
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row form-check form-check-inline">
                                            <div class="d-flex align-items-start"><input class="form-check-input" wire:model="history[{{$key}}]" type="checkbox" id="{{ $key }}" name="history[{{$key}}]" value="{{ $key }}" aria-label="..." {{ (is_array(old('history')) && in_array($key, old('history'))) ? ' checked' : '' }}></div>
                                            <div class="d-flex align-items-end"><label class="form-check-label" for="{{ $key }}">{{ $value }}</label></div>
                                        </div>
                                    </li>
                                @endforeach
                              </ul>
                        </section>
                    </div>
                </div>
                <div class="col-12">
                    <label for="specify" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Specify</font></font></label>
                    <input type="text" class="form-control" wire:model="specify" id="specify" placeholder="Insert your Pathology" name="specify" value="{{ old('specify') }}">
                </div>
                
                <small class="text-muted">If you suffer of any above, your procedure will be suspended according to each case.</small>
                
                <h4>Physical exam:<br>
                    <small class="d-block text-muted">
                        <i class="fa fa-check-double"></i>Skin type</small>
                </h4>
                <div class="col-12">
                    <div class="bg-white border-info">
                        <section class="w-100">
                          <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start">
                                        <input class="form-check-input" type="radio" id="normal" name="skin_type" value="normal" aria-label="..." {{ old('skin_type') == 'normal' ? 'checked' : '' }}>
                                    </div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="normal">normal</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start">
                                        <input class="form-check-input" type="radio" id="dry" name="skin_type" value="dry" aria-label="..." {{ old('skin_type') == 'dry' ? 'checked' : '' }}>
                                    </div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="dry">dry</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start">
                                        <input class="form-check-input" type="radio" id="oily" name="skin_type" value="oily" aria-label="..." {{ old('skin_type') == 'oily' ? 'checked' : '' }}>
                                    </div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="oily">oily</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start">
                                        <input class="form-check-input" type="radio" id="mixed" name="skin_type" value="mixed" aria-label="..."  {{ old('skin_type') == 'mixed' ? 'checked' : '' }}>
                                    </div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="mixed">mixed</label></div>
                                </div>
                            </li>
                          </ul>
                        </section>
                        @error('skin_type') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr class="my-8">
                <h4>🎨 Color used:</h4>
               {{--request()->is('fullname')--}}
                <div class="form-group col-12">
                   {{--@includeWhen($boolean, 'view.name', ['some' => 'data'])--}} 
                    <label for="color_eyebrows" class="form-label"><font style="vertical-align: inherit;">Eyebrows</font></label>
                    <input type="text" class="form-control" id="color_eyebrows" name="color_eyebrows" wire:model="color_eyebrows" value="{{ old('color_eyebrows') }}">
                </div>
                <div class="form-group col-12">
                    <label for="color_eyerline" class="form-label"><font style="vertical-align: inherit;">Eyerline</font></label>
                    <input type="text" class="form-control" id="color_eyerline" name="color_eyerline" wire:model="color_eyerline" value="{{ old('color_eyerline') }}">
                </div>
                <div class="form-group col-12">
                    <label for="color_lips" class="form-label"><font style="vertical-align: inherit;">Lips</font></label>
                    <input type="text" class="form-control" id="color_lips" name="color_lips" wire:model="color_lips" value="{{ old('color_lips') }}">
                </div>
                <div class="form-group col-12">
                    <label for="color_touchup" class="form-label"><font style="vertical-align: inherit;">Touch Up</font></label>
                    <input type="text" class="form-control" id="color_touchup" name="color_touchup" wire:model="color_touchup" value="{{ old('color_touchup') }}">
                </div>
                <div class="form-group col-12">
                    <label for="color_other" class="form-label"><font style="vertical-align: inherit;">Other</font></label>
                    <input type="text" class="form-control" id="color_other" name="color_other" value="{{ old('color_other') }}">
                </div>
                <div class="form-group col-12">
                    <label for="color_observation" class="form-label"><font style="vertical-align: inherit;">Observations</font></label>
                    <input type="text" class="form-control" id="color_observation" name="color_observation" value="{{ old('color_observation') }}">
                </div>
                <div class="form-group col-12">
                    <label for="cost_treatment" class="form-label">
                        <font style="vertical-align: inherit;">Cost Treatment</font>
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">💰</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Cost Treatment" aria-label="Cost Treatment" id="cost_treatment" name="cost_treatment">
                    </div>
                    @error('cost_treatment') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 mb-2">
                    <button type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        [Read image release terms]
                    </button>
                    <div class="collapse" id="collapseExample">
                        @include('livewire.terms')
                    </div>
                </div>
                <div class="col-12">
                    <small>Client's signature</small>
                </div>
                <div class="col-12">
                    <div class="signature mb-2" style="width: 450px; height: 150px;">
                        <canvas id="signature-canvas"
                        style="border: 1px dashed red; width: 450px; height: 150px"></canvas>
                    </div>
                    <input type="hidden" name="signature_client" id="signature_client">
                </div>
                <div class="col-12">
                    @error('signature_client') <span class="error text-danger">{{ $message }}</span> @enderror
                    <div class="">
                        <button onclick="signaturePadClear()"><i class="fa fa-trash"></i></button>
                    </div>
                    <br/>
                </div>
                <div class="col-12">
                    <br/>
                    <a href="{{ url('/authorizations') }}" class="btn btn-link py-2 rounded px-4 tracking-wide" role="button" ><x-vaadin-chevron-circle-left-o style="color: #374151; width:22px;height:22px;" /></a>
                    <button
                        onclick="signaturePadAdded()"
                        class="transition bg-keppel py-2 rounded px-4 text-grey font-bold tracking-wide">
                        {{ __('Register') }}
                    </button>
                    <button  type="reset" class="float-right btn btn-link">
                        <x-vaadin-rotate-left style="color: #374151; width:18px;height:18px;" />
                    </button>
                </div>
          </form>
        </div>
    </div>
</div>
<style type="text/css">
label{
    font-size: 1.075em;
    color:darkslategrey;
}
#label_image_release{
    margin-left: 3.075em;
}

</style>
<script type="text/javascript">
    console.log('work javascript');
    window.addEventListener('load', async ()=> {  
        const canvas = document.querySelector("canvas");
        canvas.height = canvas.offsetHeight;
        canvas.width = canvas.offsetWidth;
        signaturePad = new SignaturePad(canvas, {});
    });

    function signaturePadAdded(){
    
        if (signaturePad.isEmpty()) {
                console.log("Please sign document!");
                return false
        }

        const signatureImage = signaturePad.toDataURL();
       
        document.getElementById("signature_client").value = signatureImage;
       // console.log('hide base64=>',document.getElementById("signature_client").value);
        document.getElementById("auth_form").submit();
    }

    function signaturePadClear(){
        signaturePad.clear();
        //console.log('clear base64=>',signatureImage);
        document.getElementById("signature_client").value = "";
    }

</script>
@endsection
