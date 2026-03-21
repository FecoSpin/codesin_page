<div class="col-md-12">
    <div class="card md-3">
        <div class="card-body"></div>
        <div class="card-title">Banner Area</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group mb-4 {{ $errors->has('banner') ? 'has-error' : ''}}">
                    <label for="">banner el tamaño debe ser 1440px X 451px </label>
                    <input class="banner" type="file" name="banner" id="banner" data-default-file="{{ $post->urlBanner ? $post->urlBanner : '' }}" data-max-file-size="2M" >
                    {!! $errors->first('banner', '<span class="help-block">:message</span>') !!}
                </div>
                
                <div class="col-md-6 form-group mb-3{{ $errors->has('bannerMobile') ? 'has-error' : ''}}">
                    <label for="bannerMobile">banner versión pequeña debe ser 360px X 400px</label>
                    <input type="file" class="form-control banner" name="bannerMobile" id="bannerMobile" data-default-file="{{ $post->urlBannerMobile ? $post->urlBannerMobile : '' }}" data-max-file-size="2M">
                    {!! $errors->first('bannerMobile', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group mb-3 {{ $errors->has('urlvideo') ? 'has-error' : ''}}" >
                    <label for="urlvideo">Url de video de youtube</label>
                    <input class="form-control form-control-rounded" id="urlvideo" name="urlvideo" type="text" value="{{ old('urlvideo', $post->urlvideo)}}" />
                    {!! $errors->first('urlvideo', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>