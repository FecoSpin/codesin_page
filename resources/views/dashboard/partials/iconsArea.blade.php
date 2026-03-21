<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-title">Seccion de los iconos</div>
            <div class="row">
                <div class="col-md-12"><div class="card-title text-center">{{$post->sections->title}}</div></div>
                <div class="row">
                    <div class="col-md-1 visible-md"></div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon1') ? 'has-error' : ''}}" >
                            <label for="icon1">Titulo primer icono</label>
                            <input class="form-control form-control" id="icon1" name="icon1" type="text" value="{{ old('icon1', $post->sections->icon1)}}"  />
                            {!! $errors->first('icon1', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon1_img') ? 'has-error' : ''}}">
                            <label for="icon1_img">icono</label>
                            <input type="file" class="thumbnail" name="icon1_img" data-default-file="{{ $post->sections->icon1_img ? $post->sections->icon1_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon1_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon1_popover') ? 'has-error' : ''}}">
                            <label for="icon1_popover">popover</label>
                            <textarea class="form-control form-control" id="icon1_popover" name="icon1_popover" cols="10" rows="10"  >{{ old('icon1_popover', $post->sections->icon1_popover)}}</textarea>
                            {!! $errors->first('icon1_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon2') ? 'has-error' : ''}}" >
                            <label for="icon2">Titulo segundo icono</label>
                            <input class="form-control form-control" id="icon2" name="icon2" type="text" value="{{ old('icon2', $post->sections->icon2)}}"  />
                            {!! $errors->first('icon2', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon2_img') ? 'has-error' : ''}}">
                            <label for="icon2_img">icono</label>
                            <input type="file" class="thumbnail" name="icon2_img" data-default-file="{{ $post->sections->icon2_img ? $post->sections->icon2_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon2_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon2_popover') ? 'has-error' : ''}}">
                            <label for="icon2_popover">popover</label>
                            <textarea class="form-control form-control" id="icon2_popover" name="icon2_popover" cols="10" rows="10"  >{{ old('icon2_popover', $post->sections->icon2_popover)}}</textarea>
                            {!! $errors->first('icon2_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon3') ? 'has-error' : ''}}" >
                            <label for="icon3">Titulo tercer icono</label>
                            <input class="form-control form-control" id="icon3" name="icon3" type="text" value="{{ old('icon3', $post->sections->icon3)}}"  />
                            {!! $errors->first('icon3', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon3_img') ? 'has-error' : ''}}">
                            <label for="icon3_img">icono</label>
                            <input type="file" class="thumbnail" name="icon3_img" data-default-file="{{ $post->sections->icon3_img ? $post->sections->icon3_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon3_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon3_popover') ? 'has-error' : ''}}">
                            <label for="icon3_popover">popover</label>
                            <textarea class="form-control form-control" id="icon3_popover" name="icon3_popover" cols="10" rows="10"  >{{ old('icon3_popover', $post->sections->icon3_popover)}}</textarea>
                            {!! $errors->first('icon3_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon4') ? 'has-error' : ''}}" >
                            <label for="icon4">Titulo cuarto icono</label>
                            <input class="form-control form-control" id="icon4" name="icon4" type="text" value="{{ old('icon4', $post->sections->icon4)}}"  />
                            {!! $errors->first('icon4', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon4_img') ? 'has-error' : ''}}">
                            <label for="icon4_img">icono</label>
                            <input type="file" class="thumbnail" name="icon4_img" data-default-file="{{ $post->sections->icon4_img ? $post->sections->icon4_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon4_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon4_popover') ? 'has-error' : ''}}">
                            <label for="icon4_popover">popover</label>
                            <textarea class="form-control form-control" id="icon4_popover" name="icon4_popover" cols="10" rows="10"  >{{ old('icon4_popover', $post->sections->icon4_popover)}}</textarea>
                            {!! $errors->first('icon4_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon5') ? 'has-error' : ''}}" >
                            <label for="icon5">Titulo quinto icono</label>
                            <input class="form-control form-control" id="icon5" name="icon5" type="text" value="{{ old('icon5', $post->sections->icon5)}}"  />
                            {!! $errors->first('icon5', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon5_img') ? 'has-error' : ''}}">
                            <label for="icon5_img">icono</label>
                            <input type="file" class="thumbnail" name="icon5_img" data-default-file="{{ $post->sections->icon5_img ? $post->sections->icon5_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon5_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon5_popover') ? 'has-error' : ''}}">
                            <label for="icon5_popover">popover</label>
                            <textarea class="form-control form-control" id="icon5_popover" name="icon5_popover" cols="10" rows="10"  >{{ old('icon5_popover', $post->sections->icon5_popover)}}</textarea>
                            {!! $errors->first('icon5_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-1 visible-md"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3"><div class="card-title text-center">Plataforma de competitividad para impulsar el Estado</div></div>
                <div class="row">
                    <div class="col-md-1 visible-md"></div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon6') ? 'has-error' : ''}}" >
                            <label for="icon6">Titulo secto icono</label>
                            <input class="form-control form-control" id="icon6" name="icon6" type="text" value="{{ old('icon6', $post->sections->icon6)}}"  />
                            {!! $errors->first('icon6', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon6_img') ? 'has-error' : ''}}">
                            <label for="icon6_img">icono</label>
                            <input type="file" class="thumbnail" name="icon6_img" data-default-file="{{ $post->sections->icon6_img ? $post->sections->icon6_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon6_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon6_popover') ? 'has-error' : ''}}">
                            <label for="icon6_popover">popover</label>
                            <textarea class="form-control form-control" id="icon6_popover" name="icon6_popover" cols="10" rows="10"  >{{ old('icon6_popover', $post->sections->icon6_popover)}}</textarea>
                            {!! $errors->first('icon6_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon7') ? 'has-error' : ''}}" >
                            <label for="icon7">Titulo septimo icono</label>
                            <input class="form-control form-control" id="icon7" name="icon7" type="text" value="{{ old('icon7', $post->sections->icon7)}}"  />
                            {!! $errors->first('icon7', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon7_img') ? 'has-error' : ''}}">
                            <label for="icon7_img">icono</label>
                            <input type="file" class="thumbnail" name="icon7_img" data-default-file="{{ $post->sections->icon7_img ? $post->sections->icon7_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon7_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon7_popover') ? 'has-error' : ''}}">
                            <label for="icon7_popover">popover</label>
                            <textarea class="form-control form-control" id="icon7_popover" name="icon7_popover" cols="10" rows="10"  >{{ old('icon7_popover', $post->sections->icon7_popover)}}</textarea>
                            {!! $errors->first('icon7_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon8') ? 'has-error' : ''}}" >
                            <label for="icon8">Titulo octavo icono</label>
                            <input class="form-control form-control" id="icon8" name="icon8" type="text" value="{{ old('icon8', $post->sections->icon8)}}"  />
                            {!! $errors->first('icon8', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon8_img') ? 'has-error' : ''}}">
                            <label for="icon8_img">icono</label>
                            <input type="file" class="thumbnail" name="icon8_img" data-default-file="{{ $post->sections->icon8_img ? $post->sections->icon8_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon8_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon8_popover') ? 'has-error' : ''}}">
                            <label for="icon8_popover">popover</label>
                            <textarea class="form-control form-control" id="icon8_popover" name="icon8_popover" cols="10" rows="10"  >{{ old('icon8_popover', $post->sections->icon8_popover)}}</textarea>
                            {!! $errors->first('icon8_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon9') ? 'has-error' : ''}}" >
                            <label for="icon9">Titulo noveno icono</label>
                            <input class="form-control form-control" id="icon9" name="icon9" type="text" value="{{ old('icon9', $post->sections->icon9)}}"  />
                            {!! $errors->first('icon9', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon9_img') ? 'has-error' : ''}}">
                            <label for="icon9_img">icono</label>
                            <input type="file" class="thumbnail" name="icon9_img" data-default-file="{{ $post->sections->icon9_img ? $post->sections->icon9_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon9_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon9_popover') ? 'has-error' : ''}}">
                            <label for="icon9_popover">popover</label>
                            <textarea class="form-control form-control" id="icon9_popover" name="icon9_popover" cols="10" rows="10"  >{{ old('icon9_popover', $post->sections->icon9_popover)}}</textarea>
                            {!! $errors->first('icon9_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon10') ? 'has-error' : ''}}" >
                            <label for="icon10">Titulo decimo icono</label>
                            <input class="form-control form-control" id="icon10" name="icon10" type="text" value="{{ old('icon10', $post->sections->icon10)}}"  />
                            {!! $errors->first('icon10', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon10_img') ? 'has-error' : ''}}">
                            <label for="icon10_img">icono</label>
                            <input type="file" class="thumbnail" name="icon10_img" data-default-file="{{ $post->sections->icon10_img ? $post->sections->icon10_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon10_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon10_popover') ? 'has-error' : ''}}">
                            <label for="icon10_popover">popover</label>
                            <textarea class="form-control form-control" id="icon10_popover" name="icon10_popover" cols="10" rows="10"  >{{ old('icon10_popover', $post->sections->icon10_popover)}}</textarea>
                            {!! $errors->first('icon10_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-1 visible-md"></div>
                    <div class="col-md-1 visible-md"></div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon11') ? 'has-error' : ''}}" >
                            <label for="icon11">Titulo onceavo icono</label>
                            <input class="form-control form-control" id="icon11" name="icon11" type="text" value="{{ old('icon11', $post->sections->icon11)}}"  />
                            {!! $errors->first('icon11', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon11_img') ? 'has-error' : ''}}">
                            <label for="icon11_img">icono</label>
                            <input type="file" class="thumbnail" name="icon11_img" data-default-file="{{ $post->sections->icon11_img ? $post->sections->icon11_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon11_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon11_popover') ? 'has-error' : ''}}">
                            <label for="icon11_popover">popover</label>
                            <textarea class="form-control form-control" id="icon11_popover" name="icon11_popover" cols="10" rows="10"  >{{ old('icon11_popover', $post->sections->icon11_popover)}}</textarea>
                            {!! $errors->first('icon11_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon12') ? 'has-error' : ''}}" >
                            <label for="icon12">Titulo doceavo icono</label>
                            <input class="form-control form-control" id="icon12" name="icon12" type="text" value="{{ old('icon12', $post->sections->icon12)}}"  />
                            {!! $errors->first('icon12', '<span class="help-block">Este campo no debe estar vavio</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon12_img') ? 'has-error' : ''}}">
                            <label for="icon12_img">icono</label>
                            <input type="file" class="thumbnail" name="icon12_img" data-default-file="{{ $post->sections->icon12_img ? $post->sections->icon12_img : '' }}" data-max-file-size-preview="4M" >
                            {!! $errors->first('icon12_img', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12 form-group mb-3 {{ $errors->has('icon12_popover') ? 'has-error' : ''}}">
                            <label for="icon12_popover">popover</label>
                            <textarea class="form-control form-control" id="icon12_popover" name="icon12_popover" cols="10" rows="10"  >{{ old('icon12_popover', $post->sections->icon12_popover)}}</textarea>
                            {!! $errors->first('icon12_popover', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary ladda-button basic-ladda-buttonpages m-1" data-style="expand-left"><span class="ladda-label">Guardar</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
            </div>
        </div>
    </div>
</div>