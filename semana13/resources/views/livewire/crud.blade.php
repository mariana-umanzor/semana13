<x-slot name="header">
    <h2>Ejemplo CRUD</h2>
</x-slot>

<div>
    @if(session()->has('message'))
        <p>{{ session('message') }}</P>
    @endif

    <button wire:click="create()">Create Pet</button>
    @if($isOpen)
    @include('livewire.create')
    @endif
    <table class="table-fiex w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 w-20">Cod.</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Color</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->color }}</td>
            </tr>
            <tr>
                <td>
                    <button wire:click="edit({{ $pet->id }})">Edit</button>
                    <button wire:click="delete({{ $pet->id }})">Delete</button>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
