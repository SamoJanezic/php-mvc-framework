// import axios from 'axios';

const app = Vue.createApp({
    data() {
        return {
            title: 'BloJist',
            posts: [0]
        }
    },
    methods: {
        endOfPage() {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight -1) {
                console.log('yes');
            }
        },
        getPosts() {
            axios.get('http://localhost:8080/getPosts')
              .then(function (response) {
                console.log(response.data);
              })
              .catch(function (error) {
                console.log(error);
              })
              .finally(function () {
                // always executed
              });
        }
    },
    created () {
        window.addEventListener('scroll', this.endOfPage);
    },
    unmounted () {
        window.removeEventListener('scroll', this.endOfPage);
    },
    template:
    `
    <div>
    <button @click="getPosts" class="btn btn-primary">click me</button>
    </div>
    `,
})
app.mount("#app");