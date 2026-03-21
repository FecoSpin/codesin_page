<template>
    <!-- <section class="u-clearfix u-image u-banner-1" v-bind:style="{ backgroundImage: 'url(' + getBanner(banner) + ')', backgroundPosition:'50% 50%' }" style="position: relative;" data-image-width="1280" data-image-height="853">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-container-style u-custom-color-3 u-group u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <img :src="logo" alt="" v-bind:class="'u-image u-image-default u-image-1 ' + clase" data-image-width="161" data-image-height="62">
          </div>
        </div>
      </div>
    </section> -->
    <div class="banner-area-wrapper">
            <div class="banner-area text-center" v-bind:style="{ backgroundImage: 'url(' + getBanner(banner) + ')' }">	
            </div>
        </div>
</template>
<script>
export default {
    props:['page', 'banner', 'logo', 'clase'],
    data() {
        return {
            image: 'images/53e6d1454350aa14f6da8c7dda793678153bdee757596c48732f78d29f4cc55cb1_1280.jpg',
        }
    },
    mounted() {
    },
    methods:{
      getBanner (obj){
        return this.smallScreen(obj.urlBanner, obj.urlBannerMobile)
      }
    }
}
</script>
<style>
.u-custom-color-3,
.u-body.u-custom-color-3,
.u-container-style.u-custom-color-3:before,
.u-table-alt-custom-color-3 tr:nth-child(even)
{
    color: #ffffff;
    background-color: #007d80;
}

.u-button-style.u-custom-color-3,
.u-button-style.u-custom-color-3[class*="u-border-"]
{
    color: #ffffff !important;
    background-color: #007d80 !important;
}

.u-button-style.u-custom-color-3:hover,
.u-button-style.u-custom-color-3[class*="u-border-"]:hover,
.u-button-style.u-custom-color-3:focus,
.u-button-style.u-custom-color-3[class*="u-border-"]:focus,
.u-button-style.u-button-style.u-custom-color-3:active,
.u-button-style.u-button-style.u-custom-color-3[class*="u-border-"]:active,
.u-button-style.u-button-style.u-custom-color-3.active,
.u-button-style.u-button-style.u-custom-color-3[class*="u-border-"].active
{
    color: #ffffff !important;
    background-color: #007073 !important;
}

.u-banner-1 .u-sheet-1 {min-height: 452px}
.u-banner-1 .u-group-1 {width: 256px; min-height: 280px; background-image: none; height: auto; margin: 79px auto 60px 79px}
.u-banner-1 .u-container-layout-1 {padding: 94px 30px;}
.u-banner-1 .u-image-1 {width: 161px; height: 62px; margin: 0 auto} 
.u-banner-1 .u-image-1.codesinHechos {width: 108px; height: 128px; margin: 0 auto} 
.u-banner-1 .u-image-1.codetalks{width: 128px; height: 78px; margin: 0 auto} 

@media (max-width: 1199px){ .u-banner-1 .u-sheet-1 {min-height: 373px} }

@media (max-width: 991px){ .u-banner-1 .u-sheet-1 {min-height: 286px} }

@media (max-width: 767px){ .u-banner-1 .u-sheet-1 {min-height: 215px}
.u-banner-1 .u-container-layout-1 {padding-left: 10px; padding-right: 10px} }

@media (max-width: 575px){ .u-banner-1 .u-sheet-1 {min-height: 135px} 
}
</style>