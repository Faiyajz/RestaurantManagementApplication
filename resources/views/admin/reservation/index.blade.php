@extends('layouts.app')

@section('title','Reservation')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Reservations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table-striped"
                                       style="width:100%;text-align: center">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Time and Date</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key=>$reservation)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$reservation->name}}</td>
                                            <td>{{$reservation->email}}</td>
                                            <td>{{$reservation->phone}}</td>
                                            <td>{{$reservation->date_and_time}}</td>
                                            <td>{{$reservation->message}}</td>
                                            <td>
                                                @if($reservation->status==true)
                                                    <span class="badge badge-success">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Not Confirm Yet</span>
                                                @endif
                                            </td>
                                            <td>{{$reservation->created_at}}</td>
                                            <td>{{$reservation->updated_at}}</td>
                                            <td><a href="#" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form  id="form-delete-{{$reservation->id}}" action="#" style="display: none" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="if(confirm('Are you Sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('form-delete-{{$reservation->id}}').submit();

                                                    }else{
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $('#table').DataTable({
            'dom': 'Blfrtip',
            "scrollCollapse": true,
            fixedHeader: {
                header: true,
            },
            "destroy": true,
            "bSort": true,
            "columnDefs": [
                {targets: "_all"}
            ]
        });
    </script>
@endpush
