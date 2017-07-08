// resources/assets/js/app.js

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();
    },

    methods: {
        fetchMessages() {
            //axios.get('/messages').then(response => {
                this.messages = {"user_name":"mohsin","message":"test"}
            //});
        },

        addMessage(message) {
            this.messages.push(message);

//            axios.post('/messages', message).then(response => {
//              console.log(response.data);
//            });
        }
    }
});



