@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Dashboard </h2></div>

                <div class="panel-body">
                    <h3>Wich Report you want to See<h3>
                    <h4>
                    <table class="table table-striped">
                    <tr align='center'>
                    <td>Name from Report</td><td>Progress %</td><td>Manager</td>

                    @if($User->admin==1)
                    <td>Mail Sent</td>
                    <td>Update</td>

                    @else
                    <td>Status</td>
                    @endif
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
                            @if($User->admin==1)
                            @if($Report->Status==0)
                             <td><a href=" /Report/mail/{{$Report->id}}  " class="btn btn-danger" role="button">No</a></td>
                             @else
                            <td><a href="#" class="btn btn-success" role="button">Yes</a></td>
                             @endif
                             <td><a href="/Report/adminupdate/{{$Report->id}}" class="btn btn-info" role="button">Update</a></td>
                             @else
                            @if($Report->Status==0)
                             <td><font color="green">Normal</font></td>
                             @else
                            <td><font color="red">Need it</font></td>
                             @endif
                             @endif
                        @endforeach 
                    </table>
                    </h4>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection