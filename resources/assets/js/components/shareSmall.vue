<template>
    <section class="u-clearfix u-sectionBox-2 mt-24" id="share-network-list">
      <ShareNetwork
                v-for="network in networks"
                :network="network.network"
                :key="network.network"
                :style="{backgroundColor: network.color}"
                :url="sharing.url"
                :title="sharing.title"
                :description="sharing.description"
                :hashtags="sharing.hashtags"
                :twitterUser="sharing.twitterUser"
            >
                <i :class="network.icon"></i>
            </ShareNetwork>
    </section>
</template>
<script>
export default {
    props: {
        'title': {
            type: String,
            required: true
        },
        'hashtags': {
            type: String,
            required: true
        },
        'expert': {
            type: String,
            required: true
        },
        'url': {
            type: String,
            required: false,
            default: ''
        }
    },
    data() {
        return {
            sharing: {
                // url: process.env.MIX_APP_URL+this.url,
                url: "https://codesin.mx"+this.url,
                title: this.title,
                description: this.expert,
                // quote: 'The hot reload is so fast it\'s near instant. - Evan You',
                hashtags: this.hashtags,
                twitterUser: 'codesin'
            },
            networks: [
                { network: 'facebook', name: 'Facebook', icon: 'far fah fa fa-facebook', color: '#1877f2' },
                { network: 'twitter', name: 'Twitter', icon: 'far fah fa fa-twitter', color: '#1da1f2' },
                { network: 'whatsapp', name: 'Whatsapp', icon: 'far fah fa fa-whatsapp', color: '#25d366' },
            ]
        }
    },
    mounted() {
        // console.log(this.url);
    }
}
</script>
<style>
#share-network-list {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 1000px;
    margin: auto;
}
a[class^="share-network-"] {
    flex: none;
    color: #FFFFFF;
    background-color: #333;
    border-radius: 3px;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    align-content: center;
    align-items: center;
    cursor: pointer;
    margin: 0 10px 10px 0;
}
a[class^="share-network-"] span {
    padding: 0 10px;
    flex: 1 1;
    font-weight: 500;
}
a[class^="share-network-"] .fah {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 10px;
    flex: 0 1 auto;
}
.fab, .far {
    font-weight: 400;
}
</style>
