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
        <button type="button" class="btn btn-success" @click="updateLesson()" v-if="editing">update lesson</button>
        <button type="button" class="btn btn-primary" @click="CreateLesson()" v-else>add lesson</button>
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
            serie_id : '',
            editing : false
      }
    },

    mounted (){
    
      this.$parent.$on('new_lesson',(serie_id)=>{

          this.editing = false 

          this.title = ''
          this.description = ''
          this.video_id = ''
          this.episode_number = ''

          this.serie_id = serie_id
          $('#NewLessonModal').modal()

      })

      this.$parent.$on('edit_lesson',({lesson,serieId})=>{
          
          this.editing = true 

          this.title = lesson.title
          this.description = lesson.description
          this.video_id = lesson.video_id
          this.episode_number = lesson.episode_number
          
          this.lessonId = lesson.id
          this.serieId = serieId
          $('#NewLessonModal').modal()

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

                  this.$parent.$emit('hasCreatedLesson',response.data)

                  $('#NewLessonModal').modal('hide')
                    this.title = ''
                    this.description = ''
                    this.video_id = ''
                    this.episode_number = ''
                    this.serie_id = ''

                }).catch(error=>{
                    console.log(error)
                })
            },

            updateLesson(){
              axios.put(`/admin/${this.serieId}/lessons/${this.lessonId}`,{
                  title : this.title,
                  description : this.description,
                  video_id : this.video_id,
                  episode_number : this.episode_number
              }).then(response => {
                $('#NewLessonModal').modal('hide')

                this.$parent.$emit('LessonUpdated',response.data)

              }).catch(error=>{
                console.log(error)
              })
            },
        }

	}
</script>