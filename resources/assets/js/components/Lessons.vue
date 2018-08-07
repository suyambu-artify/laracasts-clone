<template>
	<div class="lessons_cls">
		<div class="text-center">
			<button class="btn-sm mb-4 btn-warning" @click="NewLesson()">new lesson</button>
		</div>
		<ul v-for="lesson in parseLessons">
			<li>{{lesson.title}}</li>
		</ul>
		<new-lesson></new-lesson>
	</div>
</template>

<script>
	export default{
			props :['default_lessons'],

			components :{
			  'new-lesson' : require('./children/NewLesson.vue')
			},

			data(){
				return {
					lessons : this.default_lessons
				}
			},

			computed :{
				parseLessons(){
					return JSON.parse(this.lessons)
				}
			},
			methods :{
                NewLesson(){
					this.$emit('new_lesson')
				}
			}
		}
	
</script>