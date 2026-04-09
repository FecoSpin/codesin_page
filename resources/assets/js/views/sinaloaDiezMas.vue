<template>
    <div>
        <!-- ===================== SECCIÓN 1: BANNER HEADER ===================== -->
        <section class="s10-banner-section">
            <img src="/images/s10_banner_main.jpg?v=2" alt="Sinaloa 10+" class="s10-banner-img">
        </section>

        <!-- ===================== SECCIÓN 2: DESCRIPCIÓN + COMPONENTES ===================== -->
        <section class="s10-section u-clearfix">
            <div class="container">
                <h1 class="s10-title-main text-center">Sinaloa 10+</h1>
                <p class="s10-intro">
                    Es una estrategia de largo plazo que convoca a la sociedad sinaloense a construir un
                    nuevo modelo de desarrollo para el estado.
                </p>
                <p class="s10-intro">
                    Su propósito es <strong>posicionar a Sinaloa entre las diez economías más competitivas de México
                    hacia el año 2050</strong>, mediante una transformación económica que impulse innovación,
                    productividad, inclusión social y sostenibilidad.
                </p>

                <h2 class="s10-subtitle text-center">Tres componentes para transformar el desarrollo</h2>
                <p class="s10-intro text-center s10-team-desc">La estrategia Sinaloa 10+ se articula en tres grandes ejes.</p>

                <div class="row s10-cards-row">
                    <div class="col-md-4 col-sm-12 s10-card-col">
                        <div class="s10-card">
                            <div class="s10-card-icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                            <h3 class="s10-card-title">Eje Económico</h3>
                            <p class="s10-card-body">Impulsar el Plan Económico de Largo Plazo que fortalezca el tejido productivo, incremente la complejidad económica y genere empleos de mayor valor.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 s10-card-col">
                        <div class="s10-card">
                            <div class="s10-card-icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
                            <h3 class="s10-card-title">Eje de Seguridad</h3>
                            <p class="s10-card-body">Fortalecer las capacidades institucionales para garantizar condiciones de seguridad que permitan el desarrollo económico y la inversión.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 s10-card-col">
                        <div class="s10-card">
                            <div class="s10-card-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                            <h3 class="s10-card-title">Eje Social</h3>
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
                        <img src="/images/s10_banner_video.jpg?v=2" alt="Video Sinaloa 10+" class="s10-yt-thumb">
                    </div>
                </a>
                <!--<p class="s10-video-caption">Conoce más sobre la estrategia Sinaloa 10+</p>-->
            </div>
        </section>

        <!-- ===================== SECCIÓN 4: PLAN ECONÓMICO (PELP) ===================== -->
        <section class="s10-section s10-pelp-section">
            <div class="container">
                <div class="s10-section-divider">
                    <span class="s10-section-divider-label">Eje Económico · Sinaloa 10+</span>
                </div>
                <h2 class="s10-subtitle text-center">Plan Económico de Largo Plazo</h2>
                <p class="s10-intro s10-text-justify">
                    El <strong>Plan Económico de Largo Plazo (PELP)</strong> es el instrumento técnico que dará
                    sustento al eje económico de la estrategia Sinaloa 10+.
                </p>
                <p class="s10-intro s10-text-justify">
                    Su objetivo es definir una <strong>hoja de ruta estratégica para el desarrollo económico del
                    estado con horizonte al 2050</strong>, que incluya diagnóstico, metas y mecanismos de seguimiento.
                </p>
                <p class="s10-intro s10-text-justify">
                    El PELP permitirá orientar las decisiones hacia una visión compartida de
                    crecimiento sostenible y competitividad.
                </p>

                <div class="s10-pelp-img-container-full text-center">
                    <p class="s10-img-caption">Visualiza la hoja de ruta estratégica para el desarrollo económico de Sinaloa.</p>
                    <div class="s10-pelp-img-wrapper">
                        <img src="/images/s10_pelp_hoja_ruta.jpg?v=2" alt="Hoja de Ruta PELP" class="s10-pelp-img-large">
                    </div>
                    
                </div>

                <div class="s10-pnud-container-full">
                    <!-- Logos y título principal -->
                    <div class="s10-logos-row">
                        <img src="/images/s10_logo_ods_sinaloa.png" alt="ODS Sinaloa" class="s10-logo-img s10-logo-ods">
                        <img src="/images/s10_logo_codesin.png" alt="Codesin Sinaloa 10+" class="s10-logo-img s10-logo-codesin">
                        <img src="/images/s10_logo_pnud.png" alt="PNUD" class="s10-logo-img s10-logo-pnud">
                    </div>

                    <div class="s10-pnud-card">
                        <div class="s10-pnud-header">
                            <h3 class="s10-pnud-title-new">ACOMPAÑAMIENTO DEL PROGRAMA DE LAS NACIONES UNIDAS PARA EL DESARROLLO (PNUD)</h3>
                        </div>
                        <div class="s10-pnud-body">
                            <p class="s10-intro s10-text-justify">
                                La elaboración del Plan Económico de Largo Plazo cuenta con el acompañamiento del
                                <strong>Programa de las Naciones Unidas para el Desarrollo (PNUD)</strong>.
                            </p>
                            <p class="s10-intro s10-text-justify">
                                Su participación aporta metodologías internacionales, estándares técnicos y experiencia en
                                planeación estratégica para fortalecer el diseño del plan y asegurar que esté alineado con
                                los principios del desarrollo sostenible.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===================== SECCIÓN 5: EQUIPO ===================== -->
        <div class="s10-section-divider s10-team-divider-hidden">
            <span class="s10-section-divider-label">Equipo · Sinaloa 10+</span>
        </div>
        <section class="s10-section s10-team-section">
            <div class="container">

                <!-- Equipo Técnico Multisectorial -->
                <h3 class="s10-team-group-title text-center">Equipo Técnico Multisectorial</h3>
                <p class="s10-intro text-center s10-team-desc">Expertos seleccionados que  Co-diseñarán el Plan Económico de Largo Plazo de Sinaloa.</p>
                <div class="row s10-team-row">
                    <div class="col-md-2 col-sm-4 col-xs-6" v-for="(m, i) in equipoTecnico" :key="'et-'+i">
                        <div class="s10-member-card s10-member-clickable" @click="openModal(m)" role="button" tabindex="0" @keydown.enter="openModal(m)">
                            <div class="s10-member-img" v-if="m.foto">
                                <img :src="m.foto" :alt="m.nombre" class="s10-profile-img">
                            </div>
                            <div class="s10-member-img-placeholder" v-else>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <p class="s10-member-name">{{ m.nombre }}</p>
                            <p class="s10-member-job">{{ m.cargo }}</p>
                            <p class="s10-cv-label-hint"><i class="fa fa-info-circle"></i> Ver perfil</p>
                        </div>
                    </div>
                </div>

                <!-- Modal de perfil -->
                <transition name="s10-modal-fade">
                    <div class="s10-modal-overlay" v-if="selectedMember" @click.self="closeModal" role="dialog" aria-modal="true">
                        <div class="s10-modal-box">
                            <button class="s10-modal-close" @click="closeModal" aria-label="Cerrar">&times;</button>
                            <div class="s10-modal-header">
                                <div class="s10-modal-img-wrap">
                                    <img v-if="selectedMember.foto" :src="selectedMember.foto" :alt="selectedMember.nombre" class="s10-modal-photo">
                                    <div v-else class="s10-modal-img-placeholder"><i class="fa fa-user"></i></div>
                                </div>
                                <div class="s10-modal-title-block">
                                    <h3 class="s10-modal-name">{{ selectedMember.nombre }}</h3>
                                    <p class="s10-modal-cargo">{{ selectedMember.cargo }}</p>
                                </div>
                            </div>
                            <div class="s10-modal-body">
                                <p class="s10-modal-desc">{{ selectedMember.descripcion }}</p>
                            </div>
                            <div class="s10-modal-footer" v-if="selectedMember.curriculum">
                                <a :href="selectedMember.curriculum" target="_blank" rel="noopener noreferrer" class="s10-btn-curriculum">
                                    <i class="fa fa-file-text-o"></i> Ver currículum
                                </a>
                            </div>
                        </div>
                    </div>
                </transition>

                <!-- Equipo PNUD -->
                <h3 class="s10-team-group-title text-center">Equipo PNUD</h3>
                <div class="row s10-team-row">
                    <div class="col-md-2 col-sm-4 col-xs-6" v-for="(m, i) in equipoPNUD" :key="'pnud-'+i">
                        <div class="s10-member-card s10-member-clickable" @click="openModal(m)" role="button" tabindex="0" @keydown.enter="openModal(m)">
                            <div class="s10-member-img" v-if="m.foto">
                                <img :src="m.foto" :alt="m.nombre" class="s10-profile-img">
                            </div>
                            <div class="s10-member-img-placeholder" v-else>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <p class="s10-member-name">{{ m.nombre }}</p>
                            <p class="s10-member-job">{{ m.cargo }}</p>
                            <p class="s10-cv-label-hint"><i class="fa fa-info-circle"></i> Ver perfil</p>
                        </div>
                    </div>
                </div>

                <!-- Equipo CODESIN (Oculto temporalmente) -->
                <template v-if="false">
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
                </template>
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
                    <router-link :to="{ name: 'sinaloa10_noticias' }" class="s10-btn-verde">Ver más noticias</router-link>
                </div>
            </div>
        </section>

        <!-- ===================== SECCIÓN 7: DOCUMENTOS DESCARGABLES ===================== -->
        <section class="s10-docs-section">
            <div class="container text-center">
                <a href="https://drive.google.com/drive/folders/1VVPUzcIcWKwb4MNAfGTkZdCGLnAvMG8M?usp=sharing" target="_blank" class="s10-docs-link">
                    <img src="/images/s10_banner_descargas.jpg?v=2" alt="Documentos Descargables" class="s10-docs-banner">
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
            selectedMember: null,
            // ── Equipo Técnico Multisectorial ──
            equipoTecnico: [
                { 
                    nombre: 'Alberto Kousuke De la Herrán Arita', 
                    cargo: 'Director de Fomento a la Investigación Científica en CONFÍE',
                    foto: '/images/equipo/alberto-kousuke.jpg',
                    curriculum: 'https://drive.google.com/file/d/1DO-4k38lBW7g9tPwU14ZZooc2y3jo2fR/view?usp=drive_link',
                    descripcion: 'Médico e investigador en neurociencias, especializado en neurofisiología, trastornos del sueño y neuroinmunología. Profesor universitario y funcionario público, impulsa investigación científica, divulgación del conocimiento y acción social.'
                },
                { 
                    nombre: 'Diego Alonso Gastélum Chavira', 
                    cargo: 'Profesor Investigador de Tiempo Completo en la UAdeO',
                    foto: '/images/equipo/diego-gastelum.jpg',
                    curriculum: 'https://drive.google.com/file/d/1wH6L3HQ_tWefkRobkYXy94ds0Fqxprid/view?usp=drive_link',
                    descripcion: 'Investigador y académico con más de una década de experiencia en análisis multicriterio, ciencia de datos y optimización. Miembro del SNII Nivel II, enfocado en investigación aplicada, formación de talento y cooperación internacional.'
                },
                { 
                    nombre: 'Doris Ibel Gutiérrez Félix', 
                    cargo: 'Gerente de Inversión Social en Fundación Coppel',
                    foto: '/images/equipo/doris-gutierrez.jpg',
                    curriculum: 'https://drive.google.com/file/d/1nsx6Rrwk7LZ89TTqm3R_OsorjAPSmnBK/view?usp=drive_link',
                    descripcion: 'Estratega en inversión social e innovación pública, con experiencia en filantropía, movilidad social y articulación multisectorial. Ha liderado programas de alto impacto, impulsando evaluación, políticas públicas y colaboración intersectorial.'
                },
                { 
                    nombre: 'Doris Teresita Mendoza López', 
                    cargo: 'Profesora e Investigadora de Tiempo Completo en Facultad de Contaduría y Administración de la UAS',
                    foto: '/images/equipo/doris-teresita-mendoza.jpg',
                    curriculum: 'https://drive.google.com/file/d/17AmI3Z2XmCuekHGmQJ2Mq0_ZZsBUX7JS/view?usp=drive_link',
                    descripcion: 'Investigadora en fiscalidad internacional y estrategias fiscales en entornos globalizados. Con trayectoria en docencia e investigación, analiza la tributación de empresas multinacionales y su impacto en políticas públicas y competitividad.'
                },
                { 
                    nombre: 'Dulce Livier Pérez Gámez', 
                    cargo: 'Fundadora y Directora de Entre Pueblos, Organización de la Sociedad Civil',
                    foto: '/images/equipo/dulce-livier.jpg',
                    curriculum: 'https://drive.google.com/file/d/1FUj4myxPnJxFxXmXqKTiSo5CPclb38xa/view?usp=drive_link',
                    descripcion: 'Especialista en desarrollo comunitario y sostenibilidad, con catorce años de experiencia en proyectos sociales y ambientales. Fundadora de Entre Pueblos A.C., impulsa capacidades comunitarias, articulación intersectorial y acuerdos regionales sostenibles.'
                },
                { 
                    nombre: 'Héctor Emanuel Ibarra Flores', 
                    cargo: 'Empresario, Director General de Fumigaciones Ibarra',
                    foto: '/images/equipo/hector-ibarra.jpg',
                    curriculum: 'https://drive.google.com/file/d/1IcLedhPE7VXVF7hj6SOPeU1hjOzNDObp/view?usp=drive_link',
                    descripcion: 'Ingeniero industrial químico y empresario con más de 35 años de experiencia en dirección de negocios, liderazgo gremial y gestión pública. Especialista en vinculación institucional, desarrollo económico y fortalecimiento productivo.'
                },
                { 
                    nombre: 'Ismael Barraza Guzmán', 
                    cargo: 'Jefe de Vinculación y Desarrollo Regional del Instituto Politécnico Nacional en Los Mochis',
                    foto: '/images/equipo/ismael-barraza.jpg',
                    curriculum: 'https://drive.google.com/file/d/1XxP2P2KG6O18u1XDtJDiGbel6hxsj2NS/view?usp=drive_link',
                    descripcion: 'Especialista en desarrollo económico territorial con más de 20 años de experiencia en estructuración de proyectos estratégicos, financiamiento público y articulación interinstitucional para el desarrollo regional sostenible con enfoque integral.'
                },
                { 
                    nombre: 'Jorge Miller Benítez', 
                    cargo: 'Asesor Jurídico del Despacho del Secretario de Economía de Sinaloa',
                    foto: '/images/equipo/jorge-miller.jpg',
                    curriculum: 'https://drive.google.com/file/d/1113fKuO7seMyIaZWU95wG4wjGaNzR_Pr/view?usp=drive_link',
                    descripcion: 'Politólogo y abogado con experiencia en administración pública, gestión institucional y asesoría estratégica. Ha ocupado cargos directivos en gobierno y organismos públicos, con liderazgo, negociación, planeación estratégica y políticas públicas sociales.'
                },
                { 
                    nombre: 'Jorge Rafael Elenes Figueroa', 
                    cargo: 'Profesor e Investigador de Posgrado en la UAS',
                    foto: '/images/equipo/jorge-elenes.jpg',
                    curriculum: 'https://drive.google.com/file/d/1NnPi9wJCJ-Zxoms4skAv6SPqrtKAoSHA/view?usp=drive_link',
                    descripcion: 'Economista e investigador con trayectoria en docencia, investigación y gestión académica, especializado en desarrollo regional, economía aplicada y análisis territorial. Miembro del Sistema Nacional de Investigadores Nivel I, con producción científica.'
                },
                { 
                    nombre: 'José Antonio Penné Madrid', 
                    cargo: 'Director de Planeación en la Secretaría de Administración y Finanzas del Gobierno de Sinaloa',
                    foto: '/images/equipo/jose-antonio-penne.jpg',
                    curriculum: 'https://drive.google.com/file/d/16XZ5dONC1mr5IPOugISAsQDUyfjcHwan/view?usp=drive_link',
                    descripcion: 'Especialista en planeación del desarrollo, política pública y finanzas públicas, con trayectoria en sector gubernamental y académico. Experto en diseño, implementación y evaluación de políticas, presupuestación basada en resultados y seguimiento.'
                },
                { 
                    nombre: 'José Antonio Ríos Rojo', 
                    cargo: 'Integrante de la Coordinación de Asesores del Gobernador de Sinaloa',
                    foto: '/images/equipo/jose-antonio-rios.jpg',
                    curriculum: 'https://drive.google.com/file/d/1CAhGYLFHnVdJHHfuEeawx_7QIvxNyWGQ/view?usp=drive_link',
                    descripcion: 'Profesional con trayectoria en el ámbito académico y legislativo, con experiencia en formación universitaria, análisis político y gestión parlamentaria. Contribuye al fortalecimiento institucional mediante análisis, articulación y generación de propuestas públicas.'
                },
                { 
                    nombre: 'María del Rosario Godoy Alarcón', 
                    cargo: 'Empresaria, Directora General y socia accionista de Ingoy',
                    foto: '/images/equipo/rosario-godoy.jpg',
                    curriculum: 'https://drive.google.com/file/d/1R1OQJugonQiHLdPM43YK8N3qa1r0xqKn/view?usp=drive_link',
                    descripcion: 'Empresaria con experiencia en dirección general, desarrollo de negocios y fortalecimiento operativo en el sector industrial. Impulsa calidad, innovación y crecimiento sostenido, con enfoque en competitividad y consolidación empresarial de largo plazo.'
                },
                { 
                    nombre: 'Pedro Flores Leal', 
                    cargo: 'Rector de la UAdeO',
                    foto: '/images/equipo/pedro-flores.jpg',
                    curriculum: 'https://drive.google.com/file/d/1wPmFrBFVbg-e1MmhuhYJ9vKjPVD0vHzB/view?usp=drive_link',
                    descripcion: 'Especialista en innovación y gestión del conocimiento, enfocado en capital intelectual y transferencia tecnológica. Ha participado en proyectos CONACYT, consultoría en innovación y vinculación con empresas, impulsando desarrollo tecnológico y estrategia organizacional.'
                },
                { 
                    nombre: 'Sergio Antonio Álvarez Torres', 
                    cargo: 'Empresario, Director General del Grupo FIASA',
                    foto: '/images/equipo/sergio-alvarez.jpg',
                    curriculum: 'https://drive.google.com/file/d/1zg-vgc8Mgp5-WblRo_Nbr4SPAxSUm0dO/view?usp=drive_link',
                    descripcion: 'Empresario y líder agroindustrial con trayectoria en dirección empresarial, innovación y desarrollo organizacional. Ha impulsado proyectos productivos y organismos empresariales, fortaleciendo competitividad, tecnología y crecimiento agrícola con formación en alta dirección.'
                },
                { 
                    nombre: 'Yamel Guadalupe Rubio Rocha', 
                    cargo: 'Profesora e Investigadora en la Facultad de Biología de la UAS',
                    foto: '/images/equipo/yamel-rubio.jpg',
                    curriculum: 'https://drive.google.com/file/d/1O5_5NLCrAQoaFusGvPRb4LBFBZmnrMz5/view?usp=drive_link',
                    descripcion: 'Académica e investigadora en conservación de biodiversidad, desarrollo sustentable y manejo de fauna silvestre. Enfocada en jaguar y modelos productivos sostenibles, con experiencia en políticas ambientales, investigación aplicada y vinculación comunitaria.'
                }
            ],
            // ── Equipo PNUD ──
            equipoPNUD: [
                { 
                    nombre: 'Jesús Pacheco', 
                    cargo: 'Coordinador del proyecto Implementación de la Agenda 2030 a nivel subnacional en PNUD México',
                    foto: '/images/equipo/jesus-pacheco.jpg',
                    descripcion: 'Experiencia en investigación, diseño y evaluación de políticas públicas. Coordina estrategias para fortalecer capacidades institucionales a nivel local, estrategias sobre Desarrollo Humano, así como metodologías y sistemas de indicadores con el enfoque de desarrollo sostenible para la gestión pública.'
                },
                { 
                    nombre: 'Edna Mercado', 
                    cargo: 'Analista en alianzas para el desarrollo sostenible en PNUD México',
                    foto: '/images/equipo/edna-mercado.jpg',
                    descripcion: 'Experiencia en facilitar procesos multi-actor, diseñar y gestionar proyectos de cooperación internacional para el desarrollo que logren resultados reales para las personas y el planeta.'
                },
                { 
                    nombre: 'Adrián Escudero', 
                    cargo: 'Asociado para el análisis de evidencia y generación de conocimiento para el desarrollo local en PNUD México',
                    foto: '/images/equipo/adrian-escudero.jpg',
                    descripcion: 'Experiencia en análisis territorial y el desarrollo de metodologías, sistemas de medición e instrumentos de monitoreo para la Agenda 2030 y el Desarrollo Humano. Cuenta con experiencia en política social y económica para fortalecer la gestión pública.'
                },
                { 
                    nombre: 'Fiódor Rodríguez', 
                    cargo: 'Especialista en formación para la localización de la Agenda 2030 y planeación del desarrollo en PNUD México',
                    foto: '/images/equipo/fiodr-rodriguez.jpg',
                    descripcion: 'Experiencia en pedagogía, diseño metodológico y fortalecimiento de capacidades para la Agenda 2030. Cuenta con trayectoria en docencia, diseño y evaluación de políticas públicas y promoción de derechos humanos e inclusión social.'
                },
            ],
            // ── Equipo CODESIN ──
            equipoCodesin: [
                { nombre: 'Por confirmar', cargo: 'CODESIN' },
                { nombre: 'Por confirmar', cargo: 'CODESIN' },
                { nombre: 'Por confirmar', cargo: 'CODESIN' },
            ],
        }
    },
    methods: {
        openModal(member) {
            this.selectedMember = member;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.selectedMember = null;
            document.body.style.overflow = '';
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
    background: #fff;
}
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

/* ─── Divisores de Sección ─── */
.s10-section-divider {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    padding: 28px 0 0;
    position: relative;
    background: transparent;
}
.s10-section-divider::before,
.s10-section-divider::after {
    content: '';
    flex: 1;
    height: 2px;
    background: linear-gradient(to right, transparent, #2c4c2c 60%);
    max-width: 300px;
}
.s10-section-divider::after {
    background: linear-gradient(to left, transparent, #2c4c2c 60%);
}
.s10-section-divider-label {
    white-space: nowrap;
    font-size: 0.80rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #2c4c2c;
    background: #fff;
    padding: 6px 18px;
    border: 1.5px solid #2c4c2c;
    border-radius: 50px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
/* Ocultar divisor específico del equipo */
.s10-team-divider-hidden {
    display: none;
}

/* ─── PELP ─── */
.s10-pelp-section { 
    background: linear-gradient(135deg, #e8f4e8 0%, #f0f7f0 50%, #e1f0e1 100%);
    background-color: #e8f4e8; /* Fallback for old browsers */
    padding: 15px 0;
    border-top: none;
    position: relative;
}
.s10-text-justify { text-align: justify; margin-bottom: 20px; }

.s10-pelp-img-container-full { 
    margin: 50px auto 30px; 
    max-width: 1000px; /* Ancho suficiente para que se vea el detalle */
}
.s10-pelp-img-wrapper {
    position: relative;
    border-radius: 16px;
    padding: 0; /* Sin relleno para que la sombra se vea directa */
    background: none; /* Fondo eliminado a petición del usuario */
}
/* Animación eliminada a petición del usuario */
.s10-pelp-img-large {
    width: 100%;
    height: auto;
    border-radius: 12px;
    display: block;
    /* Sombra equilibrada en laterales y parte inferior */
    box-shadow: 0 20px 40px rgba(26,46,26,0.12), 10px 0 25px rgba(26,46,26,0.04), -10px 0 25px rgba(26,46,26,0.04);
}
.s10-img-caption {
    margin-top: 15px;
    color: #888;
    font-size: 0.9rem;
    font-style: italic;
}

.s10-pnud-container-full {
    margin: 80px auto 40px; 
    max-width: 1000px; 
}
.s10-logos-row {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 50px; /* Mayor separación del recuadro verde */
    flex-wrap: wrap;
}
.s10-logo-img {
    max-height: 75px;
    width: auto;
    object-fit: contain;
}
/* Tamaños más pequeños y márgenes ajustados para "centrar" visualmente el logo de Codesin */
.s10-logo-ods { 
    max-height: 85px; 
    margin-right: 10px; 
}
.s10-logo-codesin { 
    max-height: 80px; 
    margin-right: 20px; 
    margin-left: 10px;
}
.s10-logo-pnud { 
    max-height: 75px; 
    margin-left: 20px;
}
.s10-pnud-main-title {
    text-align: center;
    font-size: 1.1rem;
    font-weight: 500;
    color: #1a2e1a;
    margin-bottom: 60px;
    letter-spacing: 0.5px;
}
.s10-pnud-card {
    background: linear-gradient(145deg, #ffffff 0%, #f9fbf9 100%);
    border: 2px solid #d4e4d4;
    border-top: 6px solid #2c4c2c; /* Borde superior verde oscuro como en la imagen */
    border-radius: 16px;
    position: relative;
    padding: 50px 40px 25px;
    box-shadow: 0 10px 40px rgba(44,76,44,0.08), 0 2px 10px rgba(44,76,44,0.04);
}
.s10-pnud-header {
    position: absolute;
    top: -24px;
    left: 50%;
    transform: translateX(-50%);
    background: #2c4c2c;
    padding: 12px 50px;
    border-radius: 50px;
    border: 2px solid #fff; /* Borde blanco para mayor impacto */
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    white-space: nowrap;
}
.s10-pnud-title-new {
    color: #fff;
    font-size: 0.80rem;
    font-weight: 800;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}
.s10-pnud-body {
    text-align: center;
}

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
.s10-team-desc { 
    color: #777; 
    margin-bottom: 20px; 
    text-align: center !important; 
}
.s10-team-row { display: flex; flex-wrap: wrap; justify-content: center; margin-bottom: 10px; }
.s10-member-card { text-align: center; margin-bottom: 20px; }
.s10-member-link { text-decoration: none !important; display: block; color: inherit; }
.s10-member-link:not(.no-link) { cursor: default; }
.s10-member-link.no-link { cursor: default; }

.s10-member-img, .s10-member-img-placeholder {
    width: 120px;
    height: 120px;
    border-radius: 6px;
    margin: 0 auto 10px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #c8c8c8;
}
.s10-member-img-placeholder {
    font-size: 2.5rem;
    color: #fff;
}
.s10-profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.s10-member-name { font-weight: 700; font-size: 0.85rem; margin: 4px 0; color: #333; }
.s10-member-job { font-size: 0.78rem; color: #777; margin: 0; line-height: 1.2; }
.s10-cv-label-hint {
    font-size: 0.72rem;
    color: #2c4c2c;
    font-weight: 700;
    margin-top: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    opacity: 0;
    transition: opacity 0.2s;
}
.s10-member-clickable {
    cursor: pointer;
    transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease, background 0.22s ease;
    border-radius: 10px;
    border: 2px solid transparent;
    background: #f8f8f8;
    padding: 10px 8px 8px;
}
.s10-member-clickable:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 28px rgba(44,76,44,0.28), 0 2px 8px rgba(44,76,44,0.14);
    border-color: #2c4c2c;
    background: linear-gradient(160deg, #f1f6f1 0%, #eaf2ea 100%);
}
.s10-member-clickable:hover .s10-cv-label-hint { opacity: 1; }
.s10-member-clickable:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(44,76,44,0.35);
    border-color: #2c4c2c;
    border-radius: 10px;
}

/* ─── Modal ─── */
.s10-modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    backdrop-filter: blur(3px);
}
.s10-modal-box {
    background: #fff;
    border-radius: 14px;
    max-width: 560px;
    width: 100%;
    padding: 36px 32px 28px;
    position: relative;
    box-shadow: 0 20px 60px rgba(0,0,0,0.25);
    max-height: 90vh;
    overflow-y: auto;
}
.s10-modal-close {
    position: absolute;
    top: 14px; right: 18px;
    background: none;
    border: none;
    font-size: 1.8rem;
    line-height: 1;
    color: #888;
    cursor: pointer;
    padding: 0;
    transition: color 0.2s;
}
.s10-modal-close:hover { color: #2c4c2c; }
.s10-modal-header {
    display: flex;
    align-items: center;
    gap: 22px;
    margin-bottom: 22px;
    padding-bottom: 18px;
    border-bottom: 1px solid #e8f0e8;
}
.s10-modal-img-wrap {
    flex-shrink: 0;
    width: 90px;
    height: 90px;
    border-radius: 8px;
    overflow: hidden;
    background: #c8c8c8;
    display: flex;
    align-items: center;
    justify-content: center;
}
.s10-modal-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.s10-modal-img-placeholder {
    font-size: 2.2rem;
    color: #fff;
}
.s10-modal-title-block { flex: 1; }
.s10-modal-name {
    font-size: 1.1rem;
    font-weight: 800;
    color: #1a2e1a;
    margin: 0 0 6px;
    line-height: 1.3;
}
.s10-modal-cargo {
    font-size: 0.85rem;
    color: #2c4c2c;
    font-style: italic;
    margin: 0;
    line-height: 1.4;
}
.s10-modal-body { margin-bottom: 24px; }
.s10-modal-desc {
    font-size: 0.98rem;
    line-height: 1.75;
    color: #444;
    margin: 0;
    text-align: justify;
}
.s10-modal-footer { text-align: right; }
.s10-btn-curriculum {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #2c4c2c;
    color: #fff !important;
    text-decoration: none !important;
    padding: 11px 28px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    transition: background 0.2s, transform 0.15s;
    box-shadow: 0 4px 14px rgba(44,76,44,0.25);
}
.s10-btn-curriculum:hover {
    background: #162616;
    transform: translateY(-1px);
    text-decoration: none !important;
}

/* ─── Transición modal ─── */
.s10-modal-fade-enter-active, .s10-modal-fade-leave-active {
    transition: opacity 0.25s ease;
}
.s10-modal-fade-enter, .s10-modal-fade-leave-to {
    opacity: 0;
}
.s10-modal-fade-enter .s10-modal-box,
.s10-modal-fade-leave-to .s10-modal-box {
    transform: scale(0.95);
}
.s10-modal-fade-enter-active .s10-modal-box,
.s10-modal-fade-leave-active .s10-modal-box {
    transition: transform 0.25s ease;
}

/* ─── Noticias ─── */
.s10-noticias-section { background: #fff; }
.s10-noticia-col { margin-bottom: 24px; }
.s10-noticia-card { display: block; text-decoration: none; color: inherit; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
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
.s10-docs-banner { width: 100%; display: block; margin: 0 auto; border-radius: 8px; }


/* ─── Responsive ─── */
@media (max-width: 767px) {
    .s10-title-main { font-size: 1.8rem; }
    .s10-subtitle { font-size: 1.2rem; }
    .s10-member-img-placeholder { width: 90px; height: 90px; font-size: 2rem; }
    .s10-card { margin-bottom: 16px; }

    /* Ajustes de PNUD y logos para móvil */
    .s10-logos-row { 
        gap: 15px; 
        margin-bottom: 40px; 
    }
    .s10-logo-ods, .s10-logo-codesin, .s10-logo-pnud { 
        max-height: 45px; /* Más pequeños para que quepan horizontalmente */
        margin: 0; /* Reiniciamos márgenes personalizados en móvil */
    }
    .s10-pnud-header {
        width: 90%;
        white-space: normal; /* Permite que el texto baje a la siguiente línea */
        padding: 10px 15px;
        border-radius: 25px;
        top: -40px; /* Sube la etiqueta para que no tape tanto el texto */
    }
    .s10-pnud-title-new {
        font-size: 0.65rem;
        line-height: 1.4;
        text-align: center;
    }
    .s10-pnud-card {
        padding: 35px 20px 20px; /* Reduce acolchado lateral */
        margin-top: 20px;
    }
}
</style>
