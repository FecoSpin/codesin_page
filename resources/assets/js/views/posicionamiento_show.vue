<template>
    <div class="noticias default-bg">
        <!-- Banner Area Inicio -->
        <banner-area :page="datos" :img="img" class="mb-8"/>
        <!-- Banner Area Fin -->
        <div class="noticias-detalle-area default-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 mtb-80">
                        <div class="col xs-12">
                            <div class="meta">
                                    <span class="fa fa-calendar mr-2"></span>  {{datos.published_at | moment("dddd, MMMM D YYYY")}}
                            </div>
                            <div class="col xs-12" v-bind:class="[photos.length > 0 ? 'col-md-8' : '']">
                                <div class="title f32 noticia-title">
                                    <h1 v-text="datos.title"></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mt-54 centenido-area col-xs-12" v-bind:class="[photos.length > 0 ? 'col-md-8' : '']">
                                    <div class="contenedor-text default" v-html="datos.body"></div>
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
        <posicionamiento-area :data="posicionamientos" :vermas = "true" v-if="posicionamientos.length > 0"/>
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
                posicionamientos:[]
            }
        },
        mounted() {
            axios.get(`/api/posicionamiento/${this.url}`)
            .then(res =>{
                console.log(res);
                this.datos = res.data.post;
                this.photos = this.datos.photos
                this.posicionamientos = res.data.posicionamientos;
                this.img = this.smallScreen(this.datos.urlBanner, this.datos.urlBannerMobile);
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
    }
</script>
