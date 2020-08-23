Vue.component('read-member',{
 
    template:
    `<div>
         <h5>Nr Vardas Pavarde</h5>
         <p v-for="(name,index) in names" v-on:click="handle(index,$event)">
         {{name.id}}  {{name.name}}  {{name.surname}}
         </p>
         <input type="text" id="input" v-model="newName">
         <button v-on:click="addName">Add New Record</button>
    </div>    
    `,
    data(){
        return {
          names: [
            {id:''},
            {name:''},
            {surname:''}
          ],
          newName: '',
          newSurname: '',
          newId: ''
          
        }
    },
    created: function() {
        this.setDir()
      },
    methods: {
      selected(id){
        url = '/update'
        axios.post(url, 
          JSON.stringify({memberid:this.names[id].id , memberselected:'YES' })
          )
          .then( response => { console.log(response)
            
          })
          .catch(function () {
            console.log();
          }); 
      },
      dialogBox(header,holder){
        var txt;
        var name = prompt(header, holder);
        if (name == null || name == "") {
          return holder;
        } else {
           return name;
      }
        
      },
      handle(id,e) {
        if (e.shiftKey) {
          this.remove(id)
        } else if (e.altKey) {
          this.update(id)
        } else this.selected(id)
      },
        remove(id){
          url ='/delete';
          axios.post(url, 
            JSON.stringify({name: this.names[id].id ,table:'members',sep:'sep' })
            )
            .then( response => { console.log(response)
              this.names.splice(id,1);
           
            })
            .catch(function () {
              console.log();
            });
        },
        update(id){
          this.newName=this.dialogBox('Enter new name',this.names[id].name);
          url ='/update';
            axios.post(url, 
                JSON.stringify({id:this.names[id].id ,table:'members', 
                name:this.newName  })
               )
               .then( response => 
                {console.log(response),
                    this.names[id].name = this.newName,
                    this.names[id].surname = this.newSurname,
                    this.newName = '',
                    this.newSurname = ''
               })
               .catch(function (error) {
                 console.log(error)
               })
        },
        goEmploee(){
          
        },
        setDir(){
            url ='/read';
            axios.post(url, JSON.stringify({name: 'members'}))
            .then( response => {console.log(response)
            this.names = response.data} )
            .catch(function () {
              console.log();
            });
          },
          addName(){
            url ='/insert';
            axios.post(url, 
                JSON.stringify({name: this.newName, 
                surname: this.newSurname, create:'OK', table:'members' })
               )
               .then( response => 
                {console.log(response),
                    this.newId = response.data
                    this.names.push( {id:this.newId , name:this.newName, surname:this.newSurname} ),
                    this.newId = '',
                    this.newName = '',
                    this.newSurname = ''
               })
               .catch(function (error) {
                 console.log(error)
               })
        }
       

    }
})
var app = new Vue({
    el: '#memb',
});
