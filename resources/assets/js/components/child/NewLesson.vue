<template>

<div class="modal fade" id="NewLessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
	<div class="form-group">
			<input type="text" class="form-control" placeholder="title" v-model="title">
	</div>
	<div class="form-group">
		<textarea class="form-control"  placeholder="description" v-model="description"></textarea>
	</div>
	<div class="form-group">
			<input type="text" class="form-control" placeholder="video number" v-model="video_id">
	</div>
	<div class="form-group">
			<input type="text" class="form-control" placeholder="epsoide number" v-model="episode_number">
	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="CreateLesson()">Save changes</button>
      </div>
    </div>
  </div>
</div>

</template>
<script>
    import axios from 'axios'

	export default{
		data (){
			return{
                title : '',
                description : '',
                video_id : '',
                episode_number : '',
                serie_id : ''
			}
		},
		mounted (){
			this.$parent.$on('new_lesson',(serie_id)=>{
			    this.serie_id = serie_id
                $('#NewLessonModal').modal();
			})
		},
        methods :{
            CreateLesson() {
                axios.post(`/admin/${this.serie_id}/lessons`,{
                    title : this.title,
                    description : this.description,
                    video_id : this.video_id,
                    episode_number : this.episode_number,
                }).then(response => {
                    console.log(response)
                }).catch(error=>{
                    console.log(error)
                })
            }
        }

	}
</script>