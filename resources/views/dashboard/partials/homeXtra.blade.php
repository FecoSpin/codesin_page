<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Datos que se mostratan en el home</div>
                    @if($post->category_id != 9)
                    <div class="row">
                        <div class="col-md-6 form-group mb-3 {{ $errors->has('timeLectura') ? 'has-error' : ''}}" >
                            <label for="timeLectura">Tiempo de Lectura</label>
                            <input class="form-control form-control-rounded" id="timeLectura" name="timeLectura" type="number" min="0" max="60" value="{{ old('timeLectura', $extra->timeLectura)}}" />
                            {!! $errors->first('timeLectura', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-6 form-group mb-3 {{ $errors->has('indicadorLectura') ? 'has-error' : ''}}">
                            <label for="picker1">Min. / Hrs.</label>
                            <select class="form-control form-control-rounded select2" name="indicadorLectura">
                                    <option value="1" {{ old('indicadorLectura',$extra->indicadorLectura == 1) ? 'selected' : '' }}>Min.</option>
                                    <option value="2" {{ old('indicadorLectura',$extra->indicadorLectura == 2) ? 'selected' : '' }}>Hrs.</option>
                            </select>
                            {!! $errors->first('indicadorLectura', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-6 form-group mb-3 {{ $errors->has('timeVideo') ? 'has-error' : ''}}" >
                            <label for="timeVideo">Tiempo de Video</label>
                            <input class="form-control form-control-rounded" id="timeVideo" name="timeVideo" type="number" min="0" max="60" value="{{ old('timeVideo', $extra->timeVideo)}}" />
                            {!! $errors->first('timeVideo', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-6 form-group mb-3 {{ $errors->has('indicadorVideo') ? 'has-error' : ''}}">
                            <label for="picker1">Min. / Hrs.</label>
                            <select class="form-control form-control-rounded select2" name="indicadorVideo">
                                    <option value="1"{{ old('indicadorVideo',$extra->indicadorVideo == 1) ? 'selected' : '' }}>Min.</option>
                                    <option value="2"{{ old('indicadorVideo',$extra->indicadorVideo == 2) ? 'selected' : '' }}>Hrs.</option>
                            </select>
                            {!! $errors->first('indicadorVideo', '<span class="help-block">:message</span>') !!}
                        </div>
                        @if($post->category_id == 7)
                        <div class="col-md-6 form-group mb-3 {{ $errors->has('timePodcast') ? 'has-error' : ''}}" >
                            <label for="timePodcast">Tiempo de Podcast</label>
                            <input class="form-control form-control-rounded" id="timePodcast" name="timePodcast" type="number" min="0" max="60" value="{{ old('timePodcast', $extra->timePodcast)}}" />
                            {!! $errors->first('timePodcast', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-6 form-group mb-3 {{ $errors->has('indicadorPodcast') ? 'has-error' : ''}}">
                            <label for="picker1">Min. / Hrs.</label>
                            <select class="form-control form-control-rounded select2" name="indicadorPodcast">
                                    <option value="1"{{ old('indicadorPodcast',$extra->indicadorPodcast == 1) ? 'selected' : '' }}>Min.</option>
                                    <option value="2"{{ old('indicadorPodcast',$extra->indicadorPodcast == 2) ? 'selected' : '' }}>Hrs.</option>
                            </select>
                            {!! $errors->first('indicadorPodcast', '<span class="help-block">:message</span>') !!}
                        </div>
                        
                        @endif
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card md-3">
                                <div class="card-body"></div>
                                <div class="card-title">Banner Area ( centrar el contenido importante )</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-4 {{ $errors->has('bannerHome') ? 'has-error' : ''}}">
                                            <label for="">banner grande( full page )</label>
                                            <input class="banner" type="file" name="bannerHome" id="bannerHome" data-default-file="{{ $extra->urlbannerHome ? $extra->urlbannerHome : '' }}" data-max-file-size="2M" >
                                            {!! $errors->first('bannerHome', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        
                                        <div class="col-md-6 form-group mb-3{{ $errors->has('bannerHomeMobile') ? 'has-error' : ''}}">
                                            <label for="bannerHomeMobile">banner cuadro pequeño 399x632</label>
                                            <input type="file" class="form-control banner" name="bannerHomeMobile" id="bannerHomeMobile" data-default-file="{{ $extra->urlbannerHomeMobile ? $extra->urlbannerHomeMobile : '' }}" data-max-file-size="2M">
                                            {!! $errors->first('bannerHomeMobile', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    @if ($post->category_id == 7)
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3{{ $errors->has('thumbnailspotify') ? 'has-error' : ''}}">
                                            <label for="thumbnailspotify">thumbnail spotify 294x294</label>
                                            <input type="file" class="form-control banner" name="thumbnailspotify" id="thumbnailspotify" data-default-file="{{ $extra->urlthumbnailspotify ? $extra->urlthumbnailspotify : '' }}" data-max-file-size="2M">
                                            {!! $errors->first('thumbnailspotify', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        <div class="col-md-6 form-group mb-3 {{ $errors->has('urlspotify') ? 'has-error' : ''}}" >
                                            <label for="urlspotify">Url de spotify</label>
                                            <input class="form-control form-control-rounded" id="urlspotify" name="urlspotify" type="text" value="{{ old('urlspotify', $extra->urlspotify)}}" />
                                            {!! $errors->first('urlspotify', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>