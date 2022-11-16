@extends('comment::layouts.master')

@section('title')
    Posts {{$post->name}}
@endsection
@section('content')
    <div class="container">


        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success" data-toggle="modal" data-target="#create">Add new
                                    Comment
                                </button>
                                @include('comment::create')



                            </div>

                            <div class="col">
                                Post :: {{$post->name}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($post->commentes as  $row)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $row->comment }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-1 offset-1">
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fa fa-edit"></i></button>
                                           @include('comment::edit')
                                            </div>

                                            <div class="col-1 offset-1">

                                                <form action="{{ route('comment.destroy',$row->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>


                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
