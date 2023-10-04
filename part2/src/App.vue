<script setup>
import { computed, ref } from 'vue';
// import HelloWorld from './components/HelloWorld.vue'
// import TheWelcome from './components/TheWelcome.vue'

const simpleText = ref('abc')
const simpleNumber = ref(0)
const simpleRange = ref(50)
const sum = computed( () => simpleNumber.value + +simpleRange.value)
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />
    <!-- <div class="wrapper"> <HelloWorld msg="You did it!" /> </div> -->
  </header>

  <main>
    <!-- <TheWelcome /> -->
    <form @submit.prevent oninput="sum.value = parseInt(num.value) + parseInt(range.value)">
      <fieldset>
        <legend>Text</legend>
        <label>Event<input type="text" :value="simpleText" @input="simpleText = $event.target.value"></label>
        <label>v-model<input type="text" v-model.lazy="simpleText"></label>
        <label>textArea<textarea v-model.trim.number="simpleText"></textarea></label>
        <label>Date<input type="date" v-model="simpleText"></label>
        <label>Time<input type="time" v-model="simpleText"></label>
        <label>DateTime<input type="datetime" v-model="simpleText"></label>
        <label>DateTimeLocal<input type="datetime-local" v-model="simpleText"></label>
        <label>Month<input type="month" v-model="simpleText"></label>
        <label>Week<input type="week" v-model="simpleText"></label>
        <label>Search<input type="search" v-model="simpleText"></label>
        <label>Password<input type="password" v-model="simpleText"></label>
        <label>Color<input type="color" v-model="simpleText"></label>
        <label>Email<input type="email" v-model="simpleText"></label>
        <label>Tel<input type="tel" v-model="simpleText"></label>
        <label>url<input type="url" v-model="simpleText"></label>
      </fieldset>
      <fieldset>
        <legend>Number</legend>
        <label>Number<input type="number" id="num" v-model="simpleNumber"></label>
        <label>Range<input type="range" id="range" v-model.number="simpleRange"></label>
      </fieldset>
      <fieldset><legend>Output</legend>
        <label>HTML <output name="sum"></output></label>
        <label>Vue <output :value="sum"></output></label>
        <label>Template {{ sum }}</label>
      </fieldset>
      <fieldset><legend>Hidden</legend>
        <input type="hidden" name="total" :value="sum">
        <input type="hidden" name="sessionID" value="server-generagte-characters">
        <input type="hidden" name="csrf-token" value="server-generagte-characters">
      </fieldset>
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
