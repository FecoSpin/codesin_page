<template>
    <div>
        <section class="u-clearfix u-section-1-cr" id="sec-473d">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                    <div class="u-container-style u-hidden-md u-hidden-sm u-hidden-xs u-layout-cell u-size-12 u-layout-cell-1">
                        <div class="u-container-layout u-container-layout-1">
                        <img class="u-image u-image-default u-preserve-proportions u-image-1" src="/images/iconos_PERFIL3.png" alt="" data-image-width="397" data-image-height="397">
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-48 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-2">
                        <h3 class="u-text u-text-black u-text-1">PERFILES PROFESIONALES</h3>
                        <h1 class="u-text u-text-custom-color-1 u-text-default u-text-2">Comparativo por región</h1>
                        <p class="u-text u-text-3 text-justify">Compara la demanda laboral de las empresas, la oferta de egresados de las instituciones de educación media superior y superior, así como las brechas por perfil profesional para los próximos cinco años entre las regiones del estado.</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <a class="video-popup" :href="urlvideo">
                            <img class="u-image u-image-default u-image-2-do" src="/images/iconos_BotnVideo.png" alt="" data-image-width="2520" data-image-height="284">
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <router-link :to="{name: 'sinaloatalent'}" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-radius-50 u-btn-regresar">
                            Regresar <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
        <div class="embed-container">
            <iframe src="https://talent.codesin.mx/webapp/cliente/comparativaRegion#/" frameborder="0" allowfullscreen></iframe>
        </div>
        <section class="u-clearfix u-section-3-cr" style=" padding-bottom: 40px;">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="text-center u-small-text u-text u-text-variant u-text-1">
                    <span style="font-weight: 700;"> FUENTE:</span>
                    <span style="font-style: italic;">Estudio predictivo realizado por CODESIN, con el uso del Modelo Monash</span>
                </p>
                <p class="u-text u-text-2">
                    <!-- <span style="font-weight: 700;">Nota:</span> La diferencia se calcula de perfiles profesionales por lo que si estos se agrupan por nivel formativo (ej.: ingenieros), la diferencia no representa la resta perfecta entre demanda y oferta, ya que no todos los perfiles ofertados sirven para cubrir todos los perfiles demandados. Es decir, dentro del nivel formativo de ingenieros puede haber diferencia en algunos perfiles y una sobreoferta en otros. -->
                    <span style="font-weight: 700;">Nota:</span> La brecha no representa la resta perfecta entre demanda y oferta, ya que no todos los perfiles ofertados sirven para cubrir todos los perfiles demandados. Por ejemplo, dentro del nivel formativo de ingenieros puede haber brechas en algunos perfiles y una sobreoferta en otros.
                </p>
                <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-3-base u-shape u-shape-circle u-shape-1"></div>
                <div class="row">
                    <div class="col-md-6">
                        <button v-on:click="toggleText()" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-radius-50 u-btn-1 u-btn-block">
                            Glosario&nbsp;<span class="u-icon u-icon-1"><svg class="u-svg-content" viewBox="0 0 123.959 123.958" x="0px" y="0px" style="width: 1em; height: 1em;"><g><path d="M117.979,28.017h-112c-5.3,0-8,6.4-4.2,10.2l56,56c2.3,2.3,6.1,2.3,8.401,0l56-56   C125.979,34.417,123.279,28.017,117.979,28.017z"></path></g></svg><img></span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="/filePdf/Talento_Sinaloa _Glosario.pdf" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-radius-50 u-btn-pdf u-btn-block" download>
                            PDF <i class="fa fa-cloud-download" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div id="grow" class="u-align-left u-border-2 u-border-palette-5-dark-1 u-container-style u-group u-shape-round u-group-1">
                    <glorasio/>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import glorasio from '../components/glosario.vue';
    export default {
        components: {
            glorasio
        },
        data() {
            return {
                authors: [],
                categories: [],
                posts: [],
                positivo: true,
                estrategias: 12,
                urlvideo:"https://youtu.be/w_EwQYaS-7g"
            }
        },
        mounted() {
            $('#lock').addClass('hidden');
            $('.video-popup').magnificPopup({
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    zoom: {
                        enabled: true,
                    },
                iframe: {
                    patterns: {
                            youtube_short: {
                            index: 'https://youtu.be/',
                            id: 'youtu.be/',
                            src: '//www.youtube.com/embed/%id%?autoplay=1'
                            },
                            youtube: {
                            index: 'youtube.com/',
                            id: 'v=',
                            src: '//www.youtube.com/embed/%id%?autoplay=1'
                            }
                    },
                    srcAction: 'iframe_src',
                }
                });
        },
        methods: {
            toggleText(){
               var growDiv = document.getElementById('grow');
               if (growDiv.clientHeight) {
                   growDiv.style.height = 0;
               }else{
                   var wrapper = document.querySelector('.gWrapper');
                   growDiv.style.height = wrapper.clientHeight + "px";
               }
            }
        }
    }
</script>
<style scoped>
.u-text-custom-color-1 {
    color: #2c4c2c;
}
.u-palette-3-base, .u-body.u-palette-3-base, .u-container-style.u-palette-3-base:before, .u-container-layout.u-palette-3-base:before, .u-table-alt-palette-3-base tr:nth-child(even) {
    color: #111111;
    background-color: #f1c50e;
}
.u-shape-circle {
    border-radius: 50%;
}
.u-section-3-cr .u-btn-1 {
    font-size: 1.5rem;
    letter-spacing: 1px;
    border-style: none;
    font-weight: 700;
    background-image: none;
    text-transform: none;
    margin: 11px auto 0 172px;
    padding: 10px 89px;
    color: #ffffff !important;
    background-color: #2c4c2c !important;
    border-radius: 50px !important;
}
.u-section-3-cr .u-btn-pdf, .u-btn-regresar {
    font-size: 1.5rem;
    letter-spacing: 1px;
    border-style: none;
    font-weight: 700;
    background-image: none;
    text-transform: none;
    margin: 11px auto 0 auto;
    padding: 10px 89px;
    float: left;
    color: #2c4c2c !important;
    background-color: #f3cb34 !important;
    border-radius: 50px !important;
}
.u-section-3-cr .u-btn-pdf:hover, .u-btn-regresar:hover{
    background-color: #ddcb59 !important;
}
.u-border-palette-5-dark-1, .u-separator-palette-5-dark-1:after {
    border-color: #858e99;
    stroke: #858e99;
}
.u-border-2 {
  border-style: solid;
  border-width: 2px;
  border-radius: 50px;
}
p.u-small-text {
    font-size: 0.875rem;
    margin-top: 20px;
    margin-bottom: 20px;
}

.u-section-1-cr .u-layout-wrap-1 {
  margin-top: 60px;
  margin-bottom: 0;
}

.u-section-1-cr .u-layout-cell-1 {
  min-height: 183px;
}

.u-section-1-cr .u-container-layout-1 {
  padding: 0 30px;
}

.u-section-1-cr .u-image-1 {
  width: 126px;
  height: 126px;
  margin: 0 0 0 auto;
}

.u-section-1-cr .u-layout-cell-2 {
  min-height: 183px;
}

.u-section-1-cr .u-container-layout-2 {
  padding: 30px;
}

.u-section-1-cr .u-text-1 {
  font-size: 1.25rem;
  letter-spacing: 6px;
  font-weight: 700;
  margin: 0 463px 0 0;
}

.u-section-1-cr .u-text-2 {
  font-weight: 700;
  font-size: 3.75rem;
  margin: 1px auto 0 0;
}

.u-section-1-cr .u-text-3 {
  font-size: 1.125rem;
  margin: 14px 140px -8px 0;
  line-height: 1.3rem;
}

.u-image-2-do {
  width: 570px;
  height: 64px;
}

.u-section-3-cr .u-btn-1 {
  font-size: 1.5rem;
  letter-spacing: 1px;
  border-style: none;
  font-weight: 700;
  background-image: none;
  text-transform: none;
  margin: 11px 0 0 74px;
  padding: 10px 89px;
}

.u-section-3-cr .u-icon-1 {
  font-size: 0.9584em;
  color: rgb(255, 255, 255) !important;
}

.u-section-3-cr .u-group-1 {
  width: 800px;
  margin: 11px 0 0 74px;
}

.u-section-3-cr .u-container-layout-1 {
  padding: 30px;
}

.u-section-3-cr .u-text-1 {
  margin-bottom: 0;
  margin-top: 0;
}

.u-section-3-cr .u-text-2 {
  font-size: 0.625rem;
  margin: 16px 172px 0 100px;
}

.u-section-3-cr .u-shape-1 {
  width: 22px;
  height: 22px;
  background-image: none;
  margin: -34px auto 60px 72px;
}
.u-section-3-cr .u-icon-2 {
  width: 64px;
  height: 64px;
  margin: 30px auto 0 0;
}
#grow {
  -moz-transition: height .5s;
  -ms-transition: height .5s;
  -o-transition: height .5s;
  -webkit-transition: height .5s;
  transition: height .5s;
  height: 0;
  overflow: hidden;
}
.gWrapper{
    line-height: 20px;
}
@media (max-width: 1199px) {

  .u-section-1-cr .u-layout-wrap-1 {
    position: relative;
  }

  .u-section-1-cr .u-layout-cell-1 {
    min-height: 151px;
  }

  .u-section-1-cr .u-layout-cell-2 {
    min-height: 151px;
  }

  .u-section-1-cr .u-text-1 {
    margin-right: 303px;
  }

  .u-section-1-cr .u-text-3 {
    margin-right: 212px;
    margin-left: 158px;
  }
  .u-section-3 .u-btn-1 {
    margin-left: 0;
  }

  .u-section-3 .u-text-2 {
    margin-left: 109px;
    margin-right: 72px;
  }

  .u-section-3 .u-shape-1 {
    margin-left: 72px;
  }
}

@media (max-width: 991px) {
.u-hidden-md {
    display: none !important;
  }
  .u-section-1-cr .u-layout-cell-1 {
    min-height: 116px;
  }

  .u-section-1-cr .u-image-1 {
    width: 84px;
    height: 84px;
  }

  .u-section-1-cr .u-layout-cell-2 {
    min-height: 100px;
  }

  .u-section-1-cr .u-text-1 {
    margin-right: 127px;
  }

  .u-section-1-cr .u-text-3 {
    margin-right: 102px;
    margin-left: 48px;
  }
  .u-section-3-cr .u-group-1 {
    width: 720px;
  }

  .u-section-3-cr .u-text-2 {
    margin-left: 0;
    margin-right: 0;
    margin-bottom: 40px;
  }

  .u-section-3-cr .u-shape-1 {
    margin-right: 0;
  }
}

@media (max-width: 767px) {
    .u-hidden-md {
    display: none !important;
  }

  .u-section-1-cr .u-layout-cell-1 {
    min-height: 435px;
  }

  .u-section-1-cr .u-container-layout-1 {
    padding-left: 10px;
    padding-right: 10px;
  }

  .u-section-1-cr .u-container-layout-2 {
    padding-left: 10px;
    padding-right: 10px;
  }

  .u-section-1-cr .u-text-3 {
    margin-right: 0;
  }

  .u-image-2-do {
    width: 540px;
    height: 61px;
    margin-left: 0;
  }
  .u-section-3-cr .u-group-1 {
    width: 540px;
  }

  .u-section-3-cr .u-shape-1 {
    margin-right: auto;
    margin-left: 172px;
  }
}

@media (max-width: 575px) {
    .u-hidden-sm {
    display: none !important;
  }

  .u-section-1-cr .u-layout-cell-1 {
    min-height: 274px;
  }

  .u-section-1-cr .u-text-1 {
    margin-right: 0;
  }

  .u-section-1-cr .u-text-2 {
    font-size: 2.25rem;
  }

  .u-image-2-do {
    width: 340px;
    height: 34px;
  }
  .u-section-3-cr .u-btn-1 {
    margin-left: 0px;
}
.u-section-3-cr .u-btn-block, .u-btn-regresar {
    margin-left: 0px;
    width: 100%; display:block;
  }
  .u-section-3-cr .u-group-1 {
    width: 340px;
    margin-left: 0px;
  }
}
/* iframe */
.containerIframe {
  position: relative;
  width: 99%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
@media (min-width: 320px) {

  iframe {

    width: 200px;

    height: 150px;

  }

}

/* Pantalla 768px o superior */

@media (min-width: 768px) {

  iframe {

    width: 500px;

    height: 350px;

  }

}
@media (max-width: 767px) {
    .btn-s-container { margin-top: 0; }
}
/* iframe */

.embed-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
}
.embed-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
