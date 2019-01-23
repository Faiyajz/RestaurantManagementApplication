@extends('layouts.app')

@section('title','Slider')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('slider.create')}}" class="btn btn-info">Add New Slider</a>
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Slider</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table-striped"
                                       style="width:100%;text-align: center">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Sub-Title</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->sub_title}}</td>
                                            <td>{{$slider->image}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>{{$slider->updated_at}}</td>
                                            <td><a href="{{route('slider.edit',$slider)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form  id="form-delete-{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" style="display: none" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="if(confirm('Are you Sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('form-delete-{{$slider->id}}').submit();

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
