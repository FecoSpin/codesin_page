<template>
    <div class="proyecto">
        <!-- Banner Area Inicio -->
        <div class="banner-area-wrapper">
            <div class="banner-area text-center visible-lg visible-md" v-bind:style="{ backgroundImage: 'url(' + noticia.urlBanner + ')' }">
            </div>
            <div class="banner-area text-center visible-sm visible-xs" v-bind:style="{ backgroundImage: 'url(' + noticia.urlBannerMobile + ')' }">
            </div>
        </div>
        <!-- Banner Area Fin -->
        <div class="noticias-detalle-area default-bg">
            <div class="container">
                <div class="col xs-12">
                    <div class=" mtag">
                            <div class=" c-gris" v-for="(tag, index) in noticia.tags" :key="index">
                                     <tags-link class="tag"  v-bind:class="[{'verde': tag.id == 1}, {'amarillo': tag.id == 2}, {'rojo': tag.id == 3}, {'azul': tag.id == 4}]"
                                :post="tag">
                                     {{ tag.name}} </tags-link>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12" :class="[ !noticia.tags ? 'mt-80' : 'mt-54' ]">
                        <div class="col xs-8">
                            <div class="col xs-12" v-bind:class="[!noticia.photos  ? 'col-md-8' : '']">
                                <div class="title f32">
                                    <h1 v-text="noticia.title"></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mt-40 col-xs-12" v-bind:class="[!noticia.photos ? 'col-md-8' : '']">
                                    <div class="contenedor-text default mds" v-html="noticia.body"></div>
                                </div>
                                <div class="mt-54 col-xs-12 col-md-4" v-bind:class="[noticia.photos ? 'hidden' : '']">
                                    <div v-for="(photo, index) in noticia.photos" :key="index">
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
            }
        },
        mounted() {
            axios.get(`/api/proyectos/${this.url}`)
            .then(res =>{
                this.noticia = res.data.post;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
    }
</script>
<style>
    .mtag { margin: 48px 0 0px 0; }
    .verde { background-color: #DAE8D0; color: #73AD49; font-weight: 700}
    .amarillo { background-color: #F5EAD6; color: #D89000; font-weight: 700}
    .rojo { background-color: #FBE4DD; color: #C5340B; font-weight: 700}
    .azul { background-color: #E6F0FE; color: #2567BF; font-weight: 700}
    .tag {
    border-radius: 8px;
    cursor: default;
    display: inline-block;
    position: relative;
    white-space: nowrap;
    height: 30px;
    padding: 8px 16px!important;
    }
</style>
