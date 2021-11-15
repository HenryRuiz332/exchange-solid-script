import Vue from 'vue'
import VueProgressBar from 'vue-progressbar'


const VueProgessBarOptions = {
      color: '#F9C91A',//'#00F700',
      failedColor : '#874b4b',
      thickness: '5px',
      transition: {
      speed: '0.4s',
      opacity: '0.6s',
      termination: 300
 },
 autoRevert:  true,
 location: 'top',
 inverse: false
}
Vue.use(VueProgressBar, VueProgessBarOptions);


export default new VueProgressBar(VueProgessBarOptions)
