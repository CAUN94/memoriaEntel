@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                 
                <h2 align='center'>
                Report: {{$Report->Proyects}}<br>
                Activities: {{$Report->Activities}}
                <br>

                @if($Report->Status==1)
                <p class="bg-warning">
                The manager want to know your new Progess.
                </p>
                <br>
                @endif
                
                <br>


                    @if($Report->Progress<=30)
                        <p class="bg-danger">
                    @elseif($Report->Progress>30 and $Report->Progress<=50)
                        <p class="bg-warning">
                    @elseif($Report->Progress>50 and $Report->Progress<=99)
                        <p class="bg-info">
                    @elseif($Report->Progress==100)
                        <p class="bg-sucess">
                    @endif
                    Progress {{$Report->Progress}} %</p>
                </h2></div>

                <div class="panel-body">
                
                    <h3 align='center'>
                    {{$Report->Name}}
                    <h3>
                    <h4>
                    <table class="table table-striped">
                    <tr align='center'>
                    <td>FGI</td>
                    <td>FGE</td>
                    <td>Focos de Innovación</td>
                    <td>Responsable</td>
                    <td>Finish at</td>
                    <td>Status</td>
                    </tr>
                    <tr align='center'>
                    <td>{{$Report->FGI}}</td>
                    <td>{{$Report->FGE}}</td>
                    <td>{{$Report->Innovation_Categories}}</td>
                    <td>{{$Report->Responsable}}</td>
                    <td>{{$Report->Finish_at}}
                    @if($Report->Progress==1)
                    <td>No Started</td>
                    @elseif ($Report->Progess>1 && 100<$Report->Progress)
                    <td>In Progress</td)>
                    @else
                    <td> Finished</td>
                    @endif
                    

                    </tr>
                        
                    </table>
                    </h4>
                    <hr>
                    <h3 align='center'>
                    The Manager is {{$User[0]->name}}<br><br>
                    Mail: {{$User[0]->email}}<br><br>
                    Phone: {{$User[0]->phone}}<br><br>
                    @if($admin->admin==1)
                    <a href="/Report/mail/{{$Report->id}} " class="btn btn-primary" role="button">Consult for the Progress</a>
                    <h5 align='center'> This send a mail </h5>
                    @else
                    Comments:<br><br>
                    <area> {{$Report->comments}}</area>
                    <h3>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection