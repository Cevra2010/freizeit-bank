<div>
    @if($auth)
        <div class="w-full bg-gray-50 rounded-md shadow-lg mt-5">
            <div class="flex space-x-3">
                <a class="nav-item @if($show == "home") bg-green-200 @endif" href="#" wire:click='$emit("menu_clicked","home")' >Start</a>
                @if(auth()->user()->admin)
                <a class="nav-item  @if($show == "groups") bg-green-200 @endif " href="#" wire:click='$emit("menu_clicked","groups")'>Verwendungszwecke</a>
                <a class="nav-item  @if($show == "customer") bg-green-200 @endif " href="#" wire:click='$emit("menu_clicked","customer")'>Kunden</a>
                <a class="nav-item  @if($show == "user") bg-green-200 @endif " href="#" wire:click='$emit("menu_clicked","user")'>Benutzer</a>
                @endif
                <a class="nav-item @if($show == "logout") bg-red-200 @endif bg-red-300 hover:bg-red-200" href="#" wire:click='$emit("menu_clicked","logout")' >Abmelden</a>
            </div>
        </div>
        <div class="w-full bg-gray-50 rounded-md shadow-lg p-2 mt-5">
            @switch($show)
                @case("home")
                    @livewire("bank.home")
                    @break
                @case("user")
                    @livewire("user.home")
                    @break
                @case("customer")
                    @livewire("customer.home")
                    @break
                @case("groups")
                    @livewire("groups.home")
                    @break
                @case("user")
                    @livewire("user.home")
                    @break
                @default
                    Component not found
                    @break
            @endswitch
        </div>
    @else
        @livewire("auth.auth-page")
    @endif
</div>
