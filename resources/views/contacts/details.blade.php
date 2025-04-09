@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12 col-md-8 col-lg-6">
                @include('components.flash-alerts')

                <div class="card">
                    <div class="card-body">
                        <form>
                            @csrf

                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" 
                                           class="form-control-plaintext border-bottom" 
                                           readonly value="{{ $contact->name }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="contact" class="col-sm-3 col-form-label">Contact:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="contact" name="contact" 
                                           class="form-control-plaintext border-bottom" 
                                           readonly value="{{ $contact->contact }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">E-mail:</label>
                                <div class="col-sm-9">
                                    <input type="email" id="email" name="email" 
                                           class="form-control-plaintext border-bottom" 
                                           readonly value="{{ $contact->email }}">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer d-flex justify-content-end gap-2">
                        <a class="btn btn-sm btn-outline-primary" href="#">
                            Edit
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-danger" href="#">
                            Delete
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <a class="btn btn-sm btn-primary d-block my-4" href="{{ route('contacts.index') }}">
                    Return to list
                </a>
            </div>
        </div>
    </div>
@endsection
