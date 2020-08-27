@extends('layouts.app')

@section('content')
    <div class="container1">
        <div class="row">
{{--            @include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Book</div>
                    <div class="card-body">
                        <a href="{{ url('/book/index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/book/store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('books.form', ['formMode' => 'create'])

                        </form>
{{--                        <label style="display:inline;margin-left: 20px;">{{ 'Upload Image' }}--}}
{{--                            <form action="{{ url('/book/uploadImage/' . $books->id) }}" class="dropzone"--}}
{{--                                  id="my-awesome-dropzone-{{$books->id}} ">--}}
{{--                                {{csrf_field()}}--}}
{{--                            </form>--}}
{{--                        </label>    --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
