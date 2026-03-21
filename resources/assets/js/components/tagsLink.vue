<template>
    <router-link 
        :to="{
                name: 'tags_posts', 
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