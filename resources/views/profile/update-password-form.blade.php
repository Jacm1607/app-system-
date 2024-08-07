<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        <span class="dark:text-light text-gray-700">Actualizar Contraseña</span>
    </x-slot>

    <x-slot name="description">
        <span class="dark:text-light text-gray-700">Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.</span>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="Constraseña actual" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full text-black" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="Nueva contraseña" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full text-black" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="Confirmar contraseña" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full text-black" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            Guardado.
        </x-jet-action-message>

        <x-jet-button>
            Guardar
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
