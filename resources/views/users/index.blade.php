@extends('layouts.app')

@section('content')
    <h3>Users List</h3>
    <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-register">Add User</button>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody id="users-tbody">
                @foreach($users as $record)
                    <tr id="user_id_{{ $record->id }}">
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td class="d-flex justify-content-center">
                            <button onclick="edit_user( {{ $record->id }} )" class="btn btn-sm btn-warning mr-2">Edit</button>
                            <button onclick="delete_user( {{ $record->id }} )" class="btn btn-sm btn-danger mr-2">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>


@endsection

@section('modal-user-register')
    <div class="modal" role="dialog" id="modal-register">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="user_form" name="user_form">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="register-user" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('model-user-edit')
    <div class="modal" role="dialog" id="modal-edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title">User Edit</h4>
                    <form id="user_form_edit" name="user_form">
                        @csrf
                        <input type="text" id="id" name="id" hidden>
                        <div class="form-group row">
                            <label for="namee" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="namee" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emaile" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="emaile" type="email" class="form-control" name="email" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passworde" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="passworde" type="password" class="form-control" name="password" placeholder="Enter an optional new password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="edit-user" class="btn btn-primary">
                                    {{ __('Edit User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
