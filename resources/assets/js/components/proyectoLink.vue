<template>
    <router-link 
        :to="{
                name: 'proyecto_show', 
                params:{url:proyecto.url}
            }"
        >
       <slot />
    </router-link>
</template>
<script>
export default {
    props:['proyecto']
}
</script>