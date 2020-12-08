@extends('reports.layout')

@section('title',"WaterBill Reports")

@section('content')

    <div class="col-md-12">

        <button onclick="printDocument()" class="btn btn-success pull-right btn-flat no-print">
            <i class="fa fa-print"></i> Print
        </button>


        <h1 class="page-header" style="text-align: center">
            Water Bills REPORT
        </h1>

        <table class="table table-hover table-bordered">
            <thead>
            <tr>

                <th  class="bg-info" style="vertical-align: middle;text-align: center">Date</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center">Client Name </th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center">Client Identity </th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> Water Meter</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center">Cash</th>
                <th  class="bg-info" style="vertical-align: middle;text-align: center"> Water Quantity</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $cash=0;
            $water=0;

            ?>
            @foreach($bills as $bill)

                <tr>
                    <td>{{$bill->date}}</td>
                    <td>{{$bill->client->name}}</td>
                    <td>{{$bill->client->nid}}</td>
                    <td>{{$bill->client->compte}}</td>
                    <td>{{number_format($bill->cash)}} Rwf</td>
                    <td>{{number_format($bill->quantity)}}</td>
                </tr>
                <?php
                $cash +=$bill->cash;
                $water +=$bill->quantity;
                ?>
            @endforeach
            </tbody>
            <tr>
                <td colspan="4"> <b>Total</b></td>
                <td><b>{{number_format($cash)}} Rwf</b></td>
                <td><b>{{number_format($water)}}</b></td>
            </tr>
        </table>
    </div>



    <script>
        function printDocument() {
            window.print();
        }
    </script>
@endsection
