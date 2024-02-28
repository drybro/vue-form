# vue-form

This project introduces Vue elements that assist in making HTML forms. 
    
* Part 1 makes a Vue3 Hello World framework and changes the src/App.vue file. It introduces a form that uses the Vue @submit.prevent event. Form contents are added using the : v-bind directive, the @ v-on event directive, and the v-model attribute with it's lazy, trim, and number modifiers.

* Part 2 The Vue framework has tools to simplify web form creation. In part 2 we cover input tags that extend the basic input type=text tag. The form output tag and how it works is explored. Input type=hidden tags and what they do are looked at. All changes are in the src/App.vue file.

* Part 3 covers boolean and list form elements including datalist, radio buttons, checkbox buttons and the select tag. Lists are handled using v-for directive, v-if directive, and the template tag. All changes are in the src/App.vue file.

* Part 4 covers the Meter and Progress tags. Buttons are given custom events using setTimeout that interact with a progress tag. The reset button behaviour is looked at and what to watch for when using it with the Vue framework.

* Part 5 covers the Input type=file tag and Form Submission using a Node.js echo server. It explores 'get' submissions and 'post' submissions using 'application/x-www-form-urlencoded', 'multipart/form-data', and 'text/plain' encoding. The FormData object collects name-value data. Vue uses the Fetch API to send data and handle responses.

* Part 6 covers form validation. It uses HTML validation to prevent errors from being submitted to a PHP validating echo server. CSS provides user guidance on how to fill out forms. Input type dateTime depreciated and submit 'application/x-www-form-urlencoded' using the Fetch API.

* Part 7 covers form validation. It uses pattern attribute with setCustomValidity. It deselects radio and single option select tags. Uses watch, ref attribute, and conditional classes to handle multiple option submissions. Custom error validation prevents submit.

* Part 8 covers input masks. Brief description on what an input mask is with browser examples. Mention Javascript libraries that handle common phone and credit card masks. Build custom masks to handle US Zip code and Canadian Post Code.

---

## Links

 ✅ [Youtube](https://www.youtube.com/playlist?list=PLNvKNI4deS74WeuPqwVA8NHQWjAh4J0fg)

---

## Tools used in this project.

[VSCodium Editor](https://vscodium.com/)

[Vue Language Features](https://github.com/vuejs/language-tools)

[NodeJS Environment](https://deb.nodesource.com/)

[Vue3 Framework](https://vuejs.org/)

[Vue Devtools](https://devtools.vuejs.org/)

[PHP](https://www.php.net/)

---

## Customize configuration

See [Vite Configuration Reference](https://vitejs.dev/config/).

## Project Setup

```sh
npm install
```

### Compile and Hot-Reload for Development

```sh
npm run dev
```

### Compile and Minify for Production

```sh
npm run build
```
