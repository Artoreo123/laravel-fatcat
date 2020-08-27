@extends('layouts.app')

@section('content')

    <div class="col">
        <div class="container2">
            <div class="card">
                <div class="card-header">Edit Book #{{$keepid = $books->id}}</div>

                <div class="card-body">
                    <a href="{{ url('/book/index') }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </button>
                    </a>
                    <br/>
                    <br/>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ url('/book/update' , $books->id) }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{--                        <form method="POST" action="{{ route('book.update', $books->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">--}}
                        {{ method_field('POST') }}
                        {{ csrf_field() }}

                        @include ('books.form', ['formMode' => 'edit'])

                    </form>
                </div>
                <hr>
                <label style="margin-left: 20px;">{{ 'Image' }}
                    <div class="row">
                        @foreach($books->images as $image)
                            {{--                        <div class="container" style="width: 100px;height: 100px">--}}
                            <div id="hide-div-image-{{$image->id}}" class="col-2" style="margin-top: 20px;margin-left: 20px">
                                <img src="{{$image->image_path}}"
                                     style="width:82px;height:120px;margin-bottom: 5px;border-radius: 10px">
                                <div class="bottom">
                                    {{--                                    <form id="delete" method="POST" action="{{ url('/book/deleteImage/' . $image->id,$keepid) }}"--}}
                                    {{--                                    <form method="POST" accept-charset="UTF-8" style="display:inline">--}}
                                    {{--                                        {{ csrf_field() }}--}}
                                    {{--                                        {{ method_field('DELETE') }}--}}
                                    {{--                                        --}}
                                    {{--                                        <button id="delete" type="submit" class="btn btn-danger btn-sm" title="Delete Image Book"--}}
                                    {{--                                                onclick="return confirm(&quot;Confirm delete image id = {{$image->id}} ?&quot;) "style="margin-left: 3px"><i--}}
                                    {{--                                                class="fa fa-times" aria-hidden="true"></i> Remove--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </form>--}}
                                    <button id="delete" class="btn btn-danger btn-sm" title="Delete Image Book"
                                            value="{{$image->id}}"
                                            style="margin-left: 3px"><i
                                            class="fa fa-times" aria-hidden="true"></i> Remove
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </label>

                <label style="display:inline;margin-left: 20px;">{{ 'Upload Image (.jpg .jpeg .png)'}}
{{--                    <form action="{{ url('/book/uploadImage/' . $books->id) }}" class="dropzone"--}}
{{--                          id="my-awesome-dropzone-{{$books->id}}">--}}
{{--                        {{csrf_field()}}--}}
                    <form action="{{ url('/book/uploadImage/' . $books->id) }}" class="dropzone" id="my-awesome-dropzone-{{$books->id}}">
                        {{csrf_field()}}


{{--                            <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>--}}
{{--                        <img src="removebutton.png" alt="Click me to remove the file." data-dz-remove />--}}
                    </form>

                    <div class="form-group ">
                        <input class="btn btn-primary" type="submit" id='uploadfiles' value='Upload Files' >
{{--                        <input class="btn btn-danger" type="button" id='clear-dropzone' value='Remove Files' style="height: 46.4px">--}}

                    </div>
                </label>
            </div>
        </div>
    </div>
    {{--    </div>--}}

    <script type="text/javascript">
        // delete image dont refresh +++++++++++++
        $(document).delegate('#delete', 'click', function () {
            let id = $(this).val();
            console.log(id);
            Swal.fire({
                title: 'แจ้งเตือน',
                text: 'ยืนยันลบรายการนี้',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d6323d',
                cancelButtonColor: '#c3bdc1',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
            }).then(function (result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/book/deleteImage/' + id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                        },
                        beforeSend: function () {
                        }
                    }).done(function (result) {
                        if (result.status == true) {

                            Swal.fire({
                                title: 'แจ้งเตือน',
                                text: 'ทำรายการสำเร็จ',
                                type: 'success',
                                showConfirmButton: true,
                                confirmButtonText: 'ตกลง',
                                //timer: 3000
                            }).then(function () {
                                $("#hide-div-image-"+id).empty();
                                }
                            );
                            // setTimeout(function () {
                            //     location.reload();
                            // }, 3000);

                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                text: 'กรุณาทำรายการใหม่',
                                type: 'error',
                                showConfirmButton: true,
                                confirmButtonText: 'ตกลง',
                                //timer: 3000
                            })
                            //     .then(function () {
                            //         window.location.reload();
                            //     }
                            // );
                            // setTimeout(function () {
                            //     window.location.reload();
                            // }, 3000);
                        }
                    });
                }
            });
        });

        // dropzone click upload +++++++++++++
        // dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            // autoDiscover: false,
            // maxFilesize: 1,
            maxFiles: 5,
            accept: function(file, done) {
                console.log("uploaded");
                done();
            },
            addRemoveLinks: true,
            acceptedFiles:".png,.jpg,.jpeg",
            // parallelUploads: 5, // Number of files process at a time (default 2)
            init: function() {
                this.on("maxfilesexceeded", function(file){
                    alert("No more files please!");
                });

                var myDropzone = this;

                $('#uploadfiles').click(function(){
                    if (myDropzone.getQueuedFiles().length > 0) {

                        myDropzone.processQueue();

                        setTimeout(function () {
                            location.reload();
                        }, 3200);
                    }
                });
            }
        });

        // $("#clear-dropzone").click(function() {
        //     myDropzone.removeAllFiles(true);
        // });
        // $('#uploadfiles').click(function(){
        //
        //     if (myDropzone.getQueuedFiles().length > 0)
        //     {
        //
        //         myDropzone.processQueue();
        //
        //         setTimeout(function(){
        //             location.reload();
        //         },3200);
        //     }
        // });

    </script>
@endsection
