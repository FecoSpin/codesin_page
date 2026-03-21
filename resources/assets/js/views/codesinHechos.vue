<template>
<div>
    <banner-area2 :banner="banners" logo="images/codesinhechos.png" clase="codesinHechos"/>
    <box-container :data="codesinHechos" :visible="false"/>
    <boletin-container></boletin-container>
</div>
</template>
<script>
export default {
    data() {
        return {
            codesinHechos: [],
            banners: []
        }
    },
    mounted() {
            axios.get('/api/codesinHechos')
            .then(res =>{
                this.codesinHechos = res.data.codesinHechos;
                this.banners = res.data.banners;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
}
</script>
