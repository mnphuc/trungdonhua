@extends('admin.master')
@section('title', 'Thêm Sản Phẩm Mới')
@section('content')
    <div class="container">
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-6">
                <label for="product_name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6 mb-6">
                <label for="price">Giá</label>
                <input type="text" class="form-control is-valid" id="price" name="price" value="" placeholder="100.000đ" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="col-md-6 mb-3">
                <label for="image">Ảnh</label>
                <input type="file" name="image" class="form-control elogo" id="image" placeholder="Ảnh" style="display: none" value="">
                <img id="eshow_image" src="assets/images/no-img.png" alt="..." class="img-thumbnail show_edit_images" style="width: 30%;">
{{--                @if($errors->has('image'))--}}
{{--                    <div class="invalid-feedback">{{ $errors->first('image') }}</div>--}}
{{--                @endif--}}
            </div>
            <div class="col-md-6 mb-3">
                <label for="trademark">Nhãn Hiệu</label>
                <input type="text" class="form-control is-valid" id="trademark" name="trademark" value="">
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <select class="col-md-6 mb-3 form-control" name="categories_id" id="categories">
                <option>Chọn Danh Mục</option>
            </select>
            <div class="col-md-12 mb-12">
                <label for="description">Mô Tả</label>
                <textarea id="description" name="description" rows="6"></textarea>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
        </div>
        <div class="form-group">
            <label >Trạng Thái</label>
            <div class="form-control">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_display" value="1" checked>
                    <label class="form-check-label" for="status_display">Hiện Thị</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_hide" value="0">
                    <label class="form-check-label" for="status_hide">Ẩn</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status_off" value="3">
                    <label class="form-check-label" for="status_off">Hết Hàng</label>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    </div>
@endsection
@section('ScriptPlugin')
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{route('getCategories')}}',
            type: 'GET',
            dataType: 'json',
            success : function (result){
                // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                // đó vào thẻ div có id = result

                $select = $('#categories');
                $.each( result, function( key, value ) {
                    $('<option>').val(value.id).text(value.categories_name).appendTo($select);
                });
            }
        })

    </script>
<script>
    class MyUploadAdapter {
        constructor( loader ) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            // Update the loader's progress.
            server.onUploadProgress( data => {
                loader.uploadTotal = data.total;
                loader.uploaded = data.uploaded;
            } );

            // Return a promise that will be resolved when the file is uploaded.
            return loader.file
                .then( file => server.upload( file ) );
        }

        // Aborts the upload process.
        abort() {
            // Reject the promise returned from the upload() method.
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', '{{route('upload-image')}}', true );
            xhr.responseType = 'json';
        }
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send( data );
        }
    }
    function MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }
    ClassicEditor
        .create( document.querySelector( '#description' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            extraPlugins: [ MyCustomUploadAdapterPlugin ],
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
</script>
@endsection
