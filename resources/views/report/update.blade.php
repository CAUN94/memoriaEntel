@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Dashboard</h2></div>

                <div class="panel-body">
                    <h3>Wich Report you want to Update<h3>
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
                            

                            
                            <td><a href="/Report/{{$Report->id}}">{{$Report->Proyects}}</a></td><td>{{$Report->Progress}}%</td><td>{{$Report->Responsable}}</td>
                             <td><a href=" /Report/update/{{$Report->id}}  " class="btn btn-info" role="button">Do It</a></td>
                            
                            
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