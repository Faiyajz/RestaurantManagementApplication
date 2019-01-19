@extends('layouts.app')

@section('title','Slider')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Slider</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="sliderDatatable" class="table table-striped table-bordered" style="width:100%;text-align: center">
                                    <thead class=" text-primary">
                                    <th>SL</th>
                                    <th>Tilte</th>
                                    <th>Sub-Title</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
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
    <script href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sliderDatatable').DataTable();
        } );
    </script>

@endpush
