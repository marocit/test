<template>
    <div>        
    <div class="panel panel-default">
        <div class="panel-heading">Example Component</div>

        <div class="panel-body">
            I'm an example component!
            <p>{{ url }}</p>
            <form v-on:submit.prevent="createTweet" method="post">
                <div class="form-group">
                    <input type="text" id="url" v-model="url" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Tweet</button>
                </div>
            </form>
        </div>
    </div>
       <div class="page-header">
                <h3>All Links</h3>
            </div>
            
                <div v-for="link in links" class="panel panel-default">
                    <div class="panel-heading">
                            <img :src="link.cover"  class="img-responsive" alt="Responsive image">
                    </div>

                    <div class="panel-body">
                        <h2><a :href="link.url">{{ link.title }}</a></h2>
                        <p>{{link.description}}</p>
                        
                    </div>
                    <div class="panel-footer">
                        <p> {{link.url}}></p>
                        <strong>{{link.categories.name}}</strong>
                    </div>
                </div>
         </div>   
</template>

<script>
    export default {

        data() {
            return {
                url: '',
                errors: {},
                links: []
            }
            
        },
        created() {
            this.getLinks();
        },

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            createTweet() {
                
                /*axios.post('/create-tweet', this.$data)
                    .then(response => console.log('Success'))
                    .catch(error => this.error = error.response.data); */

                axios.post('/test2', this.$data)
                    .then(response => console.log(response.data));
                    
            },

            getLinks() {
                axios.get('/api/getlinks')
                    .then(response => this.links = response.data);
            
                setTimeout(this.getusers, 1000);
            }

        }
    }
</script>