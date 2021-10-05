import Vue from 'vue'
import {library, config} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

// import { } from '@fortawesome/free-regular-svg-icons'
import {
  faUser,
  faLock,
  faSignOutAlt,
  faCog,
  faChartPie,
  faBriefcaseMedical,
  faCartPlus,
  faBellSlash,
  faBolt,
  faChartBar,
  faExclamationCircle,
  faChartArea,
  faReceipt,
  faCapsules,
  faHospitalUser
} from '@fortawesome/free-solid-svg-icons'

import {
  faGithub
} from '@fortawesome/free-brands-svg-icons'

config.autoAddCss = false

library.add(
  faReceipt,faCapsules,faHospitalUser,
  faUser, faLock, faSignOutAlt, faCog, faGithub, faChartPie, faBriefcaseMedical, faChartArea,
  faCartPlus, faBellSlash, faBolt, faChartBar, faExclamationCircle
)

Vue.component('Fa', FontAwesomeIcon)
