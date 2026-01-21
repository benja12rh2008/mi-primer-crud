<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('gestionar-contactos')
        ->assertStatus(200);
});
