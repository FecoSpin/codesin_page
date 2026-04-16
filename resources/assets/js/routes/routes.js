import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('../views/HomeV2')
        },
        {
            path: '/avisosdeprivacidad',
            name: 'aviso',
            component: require('../views/aviso')
        },
        {
            path: '/quienes-somos',
            name: 'quienes-somos',
            component: require('../views/About')
        },
        {
            path: '/que-hacemos',
            name: 'que-hacemos',
            component: require('../views/Que_hacemos')
        },
        {
            path: '/historia',
            name: 'historia',
            component: require('../views/historia')
        },
        {
            path: '/covid',
            name: 'covid',
            // component: require('../views/covid')
            component: require('../views/404')
        },
        {
            path: '/semaforo_economico',
            name: 'sinaloa',
            component: require('../views/Sinaloa_numeros')
        },
        {
            path: '/comunicacion',
            name: 'comunicacion',
            component: require('../views/comunicacion')
        },
        {
            path: '/noticias/:url',
            name: 'noticia_show',
            component: require('../views/noticias_show'),
            props: true
        },
        {
            path: '/estrategia/:url',
            name: 'estrategia_show',
            component: require('../views/estrategias_show'),
            props: true
        },
        {
            path: '/proyectos/:url',
            name: 'proyecto_show',
            component: require('../views/proyectos_show'),
            props: true
        },
        {
            path: '/zonas/:url',
            name: 'proyecto_zona',
            component: require('../views/proyectos_post'),
            props: true
        },
        {
            path: '/posicionamiento',
            name: 'posicionamiento',
            component: require('../views/posicionamiento'),
            props: true
        },
        {
            path: '/posicionamiento/:url',
            name: 'posicionamiento_show',
            component: require('../views/posicionamiento_show'),
            props: true
        },
        {
            path: '/noticias',
            name: 'noticias',
            component: require('../views/Noticias'),
            props: true
        },
        {
            path: '/articulos',
            name: 'articulos',
            component: require('../views/articulos'),
            props: true
        },
        {
            path: '/articulos/:url',
            name: 'articulo_show',
            component: require('../views/articulos_show'),
            props: true
        },
        {
            path: '/biblioteca',
            name: 'biblioteca',
            component: require('../views/biblioteca'),
            props: true
        },
        {
            path: '/resultado/:keywords',
            name: 'results',
            component: require('../views/resultadoPage'),
            props: true
        },
        {
            path: '/resultado/:keywords',
            name: 'resultado',
            component: require('../views/resultadoPage'),
            props: true
        },
        {
            path: '/tags/:url',
            name: 'tags_posts',
            component: require('../views/tags_posts'),
            props: true
        },
        {
            path: '/sinaloaNumeros',
            name: 'sinaloaNumeros',
            component: require('../views/sinaloaNumeros'),
            props: true
        },
        {
            path: '/sinaloaennumeros/:url',
            name: 'sinaloaennumeros_show',
            component: require('../views/sinaloanum_show'),
            props: true
        },
        {
            path: '/codetalks',
            name: 'codetalks',
            component: require('../views/codetalks'),
            props: true
        },
        {
            path: '/codesinHechos',
            name: 'codesinHechos',
            component: require('../views/codesinHechos'),
            props: true
        },
        {
            path: '/codetalks/:url',
            name: 'codetalks_show',
            component: require('../views/codetalks_show'),
            props: true
        },
        {
            path: '/sinaloatalent',
            name: 'sinaloatalent',
            component: require('../views/sinaloaTalent'),
            props: true
        },
        {
            path: '/sinaloatalent/comparativoregion',
            name: 'sinaloatalentCR',
            component: require('../views/ComparativoRegion'),
            props: true
        },
        {
            path: '/sinaloatalent/demandadoyofresido',
            name: 'sinaloatalentDF',
            component: require('../views/DemandadosOfrecidos'),
            props: true
        },
        {
            path: '/sinaloatalent/sectorEconomico',
            name: 'sinaloatalentSE',
            component: require('../views/SectorEconomico'),
            props: true
        },
        {
            path: '/sinaloa10mas',
            name: 'sinaloa10mas',
            component: require('../views/sinaloaDiezMas'),
        },
        {
            path: '/sinaloa10mas-noticias',
            name: 'sinaloa10_noticias',
            component: require('../views/NoticiasSinaloaDiez'),
        },
        {
            path: '*',
            component: require('../views/404')
        }

    ],
    linkExactActiveClass: 'active',
    mode: 'history',
    scrollBehavior(){
        return {x:0, y:0}
    }
});
