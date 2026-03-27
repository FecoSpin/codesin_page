<template>
    <noticias-area :noticias="noticias" :vermas = "false" title="Noticias Sinaloa 10+" />
</template>
<script>
export default {
    data() {
        return {
            noticias: []
        }
    },
    mounted() {
            axios.get('/api/sinaloa10all')
            .then(res =>{
                this.noticias = res.data;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
}
</script>
