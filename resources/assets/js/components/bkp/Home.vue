<template>
    
    <div class="container">
        <h3>Home Listtt</h3>
        <div class="row">
           
            <div class="col-md-8">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Home Name</th>
<th>Room Name2</th>
                        </tr>
                    </thead>
                    <tbody>
<td> test </td>
                        <tr v-for="room in rooms" >
                            <td> {{ room.name }} </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>


<script>

    export default {

     
        mounted() {

            console.log('Room Component ready.')
            this.fetchRoomList()
           
        },

        data : function() {
            return {
                rooms : []
            }

        },

        methods : {

            fetchRoomList : function(){
                        var pathArray = location.href.split( '/' );
var protocol = pathArray[0];
var host = pathArray[2];
var url = protocol + '//' + host;
console.log("url"+url);
                    this.$http.get(url+'/api/rooms').then((response) => {
                    this.$set(this,'rooms', response.data )

                });
            }
        }

       
        }
    
</script>
