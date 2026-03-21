<template>
  <div>
    <section class="u-align-left u-clearfix u-image u-shading u-section-1" data-image-width="256" data-image-height="256" id="sec-5568" v-bind:style="{ backgroundImage: 'url(../' + image() + ')',  minHeight:'100vh' }" style="position: relative;">
      <div class="u-container-style u-group u-group-1 visible-lg visible-md">
        <div class="u-container-layout u-valign-top u-container-layout-1">
          <img :src="flogo(info.category_id)" alt="alt" v-bind:class="'u-image u-image-default u-image-1 '+ clss(info.category_id)">
          <h2 class="u-custom-font u-text u-text-font u-text-1" v-text="info.title"></h2>
          <p class="u-align-left u-text u-text-2" v-text="info.excerpt"></p>
          <url-link :nombre="show" :info="info" class="u-btn u-btn-round u-button-style u-hover-palette-3-light-1 u-palette-3-base u-radius-12 u-btn-1" >Ver más</url-link>
        </div>
      </div>
    </section>
    <div class="visible-sm visible-xs col-sm-12 col-xs-12 u-section-1">
      <div class="u-container-style u-group u-group-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
          <img :src="flogo(info.category_id)" alt="alt" v-bind:class="'u-image u-image-default u-image-1 '+ clss(info.category_id)">
          <h2 class="u-custom-font u-text u-text-font u-text-1" v-text="info.title"></h2>
          <p class="u-align-left u-text u-text-2" v-text="info.excerpt"></p>
          <url-link :nombre="show" :info="info" class="u-btn u-btn-round u-button-style u-hover-palette-3-light-1 u-palette-3-base u-radius-12 u-btn-1" >Ver más</url-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['info'],
    data(){
			return{
        logo : 'images/Codesin_hechos.svg',
        alt: '',
        show:'codetalks_show'
			}
    },
  methods:{
    flogo(id){
      if(id == 7){
          return 'images/Code_talks.png';
      }
      if(id == 8){
        return 'images/codesinhechos.png';
      }
      if(id == 9){
         this.show ='sinaloaennumeros_show';
        return 'images/Sinaloaennumeros1.png';
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
    image(){      
        if(window.innerWidth < 767){
            
           return this.info.urlbannerHomeMobile ? this.info.urlbannerHomeMobile : '../img/banner.png';

        }else{

            return this.info.urlbannerHome ? this.info.urlbannerHome : '../img/banner.png';
        }
    },
  },
}
</script>
<style>
img.u-image,
.u-video-poster {
  overflow: hidden;
}

.u-back-image.u-image-contain,
.u-image.u-image-contain {
  object-fit: contain;
  background-size: contain;
}
.u-back-image.u-image-tiles,
.u-image.u-image-tiles {
  background-size: initial;
  background-repeat: repeat;
  background-position: top left !important;
}
section.u-image,
.u-sheet.u-image,
.u-group.u-image,
.u-layout-cell.u-image {
  overflow: visible;
}
.u-text .u-image {
  display: inline-block;
}
.u-post-content .u-image {
  margin-bottom: 0.5rem;
}
.u-image-circle.u-image {
  border-radius: 50% !important;
}
.u-image-circle.u-expanded-width {
  padding-bottom: 100%;
}
.u-palette-3-base,
.u-body.u-palette-3-base,
.u-container-style.u-palette-3-base:before,
.u-table-alt-palette-3-base tr:nth-child(even) {
  color: #111111;
  background-color: #FFAA00;
}
.u-button-style.u-palette-3-base,
.u-button-style.u-palette-3-base[class*="u-border-"] {
  color: #111111 !important;
  background-color: #FFAA00 !important;
}
.u-button-style.u-palette-3-base:hover,
.u-button-style.u-palette-3-base[class*="u-border-"]:hover,
.u-button-style.u-palette-3-base:focus,
.u-button-style.u-palette-3-base[class*="u-border-"]:focus,
.u-button-style.u-button-style.u-palette-3-base:active,
.u-button-style.u-button-style.u-palette-3-base[class*="u-border-"]:active,
.u-button-style.u-button-style.u-palette-3-base.active,
.u-button-style.u-button-style.u-palette-3-base[class*="u-border-"].active {
  color: #111111 !important;
  background-color: #d9b10d !important;
}
.u-hover-palette-3-light-1:hover,
.u-hover-palette-3-light-1[class*="u-border-"]:hover,
.u-hover-palette-3-light-1:focus,
.u-hover-palette-3-light-1[class*="u-border-"]:focus,
.u-active-palette-3-light-1.u-active.u-active,
.u-active-palette-3-light-1[class*="u-border-"].u-active.u-active,
a.u-button-style.u-hover-palette-3-light-1:hover,
a.u-button-style.u-hover-palette-3-light-1[class*="u-border-"]:hover,
a.u-button-style.u-hover-palette-3-light-1:focus,
a.u-button-style.u-hover-palette-3-light-1[class*="u-border-"]:focus,
a.u-button-style.u-button-style.u-active-palette-3-light-1:active,
a.u-button-style.u-button-style.u-active-palette-3-light-1[class*="u-border-"]:active,
a.u-button-style.u-button-style.u-active-palette-3-light-1.active,
a.u-button-style.u-button-style.u-active-palette-3-light-1[class*="u-border-"].active {
  color: #111111 !important;
  background-color: #f5d654 !important;
}
a.u-link.u-hover-palette-3-light-1:hover {
  color: #f5d654 !important;
}
</style>