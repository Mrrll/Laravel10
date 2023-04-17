@extends('layouts.dashboard')

@section('title', 'List Roles')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        @include('layouts.components.alert')
        <x-card class="mt-2" classheader="d-flex justify-content-between">
            <x-slot name="card_header">
                <h1>List Roles</h1>
                <div class="align-self-center">
                    <button id="btncreaterole" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createrole"> Create Role</button>
                </div>
            </x-slot>
            {{-- Tabla --}}
            <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle"
                theadclass="table-dark">
                @foreach ($roles as $role)
                    <tr>
                        <th scope="col">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-dark bg-gradient">
                                    {{ $permission->slug }}
                                </span>
                            @endforeach
                        </td>
                        <td>{{ $role->updated_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <span class="d-inline-flex">
                                <x-table.button type='modal' route="" class='btn-outline-warning me-1'
                                    target="#editrole{{ $role->id }}">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                    </x-slot>
                                </x-table.button>
                                <x-table.button type='modal' route="" class='btn-outline-danger'
                                    target="#deleterole{{ $role->id }}">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                    </x-slot>
                                </x-table.button>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </x-table>
            {{-- Tabla en Movil --}}
            @foreach ($roles as $role)
                <x-table class="table-striped {{ $role->id == auth()->user()->id ? 'table-active ' : '' }}"
                    typetable="movil">
                    <x-slot name="head">
                        <x-table.button type='modal' route="" class='btn-outline-warning me-1'
                            target="#editrole{{ $role->id }}">
                            <x-slot name="icon">
                                <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                            </x-slot>
                        </x-table.button>
                        <x-table.button type='modal' route="" class='btn-outline-danger'
                            target="#deleterole{{ $role->id }}">
                            <x-slot name="icon">
                                <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                            </x-slot>
                        </x-table.button>
                    </x-slot>
                    <tr>
                        <th scope="col" class="d-flex flex-column">
                            <strong># :</strong>
                            {{ $role->id }}
                        </th>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Name :</strong>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Slug :</strong>
                            {{ $role->slug }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-dark bg-gradient">
                                    {{ $permission->slug }}
                                </span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Date :</strong>
                            {{ $role->updated_at->format('d-m-Y') }}
                        </td>
                    </tr>
                </x-table>
                {{-- Modal Borrar --}}
                <x-modal id="deleterole{{ $role->id }}" class="modal-dialog-centered" title="Delete"
                    name="{{ $role->name }}" model="role" btnactioncolor="btn-danger" :btnactionroute="route('roles.destroy', $role)"
                    btnactionmethod="delete"></x-modal>
                {{-- Modal Editar --}}
                <x-modal id="editrole{{ $role->id }}" class="modal-dialog-centered editrole" title="Edit"
                    btnactioncolor="btn-success" btndismiss="Cancel" btnaction="Update" :routeform="route('roles.update', $role)" methodform="patch"
                    styleform="width:100%">
                    <div>
                        @foreach ($fields as $field)
                            @if (is_object($role[$field['name']]) && $role[$field['name']] != '[]')
                            @dump($role[$field['name']])
                                @php
                                     $permissions = "";
                                     foreach ($role[$field['name']] as $permission) {
                                         $permissions .= $permission->name.',';
                                     }
                                @endphp
                                <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                                placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                                name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                                value="{{$permissions}}" class="{{ !empty($field['class']) ? $field['class'] : 'form-control-sm' }}" data-role="{{ !empty($field['tags']) ? $field['tags'] : '' }}"
                                :readyonly="!empty($field['readyonly']) ? $field['disable'] : false">
                            </x-form.input>
                            @else
                            <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                                placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                                name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                                value="{{($role[$field['name']] == '[]') ? '' : $role[$field['name']]}}" class="{{ !empty($field['class']) ? $field['class'] : 'form-control-sm' }}" data-role="{{ !empty($field['tags']) ? $field['tags'] : '' }}"
                                :readyonly="!empty($field['readyonly']) ? $field['disable'] : false">
                            </x-form.input>
                            @endif
                        @endforeach
                        <input type="hidden" value="{{ $role->id }}" name="id">
                    </div>
                </x-modal>
            @endforeach
            <x-slot name="card_footer">
                {{ $roles->links() }}
            </x-slot>
        </x-card>
        {{-- Modal Crear --}}
        <x-modal id="createrole" class="modal-dialog-centered" title="Create" btnactioncolor="btn-success"
            btndismiss="Cancel" btnaction="Save" :routeform="route('roles.store')" methodform="post" styleform="width:100%" modal="create">
            <div>
                @foreach ($fields as $field)
                    <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                        placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                        name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                        value="{{ !empty($field['value']) ? $field['value'] : '' }}" class="{{ !empty($field['class']) ? $field['class'] : 'form-control-sm' }}" data-role="{{ !empty($field['tags']) ? $field['tags'] : '' }}" :readyonly="!empty($field['readyonly']) ? $field['readyonly'] : false" >
                    </x-form.input>
                @endforeach
            </div>
        </x-modal>
    </main>
    @if ($errors->create->any())
        <script  type="module">
             $('#createrole').modal('show');
        </script>
    @elseif ($errors->edit->any())
        <script  type="module">
            var id = {{$errors->edit->first('id')}}
            $("#editrole" + id.toString()).modal('show');
        </script>
    @endif
    <script type="module">
        $(document).ready(function() {
            $("input[name='name']").on('blur keyup keydown change paste',function() {
                let inputslug = $(this).next().next();
                var str = $(this).val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                $(inputslug).val(str);
                $(inputslug).attr('placeholder', str);
            })
        })
    </script>
@endsection
