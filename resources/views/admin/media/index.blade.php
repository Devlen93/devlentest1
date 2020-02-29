@extends('layouts.admin')


@section('content')

    <h1>Media</h1>

    @if($photos)

        <table class="table table-striped">

            <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>

            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>

                    <td><img height="50" src="{{URL::asset($photo->file)}}" alt=""></td>
                    <td>{{$photo->file}}</td>
                    <td>{{$photo->created_at? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{$photo->updated_at? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                    <td>

                         {!! Form::open(['method' => 'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}





                             <div class="form-group">
                                 {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                             </div>
                             {!! Form::close() !!}





                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>

    @endif

@stop