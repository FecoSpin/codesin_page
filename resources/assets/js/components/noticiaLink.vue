<template>
    <router-link 
        :to="{
                name: 'noticia_show', 
                params:{url:noticia.url}
            }"
        >
       <slot />
    </router-link>
</template>
<script>
export default {
    props:['noticia']
}
</script>