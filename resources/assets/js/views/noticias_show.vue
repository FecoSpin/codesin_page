<template>
    <div class="noticias default-bg">
        <!-- Banner Area Inicio -->
        <banner-area :page="noticia" :img="img" class="mb-8"/>
        <!-- Banner Area Fin -->
        <div class="noticias-detalle-area default-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 mtb-80">
                        <div class="meta">
                                <span class="fa fa-calendar mr-2"></span>  {{noticia.published_at | moment("dddd, MMMM D YYYY")}}
                        </div>
                        <div class="col xs-12">
                            <div class="col xs-12" v-bind:class="[photos.length > 0 ? 'col-md-8' : '']">
                                <div class="title f32 noticia-title">
                                    <h1 v-text="noticia.title"></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mt-54 centenido-area " v-bind:class="[photos.length > 0 ? 'col-md-8' : getClass()]">
                                    <div class="contenedor-text default" v-html="noticia.body"></div>
                                </div>
                                <div class="mt-54 col-xs-12 col-md-4" v-bind:class="[photos.length <= 0 ? 'hidden' : '']">
                                    <div v-for="(photo, index) in photos" :key="index">
                                        <div class="col-md-12 mb-10">
                                            <div class="card-lg o-hidden">
                                                <img class="card-lg-img" :src="'/'+photo.url" alt="noticia">
                                            </div>
                                        </div>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['url'],
        data(){
            return{
                noticia:[],
                photos : [],
                img : ''
            }
        },
        mounted() {
            axios.get(`/api/noticia/${this.url}`)
            .then(res =>{
                this.noticia = res.data;
                this.photos = this.noticia.photos
                this.img = this.smallScreen(this.noticia.urlBanner, this.noticia.urlBannerMobile);
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        },
        methods:{
            getClass(category){
                if (category != 2){
                    return "ck ck-content";
                }else{
                    return "col-xs-12";
                }

            }
        }
    }
</script>
