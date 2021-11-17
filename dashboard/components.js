import Vue from 'vue'


//Global
Vue.component('paginate', require('./global_components/PaginationComponent.vue').default);

Vue.component('preloader-global', require('./global_components/PreloaderComponent.vue').default);
// Vue.component('notifi-crud', require('./global_components/admin/crud/NotificationCrud.vue').default); 
// Vue.component('notifi-delete', require('./global_components/admin/crud/NotificationDeleteCrud.vue').default); 



Vue.component('admin', require('./components/admin/AdminApp.vue').default);


Vue.prototype.$successbvToast = function (message, append = false, variant = null) {
    this.toastCount++
     // this.$bvToast.toast(`Module Update Successfully ${this.toastCount}`
    this.$bvToast.toast(message, {
        title: `Success`,
        autoHideDelay: 10000,
        appendToast: append,
        solid: true,
        variant: 'success'

    })
};

Vue.prototype.$errorbvToast = function (message, append = false, variant = null) {
    
    this.toastCount++
    this.$bvToast.toast(message, {
        title: `Error`,
        autoHideDelay: 10000,
        appendToast: append,
        solid: true,
        variant: 'danger'

    })
};


Vue.prototype.$deletebvToast = function (message, append = false, variant = null) {
    this.toastCount++
    this.$bvToast.toast(message, {
        title: `Update Module. Item Deleted`,
        autoHideDelay: 10000,
        appendToast: append,
        solid: true,
        variant: 'warning'

    })
};

// Vue.prototype.$errorNotifyImage = function () {
//     this.$snotify.error('¡Ocurrió un error al subir la imagen!', 'Error')
// };


// Vue.prototype.$saveNotify  = function () {
//     this.$snotify.success('Guardado Con éxito!', 'Guardado')
// };

// Vue.prototype.$updateNotify  = function () {
//     this.$snotify.success('¡Actualizado con éxito!', 'Actualizado')
// };

// Vue.prototype.$trashedNotify  = function () {
//     this.$snotify.success('¡Enviado a papelera!', 'Papelera')
// };

// Vue.prototype.$restoreNotify  = function () {
//     this.$snotify.success('¡Restaurado con éxito!', 'Restaurado')
// };

// Vue.prototype.$hardDeleteNotify  = function () {
//     this.$snotify.error('Acción Inautorizada.', 'Error')
// };

// Vue.prototype.$deleteNotify  = function () {
//     this.$snotify.success('Eliminado con éxito.', 'Eliminado')
// };

// Vue.prototype.$unautorized  = function () {
//     this.$snotify.error('Acción Inautorizada.', 'Error')
// };