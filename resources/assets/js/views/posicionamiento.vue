<template>
    <posicionamiento-area :data="infodata" :vermas = "false" />
</template>
<script>
export default {
    data() {
        return {
            infodata: []
        }
    },
    mounted() {
            axios.get('/api/posicionamiento/')
            .then(res =>{
                this.infodata = res.data;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
}
</script>