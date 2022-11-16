@extends('post::layouts.master')

@section('title')
Posts
@endsection
@section('content')
<div class="container">



  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <a href="{{ route('create.post') }}" class="btn btn-success">Add new</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-dark">
            <thead>
              <tr>
                <th>#</th>
                <th>photo</th>
                <th>name</th>
                <th>data</th>
                <th>User</th>
                <th>comment Count</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as  $post)
              <tr>
                <th>{{ $loop->index + 1 }}</th>
                <th><img src="{{ $post->image }}" width="50px" height="50px" alt=""></th>
                <td>{{ $post->name }}</td>
                <td>{{ $post->data }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->commentes_count }}</td>
                <td>

                  <div class="row">
                    <div class="col-1 offset-1">
                      <a href="{{ route('post.edit',$post->id) }}" class="btn btn-success btn-sm"><i
                          class="fa fa-edit"></i></a>
                    </div>
                    <div class="col-1 offset-1">
                      <form action="{{ route('post.destroy',$post->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="oldfile" value="{{ $post->photo->Filename }}">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>


                      </form>
                    </div>

                    <div class="col-1 offset-1">
                      <a href="{{route('post.show',$post->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

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
