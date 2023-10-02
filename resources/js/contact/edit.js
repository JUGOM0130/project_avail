import '../bootstrap';

import {
    createApp,
} from 'vue/dist/vue.esm-bundler';


import Edit from '@@/views/contact/edit.vue'


let edit = createApp({})
edit.component("txa-compo",Edit)
edit.mount("#app")
