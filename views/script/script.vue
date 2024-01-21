
const app = Vue.createApp({
    data() {
        return {
            title: 'BloJist'
        }
    },
    methods: {
        changeTitle() {
            this.title = 'BloJist new'
        }
    },
    template:`
    <h2>{{ title }}</h2>
    <button @click="changeTitle" class="btn btn-primary">click me</button>
    `,
})
app.mount("#app");