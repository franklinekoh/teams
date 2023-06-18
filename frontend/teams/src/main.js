import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'

import { library } from '@fortawesome/fontawesome-svg-core'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import VueAwesomePaginate from "vue-awesome-paginate"

import "vue-awesome-paginate/dist/style.css"

// import Toast, { POSITION } from 'vue-toastification';
import "vue-toastification/dist/index.css"

import './style.css'

/* import specific icons */
import { faSquarePlus, faEye, faArrowLeft, faCartShopping, faFloppyDisk } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faSquarePlus, faEye, faArrowLeft, faCartShopping, faFloppyDisk)

const app = createApp(App)

app.component('font-awesome-icon', FontAwesomeIcon)

app.use(VueAwesomePaginate)

// app.use(Toast, {
//     position: POSITION.TOP_RIGHT,
//     transition: "Vue-Toastification__bounce",
//     maxToasts: 20,
//     newestOnTop: true
// });

app.mount('#app')
