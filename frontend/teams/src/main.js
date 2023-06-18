import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'

import { library } from '@fortawesome/fontawesome-svg-core'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import VueAwesomePaginate from "vue-awesome-paginate"

import "vue-awesome-paginate/dist/style.css"

import './style.css'

/* import specific icons */
import { faSquarePlus, faEye, faArrowLeft, faCartShopping, faFloppyDisk } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faSquarePlus, faEye, faArrowLeft, faCartShopping, faFloppyDisk)

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon)
// app.component(VModal)

app.use(VueAwesomePaginate)

app.mount('#app')
