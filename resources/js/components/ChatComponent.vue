    
    
    
    <template>

        <section class="message-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="chat-area">
                            <!-- chatlist -->
                            <div class="chatlist">
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <!-- <div class="chat-header pb-2">
                                            <div class="msg-search">
                                                <input type="text" class="form-control" id="inlineFormInputGroup"  placeholder="Search" aria-label="search">
                                                <a class="add" href="#"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/add.svg" alt="add"></a>
                                            </div>

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Open</button>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="modal-body">
                                            <!-- chat-list -->
                                            <div class="chat-lists">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                        <!-- chat-list -->
                                                        <div class="chat-list" v-for="allUser in allUsers" :key="allUser.key" >
                                                            <!-- {{ console.log(allUser) }} -->
                                                            <a href="#" @click="makeActive(allUser)" class="d-flex align-items-center" :class="{ activeChat: allUser.id === send_to.id }">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                                    <!-- <span class="active"></span> -->
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>{{ allUser.name }}</h3>
                                                                    <p>{{ allUser.email }}</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!-- chat-list -->
                                                    </div>
                                                    <div class="tab-pane fade" id="Closed" role="tabpanel" aria-labelledby="Closed-tab">

                                                        <!-- chat-list -->
                                                        <div class="chat-list">
                                                            <a href="#" class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                    <span class="active"></span>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h3>Mehedi Hasan</h3>
                                                                    <p>front end developer</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!-- chat-list -->
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- chat-list -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- chatlist -->
                            <!-- chatbox -->
                            <div class="chatbox">
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="msg-head">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="d-flex align-items-center">
                                                        <span class="chat-icon">
                                                            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title">
                                                        </span>
                                                        <div class="flex-shrink-0">
                                                            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h3>Mehedi Hasan</h3>
                                                            <p>front end developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal-body">
                                            <div class="msg-body px-2" >
                                                <ul class="message"  id="message-body">
                                                    <!-- {{ console.log(oldMessage) }} -->

                                                    <li v-for="oldMessage in oldMessages" :key="oldMessage.id" :class="{ sender: oldMessage.from_user_id === user.id, receiver: oldMessage.from_user_id !== user.id }" class="sender" >
                                                        <p> {{ oldMessage.message }} </p>

                                                        <span class="time">{{ getTimeAgo(new Date( oldMessage.created_at).getTime())  }}</span>
                                                    </li>




                                                    <li v-for="message in messages" :key="message.id" :class="{ sender: message.from_user_id === user.id, receiver: message.from_user_id !== user.id }" class="sender" >
                                                        <p> {{ message.message }} </p>

                                                        <span class="time">{{ getTimeAgo(new Date( message.created_at).getTime())  }}</span>
                                                    </li>

                                                    <!-- <li v-if="oldMessage.from_user_id == user.id" class="sender" >
                                                        <p> {{ oldMessage.message }} </p>

                                                        <span class="time">{{ getTimeAgo(new Date( oldMessage.created_at).getTime())  }}</span>
                                                    </li>

                                                    <li v-if="oldMessage.from_user_id != user.id" class="repaly" >
                                                        <p> {{ oldMessage.message }} </p>
                                                        <span class="time">{{ getTimeAgo(new Date( oldMessage.created_at).getTime()) }}</span>
                                                    </li> -->

                                                </ul>

                                                <!-- <ul v-for="message in messages" :key="message.id" class="message">

                                                    <li v-if="message.from_user_id == user.id" class="sender" >
                                                        <p> {{ message.message }} </p>
                                                        <span class="time">{{ getTimeAgo(new Date( message.created_at).getTime()) }}</span>
                                                    </li>

                                                    <li v-if="message.from_user_id != user.id" class="repaly" >
                                                        <p> {{ message.message }} </p>
                                                        <span class="time">{{ getTimeAgo(new Date( message.created_at).getTime()) }}</span>
                                                    </li>

                                                </ul> -->
                                            </div>
                                        </div>


                                        <div class="send-box">
                                            <form @submit="sendMessage" >
                                                <input v-model="newMessage"  @keyup.enter="sendMessage" type="text" class="form-control" aria-label="message…"  placeholder="Write message…">

                                                <button type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Send
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    </template>

    <style scoped >
       @import '@/css/chat.css';
    </style>
  
  <script>
    import { io } from 'socket.io-client';
    export default {
        
        data() {
            return {
                messages: [],
                newMessage: '',
                socket: null,
                oldMessages : null,
                user : null,
                allUsers : null,
                send_to : null,
            };
        },


        async created() {
            
            try {
                const response = await axios.get('/me');
                this.user = response.data.me;
            
            } catch (error) {
                console.error('Failed to fetch login user data:', error);
            }




            try {
                const response = await axios.get('/users');
                this.send_to = response.data.users[0];
                this.allUsers = response.data.users;

                const messages = await axios.get('/get-messages/' + this.send_to.id);
                this.oldMessages = messages.data.messages;

            

            } catch (error) {
                console.error('Failed to fetch login user data:', error);
            }


            // const messageBody = document.getElementById('message-body');
            // messageBody.scrollTop = messageBody.scrollHeight;




            this.socket = io('http://localhost:3000');
            this.socket.on('new-message', (message) => {
                if (message.from_user_id === this.user.id || message.to_user_id === this.user.id) {
                    this.messages.push(message);
                }
            });
            this.socket.emit('user-connected', this.send_to);
        },





        methods: {
            async sendMessage() {
            if (this.newMessage.trim() === '') return;


                const response = await axios.post('/send-message', { message: this.newMessage, to_user_id: this.send_to.id });
                this.newMessage = '';
                this.socket.emit('send-message', response.data);

                
                const messageBody = document.getElementById('message-body');
                messageBody.scrollTop = messageBody.scrollHeight;
                
                
            },

            async makeActive(sendTo) {
                this.send_to = sendTo;
                const response = await axios.get('/get-messages/' + this.send_to.id);
                console.log(response.data.messages);
                this.oldMessages = response.data.messages; 
            },



            getTimeAgo(timestamp) {
                const currentTime = new Date().getTime();
                const timeDifference = currentTime - timestamp;

                const minute = 60 * 1000;
                const hour = minute * 60;
                const day = hour * 24;
                const month = day * 30;
                const year = day * 365;

                if (timeDifference < minute) {
                    const seconds = Math.round(timeDifference / 1000);
                    return  "Just Now";
                } else if (timeDifference < hour) {
                    const minutes = Math.round(timeDifference / minute);
                    return minutes + " minutes ago";
                } else if (timeDifference < day) {
                    const hours = Math.round(timeDifference / hour);
                    return hours + " hours ago";
                } else if (timeDifference < month) {
                    const days = Math.round(timeDifference / day);
                    return days + " days ago";
                } else if (timeDifference < year) {
                    const months = Math.round(timeDifference / month);
                    return months + " months ago";
                } else {
                    const years = Math.round(timeDifference / year);
                    return years + " years ago";
                }
            }
        },

        
    };
  </script>