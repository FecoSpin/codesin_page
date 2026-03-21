<template>
    <div class="About">
        <!-- Banner Area Inicio -->
        <banner-area :page="pageInfo" :img="img"/>
        <!-- Banner Area Fin -->
        <!-- About Inicio -->
        <div class="about-area mt-80">
            <div class="container">
                <div class="row default-bg">
                    <div>
                        <div class="col-xs-12 visible-sm visible-xs">
                            <div class="inversiones-content">
                                <h2 class="title f24 text-center" v-text="pageInfo.title"></h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="inversiones-img hidden-sm hidden-xs">
                                <img :src="pageInfo.urlimage" alt="about">
                            </div>
                            <div class="inversiones-img hidden-lg hidden-md ">
                                <img class="img-responsive" :src="pageInfo.urlimageMobile" alt="img">
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="inversiones-content mr-80 mb-8">
                                <h2 class="title f32 mt-80 hidden-sm hidden-xs" v-text="pageInfo.title"></h2>
                                <div class="contenedor-text default mt-32" v-html="pageInfo.body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- vision y mision -->
        <div class="container mt-80">
            <div class="cad-container">
                <div class="element-card">
                    <div class="front-facing bg-verde">
                        <h1 class="abr"><i class="fa fa-users" aria-hidden="true"></i></h1>
                        <p class="title">Misión</p>
                    </div>
                    <div class="back-facing bg-verde">
                        <p>Generar proyectos, estrategias y políticas públicas para el desarrollo y la competitividad con visión de largo plazo.</p>
                    </div>
                </div>

                <div class="element-card">
                    <div class="front-facing bg-amarillo">
                        <h1 class="abr"><i class="fa fa-eye" aria-hidden="true"></i></h1>
                        <p class="title">Visión</p>
                    </div>
                    <div class="back-facing bg-amarillo">
                        <p>Incidir en la definición e instrumentación de la visión de largo plazo del Estado de Sinaloa, para mejorar la competitividad de sus empresas y de sus regiones.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- QUIENES SOMOS - STAFF -->
        <div class="about-area mt-80">
            <div class="container default-bg">
                <div class="row">
                    <div class="titulo text-center mtb-80">
                        <h2 class="title f32">Conoce al CODESIN</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <h1 class="title">Consejo<hr/></h1>
                            <staff-area :staffs="consejos"/>
                        </div>
                        <div class="row">
                            <div class="consejo-staff-footer">
                                <p>GES: Gobierno del Estado de Sinaloa</p>
                                <p>CSE: Consejo Sinaloense de Empresarios (antes Consejo Sinaloense de Hombres de Negocios)</p>
                                <p>CRPE: Comité Regional de Promoción Económica</p>
                                <p>*Presidente Ejecutivo de CODESIN</p>
                            </div>
                        </div>
                        <div class="row">
                            <h1 class="title">Staff<hr/></h1>
                            <div class="titulo-staff text-center mtb-40">
                                <h2>Oficina Estatal</h2>
                            </div>
                            <staff-area :staffs="estatales"/>
                        </div>
                        <div class="row">
                            <div class="titulo-staff text-center mtb-40">
                                <h2>Conoce al Staff del CIT Sinaloa</h2>
                            </div>
                            <staff-area :staffs="cit"/>
                        </div>
                        <div class="row">
                            <div class="titulo-staff text-center mb4">
                                <h2>Comités Regionales de Promoción Económica</h2>
                            </div>
                            <div class="row equal">
                                <!-- zona norte -->
                                <zonas-area :zonas="zonaNorte" :title="'Zona Norte'"/>
                                <!-- zona centro norte -->
                                <zonas-area :zonas="zonaCentroNorte" :title="'Zona Centro Norte'"/>
                                <!-- zona centro -->
                                <zonas-area :zonas="zonaCentro" :title="'Zona Centro'"/>
                                <!-- zona sur -->
                                <zonas-area :zonas="zonaSur" :title="'Zona Sur'"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- QUIENES SOMOS - Fin -->
         <!-- NUESTRO TESTIMONIOS Inicio-->
         <div class="about-area mtb-80 transparent-bg">
             <div class="container">
                 <div class="testimonio-titulo text-center mb-8">
					<h3> Testimonios</h3>
				</div>
                <div class="row" v-if="testimonios.length > 0">
                    <carousel class="testimonio-active owlCarousel" :loop="true" :responsive="{0:{items:1,nav:false},600:{items:1,nav:false},1000:{items:1,nav:true}}">
                        <div class="testimonio-owl" v-for="(testimonio, index) in testimonios" :key="index">
                            <div class="col-md-6 col-sm-12 col-xs-12" >
                                <div class="testimonio-thumb thumb">
                                    <img class="img-responsive" :src="testimonio.urlImg" alt="testimonio">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="testimonio">
                                    <div class="testimonio-contenido">
                                        <h4 class="mb-24" v-text="testimonio.name"></h4>
                                        <p v-text="testimonio.body"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </carousel>
                </div>
             </div>
         </div>
         <!-- boletin-->
         <boletin-container></boletin-container>
    </div>
</template>
<script>
export default {
    data() {
        return {
            img: '',
            pageInfo: [],
            testimonios: [],
            consejos: [],
            estatales: [],
            cit: [],
            zonaNorte: [],
            zonaCentroNorte:  [],
            zonaCentro:  [],
            zonaSur:  [],
            sections: [],
        }
    },
    created() {
        this.init();
    },
    methods: {
        init: function(){
             $('#lock').removeClass('hidden');
            axios.get('/api/quienes-somos')
			.then((res) => {
                this.pageInfo       = res.data.pageinfo;
                this.sections       = res.data.sections;
                this.testimonios    = res.data.testimonios;
                this.consejos       = res.data.consejos;
                this.estatales      = res.data.estatales;
                this.cit       = res.data.cit;
                this.zonaNorte      = res.data.zonaNorte;
                this.zonaCentroNorte = res.data.zonaCentroNorte;
                this.zonaCentro     = res.data.zonaCentro,
                this.zonaSur        = res.data.zonaSur;
                this.img = this.smallScreen(this.pageInfo.urlBanner, this.pageInfo.urlBannerMobile);
                $('#lock').addClass('hidden');
			})
			.catch((err) =>{
                console.log(err);
                $('#lock').addClass('hidden');});
		}

    },
    mounted() {
        $('body').popover({
            selector: '[data-toggle="popover"]',
            trigger: "click"
            }).on("show.bs.popover", function(e){
            // hide all other popovers
            $("[data-toggle='popover']").not(e.target).popover("destroy");
        });

        $('html').on('click', function (e) {
            if(!$(e.target).is('.pop') && $(e.target).closest('.popover').length == 0) {
                $('[data-toggle="popover"]').popover('hide');
            }
        });

        $('.home-noticias-area,.main-menu-are').click(function (e) {
            $('.popover').popover('hide');
        });
        // cards
        $('.element-card').on('click', function(){

            if ( $(this).hasClass('open') ) {
                $(this).removeClass('open');
            } else {
                $('.element-card').removeClass('open');
                $(this).addClass('open');
            }

        });
    },
    updated() {

        this.$nextTick(function(){
            $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
            $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
        })
	}
}
</script>
<style>
.cad-container {
  position: relative;
  width: 100%;
  max-width: 960px;
  min-height: 100%;
  margin: 0px auto;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
.element-card {
  position: relative;
  width: 350px;
  height: 380px;
  transform-style: preserve-3d;
  transform: rotatey(0deg) translatex(0px) translatey(0px);
  transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.4);
  margin: 5px;
  cursor: pointer;
}
.element-card:hover {
  transform: rotatey(45deg) translatex(0px) translatey(0px);
}
.element-card.open {
  width: 350px;
  height: 380px;
  transform: rotatey(-180deg) translatex(0px) translatey(0px);
}
.element-card .front-facing {
  transform: rotateY(0deg) translateZ(2px);
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  /* background-color: #ecf0f1; */
  border: 2px white solid;
  border-radius: 5px;
}
.element-card .front-facing .abr {
  width: 100%;
  position: absolute;
  top: 50%;
  left: 0;
  font-size: 42px;
  margin: -35px 0 0 0;
  text-align: center;
  color: white;
}
.element-card .front-facing .title {
  width: 100%;
  position: absolute;
  top: 50%;
  left: 0;
  text-transform: uppercase;
  font-size: 42px;
  margin: 15px 0 0 0;
  text-align: center;
  color: white;
}

.element-card .back-facing {
  transform: rotateY(180deg) translateZ(0px);
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  /* background-color: #ecf0f1; */
  border: 2px white solid;
  border-radius: 5px;
  padding: 20px;
  text-align: center;
  overflow: hidden;
}
.element-card .back-facing p {
  font-size: 24px;
  font-weight: 700;
  margin: 0;
  color: white;
}
.element-card .back-facing a.btn {
  display: inline-block;
  background-color: white;
  padding: 5px 15px;
  margin: 20px 0 0 0;
  color: #eee;
  background-color: #3498db;
  text-decoration: none;
  border-radius: 3px;
}
.element-card .back-facing a.btn:hover, .element-card .back-facing a.btn:focus {
  color: #fff;
  background-color: #2980b9;
}
</style>
