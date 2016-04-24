@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update {{$Report->Proyects}}</div>
                <div class="panel-body">
                <form method="POST" action="/Report/updateadmin/{{$Report->id}}/save">
                     <div class="form-group">
                     <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <label for="exampleInputPassword1">Cockpit</label>
                        <input type="text" class="form-control" id="Cockpit" name="Cockpit" placeholder="null" value="{{$Report->Cockpit}}">
                        <label for="exampleInputPassword1">Market</label>
                        <input type="text" class="form-control" id="Market" name="Market" placeholder="null" value="{{$Report->Market}}">
                        <label for="exampleInputPassword1">FGI</label>
                        <input type="text" class="form-control" id="FGI" name="FGI" placeholder="null" value="{{$Report->FGI}}">
                        <label for="exampleInputPassword1">FGE</label>
                        <input type="text" class="form-control" id="FGE" name="FGE" placeholder="null" value="{{$Report->FGE}}">
                        <label for="exampleInputPassword1">Responsable</label>
                        <input type="text" class="form-control" id="Responsable" name="Responsable" placeholder="null" value="{{$Report->Responsable}}">
                        <label for="exampleInputPassword1">Leadership</label>
                        <input type="text" class="form-control" id="Leadership" name="Leadership" placeholder="null" value="{{$Report->Leadership}}">
                        <label for="exampleInputPassword1">Rol</label>
                        <input type="text" class="form-control" id="Rol" name="Rol" placeholder="null" value="{{$Report->Rol}}">
                        <label for="exampleInputPassword1">Comments</label>
                        <input type="textarea" rows="3" class="form-control" id="comments" name="comments" placeholder="null" value="{{$Report->comments}}">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection