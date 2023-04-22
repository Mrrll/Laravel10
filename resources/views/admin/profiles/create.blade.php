@extends('layouts.dashboard')

@section('title', 'Create Profile')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        <x-form :route="route('profile.store')" style="width:100%">
            <x-card class="mt-2" style="width:100%" classfooter="d-flex justify-content-end">
                <x-slot name="card_header">
                    <h2>Create Profile</h2>
                </x-slot>
                <div class="grid p-2" style="--bs-columns: 1; --bs-gap: 1rem;">
                    @foreach ($fields as $field)
                        <div class="form-group">
                            <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                                placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                                name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                                value="{{ !empty($field['value']) ? $field['value'] : '' }}" class="form-control-sm" textareacols="{{!empty($field['textareacols']) ?$field['textareacols'] : '' }}" textarearow="{{!empty($field['textarearow']) ?$field['textarearow'] : '' }}">
                            </x-form.input>
                        </div>
                    @endforeach
                </div>
                <x-slot name="card_footer">
                    <x-form.button type="submit" color="primary" class="me-2">
                        @lang('Create :model', ['model' => 'Profile'])
                    </x-form.button>
                    <x-form.button color="danger" :route="url()->previous()">
                        @lang('Go Back')
                    </x-form.button>
                </x-slot>
            </x-card>
        </x-form>
    </main>
@endsection
