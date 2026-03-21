<template>
    <div class="header-area">
        <div class="main-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="logo">
                            <router-link :to="{name:'home'}"><img v-bind:src="'../img/logo/codesin - top.png'" alt="" /></router-link>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="menu-area floatright hidden-xs">
                            <nav>
                                <ul>
                                    <li><router-link :to="{name: 'home'}" class="menu-nav">Inicio<span class="line"></span></router-link>
                                    <li><router-link :to="{name: 'quienes-somos'}" class="menu-nav">¿Quiénes somos? <span class="line"></span></router-link>
                                    <li><router-link :to="{name: 'que-hacemos'}" >¿Qué hacemos?</router-link></li>
                                    <li><router-link :to="{name: 'sinaloa'}" >Sinaloa en Números</router-link></li>
                                    <li><router-link :to="{name: 'comunicacion'}" >Comunicación</router-link></li>
                                    <li><a :href="transparencia" target="_blank">Transparencia</a></li>
                                    <li><button class="search shadow-none"><span class="fa fa-search" id="search"></span></button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="mobile-menu-area  visible-xs">
                            <label class="labelMenu" >Menú</label>
                            <a class="menuBtn">
                                <span class="lines"></span>
                            </a>
                            <nav class="mainMenu">
                                <ul>
                                    <li>
                                        <div class="search">
                                            <div action="" id="search-form">
                                                <button><i class="fa fa-search"></i></button >
                                                <input type="search" name="buscar" placeholder="Buscar..." v-model.lazy="keywords"/>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'quienes-somos'}" >¿Quiénes somos?</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'que-hacemos'}">¿Qué hacemos?</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'sinaloa'}">Sinaloa en Números</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'comunicacion'}">Comunicación</router-link>
                                    </li>
                                    <li>
                                        <a :href="transparencia" target="_blank">Transparencia</a>
                                    </li>
                                    <li>
                                        <a v-bind:href="facebook" target="_blank" class="facebook"><img v-bind:src="'../img/icons/Facebook.svg'" alt=""></a>
                                        <a v-bind:href="youtube"  target="_blank" class="facebook"> <img v-bind:src="'../img/icons/Youtube.svg'" alt=""></a>
                                        <a v-bind:href="twitter"  target="_blank" class="facebook"> <img v-bind:src="'../img/icons/Twitter.svg'" alt=""></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="search_input" id="search_input_box">
                    <div class="container">
                        <form class="d-flex justify-content-between" onSubmit="return false;">
                            <input type="text" class="form-control" id="search_input" name="buscar" placeholder="Buscar..." v-model.lazy="keywords">
                            <button type="button" class="btn"></button>
                            <span class="fa fa-close" id="close_search" title="Close Search"></span>
                        </form>
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
            keywords: null,
            transparencia : 'http://codesin.transparenciasinaloa.gob.mx/obligaciones-de-transparencia-del-consejo-para-el-desarrollo-economico-del-estado-de-sinaloa-codesin/',
        }
    },
    mounted() {
        // /*mobile menu*/
        $('.menuBtn').click(function() {
            $(this).toggleClass('act');
                if($(this).hasClass('act')) {
                    $('.mainMenu').addClass('act');
                    $('.labelMenu').text("Cerrar");
                }
                else {
                    $('.mainMenu').removeClass('act');
                    $('.labelMenu').text("Menú");
                }
        });
        $('.mobile-menu-area .mainMenu a, .logo a').click(function() {
            if($('.menuBtn').hasClass('act')) {
                $('.menuBtn').toggleClass('act');
                $('.mainMenu').removeClass('act');
                $('.labelMenu').text("Menú");
            }
        });
        // Search Toggle
        $("#search_input_box").hide();
        $("#search").on("click", function () {
            $("#search_input_box").slideToggle();
            $("#search_input").focus();
        });
        $("#close_search").on("click", function () {
            $('#search_input_box').slideUp(500);
        });
    },
    methods: {
        search() {
            axios.get('/api/indexsearch', {
                params: {
                keywords: this.keywords
                }
            })
            .then(response => {
                this.cerrarMenu();
                
                this.$router.push({
                name: 'resultado',
                params: {
                    keywords: this.keywords,
                    results: response.data
                }
                });
                this.keywords = "";

            })
            .catch(error => {});
        },
        cerrarMenu(){
            if($('.menuBtn').hasClass('act')) {
                $('.menuBtn').toggleClass('act');
                $('.mainMenu').removeClass('act');
                $('.labelMenu').text("Menú");
            }
        }
            
    },
    watch: {
        keywords(after, before) {
            if(this.keywords != ""){
                this.search();
            }
            
        }
    },
}
</script>
<style>
.header_area.sticky #search_input_box { max-width: 100%; }
#search_input_box {
  position: fixed;
  left: 50%;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  transform: translateX(-50%);
  width: 100%;
  max-width: 1200px;
  z-index: 999;
  text-align: center;
  padding: 5px 20px; 
  background: #fff;
  }
  #search_input_box .form-control {
    background: transparent;
    border: 0;
    color: #4A4A4A;
    font-weight: 400;
    font-size: 15px;
    padding: 0; }
    #search_input_box .form-control:focus {
      box-shadow: none;
      outline: none; }
  #search_input_box input.placeholder {
    color: #4A4A4A;
    font-size: 14px; }
  #search_input_box input:-moz-placeholder {
    color: #4A4A4A;
    font-size: 14px; }
  #search_input_box input::-moz-placeholder {
    color: #4A4A4A;
    font-size: 14px; }
  #search_input_box input::-webkit-input-placeholder {
    color: #4A4A4A;
    font-size: 14px; }
  #search_input_box .btn {
    width: 0;
    height: 0;
    padding: 0;
    border: 0; 
    position: absolute;
    right: 40px;
    top: 0;
    }
  #search_input_box .fa-close {
    color: #4A4A4A;
    font-weight: 600;
    cursor: pointer;
    padding: 10px 3px; 
    position: absolute;
    right: 40px;
    top: 0;
    }
</style>