<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component! blacdc
                        <p>{{ body }}</p>
                        <form v-on:submit.prevent="createTweet" method="post">
                            <div class="form-group">
                                <input type="text" id="body" v-model="body" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Tweet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                body: '',
                errors: {}
            }
            
        },

        mounted() {
            console.log('Test mounted.')
           
        },

        methods: {
            createTweet() {
                
                /*axios.post('/create-tweet', this.$data)
                    .then(response => console.log('Success'))
                    .catch(error => this.error = error.response.data); */

                axios.get('http://api.linkpreview.net/?key=5942e7ef52f4c5b3bf4389318384e5ab760ab91faaec9&q='+ this.body)
                    .then(response => console.log(response.data));
            }
        }
    }
</script>
