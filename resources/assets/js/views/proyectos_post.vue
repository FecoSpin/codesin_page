<template>
    <div>
        <banner-area :page="banners" :img="img" class="mb-8" />
        <!-- pryectos de la zona -->
        <div class="mb-8" v-if="proyects.length > 0 ">
            <proyectos-area :proyectos="proyects" :vermas ="true"></proyectos-area>
        </div>
    </div>
</template>
<script>
export default {
    props:['url'],
    data() {
        return {
            proyect:[],
            proyects:[],
            banners: [{urlvideo : '', urlBanner: '', urlBannerMobile:'' }],
            img: '',
        }
    },
    methods: {
        goTo : function(zona) {
            this.$router.push({ name: 'proyecto_show',  params:{url:zona.url}});
        }
    },
    mounted() {
        $('#lock').addClass('hidden');
            axios.get(`/api/zonas/${this.url}`)
            .then(res =>{
                this.proyect = res.data.post;
                this.proyects = this.proyect.posts;
                this.banners = this.proyect.banners ? this.proyect.banners : this.banners ;
                this.img = this.smallScreen(this.banners.urlBanner, this.banners.urlBannerMobile);
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
                $('#lock').addClass('hidden');
            });
    },
}
</script>