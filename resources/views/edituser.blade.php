@extends('layouts.app')

@section('content')
    <div class="container2">
        <div class="row">
            {{--            @include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Book #{{ $users->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/dashboard') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <label style="display:inline;margin-left: 60px;">{{ 'Upload Image' }}
                            <form action="{{ url('/admin/uploadImageProfile/' . $users->id) }}" class="dropzone"
                                  id="my-awesome-dropzone-{{$users->id}} ">
                                {{csrf_field()}}
                            </form>
                        </label>

                        <form method="POST" action="{{ url('/admin/save') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{--                        <form method="POST" action="{{ route('book.update', $books->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">--}}

                            {{ method_field('POST') }}
                            {{ csrf_field() }}


                            @include ('formedituser')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
