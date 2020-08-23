Vue.component('read-all',{
    template:
    `<div>
     
      <h3>Nr Pavadinimas</h3>
     
      <p v-for="(name,index) in names">
      {{name.name}}  {{name.id}}   {{name.projid}} 
      </p>
      
    </div>        
    `,
    data(){
        return {
          names: [
            {id:''},
            {name:''}
          ],
          selectProj:'',
          newName: '',
          newId: '',
          newMember:''
        }
    },
    mounted: function() {
        this.renderPage()
    
      },
      // updated: function() {
      //   this.renderPage()
    
      // },  
    methods: {
      
        renderPage(){
          url ='/readsum';
          axios.post(url, JSON.stringify({name: 'project'}))
          .then( response => {console.log(response)
          this.names = response.data} )
          .catch(function () {
            console.log();
          });
          },
          
    }
})

var app = new Vue({
    el: '#display',
});