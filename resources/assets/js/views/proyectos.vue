<template>
<div>
    
    <!-- <banner-area :page="pageInfo" :img="img" class="mb-8"/> -->
    <div class="col-xs-12 mb-8">
        <div class="container">
            <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="map-area">
                    <img src="/img/mapa/zn.jpeg" alt="">
                </div>
            </div>
            <div class="col-md-4 col xs-6 col-xs-12">
                <div class="contenedor-text t20">
                    <ul class="proyectos-list" v-for="(item, index) in 10" :key="index">
                        <li> {{index + 1 }} proyavto 1</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script>
export default {
    prop: ['url'],
    data() {
        return {
            noticias: []
        }
    },
    mounted() {
        $('#lock').addClass('hidden');
            axios.get(`/api/zonas/${this.url}`)
            .then(res =>{
                this.noticias = res.data;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
                $('#lock').addClass('hidden');
            });
        }
}
</script>