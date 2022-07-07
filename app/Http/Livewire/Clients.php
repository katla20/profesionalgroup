<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;
use App\Models\Authorization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Clients extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $email, $fullname, $ci, $occupation, $address, $citycode, $phone, $dob ,$knowabout;
    public $updateMode = false;

	protected $rules = [
		'dob' => 'required',
		'email' => 'required',
		'fullname' => 'required',
	];

    public function render()
    {

		$client = Authorization::where('authorizations.user_id', '=', Auth::id())
								->where('clients.delete', '=', false)
							   	->select('clients.*')
							   	->join('clients', 'authorizations.client_id', '=', 'clients.id')
								->where(function($query) {
								 $keyWord = '%'.$this->keyWord .'%';
								 $query->where('fullname', 'LIKE', $keyWord)
										 ->orWhere('phone', 'LIKE', $keyWord)
										 ->orWhere('email', 'LIKE', $keyWord)
										 ->orWhere('phone', 'LIKE', $keyWord)
										 ->orWhere('dob', 'LIKE', $keyWord);
								 })->latest()->paginate(10);

        return view('livewire.clients.view', [
            'clients' => $client
        ]);

    }

	public function create()
    {
        return view('livewire.clients.create-wm');
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
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
		'email' => 'required',
		'fullname' => 'required',
		'phone' => 'required',
		'dob' => 'required',
		'knowabout' => 'required'
        ]);

        Client::create([ 
			'email' => $this-> email,
			'fullname' => $this-> fullname,
			'ci' => $this-> ci,
			'occupation' => $this-> occupation,
			'address' => $this-> address,
			'citycode' => $this-> citycode,
			'phone' => $this-> phone,
			'bob' => $this-> bob,
			'knowabout' => $this-> knowabout
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Client Successfully created.');
    }

    public function edit($id)
    {	
        $record = Client::findOrFail($id);
		$knowabout = [
			'1'=>'Through a friend',
			'2'=>'Social media',
			'3'=>'Other'
		];
		return view('livewire.clients.update_wm',
			['client'=>$record,'knowabout' => $knowabout]
		);
    }

    public function update(Request $request,$id)
    {
		
        $record = Client::find($id);

		$validator = Validator::make($request->all(),[
			'dob' => 'required',
			'email' => ['required', Rule::unique('clients')->ignore($id)],
			'fullname' => 'required',
		])->validate();


		if($record){

			$record->fill($request->all());
			$record->save();

		}

		return redirect('/authorizations');
        
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Client::where('id', $id);
			$auth=Authorization::where('client_id', '=', $id)->count();
			if($auth){
				session()->flash('message', 'the client has a procedure performed');
				return back();
			}


			$record->update([ 
				'delete' => true,
				'updated_at' => now()
			]);
			session()->flash('message', 'client delete.');
			return back();
            //$record->delete();
        }
    }
}
