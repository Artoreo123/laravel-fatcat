@extends('layouts.mainuser')

@section('content')
    <div class="container2" style="width: 30%">
        <div class="row">
            {{--            @include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Book #{{ $users->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/welcome') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
{{--                        <label style="display:inline;">{{ 'Upload Profile Image' }}--}}
{{--                            <form action="{{ url('/uploadImageProfile/' . $users->id) }}" class="dropzone"--}}
{{--                                  id="myDropzone ">--}}
{{--                                {{csrf_field()}}--}}
{{--                            </form>--}}
{{--                        </label>--}}

                        <label style="display:inline;margin-left: 20px;">{{ 'Upload Profile Image'}}
                             <form action="{{ url('/uploadImageProfile/' . $users->id) }}" class="dropzone">
                                {{csrf_field()}}
                             </form>
{{--                            <div class="form-group ">--}}
                                <input class="btn btn-primary" type="submit" id='uploadimage' value='Upload Image' style="margin-top: 10px">
{{--                                </div>--}}
                        </label>
                        </div>

                        <hr class="m-0">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/updateProfileUser') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
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
    <script type="text/javascript">
        var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            // autoDiscover: false,
            maxFiles: 1,
            accept: function(file, done) {
                console.log("uploaded");
                done();
            },
            addRemoveLinks: true,
            acceptedFiles:".png,.jpg,.jpeg",
            parallelUploads: 1, // Number of files process at a time (default 2)
            init: function() {

                this.on("maxfilesexceeded", function(file){
                    alert("No more image please!!!");
                });
                var myDropzone = this;

                $('#uploadimage').click(function(){
                    if (myDropzone.getQueuedFiles().length > 0) {

                        myDropzone.processQueue();

                        setTimeout(function () {
                            location.reload();
                        }, 3200);
                    }
                });
            }
        });
    </script>
@endsection
