<div>
    @if($customer)
        @if(!$groups->count())
            @if(auth()->user()->admin)
                <div class="text-center mt-20 mb-20">
                    Legen Sie zuerst mindestens einen Verwendungszweck an!<br>
                    <div class="mt-10">
                    <a href="#" class="bg-green-700 text-white p-2 rounded-md" wire:click='$emit("menu_clicked","groups")'>Jetzt Starten!</a>
                    </div>
                </div>
            @else
                <div class="text-center mt-20 mb-20">
                    Es sind keine Verwendungszwecke hinterlegt<br>
                </div>
            @endif
        @else
            <h1 class="font-semibold text-xl mb-4">{{ $customer->name }}</h1>
            <div>
                <a href="#" wire:click="resetCustomer" class="bg-red-700 text-white p-2 rounded-md mb-6">Zurück</a>
            </div>
            <div class="w-full bg-blue-100 rounded-md text-center p-4 text-2xl font-mono mb-4">
                {{ $customer->amount() }}
            </div>
            <div class="flex space-x-2 mb-10">
                <input type="text" wire:model='amount' class="w-full bg-gray-200 rounded-md p-4 text-xl ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400 font-mono" placeholder="0,00" autofocus>
                <select class="w-full bg-gray-200 rounded-md p-4 text-xl ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400" wire:model="type">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex space-x-2">
                <button class="w-1/2 p-3 pt-5 pb-5 rounded-md bg-red-700 text-white" wire:click="sub">Abbuchen</button>
                <button class="w-1/2 p-3 pt-5 pb-5 rounded-md bg-green-700 text-white" wire:click="add">Einzahlen</button>
            </div>

            <h1 class="mt-10 mb-15 font-semibold text-xl">Vergangene Buchungen</h1>

            <table class="mt-5">
                <thead class="font-semibold text-center">
                    <tr>
                        <td class="p-1 w-1/5">Aktion</td>
                        <td class="p-1 w-1/5">Betrag</td>
                        <td class="p-1 w-1/5">Verwendungszweck</td>
                        <td class="p-1 w-2/5">ausgeführt von</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($customer->transactions()->get() as $transaction)
                        <tr @if($loop->even) class="bg-gray-200" @endif >
                            <td class="p-1 w-1/5">
                                @if($transaction->direction == "add")
                                    Einzahlung
                                @else
                                    Abbuchung
                                @endif
                            </td>
                            <td class="p-1 w-1/5">{{ $transaction->amount() }}</td>
                            <td class="p-1 w-1/5">@if(!$transaction->group()->count()) Zweck gelöscht @else {{ $transaction->group->name }} @endif</td>
                            <td class="p-1 w-2/5">@if(!$transaction->user()->count()) Benutzer gelöscht @else {{ $transaction->user->name }} @endif</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @else
        <h1>Buchung durchführen</h1>
        <input type="text" wire:model='search' class="w-full mt-2 bg-gray-200 rounded-md p-4 text-xl ring-green-200 border-0 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Suchen.." autofocus>
        @if($search)
            <div class="bg-white border-gray-100 shadow-md absolute w-2/5 mt-2">
                @forelse ($searchResult as $result)
                    <a href="#hover" wire:click="selectCustomer({{ $result->id }})">
                        <div class="p-4 hover:bg-gray-200">
                            <div>{{ $result->name }}</div>
                            <div class="text-sm">{{ $result->amount() }}</div>
                        </div>
                    </a>
                @empty
                <div class="p-4 hover:bg-gray-200">
                    <div>kein Treffer</div>
                </div>
                @endforelse
            </div>
        @endif
    @endif
</div>
