<template>
    <div class="home">
        <!-- Carousel
    ================================================== -->
    <div class="carousel" v-if="articulos.length">
        <!-- Configuring slider components -->
        <slider ref="slider" :options="options" @slide='slide' @tap='onTap' @init='onInit' class="carousel-inner ">
            <!-- slideritem slot -->
            <slideritem v-for="(item,index) in articulos" :key="index" class="item">
                <url-link :info="item" :nombre="item.show" style="width:100%">
                    <img :src="item.urlBanner" class="img-fluid">
                </url-link>
            </slideritem>
            <!-- Set loading -->
            <div slot="loading">loading...</div>
        </slider>
        <div class="arrowContainer left"><span class="arrow left" @click="() => {this.$refs['slider'] && this.$refs['slider'].$emit('slidePre')}"></span></div>
        <div class="arrowContainer right"> <span class="arrow right" @click="() => {this.$refs['slider'] && this.$refs['slider'].$emit('slideNext')}"></span></div>
    </div>
		<!-- slider_area_start -->
    <full-container class="u-clearfix u-section-1" :info="pageInfomacionTop"></full-container>
    <!-- seccion 2 -->
    <!--<right-container :info="pageInfomacionMiddle"></right-container>-->
    <!-- seccion 3 -->
    <!--<left-container :info="pageInfomacionBottom"></left-container>-->
    <!-- NOTICIAS -->
    <noticias-area :noticias="noticias" :vermas="true" />
    <boletin-container></boletin-container>

    <!-- BUZÓN DE QUEJAS -->
    <section class="buzon-quejas-section text-center">
        <div class="container">
            <div class="buzon-content">
                <div class="buzon-icon-wrap">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <h2 class="buzon-title">Buzón de Quejas y Sugerencias</h2>
                <p class="buzon-desc">Tu opinión es de suma importancia para nosotros. Ayúdanos a mejorar contándonos en qué áreas podemos servirte mejor.</p>
                <a href="#" target="_blank" class="buzon-btn">Ir al Formulario <i class="fa fa-external-link" aria-hidden="true" style="margin-left:5px;"></i></a>
            </div>
        </div>
    </section>
</div>
</template>
<script>
import { slider, slideritem } from 'vue-concise-slider'
    export default {
		components: {
            slider,
            slideritem
        },
		data(){
			return{
        someList:[],
        options: {
            pagination: true,
            thresholdDistance: 100, // Umbral de distancia deslizante
            thresholdTime: 300, // Decisión de umbral de tiempo deslizante
            grabCursor: false, // Estilo scratch
            speed: 300, // Velocidad de deslizamiento
            // timingFunction: 'ease', // Modo deslizante
            loop: true, // Bucle infinito
            autoplay: 5000 // Auto-reproducción[ms]
        },
				pageInfomacion: [],
				pageInfomacionTop: [],
				pageInfomacionMiddle: [],
				pageInfomacionBottom: [],
				noticias: [],
        articulos:[],
				img: '',
				image: '../img/banner.png',
			}
		},
		created(){
			this.getdata();
		},
		 methods: {
			getdata(){
				axios.get('/api/homev2')
				.then((res) => {
                    this.pageInfomacion = res.data.pagInfo;
                    this.pageInfomacionTop = res.data.pagInfo[0].author;
                    //this.pageInfomacionMiddle = res.data.pagInfo[1].author;
                    //this.pageInfomacionBottom = res.data.pagInfo[2].author;
                    this.noticias = res.data.noticias;
                    this.articulos = res.data.articulos;
                    this.articulos.img = this.smallScreen(this.articulos.urlBanner, this.articulos.urlBannerMobile);
                    this.articulos.unshift({ "show":"sinaloa","urlBanner":"../images/semaforo.jpeg" });

					$('#lock').addClass('hidden');
				})
				.catch((err) =>{
					console.log(err);
					$('#lock').addClass('hidden');});
			},
            starSlider(){
                this.$refs.slider.$emit('autoplayStart',5000);
            },
            stopslider(){
                this.$refs.slider.$emit('autoplayStop');
                    setTimeout(() => this.starSlider() , 7000);
            },
            slide (data) {
                if(data.currentPage == 0){
                    this.stopslider();

                }

            },
            onTap (data) {

            },
            onInit (data) {

            }
		},
    mounted() {

			$('#lock').removeClass('hidden');

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
		}
  }
</script>
<style>
/* variables nuevas */
/*  */
.slider_area .single_slider {
  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
.slider_area .single_slider .illastrator_png {
  position: relative;
  right: 63px;
}
.slider_area .single_slider .slider_info h3 {
  color: #ffffff;
  font-size: 60px;
  text-transform: capitalize;
  font-weight: 400;
  line-height: 70px;
  margin-bottom: 50px;
  margin-top: 10px;
}
.boxed_btn {
  cursor: pointer;
  font-size: 16px;
  color: #fff;
  padding: 17px 50px;
  background: #04D2C8;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  border: 1px solid transparent;
  display: inline-block;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}
.boxed_btn:hover {
  background: transparent;
  color: #04D2C8;
  border: 1px solid #04D2C8;
  color: #04D2C8 !important;
}
/*  */
.h-card{
    padding: 1rem;
    height: 100%;
    width: 100%;
    max-width: 26.25rem;
    font-family: "Open Sans";
    }
.h-cards {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-gap: 1.7rem;
    grid-template-columns: repeat(5, 1fr);
}
.h-icon {
	width: 180px;
    height: 180px;
    margin: 8px 0 16px 0px;
    text-align: center;
    background: #F4F4F4;
    border-radius: 50%; }
.h-card-title{
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 1rem;
  font-weight: bold;
  letter-spacing: 0.4px;
  line-height: 24px;
}
.h-card-contenido-1{
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 28px;
  font-weight: bold;
  letter-spacing: 0;
  line-height: 30px;
}
.h-card-contenido-small{
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 0;
  line-height: 17px;
}
.h-card-constainer strong{
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 18px;
  font-weight: bold;
  letter-spacing: 0;
  line-height: 30px;
}
.h-card-contenido-small .extrabold{
    color: #4A4A4A;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0;
    line-height: 17px;
}
/* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

/* Carousel base class */
.carousel {
  height: 100%;
  /* margin-bottom: 60px; */
}
.carousel-caption {
  z-index: 10; /* Since positioning the image, we need to help out the caption */
}

/* Declare heights because of positioning of img element */
.carousel .item {
  height: 100%;
  background-color: #FFF;
}
.carousel-inner > .item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 500px;
}
.img-fluid {
  max-width: 100%;
  height: auto;
}

.carousel-control.right {
    right: -16px;
}

.simple-slider .swiper-slide {
  height: 500px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.simple-slider .swiper-button-next, .simple-slider .swiper-button-prev {
  width: 50px;
  margin-left: 20px;
  margin-right: 20px;
}


@media (max-width:767px) {
  .simple-slider .swiper-button-next, .simple-slider .swiper-button-prev {
    display: none;
  }
}

@media (max-width:767px) {
  .simple-slider .swiper-slide {
    height: 360px;
  }
}

/* BUZÓN DE QUEJAS STYLES
-------------------------------------------------- */
.buzon-quejas-section {
    background-color: #2c4c2c;
    padding: 60px 0;
    color: #ffffff;
    margin-top: 40px;
}
.buzon-content {
    max-width: 700px;
    margin: 0 auto;
}
.buzon-icon-wrap {
    font-size: 48px;
    margin-bottom: 15px;
    color: #F5A623;
}
.buzon-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: #ffffff;
    letter-spacing: 1px;
}
.buzon-desc {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 30px;
    opacity: 0.9;
}
.buzon-btn {
    display: inline-block;
    background-color: #F5A623;
    color: #ffffff !important;
    font-size: 1.1rem;
    font-weight: 700;
    padding: 12px 35px;
    border-radius: 50px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
    border: none;
}
.buzon-btn:hover {
    background-color: #d48b1b;
    text-decoration: none;
    transform: translateY(-2px);
}

@media (max-width:767px) {
    .buzon-title {
        font-size: 1.8rem;
    }
    .buzon-desc {
        font-size: 1rem;
    }
}
</style>
