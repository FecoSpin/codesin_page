<template>
<div>
    <banner-area2 :banner="banners" logo="images/Code talks.png" clase="codetalks"/>
    <box-container :data="codetalks" :visible="false"/>
    <boletin-container></boletin-container>
</div>
</template>
<script>
export default {
    data() {
        return {
            codetalks: [],
            banners:[]
        }
    },
    mounted() {
            axios.get('/api/codetalks/')
            .then(res =>{
                this.codetalks = res.data.codetalks;
                this.banners = res.data.banners;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
            });
        }
}
</script>
