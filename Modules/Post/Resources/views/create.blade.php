@extends('post::layouts.master')
@section('title')
    Add Post
@endsection
@section('content')
<div class="container">
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Add new Posts</div>
        </div>

        <div class="card-body">
            <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <label>title</label>
                        <input type="text" name="name"  required class="form-control">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>Image</label>
                        <input type="file" name="photo"  class="form-control" accept="image/*" id="">
                    </div>
                </div>

                <br>


                <div class="row">
                    <div class="col">
                        <button class="btn btn-success">Add new</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@endsection