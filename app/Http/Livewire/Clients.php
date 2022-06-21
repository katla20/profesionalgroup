<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;

class Clients extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $email, $fullname, $ci, $occupation, $address, $citycode, $phone, $bob ,$knowabout;
    public $updateMode = false;

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
						->orWhere('bob', 'LIKE', $keyWord)
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
		$this->bob = null;
		$this->knowabout = null;
    }

    public function store()
    {
        $this->validate([
		'email' => 'required',
		'fullname' => 'required',
		'phone' => 'required',
		'bob' => 'required',
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

        $this->selected_id = $id; 
		$this->email = $record-> email;
		$this->fullname = $record-> fullname;
		$this->ci = $record-> ci;
		$this->occupation = $record-> occupation;
		$this->address = $record-> address;
		$this->citycode = $record-> citycode;
		$this->phone = $record-> phone;
		$this->bob = $record-> bob;
		$this->knowabout = $record-> knowabout;
		
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'email' => 'required',
		'fullname' => 'required',
		'phone' => 'required',
		'bob' => 'required',
		'knowabout' => 'required'
        ]);

        if ($this->selected_id) {
			$record = Client::find($this->selected_id);
            $record->update([ 
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
            $this->updateMode = false;
			session()->flash('message', 'Client Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Client::where('id', $id);
            $record->delete();
        }
    }
}
