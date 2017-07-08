<template>
    <div>        
    <div class="panel panel-default">
        <div class="panel-heading">Example Component</div>

        <div class="panel-body">
            <form v-on:submit.prevent="createTweet" method="post">
                <div class="form-group">
                    <input type="text" id="url" v-model="url" class="form-control">
                </div>
                <div class="form-group">
                    <select  class="form-control" name="category" id="category" v-model="category">
                        <option v-for="option in categories" v-bind:value="option.id" placeholder="test...">
                            {{ option.name }}
                        </option>
                    </select>
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
                    <div class="panel-heading image-heading" >
                           <div class="img-header" v-if="link.cover" v-bind:style="{ backgroundImage: `url(${link.cover})`, backgroundSize: 'cover', backgroundRepeat:'no-repeat' }">

                           </div>
                            <!--<img :src="link.cover"  class="img-responsive" alt="Responsive image">-->
                    </div>

                    <div class="panel-body">
                        <h2><a :href="link.url">{{ link.title }}</a></h2>
                        <p>{{link.description}}</p>
                        <button class="btn btn-xs btn-danger" @click.prevent="deleteLink(link.id)">Delete Link</button>
                    </div>
                    <div class="panel-footer">
                        <p class="pull-right"> {{link.url}}</p>
                        <span class="label label-info">{{link.categories.name}}</span>
                        
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
                links: [],
                categories: [
                    name => 'test'
                ],
                category: '',
            }
            
        },
        created() {
            this.getLinks();
            this.fetchCategories();
        },

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            getLinks() {
                axios.get('/api/getlinks')
                    .then(response => this.links = response.data);
            
                //setTimeout(this.getLinks, 5000);
            },
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
            deleteLink(link) {
                let self = this;
                axios.delete('/deleteLink/'+link)
                    .then(function() {
                        self.getLinks();
                    })
                    .catch(response => console.log(response.data));
            }
             
        }
    }
</script>