

<template>
  <!-- Chat Field -->
            
    <div class="chat-field">

      <div class="ui-block-title">
        <h6 class="title">{{otherUser.first_name+' '+otherUser.last_name}}</h6>
        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
      </div>

      <div class="mCustomScrollbar chat-container" data-mcs-theme="dark">
        <ul class="notification-list chat-message chat-message-field chat-conversation">
          <li  :class="[ authUser.id==message.user.id ? 'chat-right' : 'chat-left' ]"  v-for="message in messages" :key="message.id">
            <div class="author-thumb">
              <img loading="lazy" :src="imageSrc+'/public/assets/dashboard/img/avatar8-sm.webp'" alt="author" width="36" height="36">
            </div>
            <div class="notification-event">
              <div class="event-info-wrap">
                <a href="javascript:void(0)" class="h6 notification-friend">{{message.user.first_name+' '+message.user.last_name}}</a>
                <!-- <span class="notification-date">
                  <time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time>
                </span> -->
              </div>
              <span class="chat-message-item">{{message.message}}</span>
            </div>
          </li>
        </ul>
      </div>
   
      <div class="form-group">
        <textarea class="form-control" v-model="newMessage" @keyup.enter="sendMessage" placeholder="Write your reply here..."></textarea>
      </div>
  
      <div class="add-options-message">            
        <button class="btn btn-primary btn-sm" @click="sendMessage">Post Reply</button>
      </div>
     
    
    </div>
    
    <!-- ... end Chat Field -->
</template>

<script>
export default {
    props: ["authUser","otherUser","imageSrc"],
    
    data() {
      return {
        messages: [],
        newMessage: ""
      };
    },

    created() {
        this.fetchMessages();

        window.Echo.private('chat.'+this.authUser.id+'hapiom'+this.otherUser.id)
            .listen('MessageSent', (e) => {
              console.log('MessageSent',e)
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
                $(".chat-container").animate({ scrollTop: 99999999999999999999999 }, 1000);
            });
    },

    methods: {
        fetchMessages() {
            axios.get(process.env.MIX_PUSHER_APP_URL+'/fetchMessages/'+this.otherUser.id).then(response => {
                this.messages = response.data;
            });
        },

        sendMessage() {
            
            const msg = {
              user: this.authUser,
              receiver: this.otherUser,
              message: this.newMessage,
            };
            this.messages.push(msg);
            this.newMessage = "";
            axios.post(process.env.MIX_PUSHER_APP_URL+'/sendMessage', msg).then(response => {
                // console.log(response.data);
                $(".chat-container").animate({ scrollTop: 99999999999999999999999 }, 1000);
            });
        }
    },
    mounted: function () {
      this.$nextTick(function () { 
        $(".chat-container").animate({ scrollTop: 99999999999999999999999 }, 1000);
      })
    }
};
</script>
