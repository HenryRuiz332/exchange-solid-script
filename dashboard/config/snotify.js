import Vue from 'vue';

Vue.prototype.$successNotify  = function () {
    this.$snotify.success('¡Carga exitosa!', 'Bien')
};

Vue.prototype.$errorNotify  = function () {
    this.$snotify.error('¡Ocurrió un error!', 'Error')
};

Vue.prototype.$errorNotifyImage = function () {
    this.$snotify.error('¡Ocurrió un error al subir la imagen!', 'Error')
};


Vue.prototype.$saveNotify  = function () {
    this.$snotify.success('Guardado Con éxito!', 'Guardado')
};

Vue.prototype.$updateNotify  = function () {
    this.$snotify.success('¡Actualizado con éxito!', 'Actualizado')
};

Vue.prototype.$trashedNotify  = function () {
    this.$snotify.success('¡Enviado a papelera!', 'Papelera')
};

Vue.prototype.$restoreNotify  = function () {
    this.$snotify.success('¡Restaurado con éxito!', 'Restaurado')
};

Vue.prototype.$hardDeleteNotify  = function () {
    this.$snotify.error('Acción Inautorizada.', 'Error')
};

Vue.prototype.$deleteNotify  = function () {
    this.$snotify.success('Eliminado con éxito.', 'Eliminado')
};

Vue.prototype.$unautorized  = function () {
    this.$snotify.error('Acción Inautorizada.', 'Error')
};