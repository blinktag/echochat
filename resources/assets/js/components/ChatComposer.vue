<template>
  <div class="chat-composer">
    <input type="text" placeholder="Start typing your message" v-model="messageText"  @keyup.enter="sendMessage" />
    <button class="btn btn-primary" @click="sendMessage">Send</button>
  </div>
</template>

<script>

import axios from 'axios';

export default {
  data() {
    return {
      messageText: '',
    }
  },
  methods: {
    sendMessage() {
      this.$emit('messagesent', {
        message: this.messageText,
        user: 'John Done'
      });
      this.messageText = '';
    }
  }
}
</script>

<style lang="scss" scoped>
.chat-composer {
  display: flex;

  input {
    flex: 1 auto;
  }
}

button {
  border-radius: 0;
}
</style>
