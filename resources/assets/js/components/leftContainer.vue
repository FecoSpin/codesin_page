<template>
    <section class="u-clearfix u-section-3">
      <!-- <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-21 u-size-xs-60 u-image-1" v-bind:style="{ backgroundImage: 'url(' + imageSmall() + ')', backgroundPosition:'50% 50%'}" data-image-width="1080" data-image-height="1080">
                <div class="u-container-layout u-container-layout-1" v-if="info.category_id == 7">
                  /* <img :src="thumbnail()" alt="" class="u-expanded-width u-image u-image-default u-image-2"> */
                  <a :href="info.urlspotify" target="_blank" rel="noopener noreferrer">
                    <img src="images/Group5.png" alt="" class="u-expanded-width u-image u-image-round u-radius-8 u-image-3" data-image-width="280" data-image-height="64" data-href="https://nicepage.com">
                  </a>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-39 u-size-xs-60 u-white u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <img :src="flogo(info.category_id)" alt="" :class="'u-image u-image-default u-image-4 ' + clss(info.category_id)">
                  <h2 class="u-custom-font u-text u-text-font u-text-1" v-text="info.title"></h2>
                  <p class="u-text u-text-2" v-text="info.excerpt"></p>
                  <div v-if="info.category_id != 9">
                    <p class="u-text u-text-3">{{info.timeLectura}} {{indicador(info.indicadorLectura)}} de lectura</p><span class="u-file-icon u-icon u-icon-circle u-text-palette-1-base u-icon-1">
                      <img src="images/chrome_reader_mode-24px.png" alt=""></span><span class="u-file-icon u-icon u-icon-circle u-text-palette-1-base u-icon-2"><img src="images/play_circle_filled-24px1.png" alt=""></span>
                    <p class="u-text u-text-4">{{info.timeVideo}} {{indicador(info.indicadorVideo)}} de video</p>
                    <span class="u-file-icon u-icon u-icon-circle u-text-palette-1-base u-icon-3" v-if="info.category_id == 7">
                      <img src="images/play_circle_filled-24px.png" alt="">
                    </span>
                    <p class="u-text u-text-default u-text-5" v-if="info.category_id == 7">{{info.timePodcast}} {{indicador(info.indicadorPodcast)}} de podcast</p>
                  </div>
                  <url-link :nombre="'codetalks_show'" :info="info" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-palette-1-base u-btn-1 default-textcolor" >Ver más</url-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </section>
</template>
<script>
export default {
    props:['info'],
    data(){
			return{
        image: '../img/banner.png',
        lectura: '18 min',
        video:'2 hrs',
        podcast:'30 min',
        show:'codetalks_show'
			}
    },
    methods:{
    flogo(id){
      if(id == 7){
          return 'images/Code_talks.svg';
      }
      if(id == 8){
         return 'images/Codesin_hechos.png';
      }
      if(id == 9){
         this.show ='sinaloaennumeros_show';
        return 'images/Sinaloa_numeros.svg';
      }
    },
    clss(id){
      if(id == 7){
        return 'u-image-codetalk';
      }
      if(id == 8){
        return 'u-image-codesinHechos';
      }
      if(id == 9){
        return 'u-image-sinNumeros';
      }
    },
    indicador(id){
      if(id == 1){
        return 'Min.';
      }
      if(id == 2){
        return 'Hrs.';
      }
    },
    imageSmall(){
      return this.info.urlbannerHomeMobile ? this.info.urlbannerHomeMobile : '../img/banner.png';
    },
    thumbnail(){
      return this.info.urlthumbnailspotify ? this.info.urlthumbnailspotify : '../img/banner.png';
    }
  },
}
</script>
<style>
.u-section-3 .u-sheet-1 {min-height: 743px}
.u-section-3 .u-layout-wrap-1 {margin: 60px auto 60px 0}
.u-section-3 .u-image-1 {min-height: 632px;}
.u-section-3 .u-container-layout-1 {padding: 30px 30px 0px 40px}
.u-section-3 .u-image-2 {height: 353px; margin: 38px -5px 0 0}
.u-section-3 .u-image-3 {height: 64px; margin: 538px auto 0 0}
.u-section-3 .u-layout-cell-2 {min-height: 632px}
.u-section-3 .u-container-layout-2 {padding: 30px 60px; background: white;}
.u-section-3 .u-image-4 {width: 112px; height: 72px; margin: 21px auto 0 0}
.u-section-3 .u-image-4.u-image-codetalk {width: 120px;}
.u-section-3 .u-image-4.u-image-codesinHechos {width: 60px; height: 71px;}
.u-section-3 .u-image-4.u-image-sinNumeros {width: 161px; height: 62px;}
.u-section-3 .u-text-1 {font-weight: 700; margin: 20px 0 0; color:#4A4A4A; font-size: 32px; line-height: 43px;}
.u-section-3 .u-text-2 {margin: 20px 0 0; size: 16px; line-height: 26px; color: #626262;}
.u-section-3 .u-text-3 {margin: 66px 440px 0 38px; color: #626262;}
.u-section-3 .u-icon-1 {height: 24px; width: 24px; margin: -21px auto 0 0}
.u-section-3 .u-icon-2 {height: 24px; width: 24px; margin: -22px auto 0 217px}
.u-section-3 .u-text-4 {margin: -21px 236px 0 255px; color: #626262;}
.u-section-3 .u-icon-3 {height: 24px; width: 24px; margin: -20px 191px 0 auto}
.u-section-3 .u-text-5 {margin: -19px 39px 0 auto; color: #626262;}
.u-section-3 .u-btn-1 {font-size: 0.875rem; letter-spacing: 1px; border-style: none; font-weight: 700; text-transform: none; margin: 33px auto 0 0; padding: 0; color: #007D80 !important;}
@media (max-width: 1199px){ .u-section-3 .u-sheet-1 {min-height: 570px}
.u-section-3 .u-layout-wrap-1 {margin-bottom: 0; margin-right: initial; margin-left: initial}
.u-section-3 .u-image-1 {min-height: 521px}
.u-section-3 .u-image-2 {height: 278px; margin-right: initial; margin-left: initial}
.u-section-3 .u-image-3 {height: 50px; margin-top: 465px; margin-right: initial; margin-left: initial}
.u-section-3 .u-layout-cell-2 {min-height: 545px}
.u-section-3 .u-text-3 {width: auto; margin-top: 22px; margin-right: 311px; margin-left: 37px}
.u-section-3 .u-icon-1 {margin-top: -25px}
.u-section-3 .u-icon-2 {margin-top: -24px; margin-left: 180px}
.u-section-3 .u-text-4 {width: auto; margin-top: -25px; margin-right: 144px; margin-left: 217px}
.u-section-3 .u-icon-3 {margin-top: -24px; margin-right: 108px}
.u-section-3 .u-text-5 {width: auto; margin-top: -24px; margin-right: -45px}
.u-section-3 .u-btn-1 {margin-top: 80px} }

@media (max-width: 991px){ .u-section-3 .u-sheet-1 {min-height: 437px}
.u-section-3 .u-image-1 {min-height: 652px}
.u-section-3 .u-container-layout-1 {padding-left: 30px}
.u-section-3 .u-image-2 {height: 303px; margin-right: initial; margin-left: initial}
.u-section-3 .u-image-3 {height: 37px; margin-right: initial; margin-left: initial; margin-top: 585px;}
.u-section-3 .u-layout-cell-2 {min-height: 652px}
.u-section-3 .u-container-layout-2 {padding-left: 30px; padding-right: 30px}
.u-section-3 .u-text-3 {margin-top: 24px; margin-right: 227px; margin-left: 38px}
.u-section-3 .u-icon-2 {margin-top: 17px; margin-left: 0}
.u-section-3 .u-text-4 {margin-top: -24px; margin-right: 241px; margin-left: 38px}
.u-section-3 .u-icon-3 {margin-top: 12px; margin-right: auto; margin-left: 0}
.u-section-3 .u-text-5 {margin-top: -22px; margin-right: auto; margin-left: 38px}
.u-section-3 .u-btn-1 {margin-top: 41px} }

@media (max-width: 767px){ .u-section-3 .u-sheet-1 {min-height: 328px}
.u-section-3 .u-layout-wrap-1 {margin-bottom: 60px; margin-right: initial; margin-left: initial}
.u-section-3 .u-image-1 {min-height: 1397px}
.u-section-3 .u-container-layout-1 {padding-left: 10px; padding-right: 10px}
.u-section-3 .u-image-2 {height: 821px; margin-right: initial; margin-left: initial}
.u-section-3 .u-image-3 {height: 100px; margin-right: initial; margin-left: initial; margin-top: 1267px;}
.u-section-3 .u-layout-cell-2 {min-height: 741px}
.u-section-3 .u-container-layout-2 {padding-left: 10px; padding-right: 10px}
.u-section-3 .u-text-5 {margin-top: -25px}
.u-section-3 .u-btn-1 {margin-top: 38px} }

@media (max-width: 575px){ .u-section-3 .u-sheet-1 {min-height: 207px}
.u-section-3 .u-image-1 {min-height: 342px; max-height: 342px;}
.u-section-3 .u-image-2 {height: 505px; margin-right: initial; margin-left: initial}
.u-section-3 .u-image-3 {height: 62px; margin-right: initial; margin-left: initial; margin-top: 250px;}
.u-section-3 .u-layout-cell-2 {min-height: 657px}
.u-section-3 .u-text-3 {margin-top: 19px; margin-right: 22px; margin-left: 43px}
.u-section-3 .u-icon-2 {margin-top: 22px}
.u-section-3 .u-text-4 {margin-right: 36px; margin-left: 43px}
.u-section-3 .u-text-5 {margin-left: 43px}
}
</style>
