new Vue({
  el: '#app',
  data: {
    columns: ['Index', 'Last Name', 'First Name', 'Address', 'Actions '],
    persons: [],
    bin: [],
    input: {
      lname: "",
      fname: "",
      
      address: ""
    },
    editInput: {
      lname: "",
      fname: "",
      
      address: ""
    }
  },
  methods: {
    //function to add data to table
    add: function() {
      this.persons.push({
        lname: this.input.lname,
        fname: this.input.fname,
        
        address: this.input.address
      });

      for (var key in this.input) {
        this.input[key] = '';
      }
      this.persons.sort(ordonner);
      this.$refs.lname.focus();
    },
    //function to handle data edition
    edit: function(index) {
      this.editInput = this.persons[index];
      console.log(this.editInput);
      this.persons.splice(index, 1);
    },
    //function to send data to bin
    archive: function(index) {
      this.bin.push(this.persons[index]);
      this.persons.splice(index, 1);
      this.bin.sort(ordonner);
    },
    //function to restore data
    restore: function(index) {
      this.persons.push(this.bin[index]);
      this.bin.splice(index, 1);
      this.bin.sort(ordonner);
    },
    //function to update data
    update: function(){
      // this.persons.push(this.editInput);
       this.persons.push({
        lname: this.editInput.lname,
        fname: this.editInput.fname,
        
        address: this.editInput.address
      });
       for (var key in this.editInput) {
        this.editInput[key] = '';
      }
      this.persons.sort(ordonner);
    },
    //function to defintely delete data 
    deplete: function(index) {
      // console.log(this.bin[index]);
      this.persons.splice(index, 1);
    }
  }
});

//function to sort table data alphabetically
var ordonner = function(a, b) {
  return (a.lname > b.lname);
};

$(function() {
  //initialize modal box with jquery
  $('.modal').modal();
});