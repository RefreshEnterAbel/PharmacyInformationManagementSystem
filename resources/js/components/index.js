import Vue from 'vue'
import Card from './Card'
import Child from './Child'
import Sidebar from './Sidebar'
import Header from './Header'
import Checkbox from './Checkbox'
import { Button, HasError, AlertError, AlertSuccess } from 'vform/src/components/tailwind'

// Components that are registered global.
[
  Card,
  Sidebar,
  Header,
  Child,
  Button,
  Checkbox,
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component)
})
