<template>
    <div class="banner-area-wrapper">
            <div class="banner-area text-center" v-bind:style="{ backgroundImage: 'url(' + img + ')' }">	
                <div class="notice-video" v-if="page.urlvideo">
					<div class="video-icon video-hover">
						<a class="video-popup" :href="page.urlvideo">
							<img src="img/icons/Play.svg" alt="">
						</a>
					</div>
				</div>
            </div>
        </div>
</template>
<script>
export default {
    props:['page', 'img'],
    data() {
        return {
        }
    },
    updated: function () {
    this.$nextTick(function () {
         $('.video-popup').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                zoom: {
                    enabled: true,
                },
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
        })
    }
}
</script>