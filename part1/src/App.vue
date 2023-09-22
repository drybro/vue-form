<script setup>
import { ref } from 'vue';
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'

const simpleText = ref('abc')
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />
    <!-- <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div> -->
  </header>

  <main>
    <!-- <TheWelcome /> -->
    <form @submit.prevent>
      <label>Event<input type="text" :value="simpleText" @input="simpleText = $event.target.value"></label>
      <label>v-model<input type="text" v-model.lazy="simpleText"></label>
      <label>textArea<textarea v-model.trim.number="simpleText"></textarea></label>
      <label>Number<input type="number" v-model="simpleText"></label>
      <!--
        The 'lazy' modifier uses the change event instead of the input event.  
        The 'trim' modifier removes leading and trailing white space before assigning the value to the variable.
        The 'number' modifier attempts to convert the value to a number before assigning it to the variable.
        Modifiers may be chained together.
      -->
    </form>
  </main>
</template>

<style scoped>
label {
  display: inline-block;
  margin: 0.2rem;
}

header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
