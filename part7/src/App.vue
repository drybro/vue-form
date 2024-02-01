<script setup>
import { computed, ref, watch } from 'vue';
// const simpleText = ref('abcde'), simpleNumber = ref(5), simpleWords = ref('abc'), simpleTel = ref('555-1234'), agreed = ref(true)
const simpleText = ref(''), simpleNumber = ref(0), simpleWords = ref(''), simpleTel = ref(''), agreed = ref(false)
const simpleRange = ref(50), selectedDay = ref(''), selectedDays = ref([]), working = ref(false), simpleEmail = ref(''), simpleURL = ref(''), simplePswd = ref('')
function doWork() {
  working.value = true;
  setTimeout(() => working.value = false, 4000)
}
const sum = computed(() => simpleNumber.value + +simpleRange.value)
const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']

function onSubmit(event) {
  if(areDaysInvalid.value)return;
  const frmData = new FormData(event.target);
  fetch("http://127.0.0.1:3000", { method: 'post', body: new URLSearchParams(frmData) })
    .then(r => r.json()).then(d => alert(JSON.stringify(d, null, '\n')))
    .catch(e => console.error(e))
}
const areDaysInvalid = ref(false), selDays = ref(null)
watch(selectedDays,(newValue)=>{
  areDaysInvalid.value = ['Sat', 'Sun'].some(x => newValue.includes(x)) && ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'].some(x => newValue.includes(x))
  selDays.value.setCustomValidity(areDaysInvalid.value ? 'Select either weekdays or weekends.' : '')
  alert('CustomError: '+selDays.value.validity.customError)
})
</script>

<template>
  <header>
    <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" />
  </header>
  <main>
    <form @focusin="$event.target.classList.add('warning')" @submit.prevent="onSubmit" oninput="sum.value = parseInt(num.value) + parseInt(range.value)">
      <aside class="req">Required Field</aside>
      <fieldset><legend>Buttons</legend>
        <fieldset><legend>Submit</legend>
          <input type="submit" value="Input Tag">
          <button type="submit">Button Tag</button>
        </fieldset>
        <fieldset><legend>Custom Event</legend>
          <input type="button" value="Input Tag" @click="doWork">
          <button type="button" @click="doWork">Button Tag</button>
        </fieldset>
        <fieldset><legend>Reset</legend>
          <input type="reset" value="Input Tag" @click="doReset">
          <button type="reset" @click="doReset">Button Tag</button>
        </fieldset>
        <fieldset><legend>File</legend>
          <input type="file" accept=".txt" name="txtFile">
        </fieldset>
      </fieldset>
      <fieldset><legend>Text</legend>
        <label class="req">Event<input type="text" list="numbs" :value="simpleText" @input="simpleText = $event.target.value" name="word" required placeholder="Required" minlength="5"></label>
        <label>v-model<input type="text" list="daysOfWeek" v-model.lazy="simpleText"></label>
        <label class="req">textArea<textarea v-model.trim.number="simpleWords" name="details" required placeholder="Required" maxlength="255"></textarea>
          <aside>{{ simpleWords.length }} of 255 max</aside>
        </label>
        <label>Date<input type="date"></label>
        <label>Time<input type="time"></label>
        <label>DateTimeLocal<input type="datetime-local"></label>
        <label>Month<input type="month"></label>
        <label>Week<input type="week"></label>
        <label>Search<input type="search" v-model="simpleText"></label>
        <label>Password<input type="password" v-model="simplePswd"></label>
        <label>Color<input type="color"></label>
        <label>Email<input type="email" v-model="simpleEmail"></label>
        <label class="req">Tel<input type="tel" name="phone" required placeholder="Required format 555-1234" v-model="simpleTel" pattern="(\d\d\d)-(\d\d\d\d)" @input="$event.target.setCustomValidity($event.target.validity.patternMismatch ? 'Format 555-1234' : '')"></label>
        <label>url<input type="url" v-model="simpleURL"></label>
      </fieldset>
      <fieldset><legend>Boolean</legend>
        <label class="req">Agreed<input type="checkbox" v-model="agreed" name="agreed" required></label>
        <label>Agreed<input type="checkbox" v-model="agreed" true-value="Yes" false-value="No"></label>
      </fieldset>
      <fieldset><legend>Number</legend>
        <label class="req">Number<input type="number" list="numbs" id="num" v-model="simpleNumber" name="numb" required placeholder="Required" min="5" max="100"></label>
        <label>Range<input type="range" list="numbs" id="range" v-model.number="simpleRange"></label>
      </fieldset>
      <fieldset><legend>Select from a List</legend>
        <fieldset><legend>Select day of week.</legend>
          <label v-for="val in daysOfWeek">{{ val }}<input type="radio" :value="val.slice(0, 3)" v-model="selectedDay"></label>
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
          </select>
        </label>
        <button type="button" v-show="selectedDay.length" @click="selectedDay=''">Clear Selection</button>
      </fieldset>
      <fieldset><legend>Select Multiple values from a List</legend>
        <fieldset :class="{'groupWarning':areDaysInvalid}"><legend>Select days of week.</legend>
          <label v-for="val in daysOfWeek">{{ val }}<input type="checkbox" :value="val.slice(0, 3)" v-model="selectedDays"></label>
          <aside v-show="areDaysInvalid">Select either weekdays or weekends.</aside>
        </fieldset>
        <label><select multiple v-model="selectedDays" ref="selDays" name="daysOfWeek[]">
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
          </select>
        </label>
      </fieldset>
      <fieldset><legend>Read Only</legend>
        <fieldset><legend>Hidden</legend>
          <input type="hidden" name="total" :value="sum">
          <input type="hidden" name="sessionID" value="server-generated-characters">
          <input type="hidden" name="csrf-token" value="server-generated-characters">
        </fieldset>
        <fieldset><legend>Progress</legend>
          <progress v-if="working"></progress>
          <progress max="100" :value="simpleNumber"></progress>
        </fieldset>
        <fieldset><legend>Meter</legend>
          <meter min="0" max="100" :value="simpleRange" low="25" optimum="50" high="75"></meter>
        </fieldset>
        <fieldset><legend>Output</legend>
          <label>HTML <output name="sum"></output></label>
          <label>Vue <output :value="sum"></output></label>
          <label>Template {{ sum }}</label>
        </fieldset>
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
textarea+aside { text-align: right; }

select:focus:invalid,
textarea:focus:invalid,
input:focus:invalid {
  outline-color: orange;
}

.warning:invalid, .groupWarning{
  outline: medium dotted red;
}
/* select:invalid,
textarea:invalid,
input:invalid {
  outline: medium dotted red;
} */

select:valid,
textarea:valid,
input:valid:not([type="submit"], [type="color"], [type="checkbox"], [type="range"], [type="radio"]) {
  outline: thin solid green;
}

:required {
  background-color: azure;
}

.req::before {
  content: '*';
  color: red;
}

fieldset {
  display: inline;
  width: fit-content;
  vertical-align: top;
}

label {
  display: inline-block;
  margin: 0.2rem;
  vertical-align: middle;
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
}</style>