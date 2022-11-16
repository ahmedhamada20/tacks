@extends('post::layouts.master')
@section('title')
    Edit Post
@endsection
@section('content')
<div class="container">
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Edit Posts</div>
        </div>

        <div class="card-body">
            <form action="{{ route('post.update','test') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $post->id }}">

                <div class="row">
                    <div class="col">
                        <label>title</label>
                        <input type="text" name="name"  value="{{ $post->name }}" class="form-control">
                    </div>
                </div>

                <br>

                <div class="row">

                    <div class="col">
                        <label>photo</label>
                        <img src="{{ $post->image }}" width="50px" height="50px" alt="">
                        <input type="hidden" name="oldfile" value="{{ $post->photo->Filename }}">
                    </div>


                    <div class="col">
                        <label>Image</label>
                        <input type="file" name="photo"  class="form-control" accept="image/*" id="">
                    </div>
                </div>

                <br>


                <div class="row">
                    <div class="col">
                        <button class="btn btn-success">Update new</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@endsection
