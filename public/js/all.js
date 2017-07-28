// resources/assets/js/app.js
//import ChatMessages from 'ChatMessages.vue'
//import ChatForm from 'ChatForm.vue'
//console.log(ChatMessages);
Vue.component('chat-messages', {template:`<ul class="chat">
        <li class="left clearfix chatter" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{message.msg}}
                    </strong>
                </div>
                <p>
                    
                </p>
            </div>
        </li>
    </ul>`,props: ['messages']});
Vue.component('chat-form', {template:`<div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>`,props: ['user'],data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        } });

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();
        console.log(this.messages);
    },

    methods: {
        fetchMessages() {
            //axios.get('/messages').then(response => {
                this.messages = [{"user_name":"mohsin","msg":"test"}];
            //});
        },

        addMessage(message) {
            console.log(message);
            this.messages.push(message);

            //xios.post('/messages', message).then(response => {
              //console.log(response.data);
            //});
        }
    }
});

import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '8e3f0b98cefb0574a004'
});

//# sourceMappingURL=all.js.map
