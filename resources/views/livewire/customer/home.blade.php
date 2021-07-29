<div>
    <form wire:submit.prevent='submit'>
        <div class="mt-6">
            <label for="customer_field">Kunden hinzufügen:</label>
            <input type="text" wire:model='customer_field' class="w-full mt-2 bg-gray-200 rounded-md p-2 ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>
        <div class="mt-4">
            <button class="p-2 pl-4 pr-4 bg-green-600 hover:bg-green-500 text-green-50 rounded-md" type="submit">Speichern</button>
        </div>
    </form>
    <h1 class="mt-4 text-gray-800 font-semibold text-xl mb-3">Kunden</h1>

    <div class="flex flex-col">
        @foreach($customers as $customer)
            <div class="w-full mb-2 p-3 space-y-1 bg-green-100">
                <div class="flex justify-between">
                    <div>
                    {{ $customer->name }}
                    </div>
                    <a href="#delete" wire:click="delete({{ $customer->id }})" class="bg-red-400 text-white p-1 rounded-md">Löschen</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
