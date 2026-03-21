<template>
<div>
    <div class="container">
        <section class="entry" v-if="show">
            <article class="post-type-page post-1790 page type-page status-publish hentry">
                <section class="entry-header">
                    <h2 class="entry-title" v-text="avisoPrivacidad.vc_nombre">
                        
                    </h2>
                </section>
                <section class="entry-content">
                    <div v-for="item in avisoPrivacidad.avisosarea" :key="item.id">
                    <p v-text="item.vc_nombre"></p>
                        <ul>
                            <li v-for="subitem in item.avisoscontenidos" :key="subitem.id"><a :href="subitem.vc_url" v-text="subitem.vc_nombre" target="_blank" download></a></li>
                        </ul>
                    </div>
                </section>
            </article>
        </section>
        <div class=" mtb-8 panel panel-default" v-show="!show">
            <div class="panel-body">Lo sentimos por el momento no tenemos ningún aviso de privacidad</div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data() {
        return {
            show:false,
            avisoPrivacidad: {}
        }
    },
    created(){
        this.load();
    },
    methods: {
        async load() {
            axios.get('/api/aviso/')
            .then(res =>{
                console.log(res);
                this.show = true;
                this.avisoPrivacidad = res.data.aviso;
                 console.log(this.show);
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
                $('#lock').addClass('hidden');
            });
        }
    },
    mounted() {
            
        }
}
</script>
<style>

</style>