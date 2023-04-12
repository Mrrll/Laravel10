@extends('layouts.dashboard')

@section('title', 'Editar User')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>Editar Users</h1>
        <x-card style="width:100%">
            <x-form :route="route('users.update', $user)" method="patch" style="width:100%">
                <div class="grid" style="--bs-rows: 2; --bs-columns: 2; --bs-gap: 1rem;">
                    @foreach ($fields as $field)
                        <x-form.input
                            type="{{ $field['type'] }}"
                            id="{{ !empty($field['id']) ? $field['id'] : ''}}"
                            placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                            name="{{ !empty($field['name']) ? $field['name'] : '' }}"
                            label="{{ $field['label'] }}"
                            value="{{ !empty($field['value']) ? $field['value'] : ''}}"
                            class="form-control-sm">
                        </x-form.input>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <x-form.button type="submit" color="primary" class="me-2">
                    @lang("Update User")
                    </x-form.button>
                    <x-form.button  color="danger" :route="url()->previous()">
                        @lang("Go Back")
                    </x-form.button>
                </div>
            </x-form>
        </x-card>
    </main>
@endsection
