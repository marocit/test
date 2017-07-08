<template>
<div class="panel panel-default">
        <div class="panel-heading">Example Component</div>

        <div class="panel-body">
             <ul class="list-group">
              <li class="list-group-item" v-for="category in categories">
                <span class="badge">14</span>
                {{ category.name }}
              </li>
              </ul>
        </div>
       
        
    </div>
  </template>


  <script>
    export default {

        data() {
            return {
                categories: [],
                category: '',
                name: ''
            }
            
        },
        created() {
            this.fetchCategories();
        },

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            createTweet() {
                
                let self = this;
                /*axios.post('/create-tweet', this.$data)
                    .then(response => console.log('Success'))
                    .catch(error => this.error = error.response.data); */
                    console.log('Creating Link...');
                axios.post('/api/getlink', this.$data)
                    .then(function() {
                        self.getLinks();
                        self.url = '';
                        response => console.log(response.data);
                    })
                    .catch(response => console.log(this.$data));
                    
            },
            fetchCategories() {
                axios.get('/fetchCategories')
                    .then(response => this.categories = response.data);
            },
        }
    }
</script>