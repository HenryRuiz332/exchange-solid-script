<template>
  <div>
    <b-alert
      :show="dismissCountDown"
      dismissible
      variant="warning"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged"
    >
      This alert will dismiss after {{ dismissCountDown }} seconds...
    </b-alert>
    <b-button @click="showAlert" variant="info" class="m-1">
      Show alert with count-down timer
    </b-button>




    <div>
    <b-button @click="show = !show">Toggle overlay</b-button>
    <b-row class="text-center mt-3">
      <b-col md="6">
        <p>With rounding</p>
        <b-overlay :show="show" class="d-inline-block" rounded="circle">
          <b-img thumbnail rounded="circle" fluid src="https://picsum.photos/200/200/?image=54" alt="Image 1"></b-img>
        </b-overlay>
      </b-col>
      <b-col md="6">
        <p>Without rounding</p>
        <b-overlay :show="show" class="d-inline-block">
          <b-img thumbnail rounded="circle" fluid src="https://picsum.photos/200/200/?image=54" alt="Image 1"></b-img>
        </b-overlay>
      </b-col>
    </b-row>
  </div>





  <div>
    <b-button size="sm" @click="showBottom = !showBottom">
      {{ showBottom ? 'Hide' : 'Show' }} Fixed bottom Alert
    </b-button>
    <b-alert
      v-model="showBottom"
      class="position-fixed fixed-bottom m-0 rounded-0"
      style="z-index: 2000;"
      variant="warning"
      dismissible
    >
      Fixed position (bottom) alert!
    </b-alert>

  </div>





  <b-button @click="showToast">Show Toast with custom content</b-button>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        showBottom: false,
      showTop: false,
         show: true,
        dismissSecs: 5,
        dismissCountDown: 0,

        count: 0
      }
    },
    methods: {
      countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {
        this.dismissCountDown = this.dismissSecs
      },
      showToast() {
        // Use a shorter name for this.$createElement
        const h = this.$createElement
        // Increment the toast count
        this.count++
        // Create the message
        const vNodesMsg = h(
          'p',
          { class: ['text-center', 'mb-0'] },
          [
            h('b-spinner', { props: { type: 'grow', small: true } }),
            ' Flashy ',
            h('strong', 'toast'),
            ` message #${this.count} `,
            h('b-spinner', { props: { type: 'grow', small: true } })
          ]
        )
        // Create the title
        const vNodesTitle = h(
          'div',
          { class: ['d-flex', 'flex-grow-1', 'align-items-baseline', 'mr-2'] },
          [
            h('strong', { class: 'mr-2' }, 'The Title'),
            h('small', { class: 'ml-auto text-italics' }, '5 minutes ago')
          ]
        )
        // Pass the VNodes as an array for message and title
        this.$bvToast.toast([vNodesMsg], {
          title: [vNodesTitle],
          solid: true,
          variant: 'info'
        })
      }
    }
  }
</script>