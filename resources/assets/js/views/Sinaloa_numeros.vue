<template>
    <section>
        <div class="row">
            <div class="containerIframe">
                 <iframe src="https://gestori.codesin.mx/indicadoreseconomicos_public.php" class="responsive-iframe" frameborder="0"></iframe>
            </div> 
        </div>
        <div class="row">
            <div class="containerIframe">
                <iframe src="https://gestori.codesin.mx/comparativos_public.php" class="responsive-iframe" frameborder="0"></iframe>
            </div>
            
        </div>
        
        <!-- <div class="row">
            <div class="container">
                <div class="row">
                    <div class="sm-12 title f32 text-center mb-60 mt-80">
                        <h2>Indicadores Económicos</h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="s-cards">
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        Inversión extranjera directa
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">44.95 </span> <strong>MMD</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">4° Trim. 2019</div>
                                            <div class="right extrabold">-4.85%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">24/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">47.25</span>  MDD</div>
                                            <div class="right ">4º Trim. 2018</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        Inversión privada
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">18,240 </span> <strong>MDP</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">2019</div>
                                            <div class="right extrabold">-40.68%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ene-sep 2019</div>
                                            <div class="right extrabold"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">30,747</span> MDP</div>
                                            <div class="right ">2018</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        Empleo generado
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">11,585 </span> <strong>Empleos</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ene 2019 - Ene 2020</div>
                                            <div class="right extrabold">+2.04%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">14/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">580,209</span> Empleo total</div>
                                            <div class="right">Ene 2020</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">568,624</span> Empleo total</div>
                                            <div class="right">Ene 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        PIB per cápita
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">157,802 </span> <strong>Pesos</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">2018</div>
                                            <div class="right extrabold">+5.58%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">18/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">149,466</span> Pesos</div>
                                            <div class="right ">Ene 2020</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">568,624</span> Empleo total</div>
                                            <div class="right">Ene 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        PIB
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">395,849.29 </span> <strong>MDP</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">2018</div>
                                            <div class="right extrabold">+2.71%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">17/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">385,388.82 MDP</div>
                                            <div class="right extrabold">2017</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        Población
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">2,966,321 </span> <strong>Personas</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">2015</div>
                                            <div class="right extrabold">+7.17%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">15/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">2,767,761 Personas</div>
                                            <div class="right extrabold">2017</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        Desempleo
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">2.89% </span>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Feb 2020</div>
                                            <div class="right extrabold">-19.18%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">16/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">3.57%</div>
                                            <div class="right extrabold">Feb 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-constainer">
                                    <div class="s-card-title text-left">
                                        Patrones
                                    </div>
                                    <hr>
                                    <div class="text-left">
                                        <span class="s-card-contenido-1">40,696</span> <strong> Patrones</strong>
                                    </div>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Feb 2020</div>
                                            <div class="right extrabold">+3.93%</div>
                                        </div>
                                    </div>
                                    <div class="row mt-10 mb-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left">Ranking Vs. Nacional</div>
                                            <div class="right extrabold">16/32</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-16">
                                        <div class="s-card-contenido-small">
                                            <div class="left"><span class="extrabold">39,158</span> Patrones</div>
                                            <div class="right">Feb 2019</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-title text-left">
                                    Remesas
                                </div>  
                                <hr>
                                <div class="text-left">
                                    <span class="s-card-contenido-1">241.24</span> <strong> MDD</strong>
                                </div>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">4º Trim. 2019</div>
                                        <div class="right extrabold">+7.75%</div>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">Ranking Vs. Nacional</div>
                                        <div class="right extrabold">13/32</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left"><span class="extrabold">223.88</span> MDD</div>
                                        <div class="right">4º Trim. 2018</div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-title text-left">
                                    Contrucción
                                </div>  
                                <hr>
                                <div class="text-left">
                                    <span class="s-card-contenido-1">453.07</span> <strong> MDP</strong>
                                </div>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">Ene 2020</div>
                                        <div class="right extrabold">-24.57%</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left"><span class="extrabold">600.62</span> MDP</div>
                                        <div class="right">Ene 2019</div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-title text-left">
                                    Competitividad
                                </div>  
                                <hr>
                                <div class="text-left">
                                    <span class="s-card-contenido-1">3.55%</span>
                                </div>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">Feb 2020</div>
                                        <div class="right extrabold"></div>
                                    </div>
                                </div>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">Ranking Vs. Nacional</div>
                                        <div class="right extrabold">20/46</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left"><span class="extrabold">3.70%</span></div>
                                        <div class="right">Feb 2020</div>
                                    </div>
                                </div>
                            </div>
                            <div class="s-card">
                                <div class="card-box-icon text-left">
                                    <img src="/img/icons/up.svg" alt="" v-if="positivo">
                                    <img src="/img/icons/down.svg" alt="" v-else>
                                </div>
                                <div class="s-card-title text-left">
                                    Inflación
                                </div>  
                                <hr>
                                <div class="text-left">
                                    <span class="s-card-contenido-1">3.55%</span>
                                </div>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">Feb 2020</div>
                                        <div class="right extrabold"></div>
                                    </div>
                                </div>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left">Ranking Vs. Nacional</div>
                                        <div class="right extrabold">20/46</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-16">
                                    <div class="s-card-contenido-small">
                                        <div class="left"><span class="extrabold">3.70%</span></div>
                                        <div class="right">Feb 2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="sm-12 title f32 text-center mb-60 mt-80">
                    <h2>Comparativo de indicadores</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-60">
                        <div class="">
                            <div class="f-container">
                                <div class="f-form-group">
                                    <div class="s-constainer">
                                        <label for="">Indicador</label>
                                        <select name="" id="">
                                            <option value="">Selecciona</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="f-form-group">
                                    <div class="s-constainer">
                                        <label for="">Gráfica</label>
                                        <select name="" id="">
                                            <option value="">Selecciona</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="f-form-group">
                                    <div class="s-constainer">
                                        <label for="">Grupo</label>
                                        <select name="" id="">
                                            <option value="">Selecciona</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="f-form-group">
                                    <div class="s-constainer">
                                        <label for="">Lugar</label>
                                        <select name="" id="">
                                            <option value="">Selecciona</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="f-form-group">
                                    <div class="btn-s-container">
                                        <button class="btn btn-generar">Generar comparativo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
       
        <div id="myDiv"></div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                authors: [],
                categories: [],
                posts: [],
                positivo: true,
                estrategias: 12, 
            }
        },  
        mounted() {
            $('#lock').addClass('hidden');
        }
    }
</script>
<style>
.containerIframe {
  position: relative;
  width: 99%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
@media (min-width: 320px) {

  iframe {

    width: 200px;

    height: 150px;

  }

}




/* Pantalla 768px o superior */

@media (min-width: 768px) {

  iframe {

    width: 500px;

    height: 350px;

  }

}

.s-card{ 
    background-color: #FFF;
    color: #4A4A4A;
    padding: 1rem;
    height: 19.563rem;
    width: 100%;
    max-width: 26.25rem;
    font-family: "Open Sans";
    }
.s-cards {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-gap: 1.7rem;
    grid-template-columns: repeat(4, 1fr);
}
.s-card hr {margin-top: 16px;  margin-bottom: 15px;}
.s-card-title{
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 1rem;
  font-weight: bold;
  letter-spacing: 0.4px;
  line-height: 24px;
}
.s-card-contenido-1{
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 28px;
  font-weight: bold;
  letter-spacing: 0;
  line-height: 30px;
}
.s-card-contenido-small{
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 0;
  line-height: 17px;
}
.s-card-constainer strong{
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 18px;
  font-weight: bold;
  letter-spacing: 0;
  line-height: 30px;
}
.s-card-contenido-small .extrabold{
    color: #4A4A4A;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0;
    line-height: 17px;
}

.f-container label {
  display: block;
  margin: .5em 0 0 0;
  color: #4A4A4A;
  font-family: "Open Sans";
  font-size: 16px;
  font-weight: bold;
  letter-spacing: 0;
  line-height: 26px;
  padding-bottom: 16px;
}
select {
  box-sizing: border-box;
  height: 56px;
  width: 100%; /*tamaño original 202px*/
  border: 1px solid #C6C6C6;
  border-radius: 8px;
  background-color: #FFFFFF;
  padding: 0 16px;
}

.btn-s-container { margin-top: 25%; }

.btn-generar{
    border-radius: 12px;
    background-color: #007D80;
    color: #FFFFFF;
    font-family: "Open Sans";
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 26px;
    text-align: center;
    height: 56px;
}

.f-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-gap: 1.7rem;
    grid-template-columns: repeat(5, 1fr);
}
.f-form-group{
    color: #4A4A4A;
    width: 100%;
    max-width: 12.625rem;
    font-family: "Open Sans";
}
@media (max-width: 767px) {
    .btn-s-container { margin-top: 0; }
}
</style>
