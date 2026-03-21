<template>
    <div>
        <banner-area :page="''" :img="img" />
        <section class="u-clearfix u-sectionTitle-2">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="meta">
                        <span class="fa fa-calendar mr-2"></span>  {{datos.published_at | moment("dddd, MMMM D YYYY")}}
                </div>
                <h1 class="u-align-center u-text u-text-default u-text-1" v-text="datos.title"></h1>
                <div v-if="datos.category_id != 9">
                    <img src="/images/chrome_reader_mode-24px.png" alt="" class="u-image u-image-default u-image-1" data-image-width="24" data-image-height="24">
                    <p class="u-text u-text-default u-text-2">{{datos.timeLectura}} {{indicador(datos.indicadorLectura)}} de lectura</p>
                    <img src="/images/play_circle_filled-24px1.png" alt="" class="u-image u-image-default u-image-2" data-image-width="24" data-image-height="24">
                    <p class="u-text u-text-default u-text-3">{{datos.timeVideo}} {{indicador(datos.indicadorVideo)}} de video</p>
                    <img src="/images/play_circle_filled-24px.png" alt="" class="u-image u-image-default u-image-3" v-if="datos.category_id == 7">
                    <p class="u-text u-text-default u-text-4" v-if="datos.category_id == 7">{{datos.timePodcast}} {{indicador(datos.indicadorPodcast)}} de audio</p>
                </div>
            </div>
        </section>
        <section class="u-clearfix u-sectionImage-3" id="sec-0b41" v-if="datos.category_id == 7">
            <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
                <img :src="imageSmall()" alt="" class="u-image u-image-default u-image-1" data-image-width="600" data-image-height="600">
                <!-- <img :src="thumbnail()" alt="" class="u-image u-image-default u-image-2" data-image-width="1280" data-image-height="853"> -->
                <div class="u-image u-image-default u-image-2" data-image-width="1280" data-image-height="853"></div>
                <a :href="datos.urlspotify" target="_blank" rel="noopener noreferrer"><img src="/images/Group5.png" alt="" class="u-image u-image-default u-image-3" data-image-width="280" data-image-height="64"></a>
            </div>
        </section>
        <section class="u-clearfix u-sectionBody-4" id="sec-c83e">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-text u-text-1" v-html="datos.body"></p>
            </div>
        </section>
        <section class="u-clearfix u-sectionVideo-5" v-if="datos.urlvideo != null">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-expand-resize u-video u-video-contain u-video-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" :src="'//www.youtube.com/embed/' +youtube_parser(datos.urlvideo)"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <share-container :title ="datos.title" :hashtags="hash" :expert="datos.excerpt" :url="fullPath" v-if="datos.title != null"/>
        <box-container :data="more" :visible="true" :url="getUrl(datos.category_id)"/>
        <boletin-container></boletin-container>
    </div>
</template>

<script>
    export default {
        props:['url'],
        data(){
            return{
                datos:[],
                photos : [],
                img : '',
                more:[],
                hash:'',
                fullPath:  this.$route.fullPath
            }
        },
        mounted() {
            this.$watch((vm)=>vm.url,()=>{
                this.getData();
            },{deep:true,immediate:true});
        },
        methods:{
            getUrl(id){
                switch (id) {
                    case 7:
                        this.hash="CodeTalks,Codesin";
                        return 'codetalks'
                        break;
                    case 8:
                        this.hash="CodeinConHechos,Codesin";
                        return 'codesinHechos'
                        break;
                    case 9:
                        return 'sinaloaNumeros'
                        break;
                    default:
                        return '#'
                        break;
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
            thumbnail(){
                return this.datos.urlthumbnailspotify ? this.datos.urlthumbnailspotify : '../img/banner.png';
            },
            imageSmall(){
                return this.datos.urlbannerHomeMobile ? this.datos.urlbannerHomeMobile : '../img/banner.png';
            },
            youtube_parser(url){
                let regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
                let match = url.match(regExp);
                return (match&&match[7].length==11)? match[7] : false;
            },
            getData(){
                axios.get(`/api/codetalks/${this.url}`)
                .then(res =>{
                    this.datos = res.data.post;
                    this.more = res.data.more;
                    this.photos = this.datos.photos
                    this.img = this.smallScreen(this.datos.urlBanner, this.datos.urlBannerMobile);
                    $('#lock').addClass('hidden');
                })
                .catch(err =>{
                    console.log(err.response.data);
                });
            }

        }
    }
</script>
<style>

.u-sectionBanner-1 .u-sheet-1 {min-height: 451px}
.u-sectionTitle-2 .u-sheet-1 {min-height: 203px}
.u-sectionTitle-2 .u-text-1 {font-size: 2.5rem; font-weight: 700; margin: 53px auto 0; line-height: 56px; color: #4A4A4A;}
.u-sectionTitle-2 .u-image-1 {width: 24px; height: 24px; margin: 56px auto 0 316px}
.u-sectionTitle-2 .u-text-2 {margin: -20px auto 0 364px; color: #626262;}
.u-sectionTitle-2 .u-image-2 {width: 24px; height: 24px; margin: -22px auto 0 518px}
.u-sectionTitle-2 .u-text-3 {margin: -18px 451px 0 auto; color: #626262;}
.u-sectionTitle-2 .u-image-3 {width: 24px; height: 24px; margin: -22px 397px 0 auto}
.u-sectionTitle-2 .u-text-4 {margin: -18px 252px 24px auto; color: #626262;}
.u-sectionImage-3 .u-sheet-1 {min-height: 645px}
.u-sectionImage-3 .u-image-1 {width: 740px; height: 570px; margin: 60px auto 0}
.u-sectionImage-3 .u-image-2 {width: 294px; height: 294px; margin: -509px auto 0}
.u-sectionImage-3 .u-image-3 {width: 280px; height: 64px; margin: 230px auto 60px auto}


.u-sectionBody-4 .u-sheet-1 {min-height: auto}
.u-sectionBody-4 .u-text-1 {width: 750px; margin: 20px auto 60px; color: #626262; font-size: 1rem; line-height: 26px;}

.u-sectionVideo-5 .u-sheet-1 {min-height: 540px}
.u-sectionVideo-5 .u-video-1 {width: 740px; height: 480px; margin: 0 auto 60px}

@media (max-width: 1199px){
.u-sectionBanner-1 .u-sheet-1 {min-height: 500px}
.u-sectionTitle-2 .u-image-1 {margin-top: 55px; margin-left: 161px}
.u-sectionTitle-2 .u-text-2 {width: auto; margin-left: 209px}
.u-sectionTitle-2 .u-image-2 {margin-top: -20px; margin-left: 363px}
.u-sectionTitle-2 .u-text-3 {width: auto; margin-top: -23px; margin-right: auto}
.u-sectionTitle-2 .u-image-3 {width: 20px; margin-right: 367px}
.u-sectionTitle-2 .u-text-4 {width: auto; margin-right: 222px; margin-bottom: 23px}
.u-sectionImage-3 .u-image-2 {width: 242px}
}

@media (max-width: 991px){
.u-sectionTitle-2 .u-sheet-1 {min-height: 354px}
.u-sectionTitle-2 .u-image-1 {margin-top: 54px; margin-left: 126px}
.u-sectionTitle-2 .u-text-2 {margin-left: 170px}
.u-sectionTitle-2 .u-image-2 {margin-left: 320px}
.u-sectionTitle-2 .u-text-3 {margin-top: -18px; margin-right: 232px}
.u-sectionTitle-2 .u-image-3 {margin-top: -22px; margin-right: 187px}
.u-sectionTitle-2 .u-text-4 {margin-top: -19px; margin-right: 41px; margin-bottom: 60px}
.u-sectionImage-3 .u-sheet-1 {min-height: 675px}
.u-sectionImage-3 .u-image-1 {width: 720px; height: 555px}
.u-sectionImage-3 .u-image-2 {height: 293px; margin-top: -531px}
.u-sectionImage-3 .u-image-3 {margin-top: 250px}
.u-sectionBody-4 .u-text-1 {width: 720px}
.u-sectionVideo-5 .u-video-1 {width: 720px}
}

@media (max-width: 767px){
.u-sectionTitle-2 .u-sheet-1 {min-height: 389px}
.u-sectionTitle-2 .u-image-1 {margin-top: 56px; margin-left: 183px}
.u-sectionTitle-2 .u-text-2 {margin-right: 183px; margin-left: auto}
.u-sectionTitle-2 .u-image-2 {margin-top: 35px; margin-left: 183px}
.u-sectionTitle-2 .u-text-3 {margin-top: -25px; margin-right: 194px}
.u-sectionTitle-2 .u-image-3 {margin-top: 24px; margin-right: auto; margin-left: 187px}
.u-sectionTitle-2 .u-text-4 {margin-right: 192px}
.u-sectionImage-3 .u-sheet-1 {min-height: 536px}
.u-sectionImage-3 .u-image-1 {width: 540px; height: 416px}
.u-sectionImage-3 .u-image-2 {width: 225px; height: 225px; margin-top: -385px}
.u-sectionImage-3 .u-image-3 {margin-top: 170px}
.u-sectionBody-4 .u-sheet-1 {min-height: auto}
.u-sectionBody-4 .u-sheet-1 iframe {width: 100%; display: none;}
.u-sectionBody-4 .u-text-1 {margin-top: 29px; margin-left: 0; margin-right: 0; width: 540px}
.u-sectionVideo-5 .u-video-1 {width: 540px}
}

@media (max-width: 575px){
.u-sectionTitle-2 .u-sheet-1 {min-height: 434px}
.u-sectionTitle-2 .u-text-1 {font-size: 2.25rem}
.u-sectionTitle-2 .u-image-1 {margin-top: 63px; margin-left: 114px}
.u-sectionTitle-2 .u-text-2 {margin-right: auto; margin-left: 170px}
.u-sectionTitle-2 .u-image-2 {margin-top: 20px; margin-left: 114px}
.u-sectionTitle-2 .u-text-3 {margin-top: -24px; margin-right: auto; margin-left: 170px}
.u-sectionTitle-2 .u-image-3 {margin-top: 35px; margin-left: 114px}
.u-sectionTitle-2 .u-text-4 {margin-top: -24px; margin-right: auto; margin-left: 170px}
.u-sectionImage-3 .u-sheet-1 {min-height: 382px}
.u-sectionImage-3 .u-image-1 {width: 340px; height: 262px}
.u-sectionImage-3 .u-image-2 {width: 140px; height: 140px; margin-top: -251px}
.u-sectionImage-3 .u-image-3 {margin-top: 120px}
.u-sectionBody-4 .u-text-1 {width: 340px}
.u-sectionVideo-5 .u-video-1 {width: 340px}
}
</style>
