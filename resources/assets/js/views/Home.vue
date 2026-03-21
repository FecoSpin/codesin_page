<template>
    <div class="home">
        <!-- AQUI IRIA EL VIDEO - slider-area-start -->
		<!-- Banner Area Inicio -->
		<banner-area :page="pageInfo" :img="img" class="mb-8"/>
		<!-- EL VIDEO - slider-area-end -->
		<!-- QUIENES SOMOS - Inicio -->
		<div class="contenedor mb-8 seccion1">
			<div class="row ">
				<div class="col-12 mtb-80">
					<h1 class="title f44 text-center" v-text="pageInfo.title"></h1>
					<div class=" contenedor-text t32 text-center mtb-30 msm" v-html="pageInfo.body"></div>
				</div>
			</div>
		</div>
		<!-- QUIENES SOMOS - Fin -->
		<!-- MODELO DE DESARROLLO - Inicio -->
		<div class="contenedor default-bg mb-4">
			<div class="row">
				<div class="col-xs-12 mtb-80">
					<h2 class="title f28 text-center" v-text="sections.title"></h2>
					<div class="contenedor-text default mlg" v-html="sections.body"></div>
				</div>
			</div>
			<!-- icons -->
			<div class="row">
				<div class="col-xs-12 text-gray small">
					<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon1_popover" :data-original-title="sections.icon1">
						<div class="icon-img pop" >
							<img class="pop" :src="sections.icon1_img" :alt="sections.icon1">
						</div>
						<div class="icon-text pop">
							<div class="excerpt pop">
								<span class="pop" v-text="sections.icon1"></span>
							</div>
						</div>
					</div>
					<!-- Economía Digital -->
					<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon2_popover" :data-original-title="sections.icon2">
						<div class="icon-img pop">
							<img class="pop" :src="sections.icon2_img" :alt="sections.icon2">
						</div>
						<div class="icon-text pop">
							<div class="excerpt pop">
								<span class="pop" v-text="sections.icon2"></span>
							</div>
						</div>
					</div>
					<!-- Turismo -->
					<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon3_popover" :data-original-title="sections.icon3">
						<div class="icon-img pop">
							<img class="pop" :src="sections.icon3_img" :alt="sections.icon3">
						</div>
						<div class="icon-text pop">
							<div class="excerpt pop">
								<span class="pop" v-text="sections.icon3"></span>
							</div>
						</div>
					</div>
					<!-- Logística -->
					<div class="icons col-md-2 col-sm-2 col-xs-4 mobile" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon4_popover" :data-original-title="sections.icon4">
						<div class="icon-img pop">
							<img class="pop" :src="sections.icon4_img" :alt="sections.icon4">
						</div>
						<div class="icon-text pop">
							<div class="excerpt ">
								<span class="pop" v-text="sections.icon4"></span>
							</div>
						</div>
					</div>
					<!-- Manufactura -->
					<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon5_popover" :data-original-title="sections.icon5">
						<div class="icon-img pop">
							<img class="pop" :src="sections.icon5_img" :alt="sections.icon5">
						</div>
						<div class="icon-text pop">
							<div class="excerpt pop">
								<span class="pop" v-text="sections.icon5"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- titulo Plataforma de competitividad -->
			<div class="row">
				<div class="col-xs-12">
					<div class="subtitle f28 mt-80 text-center">Plataforma de competitividad para impulsar el Estado</div>
				</div>
			</div>
			<!-- icons Plataforma de competitividad -->
			<div class="hidden-sm hidden-xs">
				<div class="row" >
					<div class="col-xs-12 text-gray parte2">
						<!--  -->
						<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon6_popover" :data-original-title="sections.icon6">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon6_img" :alt="sections.icon6">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon6"></span>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon7_popover" :data-original-title="sections.icon7">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon7_img" :alt="sections.icon7">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon7"></span>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon8_popover" :data-original-title="sections.icon8">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon8_img" :alt="sections.icon8">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon8"></span>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="icons col-md-2 col-sm-2 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon9_popover" :data-original-title="sections.icon9">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon9_img" :alt="sections.icon9">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon9"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 text-gray parte3 mb-8">
						<!-- Planeación Urbana -->
						<div class="icons col-md-3 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon10_popover" :data-original-title="sections.icon10">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon10_img" :alt="sections.icon10">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon10"></span>
								</div>
							</div>
						</div>
						<!-- Gobierno Locales -->
						<div class="icons col-md-3 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon11_popover" :data-original-title="sections.icon11">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon11_img" :alt="sections.icon11">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon11"></span>
								</div>
							</div>
						</div>
						<!-- Salud -->
						<div class="icons col-md-3 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon12_popover" :data-original-title="sections.icon12">
							<div class="icon-img pop">
								<img class="pop" :src="sections.icon12_img" :alt="sections.icon12">
							</div>
							<div class="icon-text pop">
								<div class="excerpt pop">
									<span class="pop" v-text="sections.icon12"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- icons Plataforma de competitividad mobile -->
			<div class="hidden-lg hidden-md small">
				<div class="row">
					<div class="col-xs-12">
						<div class="small-icons">
							<div class="row">
								<!--  -->
								<div class="icons  col-sm-4 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon6_popover" :data-original-title="sections.icon6">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon6_img" :alt="sections.icon6">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon6"></span>
										</div>
									</div>
								</div>
								<!--  -->
								<div class="icons  col-sm-4 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon7_popover" :data-original-title="sections.icon7">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon7_img" :alt="sections.icon7">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon7"></span>
										</div>
									</div>
								</div>
								<!--  -->
								<div class="icons  col-sm-4 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon8_popover" :data-original-title="sections.icon8">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon8_img" :alt="sections.icon8">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon8"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<!--  -->
								<div class="icons  col-sm-4 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon9_popover" :data-original-title="sections.icon9">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon9_img" :alt="sections.icon9">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon9"></span>
										</div>
									</div>
								</div>
								<!--  -->
								<div class="icons  col-sm-4 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon10_popover" :data-original-title="sections.icon10">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon10_img" :alt="sections.icon10">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon10"></span>
										</div>
									</div>
								</div>
								<!--  -->
								<div class="icons  col-sm-4 col-xs-4" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon11_popover" :data-original-title="sections.icon11">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon11_img" :alt="sections.icon11">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon11"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<!--  -->
								<div class="icons col-xs-12 mb-8" data-container="body" title="" data-toggle="popover" data-placement="bottom" :data-content="sections.icon12_popover" :data-original-title="sections.icon12">
									<div class="icon-img pop">
										<img class="pop" :src="sections.icon12_img" :alt="sections.icon12">
									</div>
									<div class="icon-text pop">
										<div class="excerpt pop">
											<span class="pop" v-text="sections.icon12"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- MODELO DE DESARROLLO - Fin -->
		<!-- NOTICIAS -->
		<noticias-area :noticias="noticias" :vermas="true" />
		<!-- NOTICIAS - Fin -->
    </div>
</template>
<script>
    export default {
		
		data(){
			return{
				pageInfo: [],
				noticias: [],
				img: '',
				sections: [],
			}
		},
		created(){
			this.getdata();
		},
		 methods: {
			getdata(){
				axios.get('/api/home')
				.then((res) => {
					this.pageInfo = res.data.pageinfo;
					this.sections =this.pageInfo.sections;
					this.noticias = res.data.noticias;
					this.img = this.smallScreen(this.pageInfo.urlBanner, this.pageInfo.urlBannerMobile);
					$('#lock').addClass('hidden');
				})
				.catch((err) =>{
					console.log(err);
					$('#lock').addClass('hidden');});
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
</style>
