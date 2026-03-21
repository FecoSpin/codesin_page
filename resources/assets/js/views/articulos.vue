<template>
    <articulosArea :data="articulos" />
</template>
<script>
import articulosArea from '../components/articulos_area.vue'
export default {
  components: { articulosArea },
    data() {
        return {
            articulos: []
        }
    },
    mounted() {
            axios.get('/api/articulos/')
            .then(res =>{

                this.articulos = res.data;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
}
</script>
