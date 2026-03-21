<template>
    <div class="home-noticias-area mt-24">
        <div class="container">
            <div class="title f32 text-center" v-if="vermas">
                <div > Agenda regional {{proyectos.name}}</div>
            </div>
            <div class="title f32 text-center" v-else>
                <div >Proyectos</div>
            </div>
            <div class="row  mt-24 ocultar">
                <div class="col-md-4 col-sm-12 col-xs-12 " v-for="(item, index) in proyects" :key="index">
                    <div class="card-noticias mb-4 o-hidden default-bg"><img class="card-noticias-img-top" :src="getThumbnail(item.urlimage)" alt="">
                        <div class="card-noticias-body ">
                            <h5 class="card-noticias-title"><proyecto-link :proyecto="item" v-text="item.title"></proyecto-link></h5>
                            <p class="card-noticias-text text-gray hidden-sm hidden-xs" v-text="item.excerpt"></p>
                            <proyecto-link :proyecto="item"  class="vermas hidden-sm hidden-xs">Ver más</proyecto-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-if="vermas">
                <div class="vertodos col-xs-12">
                    <div class="i" id="masTexto">Ver más</div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['proyectos', 'vermas'],
    data() {
        return {
            proyects : []
        }
    },
    created() {
    },
    mounted() {
        $(".i").click(function(){
            $(".texto").toggleClass("hide-text");
            $("#masTexto").toggleClass("padding-text");
            $(".texto").hasClass("hide-text") ? $(this).text("Ver menos") : $(this).text("Ver más") ;
        });
         if(this.proyectos.posts){
            this.proyects = this.proyectos.data.post;
        }else{
            this.proyects = this.proyectos;
        }
    },
    updated: function () {
        if(this.proyects.length <= 9)
        {
            $('.vertodos').addClass('hidden');
        }else{
            $('.ocultar').addClass('texto');
        }
    },
    methods:{
        getThumbnail(image){
            return image ? image : '../images/3.svg'
        }
    }
    
}
</script>
<style>
.hide-text{
    overflow: initial !important;
    height: auto !important;
    
    }
.texto{
  height: 151rem;
  overflow: hidden;
  transition:  height 4s;
}
.i { cursor: pointer; }
.padding-text{
  margin-top : 25px !important;
  padding-top: -20px;
}
#masTexto {
  width: 100%;
  height: 4em;
    color: #007D80;
  font-family: "Open Sans";
  font-size: 16px;
  font-weight: bold;
  letter-spacing: 0;
  line-height: 24px;
  text-align: center;
}
</style>