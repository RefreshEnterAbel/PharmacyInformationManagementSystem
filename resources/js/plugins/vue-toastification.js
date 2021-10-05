import Vue from 'vue'
import Toast from 'vue-toastification'
const options = {
  // You can set your default options here
  transition: 'Vue-Toastification__bounce',
  maxToasts: 20,
  newestOnTop: true,
  closeOnClick: true,
  pauseOnFocusLoss: true,
  pauseOnHover: true,
  draggable: true,
  draggablePercent: 0.6,
  showCloseButtonOnHover: true,
  hideProgressBar: false,
  closeButton: 'button',
  rtl: false,
  position: 'top-center',
  timeout: 5000,
  icon: true
}
Vue.use(Toast, options)
