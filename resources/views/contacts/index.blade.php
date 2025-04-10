@extends('layouts.app')

@section('content')

    <div class="col-sm-12 col-md-8">
        @include('components.flash-alerts')

        <div class="row">
            <div class="col-12 my-4">
                <a href="{{route('contact.create')}}" class='btn btn-sm btn-primary'>Add a new contact</a>

            </div>
        </div>

        <table class='table table-sm table-hover'>
            <thead class='table-light'>
                <tr>
                    <th width='45'>#</th>
                    <th>Name</th>
                    <th width='122'></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td class='small'>
                            <a class='btn btn-sm small' href="{{route('contact.details',['id' => $contact->id])}}">
                                <i class="fa fa-file-text-o text-primary" aria-hidden="true"></i>
                            </a> 
                            -
                            <a class='btn btn-sm small' href="{{route('contact.remove',['id' => $contact->id])}}">
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-12">
            {{$paginator->links()}}
        </div>
    </div>
@endsection