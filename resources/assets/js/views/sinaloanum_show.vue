<template>
    <div>
        <banner-area :page="''" :img="img" />
        <section class="u-clearfix u-sectionTitle-2">
            <div class="meta">
                    <span class="fa fa-calendar mr-2"></span>  {{datos.published_at | moment("dddd, MMMM D YYYY")}}
            </div>
            <div class="u-clearfix u-sheet u-sheet-1">
                <h1 class="u-align-center u-text u-text-default u-text-1" v-text="datos.title"></h1>
            </div>
        </section>
        <section class="u-clearfix u-sectionBody-4" id="sec-c83e">
            <div class="u-clearfix u-sheet u-sheet-1">
                <p class="u-text u-text-1" v-html="datos.body"></p>
            </div>
        </section>
        <section class="u-align-left u-clearfix u-section-3" v-if="datos.urlimage != null">
            <div class="u-clearfix u-sheet u-sheet-1">
                <img src="/images/2.jpg" alt="">
            </div>
        </section>

        <section class="u-align-center u-clearfix u-sectionBoton-6" v-if="datos.externalUrl != null">
            <div class="u-align-center u-clearfix u-sheet u-valign-middle u-sheet-1">
                <!-- <a :href="item.urlArchivo" class="u-btn u-button-style u-none u-btn-1" target="_self" download>Descargar</a> -->
                <a :href="datos.externalUrl" class="u-btn u-btn-round u-button-style u-custom-color-4 u-radius-12 u-btn-1" target="_self" download><b>Descargar Informe completo</b>
                <br>
                </a>
            </div>
        </section>
        <share-container :title ="datos.title" hashtags=" SinaloaEnNúmeros, Codesin" :expert="datos.excerpt" :url="fullPath" v-if="datos.title != null"/>
        <box-container :data="more" :visible="true" :show="show_area" :url="getUrl(datos.category_id)"/>
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
                show_area:'sinaloaennumeros_show',
                more:[],
                hashtag:'Codesin,SinaloaEnNúmeros',
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
                        return 'codetalks'
                        break;
                    case 8:
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



.u-sectionBody-4 .u-sheet-1 {min-height: auto}
.u-sectionBody-4 .u-text-1 {width: 750px; margin: 20px auto 60px; color: #626262; font-size: 1rem; line-height: 26px;}

.u-sectionVideo-5 .u-sheet-1 {min-height: 540px}
.u-sectionVideo-5 .u-video-1 {width: 740px; height: 480px; margin: 0 auto 60px}

.u-sectionBoton-6 .u-sheet-1 {min-height: 168px}
.u-sectionBoton-6 .u-btn-1 {background-image: none; border-style: none; margin: 60px auto; background: #FFAA00; color: #121212; font-size: 1rem; font-weight: bold; line-height: 26px; padding: 15px 30px;}

@media (max-width: 1199px){
.u-sectionBanner-1 .u-sheet-1 {min-height: 500px}

.u-sectionTitle-2 .u-image-1 {margin-top: 55px; margin-left: 161px}
.u-sectionTitle-2 .u-text-2 {width: auto; margin-left: 209px}
.u-sectionTitle-2 .u-image-2 {margin-top: -20px; margin-left: 363px}
.u-sectionTitle-2 .u-text-3 {width: auto; margin-top: -23px; margin-right: auto}
.u-sectionTitle-2 .u-image-3 {width: 20px; margin-right: 367px}
.u-sectionTitle-2 .u-text-4 {width: auto; margin-right: 222px; margin-bottom: 23px}

.u-section-3 .u-sheet-1 {min-height: 693px}
}

@media (max-width: 991px){
.u-sectionTitle-2 .u-sheet-1 {min-height: 354px}
.u-sectionTitle-2 .u-image-1 {margin-top: 54px; margin-left: 126px}
.u-sectionTitle-2 .u-text-2 {margin-left: 170px}
.u-sectionTitle-2 .u-image-2 {margin-left: 320px}
.u-sectionTitle-2 .u-text-3 {margin-top: -18px; margin-right: 232px}
.u-sectionTitle-2 .u-image-3 {margin-top: -22px; margin-right: 187px}
.u-sectionTitle-2 .u-text-4 {margin-top: -19px; margin-right: 41px; margin-bottom: 60px}


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

.u-sectionBody-4 .u-text-1 {width: 340px}

.u-sectionVideo-5 .u-video-1 {width: 340px}
}
</style>
