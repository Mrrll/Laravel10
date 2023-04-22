@extends('layouts.dashboard')

@section('title', 'List Users')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        <x-form :route="route('users.store')" style="width:100%">
            <x-card class="mt-2" style="width:100%" classfooter="d-flex justify-content-end" classbody="p-2">
                <x-slot name="card_header">
                    <h1>Create User</h1>
                </x-slot>
                <div class="grid" style="--bs-columns: 2; --bs-gap: 1rem;">
                    @foreach ($fields as $field)
                        <div class="form-group">
                            <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                                placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                                name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                                value="{{ !empty($field['value']) ? $field['value'] : '' }}" class="form-control-sm">
                            </x-form.input>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="role">Select Role</label>
                        <select class="role form-control" name="role" id="role">
                            <option value="">Select Role...</option>
                            @foreach ($roles as $role)
                                <option data-role-id="{{ $role->id }}" data-role-slug="{{ $role->slug }}"
                                    value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="permissions_box" class="form-group">
                        <label for="roles">Select Permissions</label>
                        <div id="permissions_checkbox_list" class="d-flex">

                        </div>
                    </div>
                </div>
                <x-slot name="card_footer">
                    <x-form.button type="submit" color="primary" class="me-2">
                        @lang('Create :model', ['model' => 'Usuario'])
                    </x-form.button>
                    <x-form.button color="danger" :route="url()->previous()">
                        @lang('Go Back')
                    </x-form.button>
                </x-slot>
                <div class="d-flex justify-content-end mt-3">
                </div>
            </x-card>
        </x-form>
    </main>
    <script type="module">
        $(document).ready(function() {
            let permissions_box = $('#permissions_box')
            let permissions_checkbox_list = $('#permissions_checkbox_list')

            permissions_box.hide()

             if ($('#role').find(':selected').val().length != 0) {
                let role = $('#role').find(':selected')
                let role_id = role.data('role-id')
                let role_slug = role.data('role-slug')
                        peticion(role_id,role_slug)
             }

            $('#role').on('change', function() {
                let role = $(this).find(':selected')
                let role_id = role.data('role-id')
                let role_slug = role.data('role-slug')
                    console.log( $('#role').find(':selected').val().length);

                    permissions_checkbox_list.empty()
                    if ($('#role').find(':selected').val().length != 0) {

                        peticion(role_id,role_slug)
                    }
            })
            function peticion(role_id,role_slug) {
                $.ajax({
                            url: '/users/crear',
                            method: 'get',
                            dataType: 'json',
                            data: {
                                role_id: role_id,
                                role_slug: role_slug
                            }
                        }).done(function(data) {

                            permissions_box.show()

                            $.each(data, function(index, element){
                                $(permissions_checkbox_list).append(
                                    '<div class="custom-control custom-checkbox me-1">'+
                                        '<input class="btn-check" type="checkbox" id="'+element.slug+'" name="permissions[]" value="'+element.id+'">'+
                                        '<label class="btn btn-outline-success" for="'+ element.slug +'">'+ element.name +'</label>'+
                                    '</div>'
                                )
                            })
                        })
            }

        })
    </script>
@endsection
