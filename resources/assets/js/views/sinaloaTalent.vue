<template>
    <div>
        <section class="u-clearfix u-section-1-st">
            <div class="u-clearfix u-sheet u-sheet-1">
                <!-- <h1 class="u-align-center u-text u-text-custom-color-1 u-text-default u-text-1">SINALOA TALENT
                </h1>
                <h2 class="u-align-center u-subtitle u-text u-text-2">
                <span style="font-weight: 700;" class="u-text-custom-color-1">PROYECCIÓN DEL MERCADO LABORAL Y CAPITAL HUMANO SINALOESE</span>

                </h2> -->
                <img src="images/Sinaloa_talent_logo.png" alt="">
                <br>
                <p class="u-align-justify u-text u-text-3"> Herramienta de la Estrategia de Capital Humano que permite conocer las necesidades del sector productivo sinaloense. Presenta los perfiles profesionales demandados y ofrecidos en la entidad y sus regiones en los próximos cinco años, en los niveles educativos de profesionistas, técnicos superiores universitarios y técnicos medios. También se incluye la demanda de perfiles no cualificados.</p>
            </div>
            <h1 class="text-center u-text-iframe-title">DEMANDA LABORAL Y OFERTA DE EGRESADOS</h1>
             <h2 class="u-align-center u-subtitle u-text u-text-2">
              <span style="font-weight: 700;" class="u-text-custom-color-1">(Proyección para los próximos cinco años)</span>
              <br>
            </h2>
        </section>
        <div class="embed-container">
            <iframe src="https://talent.codesin.mx/webapp/cliente/nivelesEducativos#/" frameborder="0" allowfullscreen></iframe>
        </div>
        <section class="u-clearfix u-section-1-st">
            <div class="flechas text-center">
                <img class='flecha' src='images/iconos_Flecha_verde.svg'/><h4 class='liketext'>DEMANDA CUBIERTA</h4>
                <img class='flecha pl-20' src='images/iconos_Flecha_naranja.svg'/><h4 class='liketext'>DEMANDA NO CUBIERTA</h4>
            </div>
            <p class="text-center u-small-text u-text u-text-variant u-text-4">
                <span style="font-weight: 700;">FUENTE:</span>
                <span style="font-style: italic;">Estudio predictivo realizado por CODESIN, con el uso del Modelo Monash</span>
            </p>
             <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-text text-center u-text-5">
                    <!-- <span style="font-weight: 700;">Nota:</span> La diferencia se calcula de perfiles profesionales por lo que si estos se agrupan por nivel formativo (ej.: ingenieros), la diferencia no representa la resta perfecta entre demanda y oferta, ya que no todos los perfiles ofertados sirven para cubrir todos los perfiles demandados. Es decir, dentro del nivel formativo de ingenieros puede haber diferencia en algunos perfiles y una sobreoferta en otros. -->
                    <span style="font-weight: 700;">Nota:</span> La brecha no representa la resta perfecta entre demanda y oferta, ya que no todos los perfiles ofertados sirven para cubrir todos los perfiles demandados. Por ejemplo, dentro del nivel formativo de ingenieros puede haber brechas en algunos perfiles y una sobreoferta en otros.

                </p>
             </div>
        </section>
        <section class="text-center u-clearfix u-section-2-st">
            <div class="u-align-left u-clearfix u-sheet u-sheet-1">
                <h1 class="text-center u-text-1">PERFILES PROFESIONALES</h1>
                <div class="u-clearfix">
                    <a class="video-popup" :href="urlvideo">
                        <img class="u-image u-image-default u-image-1" src="images/iconos_BotnVideo.png" alt="" data-image-width="2520" data-image-height="284">
                    </a>
                </div>
                <div class="u-expanded-width u-list u-list-1 mb-10">
                    <div class="u-repeater u-repeater-1">
                        <router-link
                            :to="{name: 'sinaloatalentDF'}"
                            class="u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-st"><span class="u-file-icon u-icon u-icon-circle u-text-palette-2-base u-icon-st"><img src="images/iconos_PERFIL1.png" alt=""></span>
                                <h4 class="text-center u-text u-text-title">Análisis estatal</h4>
                                <p class="text-center u-text u-text-body">Consulta la demanda laboral de las empresas, la oferta de egresados de las instituciones de educación media superior y superior, así como las brechas por perfil profesional para los próximos cinco años, por región, nivel formativo y tipo de perfil.</p>
                            </div>
                        </router-link>
                        <router-link
                            :to="{name: 'sinaloatalentSE'}"
                            class="text-center u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-top-xl u-container-layout-st"><span class="u-file-icon u-icon u-icon-circle u-text-palette-2-base u-icon-st"><img src="images/iconos_PERFIL2.png" alt=""></span>
                                <h4 class="text-center u-text u-text-title">Por sector económico</h4>
                                <p class="text-center u-text u-text-body">Consulta la demanda laboral de las empresas, la oferta de egresados de las instituciones de educación media superior y superior, así como las brechas por perfil profesional para los próximos cinco años, por sector económico y región.</p>
                            </div>
                        </router-link>
                        <router-link
                            :to="{name: 'sinaloatalentCR'}"
                            class="u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-top-xl u-container-layout-st"><span class="u-file-icon u-icon u-icon-circle u-text-palette-2-base u-icon-st"><img src="images/iconos_PERFIL3.png" alt=""></span>
                                <h4 class="text-center u-text u-text-title">Comparativo por región</h4>
                                <p class="text-center u-text u-text-body">Compara la demanda laboral de las empresas, la oferta de egresados de las instituciones de educación media superior y superior, así como las brechas por perfil profesional para los próximos cinco años entre las regiones del estado.</p>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="col-md-12 municipios-cuadro">
                <div class="municipio">
                    <p><strong>Los municipios que conforman las regiones de Sinaloa son los siguientes:</strong></p>
                    <br>
                    <p><i class="fa fa-circle text-amarillo" aria-hidden="true"></i> <strong class="text-verde">Región Norte:</strong> Ahome, El Fuerte y Choix</p>
                    <br>
                    <p><i class="fa fa-circle text-amarillo" aria-hidden="true"></i> <strong class="text-verde">Región Centro Norte:</strong> Angostura, Guasave, Mocorito, Salvador Alvarado y Sinaloa de Leyva</p>
                    <br>
                    <p><i class="fa fa-circle text-amarillo" aria-hidden="true"></i> <strong class="text-verde">Región Centro:</strong> Badiraguato, Cosalá, Culiacán, Elota y Navolato</p>
                    <br>
                    <p><i class="fa fa-circle text-amarillo" aria-hidden="true"></i> <strong class="text-verde">Región Sur:</strong> Concordia, El Rosario, Escuinapa,  Mazatlán y San Ignacio</p>
                    <br>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="/filePdf/Aspectos_metodologicos_Modelo_monash.pdf" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-radius-50 u-btn-pdf u-btn-block" download>
                    Aspecto Metodológico PDF <i class="fa fa-cloud-download" aria-hidden="true"></i>
                </a>
            </div>
             <!-- <a class="pdf" href="/filePdf/lorem.pdf" download>
                  <img class="u-image u-image-default u-image-1" src="images/iconos_BotnVideo.png" alt="" data-image-width="2520" data-image-height="284">
              </a> -->

</section>
    </div>
</template>

<script>
    export default {
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
    }
</script>
<style scoped>
#headerPopup{
  width:75%;
  margin:0 auto;
}

#headerPopup iframe{
  width:100%;
  margin:0 auto;
}
.u-text-custom-color-1 {
    color: #2c4c2c;
}

.flechas .flecha {
    height: 24px;
    width: 24px;
    margin-right: 10px;
}
.flechas .pl-20 {
    margin-left: 20px;
}
h4.liketext { vertical-align: middle; display:inline }
.u-section-1-st .u-text-1 {
  font-size: 3rem;
  font-weight: 700;
  margin: 17px auto 0;
}

.u-section-1-st .u-text-iframe-title {
  font-size: 2rem;
  margin: 25px auto 0;
}
p.u-small-text {
    font-size: 0.875rem;
    margin-top: 20px;
    margin-bottom: 20px;
}
.u-section-1-st .u-text-2 {
  font-size: 1rem;
  width: 493px;
  margin: 0 auto;
  text-align: center;
}

.u-section-1-st .u-text-3 {
  width: 741px;
  margin: 20px auto 0;
  text-align: justify;
  letter-spacing: 1px;
  line-height: 1.2rem
}

.u-section-1-st .u-text-4 {
  width: 741px;
  margin: 27px auto 20px;
  text-align: center;
}
.u-section-1-st .u-text-5 {
  font-size: 0.625rem;
  margin: 0px 172px 0 100px;
}
.u-section-2-st{
    margin-bottom: 25px;
}

.u-section-2-st .u-text-1 {
  font-weight: 700;
  font-size: 2.25rem;
  max-width: 570px;
  letter-spacing: 5px;
  margin: 31px auto 0;
}

.u-section-2-st .u-image-1 {
  width: 457px;
  height: 44px;
  margin: 25px auto 0;
}

.u-section-2-st .u-list-1 {
  margin-top: 56px;
  margin-bottom: 5px;
}

.u-section-2-st .u-repeater-1 {
  grid-template-columns: calc(33.3333% - 6.66667px) calc(33.3333% - 6.66667px) calc(33.3333% - 6.66667px);
  min-height: 392px;
  grid-gap: 10px 10px;
}
.u-repeater.u-repeater-1 a {
    text-decoration: none;
    color: inherit;
}

.u-section-2-st .u-container-layout-st {
  padding: 30px;
}

.u-section-2-st .u-icon-st {
  height: 143px;
  width: 143px;
  margin: auto;
}

.u-section-2-st .u-text-title {
  font-weight: 700;
  padding-top: 10px;
  margin: auto;
}

.u-section-2-st .u-text-body {
  margin: 16px 0 0;
  line-height: 1.2rem;
}
.u-section-2-st .u-btn-pdf {
    font-size: 1.5rem;
    letter-spacing: 1px;
    border-style: none;
    font-weight: 700;
    background-image: none;
    text-transform: none;
    margin: 11px auto 0 auto;
    padding: 10px 89px;
    color: #FFF !important;
    background-color: #2c4c2c !important;
    border-radius: 50px !important;
}
.u-section-2-st .u-btn-pdf:hover{
    background-color: #162616 !important;
}
@media (max-width: 1199px) {
  .u-section-1-st .u-text-2 {
    width: 461px;
  }
  .u-section-2-st .u-repeater-1 {
    grid-template-columns: repeat(3, calc(33.333333333333336% - 6.66667px));
    min-height: 323px;
  }
}

@media (max-width: 991px) {

  .u-section-1-st .u-text-3 {
    width: 720px;
  }

  .u-section-1-st .u-text-4 {
    width: 720px;
  }
  .u-section-1-st .u-text-5 {
    margin-left: 0;
    margin-right: 0;
    margin-bottom: 40px;
  }
  .u-section-2-st .u-repeater-1 {
    grid-template-columns: repeat(2, calc(50% - 5.0000025px));
    min-height: 742px;
  }
}

@media (max-width: 767px) {

  .u-section-1-st .u-text-3 {
    width: 540px;
  }

  .u-section-1-st .u-text-4 {
    width: 540px;
  }
}

@media (max-width: 575px) {

  .u-section-1-st .u-text-1 {
    font-size: 1.875rem;
  }

  .u-section-1-st .u-text-2 {
    width: auto;
    font-size: 0.625rem;
  }

  .u-section-1-st .u-text-3 {
    width: 340px;
  }

  .u-section-1-st .u-text-4 {
    width: 340px;
  }
  .u-section-2-st .u-image-1{
      height: 38px;
  }
  .u-section-2-st .u-btn-pdf {
      font-size: 1rem;
      padding: 10px 30px;
  }
  h4.liketext {
      font-size: 12px;
  }
  .u-section-2-st .u-container-layout-st {
      padding: 0;
  }
}
/* iframe */

.embed-container {
    position: relative;
    /* padding-bottom: 56.25%; */
    height: 500px;
    width: 100%;
    overflow: hidden;
}
.embed-container iframe {
    /* position: absolute; */
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
