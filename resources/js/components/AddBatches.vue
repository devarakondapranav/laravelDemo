<template>
       
  <h4 class="head"> Application</h4>
  <div class="container">


    <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length+1">
      <thead>
        <tr>
          <th v-for="column in columns">
            {{column}}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(person,index) in persons">
          <td>{{index}}</td>
          <td>
            {{person.lname}}
          </td>
          <td>
            {{person.fname}}
          </td>
          
          </td>
          <td>
            {{person.address}}
          </td>
          <td style="width: 18%;">
            <a href="#modal" @click="edit(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">edit</i>
            </a>
            <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i>
            </a>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="input-field">
              <input placeholder="Placeholder" ref="lname" v-model="input.lname" id="lname" type="text">
              <label for="lname">Last Name</label>
            </div>
          </td>
          <td>
            <div class="input-field">
              <input placeholder="Placeholder" v-model="input.fname" id="fname" type="text">
              <label for="fname">First Name</label>
            </div>
          </td>
         
          <td>
            <div class="input-field">
              <input placeholder="Placeholder" v-model="input.address" id="address" type="text">
              <label for="address">Address</label>
            </div>
          </td>
         

          <td><a href="#!" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td>
        </tr>
      </tbody>
    </table>

    <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
      <thead>
        <tr>
          <th v-for="column in columns">
            {{column}}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(person,index) in bin">
          <td>{{index}}</td>
          <td>
            {{person.lname}}
          </td>
          <td>
            {{person.fname}}
          </td>
          
          <td>
            {{person.address}}
          </td>
          <td>
            <a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i>
            </a>
            <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div id="modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center-align">Edit</h4>
      <p class="center-align">Edition form. Update informations</p>
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="John" id="last_name" type="text" v-model="editInput.lname">
              <label for="last_name">Last Name</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="Doe" id="first_name" type="text" v-model="editInput.fname">
              <label for="first_name">First Name</label>
            </div>
          </div>
          <div class="row">
            
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Address" id="edit_address" type="text" v-model="editInput.address">
              <label for="edit_address">First Name</label>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      <a href="#!" @click="update" class="btn waves-effect waves-light"><i class="material-icons">edit</i></a>
    </div>
  </div>

 
    </template>
    <script>
        export default {}
    </script>
    <style scoped>
       body{
  
  background: linear-gradient(
        limegreen,
        transparent
    ),
    linear-gradient(
        90deg,
        skyblue,
        transparent
    ),
    linear-gradient(
        -90deg,
        coral,
        transparent
    );
  background-blend-mode: screen;
}
div:first-child{
  margin: 20px 0;
  table:first-of-type{
    margin: 15px 2px;
    background: #ffffff !important;
  }
  table:last-of-type{
     margin: 15px 2px;
    background: #fdfdef !important;
  }
  .head{
    text-align: center;
    margin: 45px 35px;
  }
  .img-container{
     text-align: center;
  }
}
    </style>