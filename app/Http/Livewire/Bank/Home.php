<?php

namespace App\Http\Livewire\Bank;

use App\Models\Customer;
use Livewire\Component;
use App\Models\Group;
use App\Models\Transaction;

class Home extends Component
{

    public $customer;
    public $search;
    public $searchResult;
    public $amount;
    public $groups;
    public $type;

    public function mount() {
        if(Group::all()->count()) {
            $this->type = Group::first()->id;
        }
        $this->groups = Group::all();
    }

    public function render()
    {
        if($this->search) {
            $this->searchResult = Customer::where('name','like','%'.$this->search.'%')->get();
        }
        else {
            $this->searchResult = null;
        }
        return view('livewire.bank.home',[
            'searchResult' => $this->searchResult,
        ]);
    }

    public function selectCustomer(Customer $customer) {
        $this->customer = $customer;
        $this->searchResult = null;
        $this->search = null;
    }

    public function add() {
        $betrag = $this->amount;
        $betrag = str_replace(",",".",$betrag);
        $betrag = str_replace("€","",$betrag);
        $betrag = trim($betrag);
        if(!is_numeric($betrag)) {
            return;
        }

        $this->customer->amount = $this->customer->amount + $betrag;
        $this->customer->save();

        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->customer_id = $this->customer->id;
        $transaction->amount = $betrag;
        $transaction->direction = "add";
        $transaction->type = $this->type;
        $transaction->save();

        $this->amount = null;
    }

    public function sub() {
        $betrag = $this->amount;
        $betrag = str_replace(",",".",$betrag);
        $betrag = str_replace("€","",$betrag);
        $betrag = trim($betrag);
        if(!is_numeric($betrag)) {
            return;
        }

        $this->customer->amount = $this->customer->amount - $betrag;
        $this->customer->save();

        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->customer_id = $this->customer->id;
        $transaction->amount = $betrag;
        $transaction->direction = "sub";
        $transaction->type = $this->type;
        $transaction->save();

        $this->amount = null;
    }

    public function resetCustomer() {
        $this->customer = null;
        $this->amount = null;
    }
}
