<template>
    <noticias-area :noticias="noticias" :vermas = "false" />
</template>
<script>
export default {
    data() {
        return {
            noticias: []
        }
    },
    mounted() {
            axios.get('/api/noticias/')
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