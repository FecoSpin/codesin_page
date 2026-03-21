<template>
    <section class="u-clearfix u-section-5">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-21 u-size-xs-60 u-image-1" v-bind:style="{ backgroundImage: 'url(' + image + ')', backgroundPosition:'50% 50%'}" data-image-width="150" data-image-height="150">
                <div class="u-container-layout u-container-layout-1"></div>
              </div>
              <div class="u-align-left u-container-style u-grey-5 u-layout-cell u-right-cell u-size-39 u-size-xs-60 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-custom-font u-text u-text-1">Contacto</h1>
                  <p class="u-text u-text-2">(667) 712 8232&nbsp;<br>(667) 715 1920
                  </p>
                  <span class="u-icon u-icon-circle u-text-palette-1-base u-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 24 24" id="svg-2060"><title></title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="V2---1.1-Home" transform="translate(-158.000000, -4319.000000)"><g id="Footer" transform="translate(0.000000, 4124.000000)"><g id="call-24px-(1)" transform="translate(158.000000, 195.000000)"><polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon><path d="M19.23,15.26 L16.69,14.97 C16.08,14.9 15.48,15.11 15.05,15.54 L13.21,17.38 C10.38,15.94 8.06,13.63 6.62,10.79 L8.47,8.94 C8.9,8.51 9.11,7.91 9.04,7.3 L8.75,4.78 C8.63,3.77 7.78,3.01 6.76,3.01 L5.03,3.01 C3.9,3.01 2.96,3.95 3.03,5.08 C3.56,13.62 10.39,20.44 18.92,20.97 C20.05,21.04 20.9900975,20.1 20.9900975,18.97 L20.9900975,17.24 C21,16.23 20.24,15.38 19.23,15.26 Z" id="Path" fill="#4A4A4A" fill-rule="nonzero"></path></g></g></g></g></svg>
                  </span>
                  <p class="u-text u-text-3"> Pedro Infante 2911, interior 505 y 506, edificio Country Courts Centro de Negocios. Desarrollo Urbano Tres Ríos. Culiacán, Sinaloa.</p>
                  <span class="u-icon u-icon-circle u-text-palette-1-base u-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 24 24" id="svg-0fb7"><title></title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="V2---1.1-Home" transform="translate(-360.000000, -4319.000000)"><g id="Footer" transform="translate(0.000000, 4124.000000)"><g id="place-24px" transform="translate(360.000000, 195.000000)"><polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon><path d="M12,12 C13.1,12 14,11.1 14,10 C14,8.9 13.1,8 12,8 C10.9,8 10,8.9 10,10 C10,11.1 10.9,12 12,12 Z M12,2 C16.2,2 20,5.22 20,10.2 C20,13.38 17.55,17.12 12.66,21.43 C12.28,21.76 11.71,21.76 11.33,21.43 C6.45,17.12 4,13.38 4,10.2 C4,5.22 7.8,2 12,2 Z" id="Shape" fill="#4A4A4A" fill-rule="nonzero"></path></g></g></g></g></svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>
<script>
export default {
    // props:['noticias', 'vermas']
    props:['tipo'],
    data(){
			return{
                image: '../images/business.jpeg'
			}
		},
}
</script>
<style>
.u-section-5 {min-height: 570px}
.u-section-5 .u-sheet-1 {min-height: 605px}
.u-section-5 .u-layout-wrap-1 {margin: 60px auto}
.u-section-5 .u-image-1 {min-height: 485px; }
.u-section-5 .u-container-layout-1 {padding: 30px 60px}
.u-section-5 .u-layout-cell-2 {min-height: 485px}
.u-section-5 .u-container-layout-2 {padding: 30px 60px; background: #FFF;}
.u-section-5 .u-text-1 {font-weight: 700; margin: 79px 0 0; color: #4A4A4A; font-size: 32px; line-height: 43px;}
.u-section-5 .u-text-2 {line-height: 2; margin: 59px 45px 0 34px; color: #4A4A4A; font-size: 16px; line-height: 32px;}
.u-section-5 .u-icon-1 {height: 24px; width: 24px; margin: -58px 597px 0 auto}
.u-section-5 .u-text-3 {line-height: 2; margin: 60px 11px 0 34px; color: #4A4A4A; font-size: 16px; line-height: 32px;}
.u-section-5 .u-icon-2 {height: 24px; width: 24px; margin: -59px 597px 0 auto}

@media (max-width: 1199px){ .u-section-5 .u-sheet-1 {min-height: 570px}
.u-section-5 .u-layout-wrap-1 {min-height: 315px; margin-right: initial; margin-left: initial}
.u-section-5 .u-image-1 {min-height: 400px; background-position: 50% 50%}
.u-section-5 .u-layout-cell-2 {min-height: 400px}
.u-section-5 .u-text-2 {width: auto; margin-right: 0; margin-left: 40px}
.u-section-5 .u-icon-1 {margin-right: auto; margin-left: 0}
.u-section-5 .u-text-3 {width: auto; margin-right: 0; margin-left: 40px}
.u-section-5 .u-icon-2 {margin-top: -91px; margin-right: auto; margin-left: 0} }

@media (max-width: 991px){ .u-section-5 {min-height: 437px}
.u-section-5 .u-sheet-1 {min-height: 437px}
.u-section-5 .u-image-1 {min-height: 306px}
.u-section-5 .u-container-layout-1 {padding-left: 30px; padding-right: 30px}
.u-section-5 .u-layout-cell-2 {min-height: 352px}
.u-section-5 .u-container-layout-2 {padding-left: 30px; padding-right: 30px}
.u-section-5 .u-text-1 {margin-top: 26px}
.u-section-5 .u-text-2 {margin-top: 40px}
.u-section-5 .u-icon-1 {margin-top: -64px}
.u-section-5 .u-text-3 {margin-top: 55px} }

@media (max-width: 767px){ .u-section-5 {min-height: 328px}
.u-section-5 .u-sheet-1 {min-height: 328px}
.u-section-5 .u-layout-wrap-1 {min-height: 413px; margin-right: initial; margin-left: initial}
.u-section-5 .u-image-1 {min-height: 656px}
.u-section-5 .u-container-layout-1 {padding-left: 10px; padding-right: 10px}
.u-section-5 .u-layout-cell-2 {min-height: 384px}
.u-section-5 .u-container-layout-2 {padding-left: 10px; padding-right: 10px}
.u-section-5 .u-text-3 {margin-left: 34px}
.u-section-5 .u-icon-2 {margin-top: -90px} }

@media (max-width: 575px){ .u-section-5 {min-height: 207px}
.u-section-5 .u-sheet-1 {min-height: 207px}
.u-section-5 .u-layout-wrap-1 {min-height: 170px; margin-right: initial; margin-left: initial}
.u-section-5 .u-image-1 {min-height: 277px}
.u-section-5 .u-layout-cell-2 {min-height: 389px}
.u-section-5 .u-text-1 {margin-top: 10px}
.u-section-5 .u-text-2 {margin-top: 70px; margin-left: 34px}
.u-section-5 .u-icon-1 {margin-top: -53px}
.u-section-5 .u-text-3 {margin-top: 47px}
.u-section-5 .u-icon-2 {margin-top: -128px} 
}
</style>