<template>
    <router-link 
        :to="{
                name: nombre, 
                params:{url:info.url}
            }"
        >
       <slot />
    </router-link>
</template>
<script>
export default {
    props:['info' , 'nombre']
}
</script>