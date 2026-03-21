<template>
    <div class="home-noticias-area mt-24">
        <div class="container">
            <div class="titulo text-center">
                <h3> Posicionamientos</h3>
            </div>
            <div class="row  mt-24">
                <div class="col-md-4 col-sm-12 col-xs-12" v-for="(item, index) in data" :key="index">
                    <div class="card-noticias mb-4 o-hidden default-bg"><img class="card-noticias-img-top" :src="item.urlimage ? item.urlimage : '/images/3.svg'" alt="">
                        <div class="card-noticias-body ">
                            <h5 class="card-noticias-title"><url-link :info="item" :name="urlName" v-text="item.title"></url-link></h5>
                            <p class="card-noticias-text text-gray hidden-sm hidden-xs" v-text="item.excerpt"></p>
                            <url-link :nombre="urlName" :info="item" class="vermas hidden-sm hidden-xs" >Ver más</url-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="vermas">
                <div class="vertodos col-xs-12">
                    <router-link :to="{ name: 'posicionamiento' }" >Ver todas</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['data', 'vermas'],
    data() {
        return {
            urlName: 'posicionamiento_show'
        }
    },
}
</script>