<div class="fixed z-10 overflow-y-auto ease-out duration-400">
Create

    <form>
        <div class="bg-white">
            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Escriba el nombre" wire:model="name">
                @error('name')<span class="text-red">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="color">Color</label>
                <input type="text" id="color" placeholder="Escriba el color" wire:model="color">
                @error('color')<span class="text-red">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <button wire:click.prevent="store()" type="button">Save</button>
                <button wire:click.prevent="closeModal()" type="button">Close</button>
            </div>
        </div>
    </form>


</div>