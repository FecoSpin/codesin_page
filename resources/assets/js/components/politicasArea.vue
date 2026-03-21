<template>
    <div class="">
        <div class="card-1" >
            <div class="card-p" v-for="(item, index) in politicas" :key="index">
                <div class="card-p-img">
                    <noticia-link :noticia="item" >
                        <img class="img-responsive" :src="item.urlBanner" alt="">
                    </noticia-link>
                </div>
                <div class="card-p-constainer">
                    <div class="title f16 text-center">
                        <div><noticia-link :noticia="item" v-text="item.title" class="titile-color"></noticia-link></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['politicas', 'vermas']
}
</script>
<style>
    .card-1 {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-gap: 1rem;
        grid-template-columns: repeat(3, 1fr);
    }
    .card-p{ 
        background-color: #FFF;
        color: #4A4A4A;
        max-height: 22.25rem;
        max-width: 22.25rem;
    }
    .card-p-img { max-height: 16.438rem; max-width: 100%; margin: 0;}
    .card-p-constainer { max-height: 7rem; padding: 2rem 2rem 2rem 2rem; }
    @supports(object-fit: cover){
        .card-p-img img{
        height: 100%;
        object-fit: cover;
        object-position: center center;
        }
        
    }
</style>