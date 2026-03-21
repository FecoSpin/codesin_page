<template>
    <div>
        <div class="highlight-clean" v-if="bibliotecaId">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">{{articulo.titulo}}</h2>
                    <p class="text-center" v-text="articulo.excerpt"></p>
                </div>
                <a :href="articulo.urlArchivo" class="u-btn u-button-style u-none u-btn-1" target="_self" download>Descargar</a>
            </div>
        </div>
        <div class="about-area mt-80">
            <div class="container">
                <div class="row">
                    <div class="titulo text-center mtb-80">
                        <h2 class="title f32">Biblioteca</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="about-pills">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#pilares" data-toggle="tab">Pilares</a></li>
                                <li><a href="#ejes" data-toggle="tab">Ejes</a></li>
                                <li><a href="#analisis" data-toggle="tab">Otros</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="pilares">
                                    <div class="row">
                                        <texbox-container :data="categoria1" v-if="categoria1.length > 0" :subcategory="'pilares'"  :subcategories ="subcategories"/>
                                        <div v-else class="proximamente">Próximamente</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ejes">
                                    <div class="row">
                                        <texbox-container :data="categoria3" v-if="categoria3.length > 0" :subcategory="'ejes'" :subcategories ="subcategories" />
                                        <div v-else class="proximamente">Próximamente</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="analisis">
                                    <div class="row">
                                        <texbox-container :data="categoria4" v-if="categoria4.length > 0" :subcategory="'Gran Vision'" :subcategories ="subcategories" />
                                        <div v-else class="proximamente">Próximamente</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            biblioteca: [],
            categoria1: [],
            categoria3: [],
            categoria4: [],
            subcategories:[],
            activeIndex: undefined,
            item: { published_at:'hoy', titulo: '', excerpt: '', urlArchivo: 'google.com' },
            limitationList: 12,
            bibliotecaId: '',
            articulo:[]

        }
    },
    mounted() {
        $('#lock').removeClass('hidden');
        axios.get('/api/biblioteca')
			.then((res) => {
                this.categoria1 = res.data.categoria1;
                this.categoria3 = res.data.categoria3;
                this.categoria4 = res.data.categoria4;
                this.subcategories = res.data.subcategories;
                $('#lock').addClass('hidden');
                this.bibliotecaId = this.getParameterByName('codecode');
                if(this.bibliotecaId != ""){

                    this.getArticulo(this.bibliotecaId);
                }
			})
			.catch((err) =>{
                console.log(err);
                $('#lock').addClass('hidden');
            });
    },
    methods:{
        getParameterByName(name){
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        },
        getArticulo(id){
            let id_encontrado = false;
            for (var i = 0; i < this.categoria1.length; i++){
                if(this.categoria1[i].id == id){
                    this.articulo = this.categoria1[i];
                    id_encontrado = true;
                    break;
                }
            }
            if(!id_encontrado){
                for (var i = 0; i < this.categoria3.length; i++){
                    if(this.categoria3[i].id == id){
                        this.articulo = this.categoria3[i];
                        id_encontrado = true;
                        break;
                    }
                }
            }
            if(!id_encontrado){
                for (var i = 0; i < this.categoria4.length; i++){
                    if(this.categoria4[i].id == id){
                        this.articulo = this.categoria4[i];
                        id_encontrado = true;
                        break;
                    }
                }
            }
            if(!id_encontrado){
                this.bibliotecaId = '';
            }

        },
        // setActive(index) { this.activeIndex = index },

    },
    updated: function () {
    }
}
</script>
<style>
.proximamente { text-align: center; font-size: 32px; font-weight: bold; padding: 20px 0; }
.video-icon-c {
    left: 50%;
    position: absolute;
    top: 0%;
    transform: translate(-50%, -90%);
    z-index: 1;
}

.card-section { padding-left: 40%; }
.cc-area .notice-video { height: 0; top: -80px; }

.card-ci {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-gap: 1rem;
        grid-template-columns: repeat(3, 1fr);
    }
    .cards-ci{
        background-color: #FFF;
        color: #4A4A4A;
        max-height: 100%;
        max-width: 22.25rem;
    }
    .card-ci-img { height: 13.25rem; width: 100%; margin: 0;}
    .card-ci-constainer { max-height: 11.125rem; padding: 1.5rem 2rem 1.5rem 2rem; overflow: hidden; }
    .card-ci-constainer .contenedor-text { margin-top: 1rem; overflow: hidden;}
    @supports(object-fit: cover){
        .card-ci-img img{
        height: 100%;
        object-fit: cover;
        object-position: center center;
        }

    }
.highlight-clean {
  color: #313437;
  background-color: #fff;
  padding: 50px 0;
  line-height: 30px;
}
/* .highlight-clean .buttons { text-align: center;} */
.highlight-clean .u-btn-1 {font-size: 1rem; letter-spacing: 1px; border-style: none; font-weight: 700; text-transform: none; margin: 30px auto 0 30px; padding: 0; color: #007D80 !important;}

@media (max-width: 1199px){
}

@media (max-width: 991px){
 }

@media (max-width: 767px){
    .card-section { padding-left: 30%; }
 }

@media (max-width: 575px){
    .card-section { padding-left: 15%; }
 }
</style>
