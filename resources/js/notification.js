import Vue from 'vue'

Vue.prototype.$successbvToast = function (message, append = false, variant = null) {
    this.toastCount++
     // this.$bvToast.toast(`Module Update Successfully ${this.toastCount}`
    this.$bvToast.toast(message, {
        title: `Actualizado`,
        autoHideDelay: 10000,
        appendToast: append,
        solid: true,
        variant: 'success'

    })
};

Vue.prototype.$errorbvToast = function (append = false, variant = null) {
    
    this.toastCount++
    this.$bvToast.toast(`Verifique los campos`, {
        title: `Error en al enviar datos`,
        autoHideDelay: 10000,
        appendToast: append,
        solid: true,
        variant: 'danger'

    })
};


Vue.prototype.$deletebvToast = function (message, append = false, variant = null) {
    this.toastCount++
    this.$bvToast.toast(message, {
        title: `Modulo actualizado. Item borrado`,
        autoHideDelay: 10000,
        appendToast: append,
        solid: true,
        variant: 'warning'

    })
};