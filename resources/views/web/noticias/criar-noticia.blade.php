@extends('layouts.app')
@section('title', 'Cadastro de Noticia - AVICO')

@section('content')
    <section class="form_body container rows ">
        @include('messages.messages')
        <form action="{{ route('criar.noticia.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 col-md-offset-8" style="left: 17%; ">
                <div class="form-group mb-4">
                    <label> Titulo*</label>
                    <input type="text" class="form-control" name="title" placeholder="Adicione o Titulo da noticia" />
                    <x-error-message errorName="title"/>
                </div>
                <div class="form-group mb-4">
                    <label> Noticia* </label>
                    <input id="editor1" class="form-control" name="body" placeholder="Adicione a noticia"
                           type="hidden" name="content">
                    <trix-editor input="editor1"></trix-editor>
                    <x-error-message errorName="body"/>
                </div>

                <div class="form-group mb-4">
                    <label> Carregar Imagem </label>
                    <input type="file" name="userfile" accept="image/.jpg,.png,.jpeg"/>
                    <button type="submit" class="btn btn-success col-md-2 mt-4" style="margin-left: 83%;">Salvar
                    </button>
                </div>

            </div>
        </form>
    </section>
    @section('extra-scripts')
    <script lang="js">
        (function() {
            var HOST = "/upload"; //pass the route
            
            addEventListener("trix-attachment-add", function(event) {
                if (event.attachment.file) {
                    uploadFileAttachment(event.attachment)
                }
            })
            
            function uploadFileAttachment(attachment) {
                uploadFile(attachment.file, setProgress, setAttributes)
                
                function setProgress(progress) {
                    attachment.setUploadProgress(progress)
                }
                
                function setAttributes(attributes) {
                    attachment.setAttributes(attributes)
                }
            }
         
            function uploadFile(file, progressCallback, successCallback) {
                var formData = createFormData(file);
                var xhr = new XMLHttpRequest();
                
                xhr.open("POST", HOST, true);
                xhr.setRequestHeader( 'X-CSRF-TOKEN', getMeta( 'csrf-token' ) );
                
                xhr.upload.addEventListener("progress", function(event) {
                    var progress = event.loaded / event.total * 100
                    progressCallback(progress)
                })
                
                xhr.addEventListener("load", function(event) {
                    var attributes = {
                        url: xhr.responseText,
                        href: xhr.responseText + "?content-disposition=attachment"
                    }
                    successCallback(attributes)
                })
                
                xhr.send(formData)
            }
            
            function createFormData(file) {
                var data = new FormData()
                data.append("Content-Type", file.type)
                data.append("file", file)
                return data
            }
            
            function getMeta(metaName) {
                const metas = document.getElementsByTagName('meta');
                
                for (let i = 0; i < metas.length; i++) {
                    if (metas[i].getAttribute('name') === metaName) {
                        return metas[i].getAttribute('content');
                    }
                }
                
                return '';
            }
        })();
        </script>
@endsection
@endsection

