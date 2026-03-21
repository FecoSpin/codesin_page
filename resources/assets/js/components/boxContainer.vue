<template>
    <section class="u-clearfix u-sectionBox-2">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1 mb-24">
        <div class="u-expanded-width u-list u-repeater u-list-1">
          <div class="u-container-style u-custom-background u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1" v-for="(item,index) in data" :key="item.id" v-if="index < limitationList">
            <div class="u-container-layout u-similar-container u-container-layout-1">
              <img alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="2000" data-image-height="1333" :src="img(item)">
              <h3 class="u-text u-text-1" v-text="item.title"></h3>
              <p class="u-text u-text-default u-text-2" v-text="item.excerpt"></p>
              <div v-if="item.category_id != 9">
                <img src="/images/chrome_reader_mode-24px.png" alt="" class="u-image u-image-default u-image-2" data-image-width="24" data-image-height="24">
                <p class="u-text u-text-default u-text-3">{{item.timeLectura}} {{indicador(item.indicadorLectura)}} de lectura</p>
                <img src="/images/play_circle_filled-24px1.png" alt="" class="u-image u-image-default u-image-3" data-image-width="24" data-image-height="24">
                <p class="u-text u-text-default u-text-4">{{item.timeVideo}} {{indicador(item.indicadorVideo)}} de video</p>
                <img src="/images/play_circle_filled-24px.png" alt="" class="u-image u-image-default u-image-4" data-image-width="24" data-image-height="24" v-if="item.category_id == 7">
                <p class="u-text u-text-default u-text-5" v-if="item.category_id == 7">{{item.timePodcast}} {{indicador(item.indicadorPodcast)}} de podcast</p>
              </div>
              <url-link :nombre="show" :info="item" class="u-btn u-button-style u-none u-btn-1" >Ver más</url-link>
            </div>
          </div>
        </div>
        
        <button class="u-btn u-button-style u-none u-btn-4" @click="updateLimitation(limitationList)" v-if="!visible">Ver {{limitationList == 9 ? 'más' : 'menos'}}</button>
        <!-- <router-link :to="{name: url}" class="u-btn u-button-style u-none u-btn-4" v-else>Ver todas</router-link> -->
      </div>
    </section>
</template>
<script>
export default {
    props: {
        'data': {
            type: Array,
            required: true
        },
        'visible': {
            type: Boolean,
            required: false,
            default: true
        },
        'show': {
            type: String,
            required: false,
            default: 'codetalks_show'
        },
        'url': {
            type: String,
            required: false,
            default: 'home'
        }
    },
    data() {
        return {
            limitationList: 9
        }
    },
    mounted(){
      this.$watch((vm)=>vm.data,()=>{
                if(this.data.length <= this.limitationList)
                    this.visible=true;
            },{deep:true,immediate:true});
    },
    methods:{
        updateLimitation(limitationList){
        if (this.limitationList == this.data.length) {
                this.limitationList = 9
            }else{
                this.limitationList = this.data.length
            }
        },
        img(obj){
            return obj.urlbannerHomeMobile ? obj.urlbannerHomeMobile : '../images/3.svg';
        },
        indicador(id){
          if(id == 1){
            return 'Min.';
          }
          if(id == 2){
            return 'Hrs.';
          }
        }
    }
}
</script>
<style>
.u-sectionBox-2 .u-sheet-1 {min-height: 575px}
.u-sectionBox-2 .u-list-1 {margin-top: 55px; margin-bottom: 0; min-height: 661px; grid-template-columns: calc(33.3333% - 29px) calc(33.3333% - 29px) calc(33.3333% - 29px); grid-template-rows: auto; grid-gap: 44px 44px; height: auto}
.u-sectionBox-2 .u-list-item-1 {background-image: none; background:#FFF;}
.u-sectionBox-2 .u-container-layout-1 {padding: 30px 0}
.u-sectionBox-2 .u-image-1 {height: 319px; margin: -30px 0 0 -30px}
.u-sectionBox-2 .u-text-1 {margin: 19px 30px 0; font-size: 1rem; line-height: 24px; color: #4A4A4A; font-weight: bold;}
.u-sectionBox-2 .u-text-2 {margin: 30px 30px 0 30px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-image-2 {width: 24px; height: 24px; margin: 20px auto 0 30px}
.u-sectionBox-2 .u-text-3 {margin: -25px auto 0 69px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-image-3 {width: 24px; height: 24px; margin: 20px auto 0 30px}
.u-sectionBox-2 .u-text-4 {margin: -25px auto 0 69px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-image-4 {width: 24px; height: 24px; margin: 20px auto 0 30px}
.u-sectionBox-2 .u-text-5 {margin: -25px auto 0 69px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-btn-1 {font-size: 1rem; letter-spacing: 1px; border-style: none; font-weight: 700; text-transform: none; margin: 30px auto 0 30px; padding: 0; color: #007D80 !important;}
.u-sectionBox-2 .u-list-item-2 {background-image: none}
.u-sectionBox-2 .u-container-layout-2 {padding: 30px 0}
.u-sectionBox-2 .u-image-5 {height: 319px; margin: -30px 0 0 -30px}
.u-sectionBox-2 .u-btn-4 {border-style: none; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 30px auto 55px; padding: 0; color: #007D80;} 

@media (max-width: 1199px){ .u-sectionBox-2 .u-sheet-1 {min-height: 342px}
.u-sectionBox-2 .u-list-1 {min-height: 545px; grid-template-columns: repeat(3, calc(33.333333333333336% - 29px))}
.u-sectionBox-2 .u-image-1 {height: 213px; margin-right: initial; margin-left: initial}
.u-sectionBox-2 .u-text-1 {margin-left: 0; margin-right: 0}
.u-sectionBox-2 .u-text-2 {margin-left: 0}
.u-sectionBox-2 .u-image-2 {margin-left: 0}
.u-sectionBox-2 .u-text-3 {width: auto; margin-top: -24px; margin-left: 57px}
.u-sectionBox-2 .u-image-3 {margin-top: 19px}
.u-sectionBox-2 .u-text-4 {width: auto; margin-top: -24px; margin-left: 57px}
.u-sectionBox-2 .u-image-2 {margin: 20px auto 0 10px}
.u-sectionBox-2 .u-image-3 {margin: 20px auto 0 10px}
.u-sectionBox-2 .u-image-4 {margin: 20px auto 0 10px}
.u-sectionBox-2 .u-text-5 {width: auto; margin-top: -24px; margin-left: 57px}
.u-sectionBox-2 .u-btn-1 {width: 99px; height: 38px; margin-top: 73px; margin-left: 0}
.u-sectionBox-2 .u-image-5 {height: 213px; margin-right: initial; margin-left: initial}
}

@media (max-width: 991px){ .u-sectionBox-2 .u-sheet-1 {min-height: 744px}
.u-sectionBox-2 .u-list-1 {min-height: auto; grid-template-columns: repeat(2, calc(((100% - 720px) / 2)  + 338px))}
.u-sectionBox-2 .u-text-3 {margin-left: 44px}
.u-sectionBox-2 .u-text-4 {margin-left: 44px}
.u-sectionBox-2 .u-text-5 {margin-left: 44px}
 }

@media (max-width: 767px){ .u-sectionBox-2 .u-sheet-1 {min-height: auto}
.u-sectionBox-2 .u-list-1 {grid-gap: 0 0; grid-template-columns: 100%}
.u-sectionBox-2 .u-container-layout-1 {padding-top: 0}
.u-sectionBox-2 .u-image-1 {height: 344px; margin-right: initial; margin-left: initial}
.u-sectionBox-2 .u-text-1 {margin-right: auto}
.u-sectionBox-2 .u-text-3 {margin-top: -25px; margin-left: 43px}
.u-sectionBox-2 .u-image-3 {margin-top: 20px}
.u-sectionBox-2 .u-text-4 {margin-left: 43px}
.u-sectionBox-2 .u-text-5 {margin-top: -25px; margin-left: 43px}
.u-sectionBox-2 .u-btn-1 {margin-top: 74px}
.u-sectionBox-2 .u-container-layout-2 {padding-top: 0}
.u-sectionBox-2 .u-image-5 {height: 344px; margin-right: initial; margin-left: initial}
 }

@media (max-width: 575px){ .u-sectionBox-2 .u-image-1 {height: 212px; margin-right: initial; margin-left: initial}
.u-sectionBox-2 .u-text-3 {margin-top: -26px; margin-left: 42px}
.u-sectionBox-2 .u-image-3 {margin: 21px auto 0 10px;}
.u-sectionBox-2 .u-text-4 {margin-left: 42px}
.u-sectionBox-2 .u-text-5 {margin-left: 42px}
.u-sectionBox-2 .u-image-5 {height: 212px; margin-right: initial; margin-left: initial}
 }
</style>