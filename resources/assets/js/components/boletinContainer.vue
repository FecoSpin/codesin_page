<template>
    <section class="u-clearfix u-white u-section-6" id="sec-b34c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-21 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
                  <img src="/images/newsletter.png" alt="" class="u-image u-image-default u-image-1" data-image-width="270" data-image-height="213">
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-right-cell u-size-39 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-custom-font u-text u-text-font u-title u-text-1">Recibe novedades en exclusiva</h1>
                  <p class="u-text u-text-2">Suscríbete a nuestro boletín y entérate del desarrollo económico de Sinaloa</p>
                  <div class="u-form u-form-1">
                    <form class="u-clearfix u-form-horizontal u-form-spacing-30 u-inner-form" style="padding: 16px;" source="custom">
                      <div class="u-form-email u-form-group u-form-group-1">
                        <label for="email" class="u-form-control-hidden u-label"></label>
                        <input type="email" placeholder="ejemplo@correo.com" id="email" v-model="email" name="email" class="u-border-2 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="required">
                      </div>
                      <div class="u-form-group u-form-submit u-form-group-2">
                        <button type="button" @click="sendEmail" class="u-btn u-btn-round u-btn-submit u-button-style u-custom-color-4 u-radius-12 u-btn-1">Enviar</button>
                      </div>
                      <div class="u-form-send-message u-form-send-success">Gracias! Se le enviara un correo de verificación.</div>
                      <div class="u-form-send-error u-form-send-message" v-text="error"></div>
                    </form>
                  </div>
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
    data(){
			return{
        email: "",
        resp:null,
        error:''
      }
    },
    methods:{
      sendEmail(){
        axios.post('/api/email2', {email:this.email})
				.then((res) => {
          this.email = "";
          if(res.data.status == 'success'){
            $('.u-form-send-success').css("display", "block");
            setTimeout(function() {
                $('.u-form-send-success').fadeOut('fast');
            }, 4000);
          }else{
            this.error = res.data.msg;
            $('.u-form-send-error').css("display", "block");
            setTimeout(function() {
                $('.u-form-send-error').fadeOut('fast');
            }, 4000);
          }

				})
				.catch((err) =>{
					this.error = err.message;
            $('.u-form-send-error').css("display", "block");
            setTimeout(function() {
                $('.u-form-send-error').fadeOut('fast');
            }, 4000);
					$('#lock').addClass('hidden');});
      }
    }
}
</script>
<style>
.u-section-6 {background-image: none}
.u-section-6 .u-sheet-1 {min-height: 427px}
.u-section-6 .u-layout-wrap-1 {margin: 30px auto 60px}
.u-section-6 .u-layout-cell-1 {min-height: 367px}
/* .u-section-6 .u-container-layout-1 {padding: 30px} */
.u-section-6 .u-image-1 {width: 100%; height: auto; margin: 53px auto}
.u-section-6 .u-layout-cell-2 {min-height: 367px}
.u-section-6 .u-container-layout-2 {padding: 30px 0 30px 30px}
.u-section-6 .u-text-1 {font-weight: 700; font-size: 2rem; margin: 27px 0 0; line-height: 40px; color: #4A4A4A;}
.u-section-6 .u-text-2 {font-size: 1.25rem; margin: 42px 7px 0 0; line-height: 28PX; color: #626262;}
.u-section-6 .u-form-1 {height: 79px; margin: 42px 220px 0 -12px}
.u-section-6 .u-form-group-1 {width: 100%}
.u-section-6 .u-form-group-2 {width: 100%}
.u-section-6 input  {border-bottom: solid #979797; color: #626262; }
.u-section-6 .u-btn-1 {border-style: none; background-image: none; font-weight: 700; height: 52px; width: 148px; background: #FFAA00; color: #121212; padding: 17px;}

@media (max-width: 1199px){
.u-section-6 .u-sheet-1 {min-height: 363px}
.u-section-6 .u-layout-wrap-1 {margin-bottom: 30px; margin-right: initial; margin-left: initial}
.u-section-6 .u-layout-cell-1 {min-height: 303px}
.u-section-6 .u-text-2 {margin-right: 0}
.u-section-6 .u-form-1 {margin-top: 18px; margin-right: 106px; margin-left: 0} }

@media (max-width: 991px){
.u-section-6 .u-sheet-1 {min-height: 292px}
.u-section-6 .u-layout-cell-1 {min-height: 367px}
.u-section-6 .u-image-1 {margin-top: 0; margin-bottom: 0; height: auto;}
.u-section-6 .u-layout-cell-2 {min-height: 100px}
.u-section-6 .u-form-1 {margin-right: 0} }

@media (max-width: 767px){
.u-section-6 .u-sheet-1 {min-height: 849px}
.u-section-6 .u-layout-cell-1 {min-height: 261px}
/* .u-section-6 .u-container-layout-1 {padding-left: 10px; padding-right: 10px} */
.u-section-6 .u-image-1 {margin-left: auto; height: auto;}
.u-section-6 .u-layout-cell-2 {min-height: 115px}
.u-section-6 .u-container-layout-2 {padding-left: 10px}
.u-section-6 .u-form-1 {height: 158px; margin-top: 34px; margin-right: 19px; margin-bottom: -8px} }

@media (max-width: 575px){
.u-section-6 .u-sheet-1 {min-height: 591px}
.u-section-6 .u-layout-cell-2 {min-height: 100px}
.u-section-6 .u-form-1 {margin-top: 26px; margin-right: 10px}
}
</style>
