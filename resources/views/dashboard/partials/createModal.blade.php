{{-- modal de proyectos--}}
<div class="modal fade" id="proyectos" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Titulo del proyecto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.proyectos.store', '#create-proyectos') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('titleProjectModal') ? 'has-error' : ''}}" >
                            <label for="titleProjectModal"></label>
                            <input class="form-control form-control-rounded" id="title" name="titleProjectModal" type="text" value="{{ old('titleProjectModal')}}" required/>
                            {!! $errors->first('titleProjectModal', '<span class="help-block">:message</span>') !!}
                        </div>
                        @if (isset($tag))
                            <input type="hidden" name="tags" value="{{$tag->id}}">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary ml-2" type="submit">Crear publicacion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal Noticias--}}
<div class="modal fade" id="noticias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titulo de la publicación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.noticias.store', '#create-noticias') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('titleModal') ? 'has-error' : ''}}" >
                            <label for="titleModal"></label>
                            <input class="form-control form-control-rounded" id="title" name="titleModal" type="text" value="{{ old('titleModal')}}" required/>
                            {!! $errors->first('titleModal', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary ml-2" type="submit">Crear publicacion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal politicas--}}
<div class="modal fade" id="politicas" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Titulo del politica</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.politicas.store', '#create-politica') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('titlepoliticaModal') ? 'has-error' : ''}}" >
                            <label for="titlepoliticaModal"></label>
                            <input class="form-control form-control-rounded" id="title" name="titlepoliticaModal" type="text" value="{{ old('titlepoliticaModal')}}" required/>
                            {!! $errors->first('titlepoliticaModal', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary ml-2" type="submit">Crear politica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal de Estrategias-proyectos--}}
<div class="modal fade" id="projects" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Titulo del proyecto.</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.estrategiasProyectos.store', '#create-projects') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('title') ? 'has-error' : ''}}" >
                            <label for="title"></label>
                            <input class="form-control form-control-rounded" id="title" name="title" type="text" value="{{ old('title')}}" required/>
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                        @if (isset($estrategia))
                            <input type="hidden" name="tag_estrategias_id" value="{{$estrategia->id}}">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary ml-2" type="submit">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal Artículos--}}
<div class="modal fade" id="articulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Titulo del Artículos</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.articulos.store', '#create-articulos') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('titleModal') ? 'has-error' : ''}}" >
                            <label for="titleModal"></label>
                            <input class="form-control form-control-rounded" id="title" name="titleModal" type="text" value="{{ old('titleModal')}}" required/>
                            {!! $errors->first('titleModal', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary ml-2" type="submit">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
