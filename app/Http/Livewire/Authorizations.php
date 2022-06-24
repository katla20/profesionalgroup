<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Authorization;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class Authorizations extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $client_id, $user_id, $proceeded, 
	$proceeded_date, $signature_client, $signature_date, $skin_type, $cost_treatment,
	$history, $history_specify,$reason, $color_observation, $color_eyebrows, $color_eyerline, $color_lips, $color_other, $color_touchup ;
	public $email, $fullname, $ci, $occupation, $address, $citycode, $phone, $dob ,$knowabout;
    public $updateMode = false;

	protected $rules = [
				'skin_type' => 'required',
				'reason' => 'required',
				'proceeded_date' => 'required',
				'dob' => 'required',
				'email' => 'required|email|unique:clients',
				'fullname' => 'required',
				'signature_client'=>'required',
				'cost_treatment'=>'required'
			];

    public function render()
    {
		
		$authorization = Authorization::where('authorizations.user_id', '=', Auth::id())
							   ->select('authorizations.*', 'clients.fullname','clients.phone','clients.email')
							   ->join('clients', 'authorizations.client_id', '=', 'clients.id')
							   ->where(function($query) {
								$keyWord = '%'.$this->keyWord .'%';
								$query->where('fullname', 'LIKE', $keyWord)
										->orWhere('phone', 'LIKE', $keyWord)
										->orWhere('email', 'LIKE', $keyWord)
										->orWhere('history', 'LIKE', $keyWord)
										->orWhere('proceeded_date', 'LIKE', $keyWord)
										->orWhere('skin_type', 'LIKE', $keyWord)
										->orWhere('reason', 'LIKE', $keyWord);
								})->latest()->paginate(10);
			//dd($authorization2);//->toSql()
        
        return view('livewire.authorizations.view', [
            'authorizations' => $authorization
        ]);
    }

	public function show($id)
    {
	   // dd($id);
	   $authDetails = $this->showAuthorization($id);
	   return view('livewire.authorizations.show',['authDetails' => $authDetails]);
	}

	public function create()
    {
		$history = [
			'keloidscarring'=>'keloid scarring',
			'alcoholism'=>'alcoholism',
			'hematologicdisease'=>'active hematologic disease',
			'allergies'=>'allergies',
			'diabetes'=>'diabetes',
			'tattoos'=>'tattoos',
			'epilepsy'=>'epilepsy',
			'herpes'=>'herpes',
			'steroid'=>'steroid use',
			'cancer'=>'cancer',
			'anticoagulants'=>'anticoagulants use',
			'hepatitis'=>'hepatitis',
			'aspirin'=>'aspirin use',
			'coumarin'=>'coumarin',
			'aids'=>'aids',
			'autoinmunedisease'=>'autoinmune disease',
			'pregnant'=>'be pregnant',
			'accusant'=>'use accusant',
			'plasticsurgeries'=>'planning plastic surgeries',
			'takeiron'=>'yo take iron',
			'retina'=>'use retina',
			'medicaltreatment'=>'be in medical treatment',
			'hemophilia'=>'hemophilia',
			'contactlenses'=>'wear contact lenses',
			'dyehair'=>'dye your hair',
			'heart disease'=>'heart disease',
			'other'=>'other'
		];

        $knowabout = [
			'1'=>'Through a friend',
			'2'=>'Social media',
			'3'=>'Other'
		];

        return view('livewire.authorizations.create-wm', ['history' => $history,'knowabout' => $knowabout]);
    }

	public function save(Request $request){
		Validator::make($request->all(), [
			'skin_type' => 'required',
			'reason' => 'required',
			'proceeded_date' => 'required',
			'dob' => 'required',
			'email' => 'required|email|unique:clients',
			'fullname' => 'required',
			'signature_client'=>'required',
			'cost_treatment'=>'required'
		])->validate();

		try {

			$client = $this->saveClient($request);

			if($client){
				$authorization = $this->saveAuthorization($request,$client);
			}

		}catch (\Exception $e) {
			return redirect()->back()->withErrors(['error' => $e->getMessage()]);
		}

		return redirect('/authorizations');
		

	}

	public function saveAuthorization($request,$client){

		$authorization = [
			'client_id' => $client->id,
			'user_id' => Auth::id(),
			'proceeded' => true,
			'proceeded_date' => $request->proceeded_date,
			'signature_client' => $request->signature_client,
			'signature_date' => Carbon::now()->format('Y/m/d'),
			'skin_type' => $request->skin_type,
			'history' => json_encode($request->history),
			'history_specify' => $request->history_specify,
			'reason' => json_encode($request->reason),
			'color_observation' => $request->color_observation,
			'color_other' => $request->color_other,
			'color_touchup' => $request->color_touchup,
			'color_lips' => $request->color_lips,
			'color_eyerline' => $request->color_eyerline,
			'color_eyebrows' => $request->color_eyebrows,
			'cost_treatment' =>  $request->cost_treatment,
			'created_at' =>Carbon::now()->format('Y/m/d')
		];

		//dd($authorization);

		return Authorization::create($authorization);
	}

	public function saveClient($request){

		return Client::create([ 
			'email' => $request->email,
			'fullname' => $request->fullname,
			'occupation' => $request->occupation,
			'address' => $request->address,
			'citycode' => $request->citycode,
			'phone' => $request->phone,
			'dob' => $request->dob,
			'knowabout' => $request->knowabout
	    ]);
		
	}

	public function showAuthorization($authorization){

		$authDetails=Authorization::where('id', '=', $authorization)->with(['client','user'])->first()->toArray();//->get();

		$age = Carbon::now()->floatDiffInYears($authDetails['client']['dob']);

		$authDetails['client']['age'] = (isset($authDetails['client']['dob']))?intval($age):'';
		$authDetails['reason_string'] = implode(",",array_keys(json_decode($authDetails['reason'], true)));
		$authDetails['reason'] = json_decode($authDetails['reason']);
		$authDetails['history'] = json_decode($authDetails['history']);
        
		//dd($authDetails);
		return $authDetails;
	}

	public function pdf($authorization){

	    $fileName = "microblanding-".$authorization;

		$pdf = app('dompdf.wrapper');
		$pdf->setOptions(['setBasePath'=> public_path()]);

		$authDetails = $this->showAuthorization($authorization);

		$pdf->loadView('livewire.authorizations.pdf', compact('authDetails'));
	    //$pdf->stream($fileName.'.pdf');
		return $pdf->download($fileName.'.pdf');
	}
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->client_id = null;
		$this->user_id = null;
		$this->proceeded_date = null;
		$this->signature_client = null;
		$this->skin_type = null;
		$this->history = null;
		$this->history_specify = null;
		$this->reason = null;
		$this->color_observation = null;
		$this->cost_treatment= null;
    }
	private function resetInputClient(){
		$this->email = null;
		$this->fullname = null;
		$this->occupation = null;
		$this->address = null;
		$this->citycode = null;
		$this->phone = null;
		$this->dob = null;
		$this->knowabout = null;
	}

    public function store()
    {
        $this->validate([
		'client_id' => 'required',
		'user_id' => 'required',
		'proceeded' => 'required',
		'proceeded_date' => 'required',
		'signature_date' => 'required',
		'skin_type' => 'required',
		'history' => 'required',
		'reason' => 'required',
        ]);

        Authorization::create([ 
			'client_id' => $this-> client_id,
			'user_id' => $this-> user_id,
			'proceeded' => $this-> proceeded,
			'proceeded_date' => $this-> proceeded_date,
			'signature_client' => $this-> signature_client,
			'signature_date' => $this-> signature_date,
			'skin_type' => $this-> skin_type,
			'history' => $this-> history,
			'history_specify' => $this-> history_specify,
			'reason' => $this-> reason,
			'color_observation' => $this-> color_observation
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Authorization Successfully created.');
    }

	public function signaturePad($request){
		$image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];   
        $image_base64 = base64_decode($image_parts[1]);
	}

    public function edit($id)
    {
        $record = Authorization::findOrFail($id);

        $this->selected_id = $id; 
		$this->client_id = $record-> client_id;
		$this->user_id = $record-> user_id;
		$this->proceeded = $record-> proceeded;
		$this->proceeded_date = $record-> proceeded_date;
		$this->signature_client = $record-> signature_client;
		$this->signature_date = $record-> signature_date;
		$this->skin_type = $record-> skin_type;
		$this->history = $record-> history;
		$this->history_specify = $record-> history_specify;
		$this->colors = $record-> colors;
		$this->reason = $record-> reason;
		$this->color_observation = $record-> color_observation;
		
        $this->updateMode = true;
    }

    public function update()
    {
		
        $this->validate([
		'client_id' => 'required',
		'user_id' => 'required',
		'proceeded' => 'required',
		'proceeded_date' => 'required',
		'signature_date' => 'required',
		'skin_type' => 'required',
		'history' => 'required',
		'reason' => 'required',
		'cost_treatment' => 'required'
        ]);

        if ($this->selected_id) {
			$record = Authorization::find($this->selected_id);
            $record->update([ 
			'client_id' => $this-> client_id,
			'user_id' => $this-> user_id,
			'proceeded' => $this-> proceeded,
			'proceeded_date' => $this-> proceeded_date,
			'signature_client' => $this-> signature_client,
			'signature_date' => $this-> signature_date,
			'skin_type' => $this-> skin_type,
			'history' => $this-> history,
			'history_specify' => $this-> history_specify,
			'reason' => $this-> reason,
			'color_observation' => $this-> color_observation,
			'cost_treatment' =>  $this-> cost_treatment
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Authorization Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Authorization::where('id', $id);
            $record->delete();
        }
    }
}
