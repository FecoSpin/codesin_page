<template>
    <div class="col-sm-12 col-xs-12"
        :class="{'col-md-2' : zonas.length == 1, 'col-md-4' : zonas.length == 2, 'col-md-6' : zonas.length == 3, 'col-md-8' : zonas.length == 4, 'col-md-10' : zonas.length == 5, 'col-md-12' : zonas.length >= 5}" 
    >
        <div class="titulo-zonas text-center mtb-40">
            <h2>{{title}}</h2>
        </div>
        <div class="row equal">
            <div class="col-sm-4 col-xs-6" 
                :class="{'col-md-12' : zonas.length == 1, 'col-md-6' : zonas.length == 2, 'col-md-4' : zonas.length == 3, 'col-md-3' : zonas.length == 4, 'col-md-2' : zonas.length == 5, 'col-md-2' : zonas.length >= 5}" 
                v-for="(zona, index) in zonas" :key="index">
                <div class="card-staff mb-4 o-hidden default-bg"><img class="card-staff-img-top" :src="getImg(zona.urlimg)" alt="">
                    <div class="card-staff-body ">
                        <h5 class="card-staff-title text-center"><p v-text="zona.name"></p></h5>
                        <p class="card-staff-text text-gray text-center" v-text="zona.job"></p>
                    </div>
                </div>
            </div>
         </div>
    </div>
</template>
<script>
export default {
    props:['zonas', 'title'],
     methods:{
        getImg(img){
            return img ? img : 'img/default/user.png';
        }
    }
}
</script>