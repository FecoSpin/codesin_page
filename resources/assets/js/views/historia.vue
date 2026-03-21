<template>
<div>
    <banner-area :page="pageinfo" :img="img"/>
    <!-- <section class="u-align-left u-clearfix u-image u-section-Banner" v-bind:style="{ backgroundImage: 'url(' + img + ')', backgroundPosition:'50% 50%' }" style="position: relative;">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section> -->
    <section class="u-clearfix u-section-2">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-heading-font u-text u-text-default u-title u-text-1">Historia</h1>
        <p class="u-large-text u-text u-text-font u-text-variant u-text-2" v-html="pageinfo.body">
        </p>
      </div>
    </section>
    <boletin-container></boletin-container>
</div>
</template>
<script>
export default {
    data() {
        return {
            pageinfo: [],
            img: ''
        }
    },
    created(){
			this.getdata();
	},
    methods: {
        getdata(){
            axios.get('/api/historiaCodesin')
            .then((res) => {
                this.pageinfo = res.data.pageinfo;
                console.log(res.data.pageinfo);
                this.img = this.smallScreen(this.pageinfo.urlBanner, this.pageinfo.urlBannerMobile);
                $('#lock').addClass('hidden');
            })
            .catch((err) =>{
                console.log(err);
                $('#lock').addClass('hidden');});
        }
    },
}
</script>
<style>
section { font-family: 'Open Sans',sans-serif;}
.u-section-Banner .u-sheet-1 {min-height: 451px}
@media (max-width: 1199px){ .u-section-1 .u-sheet-1 {min-height: 500px} }
.u-section-2 .u-sheet-1 {min-height: 500px}
.u-section-2 .u-text-1 {font-size: 2rem; font-weight: 700; margin: 110px auto 0; color: #4A4A4A;}
.u-section-2 .u-text-2 {margin: 20px 200px 60px; font-size: 1rem; line-height: 26px; color: #626262;}

@media (max-width: 1199px){ .u-section-2 .u-text-2 {margin-left: 10px; margin-right: 10px} }

@media (max-width: 991px){ .u-section-2 .u-text-2 {margin-left: 0; margin-right: 0} }
</style>
