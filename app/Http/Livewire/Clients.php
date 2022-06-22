<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.clients.view', [
            'clients' => Client::latest()
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('fullname', 'LIKE', $keyWord)
						->orWhere('ci', 'LIKE', $keyWord)
						->orWhere('occupation', 'LIKE', $keyWord)
						->orWhere('address', 'LIKE', $keyWord)
						->orWhere('citycode', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('dob', 'LIKE', $keyWord)
						->orWhere('knowabout', 'LIKE', $keyWord)
						->paginate(10),
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
		//dd($record);
        /*$this->selected_id = $id; 
		$this->email = $record-> email;
		$this->fullname = $record-> fullname;
		$this->occupation = $record-> occupation;
		$this->address = $record-> address;
		$this->citycode = $record-> citycode;
		$this->phone = $record-> phone;
		$this->bob = $record-> bob;
		$this->knowabout = $record-> knowabout;
		//$this->updateMode = true;*/
		
		return view('livewire.clients.update_wm',
			['client'=>$record]
		);
		
        
    }

	public function updatenew(Request $request,$id){
		//dd($request->all());
		$record = Client::find($id);

		$validator = Validator::make($request->all());

		if ($validator->fails()) // on validator found any error 
		{
		   return redirect()->withErrors($validator)->withInput();
		}

		if($record){

			$record->fill($request->all());
			$record->save();
			return $this->render();
		}
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
            $record->delete();
        }
    }
}
