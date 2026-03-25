<template>
    <div>
        <!-- ===================== SECCIÓN 1: BANNER HEADER ===================== -->
        <section class="s10-banner-section">
            <img src="/images/s10_banner_main.jpg" alt="Sinaloa 10+" class="s10-banner-img">
        </section>

        <!-- ===================== SECCIÓN 2: DESCRIPCIÓN + COMPONENTES ===================== -->
        <section class="s10-section u-clearfix">
            <div class="container">
                <h1 class="s10-title-main text-center">Sinaloa 10+</h1>
                <p class="s10-intro">
                    Sinaloa 10+ es una estrategia de largo plazo que convoca a la sociedad sinaloense a construir un
                    nuevo modelo de desarrollo para el estado.
                </p>
                <p class="s10-intro">
                    Su propósito es <strong>posicionar a Sinaloa entre las diez economías más competitivas de México
                    hacia el año 2050</strong>, mediante una transformación económica que impulse innovación,
                    productividad, inclusión social y sostenibilidad.
                </p>

                <h2 class="s10-subtitle text-center">Tres componentes para transformar el desarrollo</h2>
                <p class="s10-intro text-center">La estrategia Sinaloa 10+ se articula en tres grandes ejes.</p>

                <div class="row s10-cards-row">
                    <div class="col-md-4 col-sm-12 s10-card-col">
                        <div class="s10-card">
                            <div class="s10-card-icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                            <h3 class="s10-card-title">Estrategia Económica</h3>
                            <p class="s10-card-body">Impulsar el Plan Económico de Largo Plazo que fortalezca el tejido productivo, incremente la complejidad económica y genere empleos de mayor valor.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 s10-card-col">
                        <div class="s10-card">
                            <div class="s10-card-icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
                            <h3 class="s10-card-title">Estrategia de Seguridad</h3>
                            <p class="s10-card-body">Fortalecer las capacidades institucionales para garantizar condiciones de seguridad que permitan el desarrollo económico y la inversión.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 s10-card-col">
                        <div class="s10-card">
                            <div class="s10-card-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            <h3 class="s10-card-title">Estrategia Social</h3>
                            <p class="s10-card-body">Comprender las causas de los problemas socioeconómicos y diseñar soluciones basadas en evidencia para mejorar las oportunidades y la cohesión social.</p>
                        </div>
                    </div>
                </div>
                <p class="s10-intro text-center">
                    Estos tres componentes buscan integrar <strong>economía, seguridad y bienestar social</strong>
                    como pilares de un futuro sostenible para Sinaloa.
                </p>
            </div>
        </section>

        <!-- ===================== SECCIÓN 3: VIDEO ===================== -->
        <section class="s10-video-section">
            <div class="container text-center">
                <a class="s10-video-popup" :href="urlvideo">
                    <div class="s10-video-thumb">
                        <img src="/images/s10_banner_video.jpg" alt="Video Sinaloa 10+" class="s10-yt-thumb">
                    </div>
                </a>
                <p class="s10-video-caption">Conoce más sobre la estrategia Sinaloa 10+</p>
            </div>
        </section>

        <!-- ===================== SECCIÓN 4: PLAN ECONÓMICO (PELP) ===================== -->
        <section class="s10-section s10-pelp-section">
            <div class="container">
                <h2 class="s10-subtitle text-center">Plan Económico de Largo Plazo</h2>
                <p class="s10-intro">
                    El <strong>Plan Económico de Largo Plazo (PELP)</strong> es el instrumento técnico que dará
                    sustento al eje económico de la estrategia Sinaloa 10+.
                </p>
                <p class="s10-intro">
                    Su objetivo es definir una <strong>hoja de ruta estratégica para el desarrollo económico del
                    estado con horizonte al 2050</strong>, que incluya diagnóstico, oportunidades estratégicas, metas,
                    indicadores y mecanismos de implementación y seguimiento.
                </p>
                <p class="s10-intro">
                    El PELP permitirá orientar las decisiones públicas y privadas hacia una visión compartida de
                    crecimiento sostenible y competitividad.
                </p>

                <div class="s10-pnud-box">
                    <h3 class="s10-pnud-title">Acompañamiento del PNUD</h3>
                    <p class="s10-intro">
                        La elaboración del Plan Económico de Largo Plazo cuenta con el acompañamiento del
                        <strong>Programa de las Naciones Unidas para el Desarrollo (PNUD)</strong>.
                    </p>
                    <p class="s10-intro">
                        Su participación aporta metodologías internacionales, estándares técnicos y experiencia en
                        planeación estratégica para fortalecer el diseño del plan y asegurar que esté alineado con
                        los principios del desarrollo sostenible.
                    </p>
                </div>
            </div>
        </section>

        <!-- ===================== SECCIÓN 5: EQUIPO ===================== -->
        <section class="s10-section s10-team-section">
            <div class="container">
                <h2 class="s10-subtitle text-center">Equipo</h2>

                <!-- Equipo Técnico Multisectorial -->
                <h3 class="s10-team-group-title text-center">Equipo Técnico Multisectorial</h3>
                <p class="s10-intro text-center s10-team-desc">Expertos seleccionados que diseñarán el Plan Económico de Largo Plazo de Sinaloa.</p>
                <div class="row s10-team-row">
                    <div class="col-md-2 col-sm-4 col-xs-6" v-for="(m, i) in equipoTecnico" :key="'et-'+i">
                        <div class="s10-member-card">
                            <div class="s10-member-img-placeholder">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <p class="s10-member-name">{{ m.nombre }}</p>
                            <p class="s10-member-job">{{ m.cargo }}</p>
                        </div>
                    </div>
                </div>

                <!-- Equipo PNUD -->
                <h3 class="s10-team-group-title text-center">Equipo PNUD</h3>
                <div class="row s10-team-row">
                    <div class="col-md-2 col-sm-4 col-xs-6" v-for="(m, i) in equipoPNUD" :key="'pnud-'+i">
                        <div class="s10-member-card">
                            <div class="s10-member-img-placeholder">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <p class="s10-member-name">{{ m.nombre }}</p>
                            <p class="s10-member-job">{{ m.cargo }}</p>
                        </div>
                    </div>
                </div>

                <!-- Equipo CODESIN -->
                <h3 class="s10-team-group-title text-center">Equipo CODESIN</h3>
                <div class="row s10-team-row">
                    <div class="col-md-2 col-sm-4 col-xs-6" v-for="(m, i) in equipoCodesin" :key="'cod-'+i">
                        <div class="s10-member-card">
                            <div class="s10-member-img-placeholder">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <p class="s10-member-name">{{ m.nombre }}</p>
                            <p class="s10-member-job">{{ m.cargo }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== SECCIÓN 6: NOTICIAS ===================== -->
        <section class="s10-section s10-noticias-section" v-if="noticias.length > 0">
            <div class="container">
                <h2 class="s10-subtitle text-center">Noticias</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-12 s10-noticia-col" v-for="(noticia, index) in noticias" :key="index">
                        <router-link :to="{ name: 'noticia_show', params: { url: noticia.url } }" class="s10-noticia-card">
                            <div class="s10-noticia-img-wrap">
                                <img :src="noticia.urlimage || '/img/default/banner.jpg'" :alt="noticia.title" class="s10-noticia-img">
                            </div>
                            <div class="s10-noticia-body">
                                <p class="s10-noticia-date">{{ noticia.published_date }}</p>
                                <h4 class="s10-noticia-title">{{ noticia.title }}</h4>
                            </div>
                        </router-link>
                    </div>
                </div>
                <div class="text-center s10-ver-mas">
                    <router-link :to="{ name: 'noticias' }" class="s10-btn-verde">Ver más noticias</router-link>
                </div>
            </div>
        </section>

        <!-- ===================== SECCIÓN 7: DOCUMENTOS DESCARGABLES ===================== -->
        <section class="s10-docs-section">
            <div class="container text-center">
                <!-- Sustituir '#' con el link real de Google Drive cuando el cliente lo proporcione -->
                <a href="#" target="_blank" class="s10-docs-link">
                    <img src="/images/s10_banner_descargas.jpg" alt="Documentos Descargables" class="s10-docs-banner">
                </a>
            </div>
        </section>

    </div>
</template>

<script>
export default {
    data() {
        return {
            urlvideo: 'https://youtu.be/mSGONji1hj4?si=HZta4THgxP-pRPsU',
            noticias: [],
            // ── Equipo Técnico Multisectorial ──
            // Sustituir con los nombres reales cuando el cliente los proporcione
            equipoTecnico: [
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
                { nombre: 'Por confirmar', cargo: 'Miembro' },
            ],
            // ── Equipo PNUD ──
            equipoPNUD: [
                { nombre: 'Por confirmar', cargo: 'Especialista PNUD' },
                { nombre: 'Por confirmar', cargo: 'Especialista PNUD' },
                { nombre: 'Por confirmar', cargo: 'Especialista PNUD' },
            ],
            // ── Equipo CODESIN ──
            equipoCodesin: [
                { nombre: 'Por confirmar', cargo: 'CODESIN' },
                { nombre: 'Por confirmar', cargo: 'CODESIN' },
                { nombre: 'Por confirmar', cargo: 'CODESIN' },
            ],
        }
    },
    mounted() {
        $('#lock').addClass('hidden');
        // Inicializar popup de video
        $('.s10-video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            zoom: { enabled: true },
            iframe: {
                patterns: {
                    youtube_short: {
                        index: 'https://youtu.be/',
                        id: 'youtu.be/',
                        src: '//www.youtube.com/embed/%id%?autoplay=1'
                    },
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: '//www.youtube.com/embed/%id%?autoplay=1'
                    }
                },
                srcAction: 'iframe_src',
            }
        });
        // Cargar noticias de la categoría Sinaloa 10+
        axios.get('/api/sinaloa10noticias')
            .then(response => {
                this.noticias = response.data;
            })
            .catch(() => {
                this.noticias = [];
            });
    },
}
</script>

<style scoped>
/* ─── Base ─── */
.s10-section { padding: 50px 0; }
.s10-intro {
    font-size: 1rem;
    line-height: 1.7;
    letter-spacing: 0.3px;
    max-width: 860px;
    margin: 12px auto;
    text-align: justify;
}

/* ─── Banner ─── */
.s10-banner-section { width: 100%; }
.s10-banner-img { width: 100%; display: block; }

/* ─── Títulos ─── */
.s10-title-main {
    font-size: 2.8rem;
    font-weight: 800;
    color: #2c4c2c;
    margin: 30px 0 15px;
    letter-spacing: 3px;
}
.s10-subtitle {
    font-size: 1.6rem;
    font-weight: 700;
    color: #2c4c2c;
    margin: 40px 0 15px;
    letter-spacing: 1px;
}

/* ─── Cards componentes ─── */
.s10-cards-row { margin-top: 30px; margin-bottom: 20px; }
.s10-card-col { margin-bottom: 20px; }
.s10-card {
    border: 2px solid #e8f0e8;
    border-radius: 12px;
    padding: 30px 20px;
    height: 100%;
    text-align: center;
    transition: box-shadow 0.2s;
    background: #fff;
}
.s10-card:hover { box-shadow: 0 6px 24px rgba(44,76,44,0.12); }
.s10-card-icon { font-size: 2.5rem; color: #2c4c2c; margin-bottom: 15px; }
.s10-card-title { font-size: 1.1rem; font-weight: 700; color: #2c4c2c; margin-bottom: 10px; }
.s10-card-body { font-size: 0.9rem; line-height: 1.5; color: #555; margin: 0; }

/* ─── Video ─── */
.s10-video-section { padding: 40px 0; background: #f8f8f8; }
.s10-video-thumb {
    position: relative;
    display: inline-block;
    width: 100%;
    cursor: pointer;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}
.s10-yt-thumb { width: 100%; display: block; }
.s10-video-caption { margin-top: 14px; color: #888; font-size: 0.9rem; }
.s10-video-popup { text-decoration: none; display: block; width: 100%; }

/* ─── PELP ─── */
.s10-pelp-section { background: #fff; }
.s10-pnud-box {
    background: #f1f6f1;
    border-left: 4px solid #2c4c2c;
    border-radius: 8px;
    padding: 25px 30px;
    margin-top: 30px;
}
.s10-pnud-title { font-size: 1.2rem; font-weight: 700; color: #2c4c2c; margin-bottom: 12px; }

/* ─── Equipo ─── */
.s10-team-section { background: #f8f8f8; }
.s10-team-group-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2c4c2c;
    margin: 35px 0 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.s10-team-desc { color: #777; margin-bottom: 20px; }
.s10-team-row { justify-content: center; margin-bottom: 10px; }
.s10-member-card { text-align: center; margin-bottom: 20px; }
.s10-member-img-placeholder {
    width: 120px;
    height: 120px;
    background: #c8c8c8;
    border-radius: 6px;
    margin: 0 auto 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: #fff;
}
.s10-member-name { font-weight: 700; font-size: 0.85rem; margin: 4px 0; color: #333; }
.s10-member-job { font-size: 0.78rem; color: #777; margin: 0; }

/* ─── Noticias ─── */
.s10-noticias-section { background: #fff; }
.s10-noticia-col { margin-bottom: 24px; }
.s10-noticia-card { display: block; text-decoration: none; color: inherit; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); transition: box-shadow 0.2s; }
.s10-noticia-card:hover { box-shadow: 0 6px 24px rgba(44,76,44,0.15); text-decoration: none; color: inherit; }
.s10-noticia-img-wrap { height: 180px; overflow: hidden; }
.s10-noticia-img { width: 100%; height: 100%; object-fit: cover; }
.s10-noticia-body { padding: 15px; }
.s10-noticia-date { font-size: 0.8rem; color: #aaa; margin: 0 0 5px; }
.s10-noticia-title { font-size: 0.95rem; font-weight: 700; color: #2c4c2c; line-height: 1.3; margin: 0; }
.s10-ver-mas { margin-top: 30px; }
.s10-btn-verde {
    display: inline-block;
    background: #2c4c2c;
    color: #fff !important;
    padding: 12px 40px;
    border-radius: 50px;
    font-weight: 700;
    letter-spacing: 1px;
    text-decoration: none;
    transition: background 0.2s;
}
.s10-btn-verde:hover { background: #162616; text-decoration: none; }

/* ─── Documentos ─── */
.s10-docs-section { padding: 40px 0 60px; background: #f8f8f8; }
.s10-docs-link { display: inline-block; width: 100%; }
.s10-docs-banner { width: 100%; display: block; margin: 0 auto; border-radius: 8px; transition: opacity 0.2s; }
.s10-docs-banner:hover { opacity: 0.9; }

/* ─── Responsive ─── */
@media (max-width: 767px) {
    .s10-title-main { font-size: 1.8rem; }
    .s10-subtitle { font-size: 1.2rem; }
    .s10-member-img-placeholder { width: 90px; height: 90px; font-size: 2rem; }
    .s10-card { margin-bottom: 16px; }
}
</style>
