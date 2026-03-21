<template>
    <section class="u-clearfix u-sectionBox-2">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="row">
            <div class="col-md-12">
                <input type="text" v-model="query" style="width:100%;">
            </div>
            <div class="container">
                <div class="row equal"  v-if="subcategory == 'pilares'">
                    <div class="col-md-2 col-xs-4">
                        <div class="card-subcategoria bibliotecaCard" @click="todo('pilares')">
                            <img src="/images/icon_todo.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title2 text-center">TODO</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4 pilares" v-for="(subcategory, index) in subcategories" :key="subcategory.id" v-if="subcategory.id_category == 9">
                        <div class="card-subcategoria bibliotecaCard" :class="{ 'active2': activeIndex === index}" @click="querySubcategory=subcategory.id,setActive(index)">
                            <img :src="subcategory.url_img" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title2 text-center">{{subcategory.nombre}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row equal" v-else>
                    <div class="col-md-8r col-xs-3" v-show="subcategory == 'ejes'">
                        <div class="card-subcategoria bibliotecaCard ejes"  @click="todo()">
                            <img src="/images/icon_todo.png" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <h5 class="card-title2 text-center">TODO</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8r col-xs-3" v-for="(subcategory2,index) in subcategories" :key="subcategory2.id" v-if="subcategory2.id_category == 10" v-show="subcategory == 'ejes'">
                        <div class="card-subcategoria bibliotecaCard ejes" :class="{ 'active2': activeIndex === index}"  @click="querySubcategory=subcategory2.id,setActive(index)">
                            <img :src="subcategory2.url_img" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title2 text-center">{{subcategory2.nombre}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-expanded-width u-list u-repeater u-list-1 grids" style="min-height:409px;">
          <div class="u-container-style u-custom-background u-list-item u-repeater-item u-shape-rectangle u-list-item-1" v-for="(item,index) in filteredItems" :key="item.id" v-if="index < limitationList">
            <div class="u-container-layout u-similar-container u-white u-container-layout-1">
              <p class="u-text u-text-default u-text-6" v-text="item.published_at"></p>
              <h3 class="u-text u-text-1" v-text="item.titulo"></h3>
              <span class="u-text badge badge-pill badge-primary codesin-badge" v-show="item.category_id != 11">{{item.subCategories_nombre}}</span>
              <p class="u-text u-text-default u-text-2" v-text="item.excerpt"></p>
              <div class="row">
                  <div class="col-xs-5">
                    <a :href="item.urlArchivo" class="u-btn u-button-style u-none u-btn-1" arget="_self" download>Descargar</a>
                  </div>
                  <div class="col-xs-7">
                    <shareSmall-container :title ="item.titulo" :hashtags="hash" :expert="item.excerpt" :url="fullPath + '?codecode='  +item.id"/>
                  </div>
                  </div>
              </div>
          </div>
        </div>
        <a href="#!" class="u-btn u-button-style u-none u-btn-4" @click="updateLimitation(limitationList)">Ver {{limitationList == 12 ? 'más' : 'menos'}}</a>
      </div>
    </section>
</template>
<script>
export default {
    props:['data'],
    props: {
        'data': {
            type: Array,
            required: true
        },
        'visible': {
            type: Boolean,
            required: false,
            default: true
        },
        'url': {
            type: String,
            required: false,
            default: 'home'
        },
        'subcategory': {
            type: String,
            required: false,
            default: 'pilares'
        },
        'subcategories':{
            type: Array,
            required: true
        }
    },
    data() {
        return {
            limitationList: 12,
            hash:'',
            query: '',
            querySubcategory: '',
            activeIndex: undefined,
            fullPath:  this.$route.fullPath.split('?')[0]
        }
    },
    computed: {
        filteredItems () {
            if (!this.query && !this.querySubcategory) return this.data

            if(!this.querySubcategory){
                return this.data.filter(item => {
                    return [
                    item.id,
                    item.published_at,
                    item.titulo,
                    item.excerpt,
                    item.urlArchivo
                    ].find(field => {
                    return field.toString().toLowerCase().includes(this.query.toLowerCase().trim())
                    })

                })
            }else{
                return this.data.filter(item => {
                    return [
                    item.subcategory_id
                    ].find(field => {
                    return field.toString().toLowerCase().includes(this.querySubcategory)
                    })
                })
            }

        }
    },
    methods:{
        updateLimitation(limitationList){
        if (this.limitationList == this.data.length) {
                this.limitationList = 12
            }else{
                this.limitationList = this.data.length
            }
        },
        img(obj){
            return obj.urlbannerHomeMobile ? obj.urlbannerHomeMobile : '../images/3.svg';
        },
        indicador(id){
          if(id == 1){
            return 'Min.';
          }
          if(id == 2){
            return 'Hrs.';
          }
        },
        todo(event){
            this.query = '';
            this.querySubcategory =''
            this.activeIndex=undefined

        },
        setActive(index) { this.activeIndex = index }
    },
}
</script>
<style>
.u-sectionBox-2 .u-sheet-1 {min-height: 575px}
.u-sectionBox-2 .u-list-1 {margin-top: 55px; margin-bottom: 0; min-height: /*661px*/auto; grid-template-columns: calc(33.3333% - 29px) calc(33.3333% - 29px) calc(33.3333% - 29px); grid-template-rows: auto; grid-gap: 44px 44px; height: auto}
.u-sectionBox-2 .u-list-item-1 {background-image: none;}
.u-sectionBox-2 .u-container-layout-1 {padding: 30px 0; height: 100%;}
.u-sectionBox-2 .u-image-1 {height: 319px; margin: -30px 0 0 -30px}
.u-sectionBox-2 .u-text-1 {margin: 19px 30px 0; font-size: 1rem; line-height: 24px; color: #4A4A4A; font-weight: bold;}
.u-sectionBox-2 .u-text-2 {margin: 30px 30px 0 30px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-image-2 {width: 24px; height: 24px; margin: 20px auto 0 30px}
.u-sectionBox-2 .u-text-3 {margin: -25px auto 0 69px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-image-3 {width: 24px; height: 24px; margin: 20px auto 0 30px}
.u-sectionBox-2 .u-text-4 {margin: -25px auto 0 69px; font-size: 1rem; line-height: 24px; color: #626262;}
.u-sectionBox-2 .u-image-4 {width: 24px; height: 24px; margin: 20px auto 0 30px}
.u-sectionBox-2 .u-text-5 {margin: -25px auto 0 69px}
.u-sectionBox-2 .u-btn-1 {font-size: 1rem; letter-spacing: 1px; border-style: none; font-weight: 700; text-transform: none; margin: 30px auto 0 30px; padding: 0; color: #007D80 !important;}
.u-sectionBox-2 .u-list-item-2 {background-image: none}
.u-sectionBox-2 .u-container-layout-2 {padding: 30px 0}
.u-sectionBox-2 .u-image-5 {height: 319px; margin: -30px 0 0 -30px}
.u-sectionBox-2 .u-text-6 { margin: -13px auto 0 30px; font-size: 0.625rem; line-height: 16px; color: #626262; }
.u-sectionBox-2 .u-btn-4 {border-style: none; font-weight: 700;  letter-spacing: 1px; margin: 30px auto 55px; padding: 0; color: #007D80 !important;}
.u-sectionBox-2 .u-btn-4.u-btn-4:hober { color: #007D80 !important; }

@media (max-width: 1199px){ .u-sectionBox-2 .u-sheet-1 {min-height: 342px}
.u-sectionBox-2 .u-list-1 {min-height: 545px; grid-template-columns: repeat(3, calc(33.333333333333336% - 29px))}
.u-sectionBox-2 .u-image-1 {height: 213px; margin-right: initial; margin-left: initial}
.u-sectionBox-2 .u-text-1 {margin-left: 0; margin-right: 0}
.u-sectionBox-2 .u-text-2 {margin-left: 0}
.u-sectionBox-2 .u-image-2 {margin-left: 0}
.u-sectionBox-2 .u-text-3 {width: auto; margin-top: -24px; margin-left: 57px}
.u-sectionBox-2 .u-image-3 {margin-top: 19px}
.u-sectionBox-2 .u-text-4 {width: auto; margin-top: -24px; margin-left: 57px}
.u-sectionBox-2 .u-image-4 {margin-top: 19px}
.u-sectionBox-2 .u-text-5 {width: auto; margin-top: -24px; margin-left: 57px}
.u-sectionBox-2 .u-btn-1 {width: 99px; height: 38px; margin-top: 73px; margin-left: 0}
.u-sectionBox-2 .u-image-5 {height: 213px; margin-right: initial; margin-left: initial}
}

@media (max-width: 991px){ .u-sectionBox-2 .u-sheet-1 {min-height: 744px}
.u-sectionBox-2 .u-list-1 {min-height: 1252px; grid-template-columns: repeat(2, calc(((100% - 720px) / 2)  + 338px))}
.u-sectionBox-2 .u-text-3 {margin-left: 44px}
.u-sectionBox-2 .u-text-4 {margin-left: 44px}
.u-sectionBox-2 .u-text-5 {margin-left: 44px}
 }

@media (max-width: 767px){
.u-sectionBox-2 .u-sheet-1 {min-height: auto}
.u-sectionBox-2 .u-list-1 {grid-gap: 0 0; grid-template-columns: 100%}
.u-sectionBox-2 .u-container-layout-1 {padding-top: 0}
.u-sectionBox-2 .u-image-1 {height: 344px; margin-right: initial; margin-left: initial}
.u-sectionBox-2 .u-text-1 {margin-right: auto}
.u-sectionBox-2 .u-text-3 {margin-top: -25px; margin-left: 43px}
.u-sectionBox-2 .u-image-3 {margin-top: 20px}
.u-sectionBox-2 .u-text-4 {margin-left: 43px}
.u-sectionBox-2 .u-text-5 {margin-top: -25px; margin-left: 43px}
.u-sectionBox-2 .u-btn-1 {margin-top: 74px}
.u-sectionBox-2 .u-container-layout-2 {padding-top: 0}
.u-sectionBox-2 .u-image-5 {height: 344px; margin-right: initial; margin-left: initial}
 }

@media (max-width: 575px){ .u-sectionBox-2 .u-image-1 {height: 212px; margin-right: initial; margin-left: initial}
.u-sectionBox-2 .u-text-3 {margin-top: -26px; margin-left: 42px}
.u-sectionBox-2 .u-image-3 {margin-top: 21px}
.u-sectionBox-2 .u-text-4 {margin-left: 42px}
.u-sectionBox-2 .u-text-5 {margin-left: 42px}
.u-sectionBox-2 .u-image-5 {height: 212px; margin-right: initial; margin-left: initial}
 }
</style>
