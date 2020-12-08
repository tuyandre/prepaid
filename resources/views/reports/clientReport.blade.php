@extends('reports.layout')

@section('title',"Client Reports")

@section('content')

    <div class="col-md-12">

        <button onclick="printDocument()" class="btn btn-success pull-right btn-flat no-print">
            <i class="fa fa-print"></i> Print
        </button>


        <h1 class="page-header" style="text-align: center">
            Client REPORT
        </h1>

        <table class="table table-hover table-bordered">
            <thead>
            <tr>

                <th  class="bg-info" style="vertical-align: middle;text-align: center">Date</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center">Full Name </th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center">Identity</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> Telephone</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> Water Meter</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> District</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> Sector</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> Cell</th>
            </tr>
            </thead>
            <tbody>

            @foreach($clients as $client)

                <tr>
                    <td>{{$client->date}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->nid}}</td>
                    <td>0{{$client->telephone}}</td>
                    <td>{{$client->compte}}</td>
                    <td>{{$client->district}}</td>
                    <td>{{$client->sector}}</td>
                    <td>{{$client->cell}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    <script>
        function printDocument() {
            window.print();
        }
    </script>
@endsection
