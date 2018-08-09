<template>
	<div class="cls_lessons">

		<div class="cls_btn text-center mb-4">
			<button class="btn btn-danger btn-sm" @click="CreateLesson()">new lesson</button>
		</div>

		<div class="cls_all_lessons">
			<ul v-for="lesson in JsonLessons">
				<li>{{ lesson.title }}</li>
			</ul>
		</div>

		<new-lesson></new-lesson>

	</div>
</template>

<script>

    export default{

		props : ['d_lessons','serie_id'],

		components :{
			'new-lesson' : require('./child/NewLesson.vue')
		},

		data (){
			return {
				lessons : this.d_lessons
			}
		},
		computed :{
			JsonLessons(){
				return JSON.parse(this.lessons)
			}
		},
		methods :{
			CreateLesson() {
				this.$emit('new_lesson',this.serie_id)
			}
		},

	}
</script>