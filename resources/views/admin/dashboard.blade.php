@extends('layouts.app')

@section('title','Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Cat. /Item</p>
                            <h3 class="card-title">{{$category_count}}/{{$item_count}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">info</i>
                                <a href="#pablo">Total Categories and Items</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">slideshow</i>
                            </div>
                            <p class="card-category">Total Slider</p>
                            <h3 class="card-title">{{$slider_count}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i><a href="{{route('slider.index')}}">Get More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Reservation</p>
                            <h3 class="card-title">{{$reservations->count()}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Not Confirmed Reservation
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Total Query</p>
                            <h3 class="card-title">{{$contact_count}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> <a href="{{route('contact.index')}}">Get More Details</a>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Reservations in Queue</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table-striped"
                                       style="width:100%;text-align: center">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key=>$reservation)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$reservation->name}}</td>
                                            <td>{{$reservation->phone}}</td>
                                            <td>
                                                @if($reservation->status==true)
                                                    <span class="badge badge-success">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Not Confirm Yet</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if($reservation->status==false)
                                                    <form  id="form-status-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" style="display: none" method="POST">
                                                        @csrf
                                                    </form>

                                                    <button type="button" class="btn btn-info btn-sm"
                                                            onclick="if(confirm('Did you verify this by phone?')){
                                                                event.preventDefault();
                                                                document.getElementById('form-status-{{$reservation->id}}').submit();

                                                                }else{
                                                                event.preventDefault();
                                                                }"><i class="material-icons">done</i></button>
                                                @endif


                                                <form  id="form-delete-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display: none" method="POST">
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
