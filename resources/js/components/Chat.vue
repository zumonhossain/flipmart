<template>
  <div class="row">
    <div class="col-md-3 myUser">
        <ul class="user">
           <strong>Chat List</strong>
           <hr>
        <li v-for="(user, index) in users" :key="index"> 
          <a href="" @click.prevent="userMessage(user.id)">
            <img :src="'/' + user.image" alt="UserImage" class="userImg" />
            <span class="username text-center">{{ user.name }}</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-md-9" v-if="allmessages.user">
        <div class="card">
          <div class="card-header text-center myrow">
            <strong> {{ allmessages.user.name }} </strong>
          </div>
          <div class="card-body chat-msg">
            <ul class="chat" v-for="(msg, index) in allmessages.messages" :key="index">

            <li class="sender clearfix" v-if="allmessages.user.id === msg.sender_id">
                <span class="chat-img left clearfix mx-2">
                <img :src="'/' + msg.user.image" class="userImg" alt="userImg"/>
                </span>
                <div class="chat-body2 clearfix">
                  <div class="header clearfix">
                    <strong class="primary-font">{{ msg.user.name }}</strong>
                    <small class="right text-muted">
                      {{ msg.created_at }}
                    </small>
                    <!-- //if send with product id  -->
                    <div class="text-center" v-if="msg.product">
                        {{ msg.product.product_name }}
                        <img :src="'/' + msg.product.product_thambnail" alt="productImg" width="60px;"/>
                    </div>
                  </div>

                  <p>{{ msg.msg }}</p>
                </div>
              </li>

          <!-- my part  -->
              <li class="buyer clearfix" v-else>
                <span class="chat-img right clearfix mx-2">
                  <img :src="'/' + msg.user.image" class="userImg" alt="userImg"/>
                  </span>
                <div class="chat-body clearfix">
                  <div class="header clearfix">
                    <small class="left text-muted">{{ msg.created_at }}</small>
                    <div class="text-center" v-if="msg.product">
                        {{ msg.product.product_name }}
                        <img :src="'/' + msg.product.product_thambnail" alt="prouductImage" width="60px;"/>
                    </div>
                  </div>
                  <p>{{ msg.msg }}</p>
                </div>
              </li>
          
              <li class="sender clearfix">
                <span class="chat-img left clearfix mx-2"> </span>
              </li>

            </ul>
          </div>
          <div class="card-footer">
            <div class="input-group">
              <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..."/>
              <span class="input-group-btn">
                <button style="padding: 4px 15px;" class="btn btn-primary">Send</button>
              </span>
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-3 gif" v-else>
        <img width="540" height="450" src="/uploads/website/preview.gif" alt="userImg" />
    </div>
  </div>
</template>

<script>
    export default {
        data() {
          return {
            users: {},
            allmessages: {},
          };
        },

        created() {
          this.getAllUsers();
        },

        methods: {
          //get all users
          getAllUsers() {
            axios
              .get("/user-all")
              .then((res) => {
                this.users = res.data;
              })
              .catch((err) => {

              });
          },

          //get Seldcted Users messages
          userMessage(userId) {
            axios
              .get("/user-messages/" + userId)
              .then((res) => {
                this.allmessages = res.data;
              })
              .catch((err) => {});
          },

        },
    };
</script>
<style>
  .username {
    color: #000;
  }

  .myrow {
    background: #f3f3f3;
    padding: 25px;
  }

  .myUser {
    padding-top: 30px;
    overflow-y: scroll;
    height: 450px;
    background: #f2f6fa;
  }
  .user li {
    list-style: none;
    margin-top: 20px;
  }

  .user li a:hover {
    text-decoration: none;
    color: red;
  }
  .userImg {
    height: 35px;
    border-radius: 50%;
  }
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 40px;
    padding-bottom: 5px;
    margin-top: 20px;
    width: 80%;
    height: 10px;
  }

  .chat li .chat-body p {
    margin: 0;
  }

  .chat-msg {
    overflow-y: scroll;
    height: 350px;
    background: #f2f6fa;
  }
  .chat-msg .chat-img {
    width: 50px;
    height: 50px;
  }
  .chat-msg .img-circle {
    border-radius: 50%;
  }
  .chat-msg .chat-img {
    display: inline-block;
  }
  .chat-msg .chat-body {
    display: inline-block;
    max-width: 80%;
    background-color: lightblue;
    border-radius: 12.5px;
    padding: 15px;
  }
  .chat-msg .chat-body2 {
    display: inline-block;
    max-width: 80%;
    background-color: #ccc;
    border-radius: 12.5px;
    padding: 15px;
  }
  .chat-msg .chat-body strong {
    color: #0169da;
  }

  .chat-msg .buyer {
    text-align: right;
    float: right;
  }
  .chat-msg .buyer p {
    text-align: left;
  }
  .chat-msg .sender {
    text-align: left;
    float: left;
  }
  .chat-msg .left {
    float: left;
  }
  .chat-msg .right {
    float: right;
  }

  .clearfix {
    clear: both;
  }
</style>
