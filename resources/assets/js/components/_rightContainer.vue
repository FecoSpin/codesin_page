<template>
    <section class="u-clearfix u-section-2">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-21 u-size-xs-60 u-image-2 hidden-lg hidden-md" v-bind:style="{ backgroundImage: 'url(' + imageSmall() + ')', backgroundPosition:'50% 50%'}">
                <div class="u-container-layout u-container-layout-2" v-if="info.category_id == 7">
                  <a :href="info.urlspotify" target="_blank" rel="noopener noreferrer">
                  <!-- <img v-bind:src="thumbnail()" alt="" class="u-expanded-width u-image u-image-default u-image-3"> -->
                    <img src="images/Group5.png" alt="" class="u-expanded-width u-image u-image-round u-radius-8 u-image-4" data-image-width="280" data-image-height="64" data-href="https://nicepage.com">
                  </a>
                </div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-39 u-size-xs-60 u-white u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <img :src="flogo(info.category_id)" alt="" :class="'u-image u-image-default u-image-1 ' + clss(info.category_id)" data-image-width="112" data-image-height="72">
                  <h2 class="u-custom-font u-text u-text-font u-text-1" v-text="info.title"></h2>
                  <p class="u-text u-text-2" v-text="info.excerpt"></p>
                  <div v-if="info.category_id != 9">
                    <p class="u-text u-text-3">{{info.timeLectura}} {{indicador(info.indicadorLectura)}} de lectura</p>
                    <span class="u-file-icon u-icon u-icon-circle u-text-palette-1-base u-icon-1"><img src="images/chrome_reader_mode-24px.png" alt=""></span><span class="u-file-icon u-icon u-icon-circle u-text-palette-1-base u-icon-2"><img src="images/play_circle_filled-24px1.png" alt=""></span>
                    <p class="u-text u-text-4">{{info.timeVideo}} {{indicador(info.indicadorVideo)}} de video</p>
                    <span class="u-file-icon u-icon u-icon-circle u-text-palette-1-base u-icon-3" v-if="info.category_id == 7"><img src="images/play_circle_filled-24px.png" alt=""></span>
                    <p class="u-text u-text-default u-text-5" v-if="info.category_id == 7">{{info.timePodcast}} {{indicador(info.indicadorPodcast)}} de podcast</p>
                  </div>
                  <url-link :nombre="show" :info="info" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-palette-1-base u-btn-1" >Ver más</url-link>
                </div>
              </div>
              <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-21 u-size-xs-60 u-image-2 hidden-sm hidden-xs" v-bind:style="{ backgroundImage: 'url(' + imageSmall() + ')', backgroundPosition:'50% 50%'}">
                <div class="u-container-layout u-container-layout-2" v-if="info.category_id == 7">
                  <a :href="info.urlspotify" target="_blank" rel="noopener noreferrer">
                  <!-- <img v-bind:src="thumbnail()" alt="" class="u-expanded-width u-image u-image-default u-image-3"> -->
                    <img src="images/Group5.png" alt="" class="u-expanded-width u-image u-image-round u-radius-8 u-image-4">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
    props:['info'],
    data(){
			return{
        // thumbnail: '../images/31848559-0.jpeg',
        image: '../img/banner.png',
        lectura: '18 hrs',
        video:'22 min',
        podcast:'35 min',
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
    imageSmall(){
      return this.info.urlbannerHomeMobile ? this.info.urlbannerHomeMobile : '../img/banner.png';
    },
    thumbnail(){
      return this.info.urlthumbnailspotify ? this.info.urlthumbnailspotify : '../img/banner.png';
    },
    indicador(id){
      if(id == 1){
        return 'Min.';
      }
      if(id == 2){
        return 'Hrs.';
      }
    },
  },
}
</script>
<style>
.u-section-2 .u-sheet-1 {min-height: 743px}
.u-section-2 .u-layout-wrap-1 {margin: 60px 0 60px auto}
.u-section-2 .u-layout-cell-1 {min-height: 632px}
.u-section-2 .u-container-layout-1 {padding: 30px 60px; background: white;}
.u-section-2 .u-image-1 {width: 112px; height: 72px; margin: 21px auto 0 0}
.u-section-2 .u-image-1.u-image-codetalk {width: 120px;}
.u-section-2 .u-image-1.u-image-codesinHechos {width: 60px; height: 71px;}
.u-section-2 .u-image-1.u-image-sinNumeros {width: 161px; height: 62px;}
.u-section-2 .u-text-1 {font-weight: 700; margin: 20px 0 0; font-size: 32px; line-height: 43px;}
.u-section-2 .u-text-2 {margin: 20px 0 0; size: 16px; line-height: 26px; color: #626262;}
.u-section-2 .u-text-3 {margin: 66px 440px 0 38px; color: #626262;}
.u-section-2 .u-icon-1 {height: 24px; width: 24px; margin: -21px auto 0 0}
.u-section-2 .u-icon-2 {height: 24px; width: 24px; margin: -22px auto 0 217px}
.u-section-2 .u-text-4 {margin: -21px 236px 0 255px; color: #626262;}
.u-section-2 .u-icon-3 {height: 24px; width: 24px; margin: -20px 191px 0 auto}
.u-section-2 .u-text-5 {margin: -19px 39px 0 auto; color: #626262;}
.u-section-2 .u-btn-1 {font-size: 0.875rem; letter-spacing: 1px; border-style: none; font-weight: 700; text-transform: none; margin: 33px auto 0 0; padding: 0; color: #007d80 !important;}
.u-section-2 .u-image-2 {min-height: 632px; }
.u-section-2 .u-container-layout-2 {padding: 30px 30px 0px 40px}
.u-section-2 .u-image-3 {height: 353px; margin: 38px -5px 0 0}
.u-section-2 .u-image-4 {height: 64px; margin: 537px auto 0 0} 
.u-section-2 .u-image-4:hover {cursor: pointer;} 

@media (max-width: 1199px){ 
.u-section-2 .u-sheet-1 {min-height: 570px}
.u-section-2 .u-layout-wrap-1 {margin-bottom: 0; margin-right: initial; margin-left: initial}
.u-section-2 .u-layout-cell-1 {min-height: 545px}
.u-section-2 .u-text-3 {width: auto; margin-top: 22px; margin-right: 310px}
.u-section-2 .u-icon-1 {margin-top: -25px}
.u-section-2 .u-icon-2 {margin-top: -24px; margin-left: 181px}
.u-section-2 .u-text-4 {width: auto; margin-top: -24px; margin-right: 142px; margin-left: 219px}
.u-section-2 .u-icon-3 {margin-right: 118px}
.u-section-2 .u-text-5 {width: auto; margin-top: -24px; margin-right: -34px}
.u-section-2 .u-btn-1 {margin-top: 80px}
.u-section-2 .u-image-2 {min-height: 521px}
.u-section-2 .u-image-3 {height: 278px; margin-right: initial; margin-left: initial}
.u-section-2 .u-image-4 {height: 50px; margin-top: 464px; margin-right: initial; margin-left: initial} }

@media (max-width: 991px){ 
.u-section-2 .u-sheet-1 {min-height: 437px}
.u-section-2 .u-layout-cell-1 {min-height: 652px}
.u-section-2 .u-container-layout-1 {padding-left: 30px; padding-right: 30px}
.u-section-2 .u-text-3 {margin-top: 32px; margin-right: 220px; margin-left: 45px}
.u-section-2 .u-icon-2 {margin-top: 22px; margin-left: 0}
.u-section-2 .u-text-4 {margin-top: -25px; margin-right: 234px; margin-left: 45px}
.u-section-2 .u-icon-3 {margin-top: 12px; margin-right: auto; margin-left: 0}
.u-section-2 .u-text-5 {margin-right: -28px; margin-left: 45px}
.u-section-2 .u-btn-1 {margin-top: 31px}
.u-section-2 .u-image-2 {min-height: 652px}
.u-section-2 .u-container-layout-2 {padding-left: 30px}
.u-section-2 .u-image-3 {height: 287px; margin-right: initial; margin-left: initial}
.u-section-2 .u-image-4 {height: 37px; margin-right: initial; margin-left: initial; margin-top: 584px;} }

@media (max-width: 767px){ .u-section-2 .u-sheet-1 {min-height: 328px}
.u-section-2 .u-layout-wrap-1 {margin-bottom: 60px; margin-right: initial; margin-left: initial}
.u-section-2 .u-layout-cell-1 {min-height: 741px}
.u-section-2 .u-container-layout-1 {padding-left: 10px; padding-right: 10px}
.u-section-2 .u-text-5 {margin-top: -25px; margin-right: auto}
.u-section-2 .u-btn-1 {margin-top: 38px}
.u-section-2 .u-image-2 {min-height: 1397px}
.u-section-2 .u-container-layout-2 {padding-left: 10px; padding-right: 10px}
.u-section-2 .u-image-3 {height: 777px; margin-right: initial; margin-left: initial}
.u-section-2 .u-image-4 {height: 100px; margin-right: initial; margin-left: initial; margin-top: 1265px;} }

@media (max-width: 575px){ .u-section-2 .u-sheet-1 {min-height: 207px}
.u-section-2 .u-layout-cell-1 {min-height: 656px}
.u-section-2 .u-text-3 {margin-top: 18px; margin-right: 29px; margin-left: 36px}
.u-section-2 .u-icon-1 {margin-top: -24px}
.u-section-2 .u-text-4 {margin-right: 43px; margin-left: 36px}
.u-section-2 .u-text-5 {margin-left: 36px}
.u-section-2 .u-image-2 {min-height: 342px; max-height: 342px;}
.u-section-2 .u-image-3 {height: 478px; margin-right: initial; margin-left: initial; margin-top: 249px;}
.u-section-2 .u-image-4 {height: 62px; margin-right: initial; margin-left: initial; margin-top: 300px;} 
}
</style>