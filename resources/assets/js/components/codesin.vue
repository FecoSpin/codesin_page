<template>
    <div class="row">
        <div class="container">
            <div class="about-pills">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#consejo" data-toggle="tab">Consejo</a></li>
                    <li><a href="#staff" data-toggle="tab">Staff</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="consejo">
                        <div class="row">
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
                    </div>
                    <div class="tab-pane fade" id="staff">
                        <div class="row">
                            <div class="titulo-staff text-center mtb-40">
                                <h2>Oficina Estatal</h2>
                            </div>
                            <staff-area :staffs="estatales"/>
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
    </div>
</template>
