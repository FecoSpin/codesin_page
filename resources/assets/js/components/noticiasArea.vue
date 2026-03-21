<template>
    <div class="home-noticias-area mt-24">
        <div class="container">
            <div class="titulo text-center">
                <h3>{{title}}</h3>
            </div>
            <div class="row  mt-24">
                <div class="col-md-4 col-sm-12 col-xs-12" v-for="(noticia, index) in noticias" :key="index">
                    <div class="card-noticias mb-4 o-hidden default-bg"><img class="card-noticias-img-top" :src="noticia.urlimage ? noticia.urlimage : '/images/3.svg'" alt="">
                        <div class="card-noticias-body ">
                            <h5 class="card-noticias-title"><noticia-link :noticia="noticia" v-text="noticia.title"></noticia-link></h5>
                            <p class="card-noticias-text text-gray hidden-sm hidden-xs" v-text="noticia.excerpt"></p>
                            <noticia-link :noticia="noticia" class="vermas hidden-sm hidden-xs">Ver más</noticia-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="vermas">
                <div class="vertodos col-xs-12">
                    <router-link :to="{ name: 'noticias' }" class="default-textcolor" >Ver todas</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        'noticias':{

        },
        'vermas':{

        },
        'title': {
            type: String,
            required: false,
            default: 'Noticias'
        }
        }
}
</script>