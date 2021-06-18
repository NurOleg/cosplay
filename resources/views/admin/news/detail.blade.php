@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Редактирование новости - {{ $news->name }}</b>
                        <a href="{{ route('news_delete', ['news' => $news->slug]) }}" class="btn btn-danger"
                           style="float: right">Удалить</a>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('news_update', ['news' => $news->slug]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="" for="active">Активность</label>
                                <input
                                    class="form-control"
                                    id="active"
                                    name="active"
                                    type="checkbox"
                                    @if($news->active)
                                        checked="checked"
                                    @endif
                                />
                            </div>
                            <div class="form-group">
                                <label class="" for="name">Заголовок</label>
                                <input
                                    required
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Заголовок"
                                    type="text"
                                    value="{{ $news->name }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="slug">Код</label>
                                <input
                                    required
                                    class="form-control"
                                    id="slug"
                                    name="slug"
                                    placeholder="Код"
                                    type="text"
                                    value="{{ $news->slug }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="img">Изображение</label>
                                <img src="{{Storage::disk('public')->url($news->preview_img_src) }}" alt="" id="img">
                            </div>

                            <div class="form-group">
                                <label class="" for="preview_img_src">Заменить изображение новости</label>
                                <input
                                    class="form-control"
                                    id="preview_img_src"
                                    name="preview_img_src"
                                    placeholder="Изображение новости"
                                    type="file"
                                    value=""
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="preview_body">Текст превью</label>
                                <input
                                    required
                                    class="form-control"
                                    id="preview_body"
                                    name="preview_body"
                                    placeholder="Текст превью"
                                    type="text"
                                    value="{{ $news->preview_body }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="code">Текст новости</label>
                                <textarea name="body" id="body" cols="30" rows="10">
                                    {!! $news->body !!}
                                </textarea>
                            </div>

                            <button class="btn btn-secondary">Создать</button>
                            <a href="{{ route('news_index') }}" class="btn btn-primary"
                               style="float: right">Назад к списку</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            tinymce.init({
                selector: 'textarea#body',
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar:
                    `bold italic underline forecolor backcolor link image | undo redo | fontselect fontsizeselect formatselect |
      alignleft aligncenter alignright alignjustify |
      bullist numlist outdent indent | removeformat | table | help`,

                file_picker_types: 'file image'/*image media*/,
                language: 'ru',
                relative_urls : false,
                remove_script_host : false,
                convert_urls : true,
                language_url : '{{ asset('js/tiny/ru.js') }}',
                images_upload_handler: example_image_upload_handler
            });

            $('.tox-menubar button').first().hide();

            function example_image_upload_handler (blobInfo, success, failure, progress) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{route('news_image_store')}}');

                xhr.upload.onprogress = function (e) {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = function() {
                    var json;

                    if (xhr.status === 403) {
                        failure('HTTP Error: ' + xhr.status, { remove: true });
                        return;
                    }

                    if (xhr.status < 200 || xhr.status >= 300) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                xhr.onerror = function () {
                    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                formData.append('_token', '{{csrf_token()}}');

                xhr.send(formData);
            };
        });
    </script>

@endsection
