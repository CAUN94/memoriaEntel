@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Progress from {{$Report->Name}}</div>
                <div class="panel-body">
                <form method="POST" action="/Report/update/{{$Report->id}}/save">
                     <div class="form-group">
                        <label for="exampleInputPassword1">Progress %</label>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="number" class="form-control" id="progress" name="progress" placeholder="Progress" value="{{$Report->Progress}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection