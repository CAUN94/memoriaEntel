@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Dashboard</h2></div>

                <div class="panel-body">
    
                    <h3>Witch Report you want to See<h3>
                    <h4>
                    <table class="table table-striped">
                    <tr align='center'>
                    <td>Name from Report</td><td>Progress %</td><td>Manager</td><td>Update</td>
                    </tr>
                        @foreach($Reports as $Report)
                        @if($Report->Progress<=30)
                            <tr class="danger" align='center'>
                        @elseif($Report->Progress>30 and $Report->Progress<=50)
                            <tr class="warning" align='center'>
                        @elseif($Report->Progress>50 and $Report->Progress<=99)
                            <tr class="info" align='center'>
                        @elseif($Report->Progress==100)
                            <tr class="success" align='center'>
                        @endif
                            
                            <td>{{$Report->Projects}}</td>
                            <td>{{$Report->Progress}}%</td>
                            <td>{{$Report->Manager->Name}}</td>
                           
                            <td><a href="/Report/update/{{$Report->id}}" class="btn btn-warning" role="button">Do it</a></td>
                    
                            </tr>
                        @endforeach
                    </table>
                    </h4>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection