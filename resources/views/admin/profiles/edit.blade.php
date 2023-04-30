@extends('layouts.dashboard')

@section('title', 'Create Profile')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        @include('layouts.components.alert')
        <x-form :route="route('profile.update', $profile)" method="patch" style="width:100%">
            <x-card class="mt-2" style="width:100%" classfooter="d-flex justify-content-end">
                <x-slot name="card_header">
                    <h2>Edit Profile</h2>
                </x-slot>
                <div class="grid p-2" style="--bs-columns: 1; --bs-gap: 1rem;">
                    <div id="preview_image" class="d-flex justify-content-center">
                        <div class="avatar">
                            @if(isset($profile->user->image->url))
                                <img src="{{asset($profile->user->image->url)}}" class="avatar">
                            @else
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6ZM17.8946 17.4473L17.0002 17C17.8946 17.4473 17.8939 17.4487 17.8939 17.4487L17.8932 17.4502L17.8916 17.4532L17.8882 17.46L17.88 17.4756C17.8739 17.4871 17.8666 17.5004 17.858 17.5155C17.8409 17.5458 17.8186 17.5832 17.7906 17.6267C17.7346 17.7138 17.6558 17.8254 17.5497 17.9527C17.3369 18.208 17.0163 18.5245 16.5549 18.8321C15.6228 19.4534 14.1751 20 12.0001 20C8.31494 20 6.76549 18.4304 6.26653 17.7115C5.96463 17.2765 5.99806 16.7683 6.18066 16.4031C6.91705 14.9303 8.42234 14 10.069 14H13.7642C15.5134 14 17.1124 14.9883 17.8947 16.5528C18.0354 16.8343 18.0354 17.1657 17.8946 17.4473Z" fill="#8a0000"></path> </g></svg>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <img id="imgPreview" class="avatar d-none">
                    </div>
                    <div class="form-group">
                        <label for="formFileLg" class="ms-1">Avatar :</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" accept="image/*" onchange="previewImage(event, '#imgPreview')" name="avatar" value="{{old('avatar', $profile->user->image->url)}}">
                    </div>
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
                        @lang('Update :model', ['model' => 'Profile'])
                    </x-form.button>
                    <x-form.button color="danger" :route="url()->previous()">
                        @lang('Go Back')
                    </x-form.button>
                </x-slot>
            </x-card>
        </x-form>
    </main>
@endsection
