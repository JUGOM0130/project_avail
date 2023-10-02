import '../bootstrap';

import {
    createApp,
} from 'vue/dist/vue.esm-bundler';


import Create from '@@/views/contact/create.vue'

let app = createApp({})
app.component("txa-compo",Create)
app.mount("#app")
