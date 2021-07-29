<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class Home extends Component
{

    public $customer_field;

    public function render()
    {
        $customers = Customer::all();
        return view('livewire.customer.home',[
            'customers' => $customers,
        ]);
    }

    public function submit() {
        if($this->customer_field) {
            $customer = new Customer();
            $customer->name = $this->customer_field;
            $customer->amount = 0;
            $customer->save();
            $this->customer_field = null;
        }
    }

    public function delete(Customer $customer) {
        $customer->delete();
    }
}
