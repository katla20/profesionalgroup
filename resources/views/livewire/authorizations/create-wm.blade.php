@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white">
        <a href="{{ url('/authorizations') }}" class="btn btn-link py-2 rounded px-4 tracking-wide" role="button" ><x-vaadin-chevron-circle-left-o style="color: #374151; width:22px;height:22px;" /></a>
        <div class="col-md-8 offset-md text-center">
            <h4>Microblanding</h4>
            <hr class="my-8">
        </div>
        <div class="col-md-8 offset-md 2">
            <h4>Contact details:</h4>
                <form method="POST" id="auth_form" action="{{ route('authorizations_.save') }}">
                    @csrf
                <div class="form-group col-md-6">
                  <label for="proceeded_date" class="form-label"><font style="vertical-align: inherit;">Date</font></label>
                  <input wire:model="proceeded_date" type="date" name="proceeded_date" id="proceeded_date" class="form-control" value="{{ now()->toDateString('Y-m-d')}}" required>
                </div>
                <div class="form-group col-12">
                    <label for="name" class="form-label"><font style="vertical-align: inherit;">Full name</font></label>
                    <input wire:model="fullname" type="text" name="fullname" class="form-control" id="fullname" required>
                </div>
                <div class="form-group col-12">
                    <label for="dob" class="form-label"><font style="vertical-align: inherit;">DOB</font></label>
                    <input wire:model="dob" type="date" name="dob" class="form-control" id="dob" required>
                </div>
                <div class="form-group col-12">
                  <label for="occupation" class="form-label">
                    <font style="vertical-align: inherit;">Occupation</font>
                    <small class="text-muted">optional</small>
                  </label>
                  <input type="text" wire:model="occupation" name="occupation" class="form-control" id="occupation" placeholder="">
                </div>
                <div class="form-group col-12">
                    <label for="email" class="form-label"><font style="vertical-align: inherit;">Email</font></label>
                    <input type="text" class="form-control" wire:model="email" id="email" name="email" required >
                </div>               
                <div class="form-group col-12">
                    <label for="phonenumber" class="form-label">
                        <font style="vertical-align: inherit;">Number Phone</font>
                    </label>
                  <input type="number" class="form-control"  wire:model="phonenumber" id="phonenumber" name="phonenumber">
                </div>
                <div class="form-group col-12">
                    <label for="address" class="form-label">
                        <font style="vertical-align: inherit;">Address</font>
                        <small class="text-muted">optional</small>
                    </label>
                  <input type="text" wire:model="address" name="address" class="form-control" id="address" >
                </div>
                <div class="form-group col-12">
                    <label for="citycode" class="form-label">
                        <font style="vertical-align: inherit;">City and Zip Code</font>
                    </label>
                  <input type="text" class="form-control" wire:model="citycode" id="citycode" name="citycode">
                </div> 
                <div class="form-group col-12">
                    <label for="knowabout" class="form-label">
                        <font style="vertical-align: inherit;">Know about us by</font>
                        <small class="text-muted">optional</small>
                    </label>
                    <select class="form-control" wire:model="knowabout" name="knowabout" id="knowabout">
                        <option value="">Choose...</option>
                        <option value="1">Through a friend</option>
                        <option value="0">Social media</option>
                        <option value="2">Other</option>
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
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="checkbox"  wire:model="reason[eyebrows]" id="eyebrows" name="reason[eyebrows]" value="eyebrows" aria-label="..."></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="eyebrows">eyebrows</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start" ><input class="form-check-input" type="checkbox" wire:model="reason[eyeliner]" id="eyeliner" name="reason[eyeliner]" value="eyeliner" aria-label="..."></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="eyeliner">eyeliner</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="checkbox" id="microlips" wire:model="reason[microlips]" name="reason[microlips]" value="microlips" aria-label="..."></div>
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
                                            <div class="d-flex align-items-start"><input class="form-check-input" wire:model="history[{{$key}}]" type="checkbox" id="{{ $key }}" name="history[{{$key}}]" value="{{ $key }}" aria-label="..."></div>
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
                    <input type="text" class="form-control" wire:model="specify" id="specify" placeholder="Insert your Pathology" name="specify">
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
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="radio" id="normal" name="skin_type" value="normal" aria-label="..."></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="normal">normal</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="radio" id="dry" name="skin_type" value="dry" aria-label="..."></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="dry">dry</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="radio" id="oily" name="skin_type" value="oily" aria-label="..."></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="oily">oily</label></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row form-check form-check-inline">
                                    <div class="d-flex align-items-start"><input class="form-check-input" type="radio" id="mixed" name="skin_type" value="mixed" aria-label="..."></div>
                                    <div class="d-flex align-items-end"><label class="form-check-label" for="mixed">mixed</label></div>
                                </div>
                            </li>
                          </ul>
                        </section>
                        @error('skin_type') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr class="my-8">
                <h4>Color used:</h4>
                <div class="form-group col-12">
                    <label for="color_eyebrows" class="form-label"><font style="vertical-align: inherit;">Eyebrows</font></label>
                    <input type="text" class="form-control" id="color_eyebrows" name="color_eyebrows" wire:model="color_eyebrows">
                </div>
                <div class="form-group col-12">
                    <label for="color_eyerline" class="form-label"><font style="vertical-align: inherit;">Eyerline</font></label>
                    <input type="text" class="form-control" id="color_eyerline" name="color_eyerline" wire:model="color_eyerline">
                </div>
                <div class="form-group col-12">
                    <label for="color_lips" class="form-label"><font style="vertical-align: inherit;">Lips</font></label>
                    <input type="text" class="form-control" id="color_lips" name="color_lips" wire:model="color_lips">
                </div>
                <div class="form-group col-12">
                    <label for="color_touchup" class="form-label"><font style="vertical-align: inherit;">Touch Up</font></label>
                    <input type="text" class="form-control" id="color_touchup" name="color_touchup" wire:model="color_touchup">
                </div>
                <div class="form-group col-12">
                    <label for="color_other" class="form-label"><font style="vertical-align: inherit;">Other</font></label>
                    <input type="text" class="form-control" id="color_other" name="color_other">
                </div>
                <div class="form-group col-12">
                    <label for="color_observation" class="form-label"><font style="vertical-align: inherit;">Observations</font></label>
                    <input type="text" class="form-control" id="color_observation" name="color_observation">
                </div>
                <div class="form-group col-12">
                    <label for="cost_treatment" class="form-label">
                        <font style="vertical-align: inherit;">Cost Treatment</font>
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">$</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Cost Treatment" aria-label="Cost Treatment" id="cost_treatment" name="cost_treatment" required>
                    </div>
                </div>
                <div class="col-12">
                    <small class="text-muted">Client's signature</small>
                </div>
                <div class="col-12">
                    <div class="signature mb-2" style="width: 450px; height: 150px;">
                        <canvas id="signature-canvas"
                        style="border: 1px dashed red; width: 450px; height: 150px"></canvas>
                    </div>
                </div>
                <div class="col-12">
                    @error('signature_client') <span class="error text-danger">{{ $message }}</span> @enderror
                    <div class="">
                        <button onclick="signaturePadClear()"><i class="fa fa-trash"></i></button>
                    </div>
                    
                    <div class="form-check">
                        <br/>
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <input type="hidden" name="signature_client" id="signature_client">
                        <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                        <div class="invalid-feedback">
                                You must agree before submitting.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <br/>
                    <a href="{{ url('/authorizations') }}" class="btn btn-link py-2 rounded px-4 tracking-wide" role="button" ><x-vaadin-chevron-circle-left-o style="color: #374151; width:22px;height:22px;" /></a>
                    <button  onclick="signaturePadAdded()" class="transition bg-keppel py-2 rounded px-4 text-grey font-bold tracking-wide">{{ __('Register') }}</button>
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
