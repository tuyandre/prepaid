@extends('shared.master')
@section('css')

    <link href="{{ asset('css/client.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="info">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Customized Water Bill Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            {{--                            <li class="breadcrumb-item active">Client Report</li>--}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content-register">
            <div class="card-title">

            </div>
            <div class="item2">
                <form role="form" method="POST"  action="{{route('reports.customWaterBillReport')}}" target="_blank" >
                    @csrf
                    <div class="message"></div>

                    <div class="info" >
                        <!-- <div class="step-title"><span>Personal Info</span><hr></div> -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="displayId">Starting Date </label>
                                <input type="date" class="form-control" id="date1" placeholder="date"  required name="date1" >

                            </div>
                            <div class="form-group">
                                <label for="descriptionId">End Date </label>
                                <input type="date" class="form-control" id="date2" placeholder="date"  required name="date2" >

                            </div>



                        </div>
                        <div class="card-footer form-group">

                            <input :disabled="is_disable" class="btn update btn-info" type="submit" value="Generate Report">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Full Water Bill Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            {{--                            <li class="breadcrumb-item active">Client Report</li>--}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content-register">
            <div class="card-title">

            </div>
            <div class="item2">
                <form role="form" method="POST"  action="{{route('reports.waterBillReport')}}" target="_blank" >
                    @csrf
                    <div class="message"></div>

                    <div class="info" >
                        <div class="step-title"><span>Full Water Bill Report</span><hr></div>
                        {{--                        <div class="card-body">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="displayId">Starting Date </label>--}}
                        {{--                                <input type="date" class="form-control" id="date1" placeholder="date"  required name="date1" >--}}

                        {{--                            </div>--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label for="descriptionId">End Date </label>--}}
                        {{--                                <input type="date" class="form-control" id="date2" placeholder="date"  required name="date2" >--}}

                        {{--                            </div>--}}



                    </div>
                    <div class="card-footer form-group">

                        <input :disabled="is_disable" class="btn update btn-success" type="submit" value="Generate Report">
                    </div>
                    {{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
@endsection
