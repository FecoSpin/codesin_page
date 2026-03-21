/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import carousel from 'vue-owl-carousel';
import VueSocialSharing from 'vue-social-sharing';
window.Vue = require('vue');

import router from './routes/routes';
import VueAnalytics from 'vue-analytics';
import VueGtag from "vue-gtag";

const moment = require('moment')
require('moment/locale/es')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('nav-bar', require('./components/navBarv2'));
Vue.component('noticia-link', require('./components/noticiaLink'));
Vue.component('url-link', require('./components/urlLink'));
Vue.component('tags-link', require('./components/tagsLink'));
Vue.component('proyectos-link', require('./components/proyectosLink'));
Vue.component('proyecto-link', require('./components/proyectoLink'));
Vue.component('noticias-area', require('./components/noticiasArea'));
Vue.component('posicionamiento-area', require('./components/posicionamientoArea'));
Vue.component('politicas-area', require('./components/politicasArea'));
Vue.component('banner-area', require('./components/banner'));
Vue.component('banner-area2', require('./components/bannerv2'));
Vue.component('proyectos-area', require('./components/proyectosArea'));
Vue.component('staff-area', require('./components/staffEstatal'));
Vue.component('zonas-area', require('./components/Zonas'));
Vue.component('full-container', require('./components/fullheight'));
Vue.component('left-container', require('./components/leftContainer'));
Vue.component('right-container', require('./components/rightContainer'));
Vue.component('business-container', require('./components/businessContainer'));
Vue.component('boletin-container', require('./components/boletinContainer'));
Vue.component('box-container', require('./components/boxContainer'));
Vue.component('texbox-container', require('./components/texBoxContainer'));
Vue.component('share-container', require('./components/share'));
Vue.component('shareSmall-container', require('./components/shareSmall'));
Vue.component('carousel',carousel);

var SocialSharing = VueSocialSharing;
Vue.use(require('vue-moment'), {
    moment
})

Vue.mixin({
    data() {
        return {
            loading: false,
            facebook: "http://www.facebook.com/pages/Codesin-Sinaloa/218834188212830?fref=ts",
            twitter : "http://twitter.com/codesin",
            youtube: "https://www.youtube.com/user/Cod351n/videos"

        }
    },
    methods: {
        gMixinFun: function() {
        return "this is a mixin test"
        },
        load: function(){
            this.loading = !this.loading;
        },
        smallScreen: function(desktop,mobile){
            let imagen;
            if(window.innerWidth < 767){

                imagen = mobile ? mobile : '/img/default/banner.jpg';

            }else{

                imagen = desktop ? desktop : '/img/default/banner.jpg';
            }

            return imagen;
        },
    },
    mounted() {
        let windows = $(window);
        let stick = $('.header-area');
        windows.on('scroll',function(){
            let scroll = windows.scrollTop();
            if(scroll < 5){
                stick.removeClass('sticky');
            }else{
                stick.addClass('sticky');
            }
        });
        // this.$router.history.listen((newLocation) => {$('.popover').popover('hide');})
        this.$watch(
            () => this.$route.params,
            (toParams, previousParams) => {
              // react to route changes...
              $('.popover').popover('hide');
            }
          )
    },
});
Vue.use(VueAnalytics, {
    id: 'UA-161839032-1',
    router
});
Vue.use(SocialSharing);

Vue.use(VueGtag, {
    property: {
      id: "UA-161839032-1"
    }
  });

  const app = new Vue({
    el: '#app',
    router
});
