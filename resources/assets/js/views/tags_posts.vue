<template>
<div>
    <div class="mtb-80">
        <div class="title f32 text-center" v-text="tag.name"></div>
    </div>
    <proyectos-area :proyectos="tag.posts" :vermas = "false" class="mb-8" />
</div>
    
</template>
<script>
export default {
    props:['url'],
    data() {
        return {
            tag: []
        }
    },
    
    mounted() {
        
            axios.get(`/api/tag/${this.url}`)
            .then(res =>{
                this.tag = res.data.post;
                $('#lock').addClass('hidden');
            })
            .catch(err =>{
                console.log(err.response.data);
                $('#lock').addClass('hidden');
            });
        }
}
</script>