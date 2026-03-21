<template>
    <router-link 
        :to="{
                name: 'proyecto_zona', 
                params:{url:post.url}
            }" 
        >
       <slot />
    </router-link>
</template>
<script>
export default {
    props:['post']
}
</script>