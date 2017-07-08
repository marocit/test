<template>
  <div >
    <v-container row wrap>
      <v-flex xs12 sm6 offset-sm3>
    <div v-for="link in links">
    <v-card   horizontal class="mt-3">
      <v-card-column class="white">
        <v-card-row :img="link.cover" height="300px"></v-card-row>
        <v-card-row>
          <v-spacer></v-spacer>
          <v-card-text class="text-xs-left">
            <strong><a :href="link.url">{{ link.title }}</a></strong>
                        <p>{{link.description}}</p>
                        <v-chip label outline class="blue blue--text small">{{link.categories.name}}</v-chip>
          </v-card-text>
        </v-card-row>
      </v-card-column>
      
    </v-card>
  </div>
      </v-flex>
    </v-container>
    </div>
  
          
</template>

<script>
    export default {

        data() {
            return {
                url: '',
                errors: {},
                links: {},
                categories: [],
                category: '',
                card_text: 'Lorem ipsum dolor sit amet, brute iriure accusata ne mea. Eos suavitate referrentur ad, te duo agam libris qualisque, utroque quaestio accommodare no qui. Et percipit laboramus usu, no invidunt verterem nominati mel. Dolorem ancillae an mei, ut putant invenire splendide mel, ea nec propriae adipisci. Ignota salutandi accusamus in sed, et per malis fuisset, qui id ludus appareat.'
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
                        this.url = '';
                        response => console.log(response.data);
                    })
                    .catch(response => console.log(this.$data));
                    
            },
            fetchCategories() {
                axios.get('/fetchCategories')
                    .then(response => this.categories = response.data);
            }
             
        }
    }
</script>