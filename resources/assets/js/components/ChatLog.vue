<template>
  <div class="chat-log">
    <chat-message v-for="(message, id) in messages" :key="id" :message="message"></chat-message>
  </div>
</template>

<script>
export default {
  props: ['messages']
}
</script>

<style lang="scss">
$bg: #ccc;

.chat-log {
  padding: 1rem;

  .chat-message {
    p {
      margin-bottom: .5rem;
    }

    &:nth-child(even) {
      background-color: $bg;
    }
  }
}
</style>
