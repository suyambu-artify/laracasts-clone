<template>

	<div class="cls_lessons">

		<div class="cls_btn text-center mb-4">
			<button class="btn btn-danger btn-sm" @click="CreateLesson()">new lesson</button>
		</div>

		<div class="cls_all_lessons">
			<ul>
				<li v-for="(lesson , key) in lessons">{{ lesson.title }}
					 <button class="btn btn-danger btn-sm" type="button" @click="DeleteLesson(lesson.id,key)">x</button>
					 <button class="btn btn-warning btn-sm" type="button" @click="EditLesson(lesson)">edit</button>
				</li> 
			</ul>
		</div>

		<new-lesson></new-lesson>

	</div>
</template>

<script>

	import axios from 'axios'

    export default{

		props : ['d_lessons','serie_id'],
		
		data (){
			return {
				lessons : JSON.parse(this.d_lessons)
			}
		},
		
		mounted (){

				this.$on('hasCreatedLesson',(lesson)=>{
					this.lessons.push(lesson)
				});

				this.$on('LessonUpdated',(newlesson)=>{
					let oldlesson = this.lessons.findIndex(lesson=>{
						return newlesson.id = lesson.id
					})
					this.lessons.splice(oldlesson,1,newlesson)
				});

		},
		components :{
			'new-lesson' : require('./child/New_editLesson.vue')
		},
		
		computed :{
			
		},
		methods :{
			CreateLesson() {
				this.$emit('new_lesson',this.serie_id)
			},
			DeleteLesson(id,key){
				if(confirm('are you sure to delete')){
						axios.delete(`/admin/${this.serie_id}/lessons/${id}`).then(response =>{
						this.lessons.splice(key ,1)
					}).catch(error=>{
						console.log(error)
					})
				  }
			},
			EditLesson(lesson){
				let serieId = this.serie_id
				this.$emit('edit_lesson',{lesson,serieId})
			}
		}

	}
	
</script>