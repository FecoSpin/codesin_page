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
    <section class="buzon-quejas-section">
        <div class="container">
            <div class="row display-flex-quejas">
                <!-- Columna de Texto -->
                <div class="col-md-6 buzon-text-col">
                    <h2 class="buzon-title text-left">Buzón de Quejas</h2>
                    <p class="buzon-desc text-left">
                        
                    </p>
                    <p class="buzon-tel text-left">
                        <strong>Tel. (667) 712 8232</strong>
                    </p>
                </div>

                <!-- Columna del Formulario -->
                <div class="col-md-6">
                    <div class="buzon-card">
                        <form @submit.prevent="enviarQueja">
                            <div class="form-group">
                                <input type="text" v-model="quejaForm.nombre" class="form-control buzon-input" placeholder="Nombre (Opcional)">
                            </div>
                            <div class="form-group">
                                <input type="email" v-model="quejaForm.email" class="form-control buzon-input" placeholder="Correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <textarea v-model="quejaForm.mensaje" class="form-control buzon-input buzon-textarea" placeholder="Mensaje" rows="4" required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="buzon-btn-submit" :disabled="enviando">
                                    {{ enviando ? 'ENVIANDO...' : 'ENVIAR' }}
                                </button>
                            </div>
                        </form>
                        <div v-if="mensajeExito" class="buzon-alert success">
                            {{ mensajeExito }}
                        </div>
                        <div v-if="mensajeError" class="buzon-alert error">
                            {{ mensajeError }}
                        </div>
                    </div>
                </div>
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
                quejaForm: {
                    nombre: '',
                    email: '',
                    mensaje: ''
                },
                enviando: false,
                mensajeExito: '',
                mensajeError: ''
			}
		},
		created(){
			this.getdata();
		},
		 methods: {
            enviarQueja() {
                this.enviando = true;
                this.mensajeExito = '';
                this.mensajeError = '';
                
                axios.post('/api/quejas', this.quejaForm)
                    .then(response => {
                        this.mensajeExito = '¡Gracias! Tu mensaje ha sido enviado.';
                        this.quejaForm = { nombre: '', email: '', mensaje: '' };
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 422) {
                            const errors = error.response.data.errors;
                            this.mensajeError = Object.values(errors).flat().join(' ');
                        } else {
                            this.mensajeError = 'Ocurrió un error al enviar el mensaje. Inténtalo de nuevo.';
                        }
                    })
                    .finally(() => {
                        this.enviando = false;
                    });
            },
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
    background-color: #f9f9f9;
    padding: 80px 0;
}
.display-flex-quejas {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
.buzon-text-col {
    padding-right: 40px;
}
.buzon-title {
    font-size: 2.4rem;
    font-weight: 800;
    margin-bottom: 25px;
    color: #2c4c2c;
    letter-spacing: 1px;
}
.buzon-desc {
    font-size: 1.15rem;
    line-height: 1.7;
    margin-bottom: 25px;
    color: #555;
}
.buzon-tel {
    font-size: 1.2rem;
    color: #2c4c2c;
}
.buzon-card {
    background: #fff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    border: 1px solid #eee;
}
.buzon-input {
    background: #f4f4f4 !important;
    border: none !important;
    border-radius: 8px !important;
    padding: 12px 15px !important;
    height: auto !important;
    box-shadow: none !important;
    margin-bottom: 15px;
}
.buzon-input:focus {
    background: #ebebeb !important;
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.05) !important;
}
.buzon-textarea { resize: none !important; }
.buzon-btn-submit {
    background-color: #2c4c2c;
    color: #ffffff !important;
    font-size: 1rem;
    font-weight: 700;
    padding: 12px 40px;
    border-radius: 50px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
    border: none;
    cursor: pointer;
}
.buzon-btn-submit:hover {
    background-color: #162616;
    transform: translateY(-2px);
}
.buzon-btn-submit:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
.buzon-alert {
    margin-top: 20px;
    font-weight: 700;
    text-align: center;
}
.buzon-alert.success { color: #2c4c2c; }
.buzon-alert.error { color: #a94442; }

@media (max-width:991px) {
    .buzon-text-col {
        text-align: center;
        padding-right: 15px;
        margin-bottom: 40px;
    }
    .buzon-title, .buzon-desc, .buzon-tel {
        text-align: center !important;
    }
}
@media (max-width:767px) {
    .buzon-title {
        font-size: 1.8rem;
    }
    .buzon-desc {
        font-size: 1rem;
    }
    .buzon-card {
        padding: 25px;
    }
}
</style>
