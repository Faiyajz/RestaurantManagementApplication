@extends('layouts.app')

@section('title','Contact')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Query Message</h4>
                        </div>
                        <div class="card-body">

                            <h4 style="display: inline;color: #0b75c9"> {{$contact->name}}</h4>
                            <p style="display: inline;margin-left: 5px;color: red">Sent {{$contact->created_at->format('d M Y g:i A')}}</p>
                            <p style="display: inline;margin-left: 5px;color: green">from {{$contact->email}}<p>
                            <h2>{{$contact->subject}}</h2>
                            <h3>{{$contact->message}}</h3>
                        </div>
                    </div>
                    <a href="{{route('contact.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
