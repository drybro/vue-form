<script setup>
import { computed, ref } from 'vue';
// import HelloWorld from './components/HelloWorld.vue'
// import TheWelcome from './components/TheWelcome.vue'
const simpleText = ref(''), simpleNumber = ref(0), simpleRange = ref(50)
const sum = computed(() => simpleNumber.value + +simpleRange.value)
const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
const agreed = ref(false), selectedDay = ref(''), selectedDays = ref([])

const working = ref(false), vuefrm = ref('')
function doWork() {
  working.value = true;
  setTimeout(() => working.value = false, 4000)
}
function onSubmit(event) {
  const frmData = new FormData(event.target);
  fetch("http://127.0.0.1:3000", { method: 'post', body: frmData })
    .then(r => r.json())
    .then(d => alert(JSON.stringify(d, null, '\n')))
    .catch(e => console.error(e))
}
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />
    <!-- <div class="wrapper"> <HelloWorld msg="You did it!" /> </div> -->
  </header>
  <main>
    <!-- <TheWelcome /> -->
    <form action="http://127.0.0.1:3000">
      <fieldset>
        <legend>HTML Form</legend>
        <input type="text" name="words" value="This & that">
        <input type="text" name="formula" value="e = m C ^ 2">
        <fieldset>
          <legend>Submission</legend>
          <input type="submit" formmethod="get" value="Input Get">
          <button formmethod="get">Button Get</button>
          <button formmethod="post" formenctype="application/x-www-form-urlencoded">Post URL</button>
          <button formmethod="post" formenctype="multipart/form-data">Post Multi</button>
          <button formmethod="post" formenctype="text/plain">Post Text</button>
        </fieldset>
      </fieldset>
    </form>
    <form @submit.prevent="onSubmit" oninput="sum.value = parseInt(num.value) + parseInt(range.value)">
      <fieldset>
        <legend>Buttons</legend>
        <input type="file" accept=".txt" name="txtFile">
        <fieldset>
          <legend>Submit</legend>
          <input type="submit" value="Input Tag">
          <button type="submit">Button Tag</button>
        </fieldset>
        <fieldset>
          <legend>Custom Event</legend>
          <input type="button" value="Input Tag" @click="doWork">
          <button type="button" @click="doWork">Button Tag</button>
        </fieldset>
        <fieldset>
          <legend>Reset</legend>
          <input type="reset" value="Input Tag" @click="doReset">
          <button type="reset" @click="doReset">Button Tag</button>
        </fieldset>
      </fieldset>
      <fieldset>
        <legend>Read Only</legend>
        <fieldset>
          <legend>Progress</legend>
          <progress v-if="working"></progress>
          <progress max="100" :value="simpleNumber"></progress>
        </fieldset>
        <fieldset>
          <legend>Meter</legend>
          <meter min="0" max="100" :value="simpleRange" low="25" optimum="50" high="75"></meter>
        </fieldset>
        <fieldset>
          <legend>Output</legend>
          <label>HTML <output name="sum"></output></label>
          <label>Vue <output :value="sum"></output></label>
          <label>Template {{ sum }}</label>
        </fieldset>
      </fieldset>
      <fieldset>
        <legend>Number</legend>
        <label>Number<input type="number" list="numbs" id="num" v-model="simpleNumber"></label>
        <label>Range<input type="range" list="numbs" id="range" v-model.number="simpleRange"></label>
      </fieldset>
      <fieldset>
        <legend>Text</legend>
        <label>Event<input type="text" list="numbs" :value="simpleText" @input="simpleText = $event.target.value"></label>
        <label>v-model<input type="text" list="daysOfWeek" v-model.lazy="simpleText"></label>
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
        <legend>Select Multiple values from a List</legend>
        <fieldset>
          <legend>Select day of week.</legend>
          <label v-for="val in daysOfWeek">{{ val }}<input type="checkbox" :value="val.slice(0, 3)"
              v-model="selectedDays"></label>
        </fieldset>
        <label><select multiple v-model="selectedDays">
            <optgroup label="WeekDay">
              <template v-for="(val, i) in daysOfWeek">
                <option v-if="i < 5" :value="val.slice(0, 3)">{{ val }}</option>
              </template>
            </optgroup>
            <optgroup label="WeekEnd">
              <template v-for="(val, i) in daysOfWeek">
                <option v-if="i > 4" :value="val.slice(0, 3)">{{ val }}</option>
              </template>
            </optgroup>
          </select></label>
      </fieldset>
      <fieldset>
        <legend>Select from a List</legend>
        <fieldset>
          <legend>Select day of week.</legend>
          <label v-for="val in daysOfWeek">{{ val }}<input type="radio" :value="val.slice(0, 3)"
              v-model="selectedDay"></label>
        </fieldset>
        <label><select v-model="selectedDay">
            <optgroup label="WeekDay">
              <template v-for="(val, i) in daysOfWeek">
                <option v-if="i < 5" :value="val.slice(0, 3)">{{ val }}</option>
              </template>
            </optgroup>
            <optgroup label="WeekEnd">
              <template v-for="(val, i) in daysOfWeek">
                <option v-if="i > 4" :value="val.slice(0, 3)">{{ val }}</option>
              </template>
            </optgroup>
          </select></label>
      </fieldset>
      <fieldset>
        <legend>Hidden</legend>
        <input type="hidden" name="total" :value="sum">
        <input type="hidden" name="sessionID" value="server-generated-characters">
        <input type="hidden" name="csrf-token" value="server-generated-characters">
      </fieldset>
      <fieldset>
        <legend>Boolean</legend>
        <label>Agreed<input type="checkbox" v-model="agreed"></label>
        <label>Agreed<input type="checkbox" v-model="agreed" true-value="Yes" false-value="No"></label>
      </fieldset>
      <datalist id="numbs">
        <option>25</option>
        <option>50</option>
        <option>75</option>
      </datalist>
      <datalist id="daysOfWeek">
        <option v-for="val in daysOfWeek" :value="val.slice(0, 3)">{{ val }}</option>
      </datalist>
    </form>
  </main>
</template>

<style scoped>
fieldset {
  display: inline-block;
  width: fit-content;
}

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
