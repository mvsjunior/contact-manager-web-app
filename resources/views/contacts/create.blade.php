@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-12 col-md-8 col-lg-6">
                @include('components.flash-alerts')
                <form method="POST" action="{{route('contact.create')}}" >
                    <div class="card">
                        <div class="card-body">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-3 col-form-label" min="6" required>Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="name" name="name" 
                                            class="form-control-plaintext border-bottom" 
                                            value="{{ old('name') ?? '' }}">
                                            @error('name')
                                                <span class="small text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="contact" class="col-sm-3 col-form-label">Contact:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="contact" name="contact" 
                                            class="form-control-plaintext border-bottom" 
                                            maxlength="9"
                                            value="{{ old('contact') ?? '' }}">
                                            @error('contact')
                                                <span class="small text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-3 col-form-label">E-mail:</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="email" name="email" 
                                            class="form-control-plaintext border-bottom" 
                                            value="{{ old('email') ?? '' }}">
                                            @error('email')
                                                <span class="small text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                            
                        </div>

                        <div class="card-footer d-flex justify-content-end gap-2">
                            <a class="btn btn-sm btn-outline-primary" href="{{route('contacts.index')}}">
                                Cancel
                            </a>
                            <button class="btn btn-sm btn-outline-success">
                                Create
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
